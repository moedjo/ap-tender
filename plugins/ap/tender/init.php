<?php

Event::listen('company.signup', function ($company) {
   Mail::queue('ap.tender::mail.company-signup', $company->toArray(), function ($message) use ($company) {
      $message->to($company->email, $company->name);
   });
   
});


Event::listen('company.before.register', function ($company) {

   Mail::queue('ap.tender::mail.company-before-register', $company->toArray(), function ($message) use ($company) {
      $message->to($company->email, $company->name);
   });
   
});

Event::listen('company.after.register', function ($company) {

   Mail::queue('ap.tender::mail.company-after-register', $company->toArray(), function ($message) use ($company) {
      $message->to($company->email, $company->name);
   });
   
});


Event::listen('tenant.invite', function ($company) {

   Mail::queue('ap.tender::mail.tenant-invite', $company->toArray(), function ($message) use ($company) {
      $message->to($company->email, $company->name);
   });
   
});

Event::listen('tenant.short.listed', function ($company) {

   Mail::queue('ap.tender::mail.tenant-short-listed', $company->toArray(), function ($message) use ($company) {
      $message->to($company->email, $company->name);
   });
   
});



