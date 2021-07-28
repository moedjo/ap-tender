<?php

namespace Ap\Tender\Controllers;

use Ap\Tender\Models\Verification;
use Backend\Classes\Controller;
use Backend\Facades\BackendMenu;
use Illuminate\Support\Facades\View;
use Response;

use function PHPUnit\Framework\isEmpty;

class OffVerificationFinances extends Controller
{
    public $implement = [
        'Backend\Behaviors\FormController',
        'Backend\Behaviors\RelationController',
    ];

    public $formConfig = 'config_form.yaml';
    public $relationConfig = 'config_relation.yaml';

    public $requiredPermissions = ['ap_tender_access_finances'];

    public function __construct()
    {
        parent::__construct();
        BackendMenu::setContext('Ap.Tender', 'verification-tenants', 'off-verification-tenants');
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
        return $query->where('status','evaluated');
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
        $model->load('verification_finances');
        $verification_finances = $model->verification_finances;
        $status = 'approve';
        foreach ($verification_finances as $verification_finance) {
            if (!$verification_finance->pivot->off_check) {
                $status = null;
                break;
            }
        }

        $model->off_finance_status = $status;

        if (
            $model->off_legal_status == 'approve' &&
            $model->off_finance_status == 'approve' &&
            $model->off_commercial_status == 'approve'
        ) {

            $model->status = 'pre_clarificated';
        }
    }
}
