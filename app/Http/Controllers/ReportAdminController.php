<?php

namespace App\Http\Controllers;

use App\Report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Redirect;

class ReportAdminController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
         // dd($data);
          $data['report'] = Report::orderByDesc('created_at')->paginate(10);
            // dd($data);
          return view('report.listadmin',$data);
    
    }

     
}
