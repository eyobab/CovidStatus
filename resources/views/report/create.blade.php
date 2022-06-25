@extends('adminlte::page')

@section('title', 'Settings')

 
@section('content_header')
    <h1 class="m-0 text-dark">New Report Information </h1>
@stop
   

@section('content')

<div class="card">

<div class="card-body">


<div class="row">
   
    <div class="col-sm-12 text-left">
        <a href="{{ route('reports.index') }}" class="btn btn-danger sb-2">Go Back</a> 
    </div>    
</div>
<hr />
 
<form action="{{ route('reports.store') }}" method="POST" name="add_report" enctype="multipart/form-data">
    {{ csrf_field() }}

     <div class="col-md-12">
        <div class="form-group">
            <h4>Report Type</h4>
             <select class="form-control" name="report_type" type="select" >
                  <option> Select </option>
                  <option value="Covid">Covid Cases</option>
                  <option value="Volunteer">Volunteer</option>
                  <option value="Field Work">Field Work</option>
                  <option value="Field Work">Multiple</option>
                  <option value="Othes">Others</option>
                  
             </select>
            <span class="text-danger">{{ $errors->first('report_type') }}</span>
        </div>
     </div>

      <div class="col-md-12">
        <div class="form-group">
            <h4>Key Points</h4>
             <textarea id ="key_points" cols="50" rows="1" name="key_points" class="form-control" placeholder="Key Points"> </textarea>
            <span class="text-danger">{{ $errors->first('key_points') }}</span>
        </div>
     </div>

      <div class="col-md-12">
        <div class="form-group">
            <h4>Report Description</h4>
             <textarea id ="report_description" cols="50" rows="1" name="report_description" class="form-control" placeholder="report_description"> </textarea>
            <span class="text-danger">{{ $errors->first('report_description') }}</span>
        </div>
     </div>

      <div class="col-md-12">
        <div class="form-group">
            <h4>Conslustion / Recommendation</h4>
             <textarea id ="conclusion" cols="50" rows="1" name="conclusion" class="form-control" placeholder="conclusion"> </textarea>
            <span class="text-danger">{{ $errors->first('conclusion') }}</span>
        </div>
     </div>
    

         <div class="form-group" {{ $errors->has('attachment') ? 'has-error' : '' }}>
                                <label for="attachment">Attachment</label>
                                    <input type="file" name="attachment" id="attachment" class="form-control">
                                    <span class="text-danger"> {{ $errors->first('attachment') }}</span>
                            </div>
          

        <div class="col-md-12">
            <button type="submit" class="btn btn-primary">Submit</button>
            <a href="{{ route('reports.index') }}" class="btn btn-danger">Cancel</a> 
        </div>
 
   

<!-- For Card -->

  </div>
</div>

</form>
@endsection