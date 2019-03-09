<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prescription extends Model
{

  protected $fillable = [
    'patient_id','doctor_id','body'
  ];

    public function patient()
    {
      return $this->belongsTo('App\Patient');
    }

    public function doctor(){
      return $this->belongsTo('App\Doctor');
    }
}
