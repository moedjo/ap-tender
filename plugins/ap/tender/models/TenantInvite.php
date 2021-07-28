<?php

namespace Ap\Tender\Models;

use Model;

/**
 * Model
 */
class TenantInvite extends Company
{

    public $rules = [
       'invite_name' => 'required',
       'invite_description' => 'required',
       'invite_location' => 'required',
       'invite_pic_phone_number' => 'required',
       'invite_date' => 'required',
       'invite_hour_start' => 'required',
       'invite_hour_end' => 'required',
    ];


}
