<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransactionHistory extends Model
{
   
        protected $dates = ['deleted_at'];
          /**
           * The attributes that are mass assignable.
           *
           * @var array
           */
        protected $fillable = [ 'transaction_id', 'transaction_type', 'transaction_date', 'comment', 'amount', 'balance', 'active_user', 'debit_type'
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
    

