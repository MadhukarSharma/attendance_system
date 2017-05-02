<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
 protected $primaryKey = "course_id";

 protected $fillable = [

 		'course_id', 'title', 'description', 'status', 'course_name', 'course_description', 'image'
 ];

 protected $hidden =[

 		'password', 'remember_token'

 ];
}
