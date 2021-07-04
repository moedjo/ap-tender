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

    /**
     * @var array Validation rules
     */
    public $rules = [];

    public $belongsTo = [
        'company' => ['Ap\Tender\Models\Company', 'key' => 'company_id'],

    ];

    public $attachOne = [
        'doc_appointment' => ['System\Models\File', 'public' => false]
    ];
}
