<?php

namespace Ap\Tender\Controllers;

use Ap\Tender\Models\Verification;
use Backend\Classes\Controller;
use Backend\Facades\BackendMenu;
use Illuminate\Support\Facades\View;
use Response;

class OnVerificationLegals extends Controller
{
    public $implement = [
        'Backend\Behaviors\FormController',
        'Backend\Behaviors\RelationController',
    ];

    public $formConfig = 'config_form.yaml';
    public $relationConfig = 'config_relation.yaml';

    public $requiredPermissions = ['ap_tender_access_legals'];

    public function __construct()
    {
        parent::__construct();
        BackendMenu::setContext('Ap.Tender', 'verification-tenants','on-verification-tenants');
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
        return $query;
    }

    public function formExtendQuery($query)
    {
        return $this->extendQuery($query);
    }

    public function formExtendModel($model)
    {
        $verification_legals = Verification::where('type', 'legal')->get();
        $model->verification_legals = $verification_legals;
        $model->save();
    }

    public function formBeforeSave($model)
    {
        $model->load('verification_legals');
        $verification_legals = $model->verification_legals;
        $status = 'approve';
        foreach($verification_legals as $verification_legal){
            if(!$verification_legal->pivot->on_legal_check){
                $status = 'reject';break;
            }
        }
        $model->on_legal_status = $status;
    }
}
