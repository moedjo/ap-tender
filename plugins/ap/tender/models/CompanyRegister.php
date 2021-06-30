<?php namespace Ap\Tender\Models;

use Model;

/**
 * Model
 */
class CompanyRegister extends Company
{
 
    public $rules = [
        'name'=> 'required|between:5,255',
        'npwp'=> 'required|between:5,255',
    ];
}
