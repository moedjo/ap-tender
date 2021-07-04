<?php

namespace Ap\Tender\Models;

use Model;

/**
 * Model
 */
class Company extends Model
{
    use \October\Rain\Database\Traits\Validation;


    /**
     * @var string The database table used by the model.
     */
    public $table = 'ap_tender_companies';

    /**
     * @var array Validation rules
     */
    public $rules = [];

    public $belongsTo = [
        'business_entity' => 'Ap\Tender\Models\BusinessEntity',
        'contact_position' => 'Ap\Tender\Models\Position',
        'region' => 'Ap\Tender\Models\Region',
        'verification_office' => 'Ap\Tender\Models\Office',
    ];

    public $hasMany = [
        'experiences' => [
            'Ap\Tender\Models\Experience',
            'key' => 'company_id'
        ],
        'finances' => [
            'Ap\Tender\Models\Finance',
            'key' => 'company_id'
        ]
    ];

    public $belongsToMany = [
        'summaries' => [
            'Ap\Tender\Models\Summary',
            'table' => 'ap_tender_companies_summaries',
            'key'      => 'company_id',
            'otherKey' => 'summary_id'
        ]
    ];
}
