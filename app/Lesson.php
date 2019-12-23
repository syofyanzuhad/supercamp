<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    protected $fillable = [
        'subject','class_date', 'class_wave', 'class_month', 'class_year', 'class_duration', 'quota', 'status_lesson'
    ];

}
