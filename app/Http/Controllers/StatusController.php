<?php

namespace App\Http\Controllers;

use App\Status;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Redirect;

class StatusController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
   //      $data['statuses'] = Product::orderBy('id','desc')->paginate(10);
          $user = Auth::User();
          $data['status'] = $user->statuses()->orderBy('created_at','desc')->paginate(10);
          
        //  dd($data);

  
   
          return view('status.list',$data);
      
      /*  
             $user = Auth::User();
             $data['status'] = $user->status()->first();
      //    $data['statuss'] = Status::orderBy('id','desc')->paginate(10);
        //dd($data);
             //dd($user);
             // dd($data);
            return view('status.edit', $data);
      */
            
    }

     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
         return view('status.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        //
        $request->validate([
            'condition'=>'required'
            ]);
           

         //Get the Ip address of the request
           // When live
        /*
              if (isset($_SERVER['HTTP_CLIENT_IP']))
              {
                  $real_ip_adress = $_SERVER['HTTP_CLIENT_IP'];
              }

              if (isset($_SERVER['HTTP_X_FORWARDED_FOR']))
              {
                  $real_ip_adress = $_SERVER['HTTP_X_FORWARDED_FOR'];
              }
              else
              {
                  $real_ip_adress = $_SERVER['REMOTE_ADDR'];
              }

              $ip = $real_ip_adress;
            */


           //  $ip = '197.156.118.140';
              // $ip = '197.156.107.97';
              // $ip = '196.191.153.207';
              
               $ip = '196.188.115.240';
              //$ip = '196.191.53.240';

            $ldata = \Location::get($ip);
            
            //dd($request);
           // dd($request->has('nearby_confirmed'));
            $status = new Status([
                'condition'=>$request->get('condition'),
                'cough'=>$request->has('cough'),
                'fever'=>$request->has('fever'),
               'wet_nose'=>$request->has('wet_nose'), 
               'nearby_confirmed'=>$request->has('nearby_confirmed'),
               'nearby_suspect'=>$request->has('nearby_suspect'),
                'need_help'=>$request->has('need_help'),
                'help_description'=>$request->get('help_description'),
                'latitude'=>$ldata->latitude,
                'longitude'=>$ldata->longitude

        ]);
           
            $status->user()->associate(Auth()->User());

           // dd($status->nearby_confirmed, $status->nearby_suspect, $request->has('nearby_confirmed'));

           $status->save();

        return Redirect::to('statuses')
       ->with('success','Status created successfully.');
    }

 
    /**
     * Display the specified resource.
     *
     * @param  \App\Status  $status
     * @return \Illuminate\Http\Response
     */
    public function show(Status $status)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Status  $status
     * @return \Illuminate\Http\Response
     */
    public function edit(Status $status)
    {
        //
       // dd($status);
         $where = array('id' => $status->id);
         $data['status'] = Status::where($where)->first();

        // if ($data['status']->count() > 0 ) 
          //      return view('status.edit', $data);
         //else 
                return view('status.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     *@param  \App\Status  $status
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Status $status)
    {
        //
        $request->validate([
            'condition' => 'required',
        ]);
         
        $update = ['condition' => $request->condition, 'cough' => $request->has('cough'),
          'fever' => $request->has('fever'), 'wet_nose'=>$request->has('wet_nose'), 'nearby_confirmed'=>$request->has('nearby_confirmed'), 'nearby_suspect'=>$request->has('nearby_suspect'), 'need_help'=>$request->has('need_help'),
           'help_description'=>$request->help_description ];

           //, 'latitude'=>$request->get('latitude'),'longitude'=>$request->get('lonigtude')
        
        Status::where('id',$status->id)->update($update);
   
        return Redirect::to('statuses')->with('success','Great! Status updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Status  $status
     * @return \Illuminate\Http\Response
     */
    public function destroy(status $status)
    {
        //
         Status::where('id',$status->id)->delete();
   
        return Redirect::to('statuses')->with('success','Status deleted successfully');
    }
}
