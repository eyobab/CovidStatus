<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Info extends Model
{
    //
        protected $fillable = [
     'info_type',
     'case_description',
     'impacts',
     'suggest_actions',
     'remarks',
      '_token'
    ];

     public function user()
    {
        return $this->belongsTo('App\User');
    }
}
