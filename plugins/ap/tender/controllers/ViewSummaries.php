<?php

namespace Ap\Tender\Controllers;

use Backend\Classes\Controller;
use Event;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;
use Response;
use Illuminate\Support\Str;

class ViewSummaries extends Controller
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
        'update' ,'success'
    ];

    public function __construct()
    {
        $this->layout = 'public/default';
        $url = url()->current();
        $search = "viewsummaries";
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

    public function formBeforeSave($model)
    {
        $model->token = Str::random(6);
        $model->token_url = url('/backend/ap/tender/publicusers/create?token='.$model->token);
        $model->status = 'pre_register';
    }


    public function formAfterSave($model)
    {
        Event::fire('company.before.register', [$model]);
    }

    public function success(){
        Session::forget('company_id');
    }

}
