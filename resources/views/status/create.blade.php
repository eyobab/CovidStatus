@extends('adminlte::page')

@section('title', 'Settings')

 
@section('content_header')
    <h1 class="m-0 text-dark">New Status Information </h1>
@stop
   

@section('content')

<div class="card">

<div class="card-body">


<div class="row">
   
    <div class="col-sm-12 text-left">
        <a href="{{ route('statuses.index') }}" class="btn btn-danger sb-2">Go Back</a> 
    </div>    
</div>
<hr />
 
<form action="{{ route('statuses.store') }}" method="POST" name="add_status">
    {{ csrf_field() }}

 <div class="col-md-12">
        <div class="form-group">
            <h4>General Condition</h4>
             <textarea id ="condition" cols="50" rows="1" name="condition" class="form-control" placeholder="Your Condition"> </textarea>
            <span class="text-danger">{{ $errors->first('condition') }}</span>
        </div>
     </div>
    
     <div class="row">
      <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 m-auto">
   
      <div >
        
         <h4> Symptoms </h4>  
            <div class="col-md-4">
              <div class="custom-control custom-checkbox" padding="10" >
                 <input type="checkbox" name="cough" class="custom-control-input" id="cough" >
                  <label class="custom-control-label" for="cough">Cough</label>
                 <span class="text-danger">{{ $errors->first('cough') }}</span>
              </div>
            </div>
    

           <div class="col-md-4">
             <div class="custom-control custom-checkbox" padding="10">
                 <input type="checkbox" name="fever" class="custom-control-input"  id="fever">
                  <label class="custom-control-label" for="fever">Fever</label>
                    <span class="text-danger">{{ $errors->first('fever') }}</span>
              </div>          
            </div>
   
         
           <div class="col-md-4">
             <div class="custom-control custom-checkbox" padding="10">
                 <input type="checkbox" name="wet_nose" class="custom-control-input"  id="wet_nose">
                  <label class="custom-control-label" for="wet_nose">Wet Nose</label>
                    <span class="text-danger">{{ $errors->first('wet_nose') }}</span>
              </div>          
            </div>

         </div>
     </div>


     <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 m-auto">
            <p>  </p>
         <h4 style="{padding:50;}"> Environment Conditions </h4>  
              
           <div class="col-md-4">
              <div class="custom-control custom-checkbox" padding="10">
                 <input type="checkbox" name="nearby_confirmed" class="custom-control-input" id="nearby_confirmed" >
                  <label class="custom-control-label" for="nearby_confirmed">Near By Confirmed Case</label>
                 <span class="text-danger">{{ $errors->first('nearby_confirmed') }}</span>
              </div>
            </div>

            

          <div class="col-md-4">
              <div class="custom-control custom-checkbox" padding="10">
                 <input type="checkbox" name="nearby_suspect" class="custom-control-input"  id="nearby_suspect">
                  <label class="custom-control-label" for="nearby_suspect">Near By a Suspect</label>
                 <span class="text-danger">{{ $errors->first('nearby_suspect') }}</span>
              </div>
            </div>

             <div class="col-md-4">
             <div class="custom-control custom-checkbox" padding="10">
                 <input type="checkbox" name="need_help" class="custom-control-input" id="need_help" id="need_help">
                  <label class="custom-control-label" for="need_help">Need Help</label>
                    <span class="text-danger">{{ $errors->first('wet_nose') }}</span>
              </div>          
            </div>
          

          </div> <!--row -->

         <div class="col-md-12">
            <div class="form-group">
                <h5>Help Request Detail</h5>
                 <textarea name="help_description" class="form-control" id="help_description"  cols="50" rows="1" placeholder="Your help request" >  </textarea>
                <span class="text-danger">{{ $errors->first('help') }}</span>
            </div>
     
          </div>
         </div>
     
   
        <div class="col-md-12">
            <button type="submit" class="btn btn-primary">Submit</button>
            <a href="{{ route('statuses.index') }}" class="btn btn-danger">Cancel</a> 
        </div>
 
   

<!-- For Card -->

  </div>
</div>

</form>
@endsection