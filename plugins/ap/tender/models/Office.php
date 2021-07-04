<?php namespace Ap\Tender\Models;

use Model;

/**
 * Model
 */
class Office extends Model
{
    use \October\Rain\Database\Traits\Validation;
    

    /**
     * @var string The database table used by the model.
     */
    public $table = 'ap_tender_offices';

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];
}