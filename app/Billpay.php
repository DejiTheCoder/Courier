<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Billpay extends Model
{
    protected $dates = ['deleted_at'];
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
  protected $fillable = [ 'pay_source_account', 'pay_destination_account', 'pay_amount', 'pay_date_transaction'
];

public function user()
{
    return $this->belongsTo(User::class);
}

}
