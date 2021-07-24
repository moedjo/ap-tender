<?php

namespace Ap\Tender\Controllers;

use Ap\Tender\Models\Company;
use Ap\Tender\Models\Verification;
use Backend\Classes\Controller;
use Backend\Facades\Backend;
use Backend\Facades\BackendMenu;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;
use Response;

class OnVerificationTenants extends Controller
{
    public $implement = [
        'Backend\Behaviors\ListController'
    ];

    public $listConfig = 'config_list.yaml';

    public $requiredPermissions = ['ap_tender_access_on_verification_tenants'];

    public function __construct()
    {
        parent::__construct();
        BackendMenu::setContext('Ap.Tender', 'verification-tenants', 'on-verification-tenants');
    }

    public function index_onDelete()
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


    public function listOverrideRecordUrl($record, $definition = null)
    {

        $user = $this->user;
        if ($user->hasPermission('ap_tender_access_legals')) {
            return 'ap/tender/onverificationlegals/update/' . $record->id;
        }

        if ($user->hasPermission('ap_tender_access_finances')) {
            return 'ap/tender/onverificationfinances/update/' . $record->id;
        }

        if ($user->hasPermission('ap_tender_access_commercials')) {
            return 'ap/tender/onverificationcommercials/update/' . $record->id;
        }
    }
}
