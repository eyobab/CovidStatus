@extends('adminlte::page')

@section('title', 'Settings')

 
@section('content_header')
    <h1 class="m-0 text-dark">New Info Information </h1>
@stop
   

@section('content')

<div class="card">

<div class="card-body">


<div class="row">
   
    <div class="col-sm-12 text-left">
        <a href="{{ route('infos.index') }}" class="btn btn-danger sb-2">Go Back</a> 
    </div>    
</div>
<hr />
 
<form action="{{ route('infos.store') }}" method="POST" name="add_info">
    {{ csrf_field() }}

     <div class="col-md-12">
        <div class="form-group">
            <h4>Issue Type</h4>
             <select class="form-control" name="info_type" type="select" >
                  <option> Select </option>
                  <option value="Info">Information</option>
                  <option value="Warning">Warning</option>
                  <option value="Critical">Critical</option>
                  <option value="Othes">Others</option>
                  
             </select>
            <span class="text-danger">{{ $errors->first('info_type') }}</span>
        </div>impacts
     </div>

      <div class="col-md-12">
        <div class="form-group">
            <h4>Case Description</h4>
             <textarea id ="case_description" cols="50" rows="1" name="case_description" class="form-control" placeholder="Case Description"> </textarea>
            <span class="text-danger">{{ $errors->first('case_description') }}</span>
        </div>
     </div>

      <div class="col-md-12">
        <div class="form-group">
            <h4>Impacts</h4>
             <textarea id ="impacts" cols="50" rows="1" name="impacts" class="form-control" placeholder="impacts"> </textarea>
            <span class="text-danger">{{ $errors->first('impacts') }}</span>
        </div>
     </div>

      <div class="col-md-12">
        <div class="form-group">
            <h4>Suggested Actions</h4>
             <textarea id ="suggest_actions" cols="50" rows="1" name="suggest_actions" class="form-control" placeholder="suggest_actions"> </textarea>
            <span class="text-danger">{{ $errors->first('suggest_action') }}</span>
        </div>
     </div>

      <div class="col-md-12">
        <div class="form-group">
            <h4>Remarks</h4>
             <textarea id ="remarks" cols="50" rows="1" name="remarks" class="form-control" placeholder="remarks"> </textarea>
            <span class="text-danger">{{ $errors->first('remarks') }}</span>
        </div>
     </div>
    
          
   
        <div class="col-md-12">
            <button type="submit" class="btn btn-primary">Submit</button>
            <a href="{{ route('infos.index') }}" class="btn btn-danger">Cancel</a> 
        </div>
 
   

<!-- For Card -->

  </div>
</div>

</form>
@endsection