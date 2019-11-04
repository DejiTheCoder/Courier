<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    protected $dates = ['deleted_at'];
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
  protected $fillable = [ 'department', 'subject', 'client_name', 'client_email', 'client_complaints', 'active_user'
];

public function user()
{
    return $this->belongsTo(User::class);
}

}