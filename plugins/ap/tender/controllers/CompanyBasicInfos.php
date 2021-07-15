<?php

namespace Ap\Tender\Controllers;

use Backend\Classes\Controller;
use Backend\Facades\BackendAuth;
use Backend\Facades\BackendMenu;
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


    public $requiredPermissions = [];

    public $publicActions = [
        'update'
    ];

    public function __construct()
    {
        parent::__construct();
        BackendMenu::setContext('Ap.Tender', 'tenants');

        $user = $this->user;
        if (empty($user)) {
            $this->layout = 'public/default';
        }

        $url = url()->current();
        $search = "companybasicinfos";
        $active = preg_match("/{$search}/i", $url);
        if ($active == 1) {
            $this->vars['dataActive'] = 'active';
        } else {
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
        }

        $company_id = Session::get('company_id');
        return $query->where('id', $company_id);
    }

    public function formExtendQuery($query)
    {
        return $this->extendQuery($query);
    }


    public function formExtendFields($host, $fields)
    {
        $context = $host->getContext();
        $model = $host->model;
        $user = $this->user;

        if ($context == 'update') {

            if(isset($user)){
                $fields['name']->disabled = true;
            }
            
        }
    }
}
