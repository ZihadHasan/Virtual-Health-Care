<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use \Cache;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'avatar', 'name', 'email', 'phone', 'password', 'doctor_id', 'patient_id', 'description','isDoctor', 'isAdmin', 'isPatient', 'isAccountant'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function doctor(){
      return $this->hasOne('App\Doctor');
    }

    public function patient(){
      return $this->hasOne('App\Patient');
    }

    public function accountant(){
      return $this->hasOne('App\Accountant');
    }

    public function checkouts()
    {
      return $this->hasMany('App\Checkout');
    }


    public function has($Model){
        if (count($this->$Model) > 0) return true;
        return false;
    }

    public function messages()
    {
      return $this->hasMany(Message::class);
    }
}
