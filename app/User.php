<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
 
     public function profile()
        {
            return $this->hasOne('App\Profile');
        }
     public function statuses()
        {
            return $this->hasMany('App\Status');
        }

    public function reports()
        {
            return $this->hasMany('App\Report');
        }
    public function infos()
        {
            return $this->hasMany('App\Info');
        }


    public function roles()
        {
            return $this->belongsToMany('App\Role');
        }

        public function hasRole($role) {

            $roles = $this->roles()->where('name',$role)->count();
            if ($roles ==1)
                return true;
            return false;
        }
  }
