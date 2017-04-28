<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Feature extends Model
{
     protected $primaryKey = 'feature_id';

	  protected $fillable = [
        
         'logo', 'title','description',
    ];


    protected $hidden = [
        'password', 'remember_token',
    ];
}
