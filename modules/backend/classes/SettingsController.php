<?php namespace Backend\Classes;

use BackendMenu;
use System\Classes\SettingsManager;

/**
 * SettingsController is used for settings pages
 *
 * @package october\backend
 * @author Alexey Bobkov, Samuel Georges
 */
class SettingsController extends Controller
{
    /**
     * @var string settingsItemCode determines the settings code
     */
    public $settingsItemCode;

    /**
     * __construct
     */
    public function __construct()
    {
        BackendMenu::setContext('October.System', 'system', 'settings');

        SettingsManager::setContext($this->findSettingsContextFromClass($this), $this->settingsItemCode);

        parent::__construct();
    }

    /**
     * findSettingsContextFromClass converts a controller class to a plugin code
     */
    protected function findSettingsContextFromClass()
    {
        $classNameArray = explode('\\', get_class($this));

        return array_shift($classNameArray).'.'.array_shift($classNameArray);
    }
}
