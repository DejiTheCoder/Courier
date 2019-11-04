<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AchPayment extends Model
{
    protected $dates = ['deleted_at'];
      /**
       * The attributes that are mass assignable.
       *
       * @var array
       */
    protected $fillable = [ 'transaction_id', 'sender_account', 'receiver_account', 'transfer_type', 'amount', 'schedule_date_transaction', 'receiver_account', 'isVerified'
  ];
     /**
       * Determine if the user is authorized to make this request.
       *
       * @return bool
       */
      public function user()
  {
      return $this->belongsTo(User::class);
  }

  // public function achAccount()
  // {
  //     return $this->belongsTo(ExternalAccount::class);
  // }
     /**
       * Determine if the user is authorized to make this request.
       *
       * @return bool
       */
  
  
  }
