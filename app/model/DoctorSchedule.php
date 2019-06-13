<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class DoctorSchedule extends Model
{
    protected $table = 'doctor_schedule';
    protected $fillable = ['doctorId', 'scheduleId', 'date','day','isAvailable','softDelete','status'];
}
