<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DiagnosisReport extends Model
{
    protected $fillable = [ 'patient_id','doctor_id','report' ];

    public function patient()
    {
      return $this->belongsTo('App\Patient');
    }
}
