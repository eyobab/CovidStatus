@extends('adminlte::page')
 
@section('title', 'Settings')

@section('content_header')
    <h1 class="m-0 text-dark">Manage Profile</h1>
@stop

@section('content')
 
<div class="row">
  <div class="col-sm-6">
    <h4>Edit Profile</h4>
  </div>
  <div class="col-sm-6 text-right">
    <a href="{{ route('eprofiles.index') }}" class="btn btn-danger mb-2">Go Back</a> 
  </div>    
</div>
<hr />
  
<form action="{{ route('eprofile.update', $eprofile_info->id) }}" method="POST" name="update_eprofile">
  {{ csrf_field() }}
  @method('PATCH')
    
  <div class="row">
      <div class="col-md-12">
          <div class="form-group">
              <strong>Title</strong>
              <input type="text" name="title" class="form-control" placeholder="Enter Title" value="{{ $eprofile_info->title }}">
              <span class="text-danger">{{ $errors->first('title') }}</span>
          </div>
      </div>
      <div class="col-md-12">
          <div class="form-group">
              <strong>Prorofile Code</strong>
              <input type="text" name="eprofile_code" class="form-control" placeholder="Enter eprofile Code" value="{{ $eprofile_info->eprofile_code }}">
              <span class="text-danger">{{ $errors->first('eprofile_code') }}</span>
          </div>
      </div>
      <div class="col-md-12">
          <div class="form-group">
              <strong>Description</strong>
              <textarea class="form-control" col="4" name="description" placeholder="Enter Description" >{{ $eprofile_info->description }}</textarea>
              <span class="text-danger">{{ $errors->first('description') }}</span>
          </div>
      </div>
      <div class="col-md-12">
          <button type="submit" class="btn btn-primary">Submit</button>
          <a href="{{ route('eprofiles.index') }}" class="btn btn-danger">Cancel</a> 
      </div>
  </div>
    
</form>
@endsection