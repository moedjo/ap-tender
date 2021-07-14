<?php

namespace Ap\Tender\Controllers;

use Ap\Tender\Models\Company;
use Backend\Classes\Controller;
use Backend\Models\UserRole;
use Event;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;
use Response;
use October\Rain\Support\Facades\Flash;

class PublicUsers extends Controller
{
    public $implement = [
        'Backend\Behaviors\FormController',
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


    public function index_onDelete()
    {
        return Response::make(View::make('backend::access_denied'), 403);
    }
    public function update_onDelete($recordId = null)
    {
        return Response::make(View::make('backend::access_denied'), 403);
    }

    public function update($context = null)
    {
        return Response::make(View::make('backend::access_denied'), 403);
    }

    public function preview($recordId = null, $context = null)
    {
        return Response::make(View::make('backend::access_denied'), 403);
    }


    public function formExtendModel($model)
    {

        $company_id = Session::get('company_id');

        $company = Company::findOrFail($company_id);

        $context = $this->formGetContext();
        if ($context == 'create') {
            $model->email = $company->contact_email;
            $model->first_name = $company->contact_full_name;
            $model->last_name = $company->name;
            // $model->branch_region = $branch->region;
        }
    }

    public function create($context = null)
    {

        $token = input('token');
        $company = Company::where('token', $token)
            ->orderBy('created_at', 'DESC')
            ->first();

        if (isset($company)) {
            if ($company->status == 'pre_register') {
                Session::put('company_id', $company->id);
                Flash::success(e(trans('ap.tender::lang.global.success_activation')));
            } else {
                return redirect('/');
            }
        } else {
            return redirect('/');
        }


        return $this->asExtension('FormController')->create($context);
    }

    public function formBeforeCreate($model)
    {
        // $model->token = null;
        // $model->token_url = null;
        $role = UserRole::where('code', 'tenant')->first();
        $model->role()->associate($role);

    }


    public function formAfterCreate($model)
    {
        // Event::fire('company.before.signup', [$model]);
        $company_id = Session::get('company_id');
        $company = Company::findOrFail($company_id);

        // $company->token = null;
        // $company->token_url = null;
        // $company->status = 'register';
        $company->user()->associate($model);
        $company->save();

        Event::fire('company.after.register', [$model]);
    }

    public function success()
    {
        Session::forget('company_id');
    }
}
