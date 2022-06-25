<?php

namespace App\Http\Controllers;

use App\Status;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Redirect;

class StatusAdminController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
         // dd($data);
          $data['status'] = Status::orderByDesc('created_at')->paginate(10);
            // dd($data);
          return view('status.listadmin',$data);
    
    }

     
}
