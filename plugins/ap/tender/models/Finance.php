<?php namespace Ap\Tender\Models;

use Model;

/**
 * Model
 */
class Finance extends Model
{
    use \October\Rain\Database\Traits\Validation;
    

    /**
     * @var string The database table used by the model.
     */
    public $table = 'ap_tender_finances';

    /**
     * @var array Validation rules
     */
    public $rules = [
        'year' => 'required|numeric|between:1970,2022'
    ];


    public $attachOne = [
        'doc_finance' => ['System\Models\File', 'public' => false]
    ];
}
