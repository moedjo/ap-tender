<?php

namespace Ap\Tender\Controllers;

use Backend\Classes\Controller;
use BackendMenu;
use Event;
use Session;

class Companies extends Controller
{
    public $implement = [
        'Backend\Behaviors\ListController',        
        'Backend\Behaviors\FormController',
        'Backend\Behaviors\RelationController',
    ];

    public $listConfig = 'config_list.yaml';
    public $formConfig = 'config_form.yaml';
    public $relationConfig = 'config_relation.yaml';
    
    public $requiredPermissions = [
        'access_fields'
    ];
    public $publicActions = [
        'register'
    ];

    public function __construct()
    {
        $this->formConfig = 'register_config_form.yaml';
        parent::__construct();
    }

    public function register()
    {
        $this->layout = 'public/default';
        $this->formConfig = 'register_config_form.yaml';
        $this->asExtension('FormController')->create();
    }

    public function register_onSave()
    {

        $model = $this->formGetModel();
        $this->asExtension('FormController')->create_onSave();
        Event::fire('company.register', [$model]);

    }
}
