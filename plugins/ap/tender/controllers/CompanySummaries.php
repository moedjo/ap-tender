<?php

namespace Ap\Tender\Controllers;

use Backend\Classes\Controller;
use Event;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;
use Response;
use Illuminate\Support\Str;

class CompanySummaries extends Controller
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

    public function formBeforeCreate($model)
    {
        $model->token = Str::random(6);
        $model->token_url = url('/backend/ap/tender/companyregisters/validate');
        $model->status = 'signup';
    }


    public function formAfterCreate($model)
    {
        Event::fire('company.before.signup', [$model]);
    }

    public function success(){
        
    }

}
