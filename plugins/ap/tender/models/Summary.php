<?php namespace Ap\Tender\Models;

use Model;

/**
 * Model
 */
class Summary extends Model
{
    use \October\Rain\Database\Traits\Validation;
    

    /**
     * @var string The database table used by the model.
     */
    public $table = 'ap_tender_summaries';

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];
}
