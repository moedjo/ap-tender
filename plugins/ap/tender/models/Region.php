<?php

namespace Ap\Tender\Models;

use Backend\Facades\BackendAuth;
use Model;
use Session;

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
    ];

    public $belongsTo = [
        'parent' => ['Ap\Tender\Models\Region', 'key' => 'parent_id']
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

    public function getDisplayTypeAttribute()
    {
        return e(trans('ap.tender::lang.region.' . $this->type));
    }

    public function getTypeOptions()
    {
        return [
            'province' => 'ap.tender::lang.region.province',
            'regency' => 'ap.tender::lang.region.regency',
            'district' => 'ap.tender::lang.region.district',
        ];
    }

    public function scopeParent($query)
    {
        $type = post('Region[type]');

        if (isset($type)) {
            Session::put('Region[type]', $type);
        } else {
            $type = Session::get('Region[type]');
        }

        if ($type == 'regency') {
            return $query->where('type', 'province');
        }

        if ($type == 'district') {
            return $query->where('type', 'regency');
        }
    }
}
