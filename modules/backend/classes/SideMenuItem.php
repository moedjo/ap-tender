<?php namespace Backend\Classes;

/**
 * SideMenuItem
 *
 * @package october\backend
 * @author Alexey Bobkov, Samuel Georges
 */
class SideMenuItem
{
    /**
     * @var string code
     */
    public $code;

    /**
     * @var string owner
     */
    public $owner;

    /**
     * @var string label
     */
    public $label;

    /**
     * @var null|string icon
     */
    public $icon;

    /**
     * @var null|string iconSvg
     */
    public $iconSvg;

    /**
     * @var string url
     */
    public $url;

    /**
     * @var null|int|callable counter
     */
    public $counter;

    /**
     * @var null|string counterLabel
     */
    public $counterLabel;

    /**
     * @var int order
     */
    public $order = -1;

    /**
     * @var array attributes
     */
    public $attributes = [];

    /**
     * @var array permissions
     */
    public $permissions = [];

    /**
     * @var string itemType
     */
    public $itemType;

    /**
     * @var string buttonActiveOn
     */
    public $buttonActiveOn;

    /**
     * @var array customData
     */
    public $customData = [];

    /**
     * addAttribute
     * @param null|string|int $attribute
     * @param null|string|array $value
     */
    public function addAttribute($attribute, $value)
    {
        $this->attributes[$attribute] = $value;
    }

    /**
     * removeAttribute
     */
    public function removeAttribute($attribute)
    {
        unset($this->attributes[$attribute]);
    }

    /**
     * addPermission
     */
    public function addPermission(string $permission, array $definition)
    {
        $this->permissions[$permission] = $definition;
    }

    /**
     * removePermission
     * @param string $permission
     * @return void
     */
    public function removePermission(string $permission)
    {
        unset($this->permissions[$permission]);
    }

    /**
     * createFromArray
     * @return static
     */
    public static function createFromArray(array $data)
    {
        $instance = new static;

        $instance->code = $data['code'];
        $instance->owner = $data['owner'];
        $instance->label = $data['label'];
        $instance->url = $data['url'];
        $instance->icon = $data['icon'] ?? null;
        $instance->iconSvg = $data['iconSvg'] ?? null;
        $instance->counter = $data['counter'] ?? null;
        $instance->counterLabel = $data['counterLabel'] ?? null;
        $instance->attributes = $data['attributes'] ?? $instance->attributes;
        $instance->permissions = $data['permissions'] ?? $instance->permissions;
        $instance->order = $data['order'] ?? $instance->order;
        $instance->itemType = $data['itemType'] ?? null;
        $instance->buttonActiveOn = $data['buttonActiveOn'] ?? null;
        $instance->customData = $data['customData'] ?? [];

        return $instance;
    }
}
