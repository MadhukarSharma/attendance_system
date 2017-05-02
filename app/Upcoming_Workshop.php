<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Upcoming_Workshop extends Model
{
	protected $table = 'upcoming_workshops';

    protected $primaryKey = 'workshop_id';

	  protected $fillable = [
        
        'image', 'title', 'description', 'status'
    ];


    protected $hidden = [
        'password', 'remember_token',
    ];
}
