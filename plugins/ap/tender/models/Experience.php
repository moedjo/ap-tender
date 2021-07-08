<?php

namespace Ap\Tender\Models;

use Model;

/**
 * Model
 */
class Experience extends Model
{
    use \October\Rain\Database\Traits\Validation;


    /**
     * @var string The database table used by the model.
     */
    public $table = 'ap_tender_experiences';

    public $dates = [

        'cooperation_period_start',
        'cooperation_period_end',

        'operational_hour_start',
        'operational_hour_end'
];

    /**
     * @var array Validation rules
     */
    public $rules = [];

    public $belongsTo = [
        'company' => [
            'Ap\Tender\Models\Company',
            'key' => 'company_id'
        ],
        'experience_category' => [
            'Ap\Tender\Models\ExperienceCategory',
            'key' => 'experience_category_id'
        ],
        'region' => [
            'Ap\Tender\Models\Region',
            'key' => 'region_id',
            'conditions' => "type = 'regency'"
        ],
    ];

    public $attachOne = [
        'doc_experience' => ['System\Models\File', 'public' => false]
    ];

    public function getOperationalHourAttribute()
    {
        return $this->operational_hour_start->format('H:i').' - '. $this->operational_hour_end->format('H:i');
    }

    public function getCooperationPeriodAttribute()
    {
        return $this->cooperation_period_start->format('d M Y').' - '. $this->cooperation_period_end->format('d M Y');
    }


}
