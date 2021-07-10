<?php namespace Ap\Tender;

use System\Classes\MailManager;
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


    protected function registerMailer()
    {
        MailManager::instance()->registerCallback(function ($manager) {
            $manager->registerMailTemplates([
                // 'backend::mail.invite',
                // 'backend::mail.restore',
            ]);
        });
    }
}
