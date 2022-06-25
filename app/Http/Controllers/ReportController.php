<?php

namespace App\Http\Controllers;

use App\Report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

use Redirect;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
   //      $data['reports'] = Product::orderBy('id','desc')->paginate(10);
          $user = Auth::User();
          $data['report'] = $user->reports()->orderBy('created_at','desc')->paginate(10);
          
        //  dd($data);

  
   
          return view('report.list',$data);
      
      /*  
             $user = Auth::User();
             $data['report'] = $user->report()->first();
      //    $data['reports'] = Report::orderBy('id','desc')->paginate(10);
        //dd($data);
             //dd($user);
             // dd($data);
            return view('report.edit', $data);
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
         return view('report.create');
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
            'report_type'=>'required'
            ]);
           

            $report = new Report([
                'report_type'=>$request->get('report_type'),
                'key_points'=>$request->get('key_points'),
                'report_description'=>$request->get('report_description'),
               'conclusion'=>$request->get('conclusion'), 
        ]);
    


        // if validation success
            if($file   =   $request->file('attachment')) {

            $name      =  'Att-' . time().time().'.'.$file->getClientOriginalExtension();
            
            $target_path    =   public_path('uploads\\');

      
            
            if($file->move($target_path, $name)) {
               
              
                $report->attachment = $target_path . $name;

               // dd($report->attachment);
    
            }
        }
            
     
          // dd($report->attachment);
    
            $report->user()->associate(Auth()->User());

           // dd($report->nearby_confirmed, $report->nearby_suspect, $request->get('nearby_confirmed'));

           $report->save();

        return Redirect::to('reports')
       ->with('success','Report created successfully.');
    }

 
    /**
     * Display the specified resource.
     *
     * @param  \App\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function show(Report $report)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function edit(Report $report)
    {
        //
       // dd($report);
         $where = array('id' => $report->id);
         $data['report'] = Report::where($where)->first();

        // if ($data['report']->count() > 0 ) 
          //      return view('report.edit', $data);
         //else 
                return view('report.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     *@param  \App\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Report $report)
    {
        //
        $request->validate([
            'report_type' => 'required',
        ]);


          $newFile=null;
        // Get the attached file
          if($file   =   $request->file('attachment')) {

            $name      =  'Att-' . time().time().'.'.$file->getClientOriginalExtension();
            
            $target_path    =   public_path('uploads\\');
            
            if($file->move($target_path, $name)) {
               
             $newFile = $target_path . $name;

               //dd($newFile);
    
            }
        }
         
        $update = ['report_type' => $request->report_type, 'key_points' => $request->get('key_points'),
          'report_description' => $request->get('report_description'), 'conclusion'=>$request->get('conclusion'),
          'attachment'=>$newFile

                       ];

           //, 'latitude'=>$request->get('latitude'),'longitude'=>$request->get('lonigtude')


        
        Report::where('id',$report->id)->update($update);
   
        return Redirect::to('reports')->with('success','Great! Report updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function destroy(report $report)
    {
        //
         Report::where('id',$report->id)->delete();
   
        return Redirect::to('reports')->with('success','Report deleted successfully');
    }
}
