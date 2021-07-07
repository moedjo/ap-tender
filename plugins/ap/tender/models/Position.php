<?php namespace Ap\Tender\Models;

use Model;

/**
 * Model
 */
class Position extends Model
{
    use \October\Rain\Database\Traits\Validation;
    use \October\Rain\Database\Traits\Sortable;
    

    /**
     * @var string The database table used by the model.
     */
    public $table = 'ap_tender_positions';

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];
}
