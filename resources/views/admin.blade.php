@extends('adminlte::page')

@section('content_header')
    <h1 class="m-0 text-dark">Dashboard</h1>
@stop

@section('content')
 <div class="row">
      <div class="col-12">          
        <table class="table table-bordered" id="laravel_crud">
         <thead>
            <tr>
               <th>User Name</th>
               <th>Current Roles</th>
               <th colspan="2" class="text-center">Action</th>
            </tr>
         </thead>
         <tbody>
            @foreach($users as $user)
            <tr>
               <td> {{ $user->name }}</td>
               <td>
                   @foreach ($user->roles as $role)
                                 <small> {{ $role->name}} </small>
                   @endforeach
               </td>
             
               <td class="text-center">
                <a href="/admin/promote/{{$user->id}}" class="btn btn-primary btn-sm">Promote</a></td>
               <td class="text-center">
                  <td class="text-center">
                <a href="/admin/demote/{{$user->id}}" class="btn btn-primary btn-sm">Demote</a></td>
               <td class="text-center">
              </td>
            </tr>
            @endforeach
 
            @if(count($users) < 1)
              <tr>
               <td colspan="10" class="text-center">There are no user available yet!</td>
            </tr>
            @endif
         </tbody>
        </table>
    
     </div> 
 </div>
 
@stop
