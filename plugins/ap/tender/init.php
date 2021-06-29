<?php

Event::listen('company.register', function($company) {
   trace_log('send to mail');
});