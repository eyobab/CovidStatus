@extends('adminlte::page')

@section('content')
 <div class="row">
  <div class="col-sm-6">
    <h4> Employee List </h4>
  </div>
</div>
 
 <div class="row">
      <div class="col-12">          
        <table class="table table-bordered" id="laravel_crud">
         <thead>
            <tr>
               <th>Id</th>
               <th>First Name</th>
               <th>Father's Name</th>
               <th>Grand F. Name</th>
               <th>Directorate</th>
               <th>Registerd Date</th>
                <th> </th>
            
            
            </tr>
         </thead>
         <tbody>
            @foreach($profiles as $profile)
            <tr>
               <td>{{ $profile->id }}</td>
               <td>{{ $profile->first_name }}</td>
               <td>{{ $profile->father_name }}</td>
               <td>{{ $profile->gfather_name }}</td>
               <td>{{ $profile->directorate_name }}</td>
               <td>{{ date('Y-m-d', strtotime($profile->created_at)) }}</td>
               <td class="text-center">
                <a href="{{ route('profiles.edit', $profile->id,['language'=> 'am'])}}" class="btn btn-primary">Details</a></td>
               <td class="text-center">
              </td>
            </tr>
            @endforeach
 
            @if(count($profiles) < 1)
              <tr>
               <td colspan="10" class="text-center">There are no employees available yet!</td>
              </td>
            </tr>
            @endif
         </tbody>
        </table>
         
     </div> 
 </div>
 @endsection  




