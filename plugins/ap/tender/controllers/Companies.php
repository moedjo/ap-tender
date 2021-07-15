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
        // 'Backend\Behaviors\FormController',
        // 'Backend\Behaviors\RelationController',
    ];

    public $listConfig = 'config_list.yaml';
    // public $formConfig = 'config_form.yaml';
    // public $relationConfig = 'config_relation.yaml';
    
    public $requiredPermissions = [
        'ap_tender_access_companies'
    ];

    public function __construct()
    {
        parent::__construct();
        BackendMenu::setContext('Ap.Tender', 'tenants');
    }
  
}
