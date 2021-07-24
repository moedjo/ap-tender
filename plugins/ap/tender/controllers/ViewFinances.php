<?php

namespace Ap\Tender\Controllers;

use Backend\Classes\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;
use Response;

class ViewFinances extends Controller
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
        parent::__construct();
        
        $url = url()->current();
        $search = "viewfinances";
        $active = preg_match("/{$search}/i", $url);
        if ($active == 1) {
            $this->vars['dataActive'] = 'active';
        }else{
            $this->vars['dataActive'] = 'failed';
        }
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
        $user = $this->user;
        if (isset($user)) {
            if ($user->hasPermission('ap_tender_access_companies')) {
                return $query;
            }

            // ap_tender_access_companies

            if ($user->hasPermission('ap_tender_access_user_tenant')) {
                return $query->where('user_id', $user->id);
            }
        }

    }

    public function formExtendQuery($query)
    {
        return $this->extendQuery($query);
    }

    public function formExtendFields($host, $fields)
    {
        $context = $host->getContext();
        $model = $host->model;


        if ($context == 'update') {
            if($model->collaborate){
                $fields['doc_finance_collaborate']->hidden = false;
            }
        }
    }

}
