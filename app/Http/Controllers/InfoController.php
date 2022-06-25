<?php

namespace App\Http\Controllers;

use App\Info;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Redirect;

class InfoController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
   //      $data['infos'] = Product::orderBy('id','desc')->paginate(10);
          $user = Auth::User();
          $data['info'] = $user->infos()->orderBy('created_at','desc')->paginate(10);
          
        //  dd($data);

  
   
          return view('info.list',$data);
      
      /*  
             $user = Auth::User();
             $data['info'] = $user->info()->first();
      //    $data['infos'] = Info::orderBy('id','desc')->paginate(10);
        //dd($data);
             //dd($user);
             // dd($data);
            return view('info.edit', $data);
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
         return view('info.create');
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
            'info_type'=>'required'
            ]);
           

            $info = new Info([
                'info_type'=>$request->get('info_type'),
                'case_description'=>$request->get('case_description'),
                'impacts'=>$request->get('impacts'),
               'suggest_actions'=>$request->get('suggest_actions'), 'remarks'=>$request->get('remarks')
        ]);
           
            $info->user()->associate(Auth()->User());

           // dd($info->nearby_confirmed, $info->nearby_suspect, $request->get('nearby_confirmed'));

           $info->save();

        return Redirect::to('infos')
       ->with('success','Info created successfully.');
    }

 
    /**
     * Display the specified resource.
     *
     * @param  \App\Info  $info
     * @return \Illuminate\Http\Response
     */
    public function show(Info $info)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Info  $info
     * @return \Illuminate\Http\Response
     */
    public function edit(Info $info)
    {
        //
       // dd($info);
         $where = array('id' => $info->id);
         $data['info'] = Info::where($where)->first();

        // if ($data['info']->count() > 0 ) 
          //      return view('info.edit', $data);
         //else 
                return view('info.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     *@param  \App\Info  $info
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Info $info)
    {
        //
        $request->validate([
            'info_type' => 'required',
        ]);
         
        $update = ['info_type' => $request->info_type, 'case_description' => $request->get('key_points'),
          'impacts' => $request->get('impacts'), 'suggest_actions'=>$request->get('suggest_actions'), 'remarks'=>$request->get('remarks')

           ];

           //, 'latitude'=>$request->get('latitude'),'longitude'=>$request->get('lonigtude')
        
        Info::where('id',$info->id)->update($update);
   
        return Redirect::to('infos')->with('success','Great! Info updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Info  $info
     * @return \Illuminate\Http\Response
     */
    public function destroy(info $info)
    {
        //
         Info::where('id',$info->id)->delete();
   
        return Redirect::to('infos')->with('success','Info deleted successfully');
    }
}
