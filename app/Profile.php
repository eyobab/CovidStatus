<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    //
      protected $fillable = [
     'first_name',
     'father_name',
     'gfather_name',
     'directorate_name',
     'gender',
     'dob',
     'supervisor_name',
     'work_location',
     'current_role',
     'region',
     'sub_city',
     'woreda',
     'house_number',

     '_token'
    ];

     public function user()
    {
        return $this->belongsTo('App\User');
    }


}


