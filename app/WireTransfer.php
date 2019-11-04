<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WireTransfer extends Model
{
    protected $dates = ['deleted_at'];
      /**
       * The attributes that are mass assignable.
       *
       * @var array
       */
    protected $fillable = [ 'beneficiary_country', 'beneficiary_bank', 'beneficiary_bank_address', 'beneficiary_account_number', 'beneficiary_routing_number', 'beneficiary_sort_code', 'beneficiary_swift_code', 'beneficiary_name', 
    'beneficiary_address', 'pay_amount', 'active_user'
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
     /**
       * Determine if the user is authorized to make this request.
       *
       * @return bool
       */
  
  
  }
  
