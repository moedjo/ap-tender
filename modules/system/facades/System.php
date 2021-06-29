<?php namespace System\Facades;

use October\Rain\Support\Facade;

class System extends Facade
{
    /**
     * @var string The October CMS major version.
     */
    const VERSION = '2.0';

    /**
     * Get the registered name of the component.
     *
     * @see \System\Helpers\System
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'system.helper';
    }
}
