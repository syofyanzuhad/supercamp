<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Participant extends Model
{
    protected $fillable = ['id_number', 'name', 'image', 'phone', 'email', 'city', 'address', 'birth_place', 'birth_date', 'class', 'student_date', 'student_month', 'student_year', 't_shirt', 'status_user']
    ;
    protected $primaryKey = 'id_participant';

}
