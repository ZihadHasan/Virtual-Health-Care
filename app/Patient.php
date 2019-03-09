<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
  protected $fillable = [
    'user_id'
  ];

  public function user(){
    return $this->belongsTo('App\User');
  }

  public function doctors(){
    return $this->hasMany('App\Doctor');
  }

  public function appointments(){
    return $this->hasMany('App\Appointment');
  }
}
