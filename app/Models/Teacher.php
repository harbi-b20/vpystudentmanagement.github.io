<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    protected $table = 'teachers';

    protected $fillable = [
        'first_name',
        'middle_initial',
        'last_name',
        'age',
        'address',
        'subject',
        'status'
    ];
        public $timestamps = false;
}