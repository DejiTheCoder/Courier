<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BillpayAccounts extends Model
{
    protected $dates = ['deleted_at'];
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
  protected $fillable = [ 'pay_account_name', 'pay_nickname', 'pay_account_address', 'pay_city_state_zip', 'pay_account_number', 'active_user'
];

/**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    // public function billpay()
    // {
    //     return $this->belongsTo(Billpay::class);
    // }

    public function user()
    {
        return $this->belongsTo(User::class);
    }


}
