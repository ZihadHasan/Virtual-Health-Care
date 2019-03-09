<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    protected $fillable = [
      'patient_id','doctor_id','sendDoctor','confirmedDoctor','confirmedAdmin','isConfirmed','isRejected','date','time'
    ];

    protected $dates = [
        'created_at',
        'updated_at',
    ];


    public function doctor()
    {
      return $this->belongsTo('App\Doctor');
    }

    public function patient()
    {
      return $this->belongsTo('App\Patient');
    }

    public function checkout()
    {
      return $this->hasOne('App\Checkout');
    }
}
