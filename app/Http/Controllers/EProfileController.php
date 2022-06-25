<?php

namespace App\Http\Controllers;

use App\EProfile;
use Illuminate\Http\Request;

class EProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
         return view('eprofiles.create');
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
            'dob'=>'required',
           
            ]);

            // EProfile::create($request->all());

            $eprofile = new EProfile([
             'first_name'=>$request->get('first_name'),
            'father_name'=>$request->get('father_name'),
            'gfather_name'=>$request->get('gfather_name'),
            'dob'=>$request->get('dob'),
            'supervisor_name'=>$request->get('supervisor_name'),
            'current_role'=>$request->get('supervisor_name'),
        ]);
           $eprofile->save();

        return Redirect::to('eprofiles')
       ->with('success','Profile created successfully.');
    }

/*

 'directorate_name'=>'required',
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
     * @param  \App\eProfile  $eProfile
     * @return \Illuminate\Http\Response
     */
    public function show(eProfile $eProfile)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\eProfile  $eProfile
     * @return \Illuminate\Http\Response
     */
    public function edit(eProfile $eProfile)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\eProfile  $eProfile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, eProfile $eProfile)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\eProfile  $eProfile
     * @return \Illuminate\Http\Response
     */
    public function destroy(eProfile $eProfile)
    {
        //
    }
}
