<?php

namespace Ap\Tender\Controllers;

use Ap\Tender\Models\Verification;
use Backend\Classes\Controller;
use Backend\Facades\BackendMenu;
use Illuminate\Support\Facades\View;
use Response;

class OnVerificationLasts extends Controller
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
        return $query->where('status','pre_evaluated');
    }

    public function formExtendQuery($query)
    {
        return $this->extendQuery($query);
    }

    public function formExtendModel($model)
    {
       
    }

    public function formBeforeSave($model)
    {
        $model->load('verifications');
        $verifications = $model->verifications;
        $status = 'approve';
        foreach ($verifications as $verification) {
            if (!$verification->pivot->on_last_check) {
                $status = 'reject';
                break;
            }
        }
        $model->on_last_status = $status;

        if (
            $model->on_last_status == 'approve'
        ) {

            $model->status = 'evaluated';
        }
    }
}
