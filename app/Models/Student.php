<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $table = 'students';
    
    protected $fillable = [
        'first_name',
        'middle_initial',
        'last_name',
        'age',
        'address',
        'lrn',
        'math_1st',
        'math_2nd',
        'general_average',
        'status'
    ];
    public $timestamps = false;
}