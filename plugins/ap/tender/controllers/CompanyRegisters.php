<?php

namespace Ap\Tender\Controllers;

use Ap\Tender\Models\Company;
use Backend\Classes\Controller;
use Event;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use October\Rain\Support\Facades\Flash;

class CompanyRegisters extends Controller
{
    public $implement = [
        'Backend\Behaviors\FormController'
    ];

    public $formConfig = 'config_form.yaml';

    public $requiredPermissions = [];

    public $publicActions = [
        'create', 'success', 'validate'
    ];


    public function __construct()
    {
        $this->layout = 'public/default';
        parent::__construct();
    }

    public function success()
    {
    }

    public function validate()
    {
    }


    public function formBeforeCreate($model)
    {
        $model->token = Str::random(6);
        $model->token_url = url('/backend/ap/tender/companyregisters/validate');
        $model->status = 'signup';
    }

    public function onValidate()
    {
        $token = input('token');
        $company = Company::where('token', $token)
                ->orderBy('created_at', 'DESC')
                ->first();
                
        if (isset($company)) {

            if ($company->status == 'signup') {
                Session::put('company_id', $company->id);
                Flash::success(e(trans('ap.tender::lang.global.success_activation')));
                return Redirect::to("backend/ap/tender/companybasicinfos/update/$company->id");
            } else {
                Flash::error('invalid token');
            }
        } else {
            //TODO see lang.php
            Flash::error('invalid token');
        }
    }

    public function formAfterCreate($model)
    {
        Event::fire('company.signup', [$model]);
    }
}
