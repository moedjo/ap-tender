<?php

namespace Ap\Tender\Controllers;

use Ap\Tender\Models\Company;
use Backend\Classes\Controller;
use Backend\Facades\Backend;
use Backend\Facades\BackendAuth;
use Backend\Facades\BackendMenu;
use Event;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Str;
use October\Rain\Support\Facades\Flash;
use Response;

class ViewExperiences extends Controller
{
    public $implement = [
        'Backend\Behaviors\FormController'
    ];

    public $formConfig = 'config_form.yaml';


    public $requiredPermissions = ['ap_tender_access_user_tenant'];

    public function __construct()
    {
        parent::__construct();
        BackendMenu::setContext('Ap.Tender', 'tenants');
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



    public function view()
    {
        $user = $this->user;
        $company = Company::where('user_id', $user->id)->first();
        return Redirect::to(Backend::url('ap/tender/viewexperiences/update/'.$company->id));
    }

}
