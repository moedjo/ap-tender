<?php

namespace Ap\Tender\Controllers;

use Backend\Classes\Controller;
use Event;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Str;
use October\Rain\Support\Facades\Flash;
use Response;

class CompanyBasicInfos extends Controller
{
    public $implement = [        
        'Backend\Behaviors\FormController'
    ];

    public $formConfig = 'config_form.yaml';
    
    
    public $requiredPermissions = [
    ];

    public $publicActions = [
        'update' 
    ];

    public function __construct()
    {
        $this->layout = 'public/default';
        parent::__construct();
    }

    
    public function index_onDelete()
    {
        return Response::make(View::make('backend::access_denied'), 403);
    }
    public function update_onDelete($recordId = null)
    {
        return Response::make(View::make('backend::access_denied'), 403);
    }

    public function create($context = null)
    {
        return Response::make(View::make('backend::access_denied'), 403);
    }

    public function preview($recordId = null, $context = null)
    {
        return Response::make(View::make('backend::access_denied'), 403);
    }


    public function extendQuery($query)
    {
        $company_id = Session::get('company_id');
        return $query->where('id', $company_id);

    }

    public function listExtendQuery($query)
    {
        return $this->extendQuery($query);
    }

    public function formExtendQuery($query)
    {
        return $this->extendQuery($query);
    }

}
