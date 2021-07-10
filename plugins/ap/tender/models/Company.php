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
        'region' => [
            'Ap\Tender\Models\Region',
            'key' => 'region_id',
            'conditions' => "type = 'regency'"
        ],
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

    public $attachOne = [
        'doc_finance_sppkp' => ['System\Models\File', 'public' => false],
        'doc_finance_spt' => ['System\Models\File', 'public' => false],
        'doc_finance_blp' => ['System\Models\File', 'public' => false],
        'doc_finance_bsp' => ['System\Models\File', 'public' => false],
        'doc_finance_sklp' => ['System\Models\File', 'public' => false],
        'doc_finance_other' => ['System\Models\File', 'public' => false],


        
        'doc_basic_npwp' => ['System\Models\File', 'public' => false],
        'doc_basic_ktp' => ['System\Models\File', 'public' => false],
        'doc_basic_sk' => ['System\Models\File', 'public' => false],
        'doc_basic_other' => ['System\Models\File', 'public' => false],
        
    ];

    public $attachMany = [
        'doc_basic_akta' => ['System\Models\File', 'public' => false],
        'doc_basic_siup' => ['System\Models\File', 'public' => false],
        'doc_basic_tdp' => ['System\Models\File', 'public' => false],
        'doc_basic_domisili' => ['System\Models\File', 'public' => false],
    ];
}
