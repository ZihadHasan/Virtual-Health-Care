<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    protected $fillable = [
      'user_id','title','department_id'
    ];

    public function department(){
      return $this->belongsTo('App\Department');
    }

    public function user(){
      return $this->belongsTo('App\User');
    }

    public function patients(){
      return $this->hasMany('App\Patient');
    }

    public function appointments(){
      return $this->hasMany('App\Appointment');
    }
}
