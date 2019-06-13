<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    //
    protected $table = 'report';
    protected $fillable = ['title', 'description', 'reportImage', 'uploadedOn','patientId','doctorId'];
}
