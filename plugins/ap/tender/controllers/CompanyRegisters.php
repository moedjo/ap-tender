<?php

namespace Ap\Tender\Controllers;

use Backend\Classes\Controller;
use Event;
use Illuminate\Support\Str;

class CompanyRegisters extends Controller
{
    public $implement = [        
        'Backend\Behaviors\FormController'
    ];

    public $formConfig = 'config_form.yaml';
    
    public $requiredPermissions = [
    ];

    public $publicActions = [
        'create' , 'success'
    ];


    public function __construct()
    {
        $this->layout = 'public/default';
        parent::__construct();
    }

    public function success(){
    }

    public function validate(){
    }


    public function formBeforeCreate($model){
        $model->token = Str::random(6);
        $model->token_url = url('/backend/ap/tender/companyregister/validate');
    }

    public function formAfterCreate($model){
        Event::fire('company.register', [$model]);
    }
}
