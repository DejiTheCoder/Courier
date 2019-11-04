<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\SoftDeletes;

class ExternalAccount extends Model
{
  protected $dates = ['deleted_at'];
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
  protected $fillable = [ 'bank_account_type', 'bank_name', 'bank_nickname', 'bank_account_number', 'bank_routing_number'
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
