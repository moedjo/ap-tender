<?php namespace Ap\Tender\Models;

use Model;

/**
 * Model
 */
class CompanyRegister extends Company
{
 
    public $rules = [
        'name' => 'required',
        'address' => 'required',
        'fax_number' => 'required',
        'contact_full_name' => 'required',
        'email' => 'required|email|unique:users',
        'npwp' => 'required|min:15|numeric|unique:users',
        'contact_phone_number' => 'required|min:10|numeric',
        'phone_number' => 'required|min:10|numeric'
    ];
}
