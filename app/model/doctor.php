<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class doctor extends Model
{
    protected $table = 'doctor';
    protected $fillable = ['name', 'address', 'email', 'mobile', 'doctorPassword','image',
        'specialization','experience','hospitalId','shortDesc', 'softDelete','status'];
}
