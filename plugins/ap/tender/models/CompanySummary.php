<?php namespace Ap\Tender\Models;

use Model;

/**
 * Model
 */
class CompanySummary extends Company
{
 
    public $rules = [
        
    ];


    public function getSummariesOptions()
    {
        $result = [];

        $summaries = Summary::all();

        foreach ($summaries as $summary) {
            $result[$summary->id] = [$summary->name, $summary->description];
        }

        return $result;
    }
}
