<?php

namespace Ap\Tender\Models;

use Model;

/**
 * Model
 */
class CompanyRegister extends Company
{

    public $rules = [
        'business_entity' => 'required',
        'verification_office' => 'required',
        'contact_position' => 'required',
        'region' => 'required',
        'collaborate' => 'required',
        'name' => 'required',
        'address' => 'required',
        'fax_number' => 'required',
        'contact_full_name' => 'required',
        'email' => 'required|email',
        'npwp' => 'required|min:15|numeric',
        'contact_phone_number' => 'required|min:10|numeric',
        'phone_number' => 'required|min:10|numeric',
        'doc_proof_cooperation' => 'required'
    ];
}
