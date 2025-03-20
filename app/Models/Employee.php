<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
     protected $fillable = [
       
        'name',
        'salary',
        'age',
        'profile_picture'
    ];
}
