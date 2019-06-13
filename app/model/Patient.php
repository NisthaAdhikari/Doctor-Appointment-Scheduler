<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    //
    protected $table = 'patient';
    protected $fillable = ['name', 'address', 'email', 'mobile', 'gender', 'patientPassword','image','softDelete','status'];
}
