<?php namespace Ap\Tender\Models;

use Model;

/**
 * Model
 */
class CompanyFinance extends Company
{
 
    public $rules = [
        'finances' => 'required|size:3',
        
        'doc_finance_sppkp' => 'required',
        'doc_finance_spt' => 'required',
        'doc_finance_blp' => 'required',
        'doc_finance_bsp' => 'required',
        'doc_finance_sklp' => 'required',
        'doc_finance_other' => 'required',
    ];

    public function beforeValidate()
    {
        if ($this->collaborate) {
            $this->rules['doc_finance_collaborate'] = "required";
        }
    }

}
