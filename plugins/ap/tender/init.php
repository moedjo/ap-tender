<?php

Event::listen('company.register', function ($company) {
   trace_log('send to mail -> ap.tender::mail.company-register');

   Mail::queue('ap.tender::mail.company-register', $company->toArray(), function ($message) use ($company) {
      $message->to($company->email, $company->name);
   });
   
});


Event::listen('company.before.signup', function ($company) {
   trace_log('send to mail -> ap.tender:company.before.signup');

   Mail::queue('ap.tender::company.before.signup', $company->toArray(), function ($message) use ($company) {
      $message->to($company->email, $company->name);
   });
   
});



