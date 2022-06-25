<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PassController extends Controller
{
   function index(int $val)
   {
        // echo 'alert(Displaying the window!!?)';
        
        if ($val==1)
         return view('admin.settings'); 
        else
          return view('home'); 
   }
}
