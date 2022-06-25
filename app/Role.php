<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    //
	protected $fillable = ['name', 'description', '_token' ];


     public function roles()
        {
            return $this->belongsToMany('App\User');
        }
}
