<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $fillable = ['name'];

    public function doctors(){
      return $this->hasMany('App\Doctor');
    }
}
