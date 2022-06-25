<?php

namespace App\Http\Controllers;

use App\Profile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Redirect;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //  
             $user = Auth::User();
             $data['profile'] = $user->profile()->first();
        
            if($data['profile'] != null)
                 return view('profile.edit', $data);
            else 
                   return view('profile.create');     
    }

     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
         return view('profile.create');
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
            'first_name'=>'required',
            'father_name'=>'required',
            'gfather_name'=>'required',
            'directorate_name'=>'required',
           
            ]);

             $profile = new Profile([
             'first_name'=>$request->get('first_name'),
            'father_name'=>$request->get('father_name'),
            'gfather_name'=>$request->get('gfather_name'),
            'directorate_name'=>$request->get('directorate_name'),
           'supervisor_name'=>$request->get('supervisor_name'),
           'dob'=>$request->get('dob'),
           'gender'=>$request->get('gender'),
           'work_location'=>$request->get('work_location'),
           'current_role'=>$request->get('current_role'),
            
            'region'=>$request->get('region'),
            'sub_city'=>$request->get('sub_city'),
            'woreda'=>$request->get('woreda'),
            'house_number'=>$request->get('house_number')
        ]);
            
            $profile->user()->associate(Auth()->User());

            //dd($profile);
           $profile->save();

        return Redirect::to('profiles')
       ->with('success','Profile created successfully.');
    }

/*

 'directorate_name_name'=>'required',
            'supervisor_name'=>'required',
            'current_role'=>'required',
            'region',
            'city',
            'sub_city'=>'required',
            'woreda'=>'required',
            'house_number'=>'required',
            'work_location'=>'required',

*/
    /**
     * Display the specified resource.
     *
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function show(profile $Profile)
    {
        //
          
    
    }


    /**
     *
     * @return \Illuminate\Http\Response
     */
    public function list()
    {
        //
            $data['profiles']  = Profile::get();
        
          return view('profile.list',$data);     
    
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function edit(profile $Profile)
    {
        //
         $where = array('id' => $id);
         $data['profile'] = Profile::where($where)->first();

        // if ($data['profile']->count() > 0 ) 
          //      return view('profile.edit', $data);
         //else 
                return view('profile.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     *@param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Profile $profile)
    {
        //
        $request->validate([
            'first_name' => 'required',
            'father_name' => 'required',
            'gfather_name' => 'required',
            'directorate_name' => 'required',
        ]);
         
        $update = ['first_name' => $request->first_name, 'father_name' => $request->father_name,
          'gfather_name' => $request->gfather_name, 'directorate_name'=>$request->directorate_name, 
             'supervisor_name'=>$request->get('supervisor_name'),
           'dob'=>$request->get('dob'),
           'gender'=>$request->get('gender'),
           'work_location'=>$request->get('work_location'),
            'current_role'=>$request->get('current_role'),

            'region'=>$request->get('region'),
            'sub_city'=>$request->get('sub_city'),
            'woreda'=>$request->get('woreda'),
            'house_number'=>$request->get('house_number')

       ];

        Profile::where('id',$profile->id)->update($update);
   
        return Redirect::to('profiles')->with('success','Great! Profile updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function destroy(profile $Profile)
    {
        //
         Profile::where('id',$id)->delete();
   
        return Redirect::to('profiles')->with('success','Profile deleted successfully');
    }
}
