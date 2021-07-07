<?php

namespace Ap\Tender\Models;

use Model;

/**
 * Model
 */
class Region extends Model
{
    use \October\Rain\Database\Traits\Validation;
    use \October\Rain\Database\Traits\Revisionable;


    /**
     * @var string The database table used by the model.
     */
    public $table = 'ap_tender_regions';
    public $incrementing = false;

    /**
     * @var array Validation rules
     */
    public $rules = [
        'name' => 'required|unique:ap_tender_regions',
        'description' => 'required'
    ];


    public $morphMany = [
        'revision_history' => ['System\Models\Revision', 'name' => 'revisionable']
    ];

    protected $revisionable = ['name', 'type', 'parent_id', 'postal_codes', 'lat', 'lang'];
    public $revisionableLimit = 500;
    public function getRevisionableUser()
    {
        return BackendAuth::getUser();
    }
}
