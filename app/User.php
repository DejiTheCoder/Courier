<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'middle_name', 'home_address', 'postal_address', 'country', 'gender', 'email', 
        'mobile_number', 'occupation', 'account_type', 'residency', 'next_of_kin', 'ssn', 'welcome_message', 'amount', 'account_number', 'user_serial_number',
        'last_login_at', 'last_login_ip',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'vnv' 
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function externalAccounts()
{
    return $this->hasMany(ExternalAccount::class);
}

    public function billpayAccounts()
    {
    return $this->hasMany(BillpayAccounts::class);
    }

    public function achPayments()
    {
    return $this->hasMany(AchPayment::class);
    }

    public function transactionHistory()
    {
    return $this->hasMany(TransactionHistory::class);
    }

}
