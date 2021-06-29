<?php namespace Cms\Classes;

/**
 * ObjectMemoryCache provides a simple request-level cache for CMS objects
 *
 * @package october\cms
 * @author Alexey Bobkov, Samuel Georges
 */
class ObjectMemoryCache
{
    /**
     * @var array cache collection
     */
    public static $cache = [];

    /**
     * has
     */
    public static function has($cacheKey): bool
    {
        return array_key_exists($cacheKey, static::$cache);
    }

    /**
     * get
     */
    public static function get($cacheKey, CmsObject $instance): ?CmsObject
    {
        $attributes = static::$cache[$cacheKey] ?? null;

        return $attributes ? $instance->newFromBuilder($attributes) : null;
    }

    /**
     * put
     */
    public static function put($cacheKey, ?CmsObject $obj)
    {
        static::$cache[$cacheKey] = $obj ? $obj->getAttributes() : null;
    }

    /**
     * flush
     */
    public static function flush()
    {
        static::$cache = [];
    }
}
