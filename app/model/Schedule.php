<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    //
    protected $table = 'schedule';
    protected $fillable = ['startTime', 'endTime', 'softDelete','status'];
}
