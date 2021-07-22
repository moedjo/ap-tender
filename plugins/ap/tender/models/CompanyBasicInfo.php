<?php

namespace Ap\Tender\Models;

use Model;

/**
 * Model
 */
class CompanyBasicInfo extends Company
{

    public $rules = [
        'name' => 'required',
        'npwp' => 'required',
        'konsorsium' => 'required',
        'address' => 'required',
        'region' => 'required',
        'phone_number' => 'required',
        'fax_number' => 'required',
        'email' => 'required',
        'website' => 'required',
        'directors' => 'required',
        'commissioners' => 'required',
        'fields' => 'required',
        'business_activity' => 'required',
        'kbli' => 'required',
        'contact_full_name' => 'required',
        'contact_position' => 'required',
        'contact_phone_number' => 'required',
        'contact_email' => 'required',
        'doc_basic_akta' => 'required',
        'doc_basic_siup' => 'required',
        'doc_basic_tdp' => 'required',
        'doc_basic_domisili' => 'required',
        'doc_basic_npwp' => 'required',
        'doc_basic_ktp' => 'required',
        'doc_basic_sk' => 'required',
    ];


    public function beforeValidate()
    {
        if ($this->konsorsium) {
            $this->rules['konsorsium_role'] = "required";
            $this->rules['konsorsium_total'] = "required";
            $this->rules['konsorsium_name'] = "required";
            $this->rules['konsorsium_function'] = "required";
            $this->rules['doc_basic_konsorsium'] = "required";
        }
    }


    // konsorsium_role
    // konsorsium_total
    // konsorsium_name
    // konsorsium_function

    // doc_basic_konsorsium
}
