<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Geographical;

class Status extends Model
{
    //
     protected $fillable = [
     'condition', 'help_description', 'cough', 'fever', 'wet_nose', 'nearby_suspect',
      'nearby_confirmed', 'need_help','latitude', 'longitude','_token'
    ];


    public function user()
    {
        return $this->belongsTo('App\User');
    }

}
