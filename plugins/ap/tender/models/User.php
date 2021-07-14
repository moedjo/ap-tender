<?php

namespace Ap\Tender\Models;

use Backend\Facades\BackendAuth;
use Backend\Models\UserRole;
use Model;

/**
 * Model
 */
class User extends \Backend\Models\User
{


    public $rules = [
        'email' => 'required|between:6,255|email|unique:backend_users',
        'login' => [
            'required', 'between:2,255', 'unique:backend_users',
            'regex:/^[a-zA-Z0-9]([._-](?![._-])|[a-zA-Z0-9]){3,18}[a-zA-Z0-9]$/'
        ],
        'password' => 'required:create|between:4,255|confirmed',
        'password_confirmation' => 'required_with:password|between:4,255'
    ];

    public $belongsTo = [
        'role' => UserRole::class
    ];

}
