<?php namespace System\Classes;

/**
 * Class MarkupExtensionItem
 *
 * @package october\system
 * @author Alexey Bobkov, Samuel Georges
 */
class MarkupExtensionItem
{
    /**
     * {{ 'a'|filter }}
     */
    const TYPE_FILTER = 'filter';

    /**
     * {{ function() }}
     */
    const TYPE_FUNCTION = 'function';

    /**
     * {% token %}
     */
    const TYPE_TOKEN_PARSER = 'token';

    /**
     * @var string
     */
    public $name;

    /**
     * @var string
     */
    public $type;

    /**
     * @var callable
     */
    public $callback;

    /**
     * @var bool
     */
    public $escapeOutput;

    /**
     * @param array|string $data
     * @return static
     */
    public static function createFromArray(array $data)
    {
        $instance = new static;

        [$callback, $escapeOutput] = self::parseDefinition($data['definition'] ?? null);

        $instance->name = $data['name'] ?? null;
        $instance->type = $data['type'] ?? null;
        $instance->callback = $data['callback'] ?? $callback;
        $instance->escapeOutput = $data['escapeOutput'] ?? $escapeOutput;

        return $instance;
    }

    /**
     * parseDefinition will check if a callable definition contains output escaping
     */
    protected static function parseDefinition($definition): array
    {
        $escapeOutput = false;
        $callback = $definition;

        // If the last item in the array is a boolean, it defines output escaping
        if (
            is_array($callback) &&
            count($callback) > 1 &&
            is_bool($callback[array_key_last($callback)])
        ) {
            $escapeOutput = array_pop($callback);
        }

        // Convert an array with 1 item to a string, to make it callable
        // for example, ['count'] is not callable
        if (is_array($callback) && count($callback) <= 1) {
            $callback = implode("", $callback);
        }

        return [$callback, $escapeOutput];
    }

    /**
     * isWildCallable will test if the callback uses a wildcard,
     * for example, str_* can route to Str::*
     */
    public function isWildCallable(): bool
    {
        $callable = $this->callback;
        $isWild = false;

        if (is_string($callable) && strpos($callable, '*') !== false) {
            $isWild = true;
        }

        if (is_array($callable)) {
            if (is_string($callable[0]) && strpos($callable[0], '*') !== false) {
                $isWild = true;
            }

            if (!empty($callable[1]) && strpos($callable[1], '*') !== false) {
                $isWild = true;
            }
        }

        return $isWild;
    }

    /**
     * getWildCallback replaces wildcard with a real callable function
     */
    public function getWildCallback(string $name)
    {
        $callable = $this->callback;
        $wildCallback = null;

        if (is_string($callable) && strpos($callable, '*') !== false) {
            $wildCallback = str_replace('*', $name, $callable);
        }

        if (is_array($callable)) {
            if (is_string($callable[0]) && strpos($callable[0], '*') !== false) {
                $wildCallback = $callable;
                $wildCallback[0] = str_replace('*', $name, $callable[0]);
            }

            if (!empty($callable[1]) && strpos($callable[1], '*') !== false) {
                $wildCallback = $wildCallback ?: $callable;
                $wildCallback[1] = str_replace('*', $name, $callable[1]);
            }
        }

        return $wildCallback;
    }

    /**
     * getTwigOptions returns options passed to the Twig definition
     */
    public function getTwigOptions(): array
    {
        return $this->escapeOutput
            ? []
            : ['is_safe' => ['html']];
    }
}
