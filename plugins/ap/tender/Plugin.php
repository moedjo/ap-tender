<?php namespace Ap\Tender;

use System\Classes\PluginBase;

class Plugin extends PluginBase
{
    public function registerComponents()
    {
    }

    public function registerSettings()
    {
    }

    public function registerListColumnTypes()
    {
        return [
            'currency_idr' => function ($value) {
                return "Rp " . number_format($value, 0, ",", ".");
            }
        ];
    }


    public function registerMailTemplates()
    {
        return [
            'ap.tender::mail.company-register',
        ];
    }

    public function registerMailLayouts(){
        return [
            'ap-tender-default'    => 'ap.tender::layouts.default',
        ];
    }

    public function registerMailPartials(){}

}
