<?php

namespace Ap\Tender\Models;

use Backend\Facades\BackendAuth;
use Model;

/**
 * Model
 */
class Office extends Model
{
    use \October\Rain\Database\Traits\Validation;
    use \October\Rain\Database\Traits\Sortable;
    use \October\Rain\Database\Traits\Revisionable;


    /**
     * @var string The database table used by the model.
     */
    public $table = 'ap_tender_offices';

    /**
     * @var array Validation rules
     */
    public $rules = [
        'name' => 'required|unique:ap_tender_offices',
        'description' => 'required'
    ];


    public $morphMany = [
        'revision_history' => ['System\Models\Revision', 'name' => 'revisionable']
    ];

    protected $revisionable = ['name', 'description'];
    public $revisionableLimit = 500;
    public function getRevisionableUser()
    {
        return BackendAuth::getUser();
    }
}
