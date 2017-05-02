<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Faculty_member extends Model
{
      protected $primaryKey = 'member_id';

	  protected $fillable = [
        
        'name_of_member', 'member_image', 'job_post', 'description','status'
    ];


    protected $hidden = [
        'password', 'remember_token',
    ];
}















