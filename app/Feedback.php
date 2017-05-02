<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
 protected $primaryKey = "feedback_id";

 protected $table = 'feedbacks'; 

 protected $fillable = [

 		'title', 'description', 'status', 'name', 'job_post'
 ];

 protected $hidden =[

 		'password', 'remember_token'

 ];
}
