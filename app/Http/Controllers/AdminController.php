<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\User;
use App\Role;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $users = User::with('roles')->get();
        return view('admin', ['users'=>$users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function promote($userId)
    {

        $admId = Role::where('name','Admin')->firstOrFail()->id;
        $user = User::where('id', $userId)->firstOrFail();

       // dd($user);

       // $userRoles = $user->roles()->where('role_id', $admId)->firstOrFail()->count();
              
        $user->roles()->attach($admId);

       return (redirect('admin'));
    }

 public function demote($userId)
    {
        

        $admId = Role::where('name','Admin')->firstOrFail()->id;
        $user = User::where('id', $userId)->firstOrFail();

        $userRoles = $user->roles()->where('role_id', $admId)->firstOrFail()->count();
          
            
         if($userRoles>=1)
                $user->roles()->detach($admId);
       //   dd($userRoles);
       
        
       return (redirect('/admin'));
    }



}
