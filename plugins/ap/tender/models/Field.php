<?php namespace Ap\Tender\Models;

use Model;

/**
 * Model
 */
class Field extends Model
{
    use \October\Rain\Database\Traits\Validation;
    

    /**
     * @var string The database table used by the model.
     */
    public $table = 'ap_tender_fields';

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];

    public $attachOne = [
        'image' => ['System\Models\File', 'public' => false]
    ];
}
