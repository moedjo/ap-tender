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

class OffVerificationTenants extends Controller
{
    public $implement = [
        'Backend\Behaviors\ListController'
    ];

    public $listConfig = 'config_list.yaml';

    public $requiredPermissions = ['ap_tender_access_off_verification_tenants'];

    public function __construct()
    {
        parent::__construct();
        BackendMenu::setContext('Ap.Tender', 'verification-tenants', 'off-verification-tenants');
    }

    public function index_onDelete()
    {
        return Response::make(View::make('backend::access_denied'), 403);
    }

    public function extendQuery($query)
    {
        $user = $this->user;
        return $query->whereIn('status',['evaluated',]);
    }

    public function listExtendQuery($query)
    {
        return $this->extendQuery($query);
    }


    public function listOverrideRecordUrl($record, $definition = null)
    {

        $user = $this->user;
        if ($user->hasPermission('ap_tender_access_legals')) {
            return 'ap/tender/offverificationlegals/update/' . $record->id;
        }

        if ($user->hasPermission('ap_tender_access_finances')) {
            return 'ap/tender/offverificationfinances/update/' . $record->id;
        }

        if ($user->hasPermission('ap_tender_access_commercials')) {

            if($record->status =='pre_clarificated'){
                return 'ap/tender/offverificationlasts/update/' . $record->id;
            }

            return 'ap/tender/offverificationcommercials/update/' . $record->id;
        }
    }
}
