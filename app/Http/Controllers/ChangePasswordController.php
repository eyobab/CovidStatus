<?php

   

namespace App\Http\Controllers;

   

use Illuminate\Http\Request;

use App\Rules\MatchOldPassword;

use Illuminate\Support\Facades\Hash;

use App\User;
use Redirect;

  

class ChangePasswordController extends Controller

{

    /**

     * Create a new controller instance.

     *

     * @return void

     */

    public function __construct()

    {

        $this->middleware('auth');

    }

   

    /**

     * Show the application dashboard.

     *

     * @return \Illuminate\Contracts\Support\Renderable

     */

    public function index()

    {
      
        $message = "  ";
        return view('users.password.changepassword', ['message' =>$message]);

    } 

   

    /**

     * Show the application dashboard.

     *

     * @return \Illuminate\Contracts\Support\Renderable

     */

    public function store(Request $request)

    {

        $request->validate([

            'current_password' => ['required', new MatchOldPassword],

            'new_password' => ['required'],

            'new_confirm_password' => ['same:new_password'],

        ]);

   

        $rt = User::find(auth()->user()->id)->update(['password'=> Hash::make($request->new_password)]);
        
         $message = "Password Successfully Changed!";

         $request->session()->flush('success', $message);
         return view('users.password.changepassword', ['message' =>$message]);

        
      //  return (redirect('/changePassword')->with('message'=>'Password Sucessfully Changed');
       // return Redirect::to('change-password')->with('message','Password Sucessfully Changed');
        //return (redirect('users.password.changepassword', ['message' => $message]));

    }

}