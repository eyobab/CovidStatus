<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    //
    //
      protected $fillable = [
     'report_type',
     'key_points',
     'report_description',
     'conclusion',
      '_token'
    ];

     public function user()
    {
        return $this->belongsTo('App\User');
    }
}
