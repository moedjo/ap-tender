<?php namespace Ap\Tender\Models;

use Model;

/**
 * Model
 */
class CompanyRegister extends Company
{
 
    public $rules = [
        'name' => 'required',
        'email' => 'required|email',
        'npwp' => 'required|min:15|numeric',
        'contact_phone_number' => 'required|min:10|numeric'
    ];
}
