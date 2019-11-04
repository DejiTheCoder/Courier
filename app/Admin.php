<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use Notifiable;

    protected $guard = 'admin';

    protected $fillable = [
        'name', 'email', 'password', 'bank_name', 'bank_email', 'bank_address_1', 'bank_address_2', 'bank_address_3', 'bank_phone',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
}