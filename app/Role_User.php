<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role_User extends Model
{
    //
        protected $fillable = [ 'user_id', 'role_id','_token' ];


    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function role()
    {
        return $this->belongsTo('App\Role');
    }

}
