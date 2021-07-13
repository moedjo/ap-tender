<?php

namespace Ap\Tender\Controllers;

use Backend\Classes\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;
use Response;

class CompanyExperiences extends Controller
{
    public $implement = [        
        'Backend\Behaviors\FormController',
        'Backend\Behaviors\RelationController',
    ];

    public $formConfig = 'config_form.yaml';
    public $relationConfig = 'config_relation.yaml';
    
    public $requiredPermissions = [
    ];

    public $publicActions = [
        'update' 
    ];

    public function __construct()
    {
        $this->layout = 'public/default';
        $url = url()->current();
        $search = "companyexperiences";
        $active = preg_match("/{$search}/i", $url);
        if ($active == 1) {
            $this->vars['dataActive'] = 'active';
        }else{
            $this->vars['dataActive'] = 'failed';
        }
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

    public function formExtendQuery($query)
    {
        return $this->extendQuery($query);
    }

}
