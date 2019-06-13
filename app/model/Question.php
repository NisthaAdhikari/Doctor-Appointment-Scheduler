<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    //
    protected $table = 'question';
    protected $fillable = ['patientId', 'doctorId', 'question', 'response'];
}
