@extends('adminlte::page')

@section('title', 'Settings')

@section('content_header')
    <h1 class="m-0 text-dark">New profile for {{ Auth::User()->name }}</h1>
@stop
   

@section('content')

  <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
 
                              <div class="row">
                                <div class="col-sm-10">
                                  <h3> Hello {{ Auth::User()->name }}, Please create your profile here</h3> 
                                </div>
                                
                              </div>
                              <hr />

                              <form action="{{ route('profiles.store') }}" method="POST" name="add_profile">
                               {{ csrf_field() }}
                                  
                                  <div class="row">
                                      <div class="col-md-6">
                                          <div class="form-group">
                                              <strong>First Name</strong>
                                              <input type="text" name="first_name" class="form-control" placeholder="First Name">
                                             <span class="text-danger">{{ $errors->first('father_name') }}</span>
                                          </div>
                                      </div>
                                      <div class="col-md-6">
                                          <div class="form-group">
                                              <strong>Father Name</strong>
                                              <input type="text" name="father_name" class="form-control" placeholder="Father Name" >
                                              <span class="text-danger">{{ $errors->first('father_name') }}</span>
                                          </div>
                                      </div>
                                      <div class="col-md-6">
                                          <div class="form-group">
                                              <strong>G. Father Name</strong>
                                               <input type="text" name="gfather_name" class="form-control" placeholder="G. Father Name" >
                                              <span class="text-danger">{{ $errors->first('gfather_name') }}</span>
                                          </div>
                                      </div>
                                        <div class="col-md-6">
                                          <div class="form-group">
                                              <strong>Directorate</strong>
                                               <input class="form-control" name="directorate_name" type="text"
                                               >
                                              <span class="text-danger">{{ $errors->first('directorate') }}</span>
                                          </div>
                                      </div>

                                      <div class="col-md-6">
                                          <div class="form-group">
                                              <strong>Gender</strong>
                                               <select class="form-control" name="gender" type="select" >
                                                    <option> Select </option>
                                                    <option value="Male">Male</option>
                                                    <option value="Female">Female</option>
                                               </select>
                                              <span class="text-danger">{{ $errors->first('gender') }}</span>
                                          </div>
                                      </div>
                                      <div class="col-md-6">
                                          <div class="form-group">
                                              <strong>Birth Date</strong>
                                               <input class="form-control" name="dob" type="date" >
                                              <span class="text-danger">{{ $errors->first('dob') }}</span>
                                          </div>
                                      </div>

                                     <div class="col-md-6">
                                          <div class="form-group">
                                              <strong>Supervisor</strong>
                                               <input class="form-control" name="supervisor_name" type="text">
                                              <span class="text-danger">{{ $errors->first('supervisor_name') }}</span>
                                          </div>
                                      </div>

                                       <div class="col-md-6">
                                          <div class="form-group">
                                              <strong>Current Work Place</strong>
                                               <input class="form-control" name="work_location" type="text" >
                                              <span class="text-danger">{{ $errors->first('work_location') }}</span>
                                          </div>
                                      </div>

                                     <div class="col-md-6">
                                          <div class="form-group">
                                              <strong>Current Role</strong>
                                               <input class="form-control" name="current_role" type="text" >
                                              <span class="text-danger">{{ $errors->first('current_role') }}</span>
                                          </div>
                                      </div>
 

                                    <div class="col-md-6">
                                          <div class="form-group">
                                              <strong>Region</strong>
                                               <select class="form-control" name="region" type="select" >
                                                <option> Select </option>
                                                    <option value="Addis Ababa">Addis Ababa</option>
                                                    <option value="Oromia">Oromia</option>
                                               </select>

                                              <span class="text-danger">{{ $errors->first('region') }}</span>
                                          </div>
                               
                                              
                                      </div>
                                      
                                      <div class="col-md-6">
                                          <div class="form-group">
                                              <strong>Sub City</strong>
                                               <input class="form-control" name="sub_city" type="text" >
                                              <span class="text-danger">{{ $errors->first('sub_city') }}</span>
                                          </div>
                                      </div>
 
                                       <div class="col-md-6">
                                          <div class="form-group">
                                              <strong>Woreda</strong>
                                               <input class="form-control" name="woreda" type="text" >
                                              <span class="text-danger">{{ $errors->first('woreda') }}</span>
                                          </div>
                                      </div>
                                      <div class="col-md-6">
                                          <div class="form-group">
                                              <strong>House Number</strong>
                                               <input class="form-control" name="house_number" type="text" >
                                              <span class="text-danger">{{ $errors->first('house_number') }}</span>
                                          </div>
                                      </div>
 
 
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-primary">Save</button>
                                        <a href="{{ route('home') }}" class="btn btn-danger">Cancel</a> 
                                    </div>
                                </div>


                                  
                              </form>

         </div>
      </div>
     </div>
  </div>
 </div>


@endsection