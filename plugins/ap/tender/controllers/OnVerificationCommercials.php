<?php

namespace Ap\Tender\Controllers;

use Ap\Tender\Models\Verification;
use Backend\Classes\Controller;
use Backend\Facades\BackendMenu;
use Illuminate\Support\Facades\View;
use Response;

class OnVerificationCommercials extends Controller
{
    public $implement = [
        'Backend\Behaviors\FormController',
        'Backend\Behaviors\RelationController',
    ];

    public $formConfig = 'config_form.yaml';
    public $relationConfig = 'config_relation.yaml';

    public $requiredPermissions = ['ap_tender_access_commercials'];

    public function __construct()
    {
        parent::__construct();
        BackendMenu::setContext('Ap.Tender', 'verification-tenants', 'on-verification-tenants');
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
        return $query->where('status','register');
    }

    public function formExtendQuery($query)
    {
        return $this->extendQuery($query);
    }

    public function formExtendModel($model)
    {
        $verifications = Verification::all();
        $model->verifications = $verifications;
        $model->save();
    }

    public function formBeforeSave($model)
    {
        $model->load('verification_commercials');
        $verification_commercials = $model->verification_commercials;
        $status = 'approve';
        foreach ($verification_commercials as $verification_commercial) {
            if (!$verification_commercial->pivot->on_check) {
                $status = 'reject';
                break;
            }
        }
        $model->on_commercial_status = $status;

        if (
            $model->on_legal_status == 'approve' &&
            $model->on_finance_status == 'approve' &&
            $model->on_commercial_status == 'approve'
        ) {

            $model->status = 'pre_evaluated';
        }
    }
}
