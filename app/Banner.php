<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    protected $primaryKey = 'banner_id';

	  protected $fillable = [
        
        'banner_id', 'banner_image', 'title', 'heading', 'description', 'status'
    ];


    protected $hidden = [
        'password', 'remember_token',
    ];
}
