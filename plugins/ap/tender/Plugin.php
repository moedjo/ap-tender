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
            'ap.tender::mail.company-before-register',
            'ap.tender::mail.company-after-register',
            'ap.tender::mail.company-signup',
            'ap.tender::mail.tenant-invite',
        ];
    }

    public function registerMailLayouts(){
        return [
            'ap-tender-registration'    => 'ap.tender::layouts.registration',
        ];
    }

    public function registerMailPartials(){}

}
