@extends('adminlte::page')
   
@section('content')
                   <div class="row">
                    <div class="col-sm-6">
                      <h4>{{ Auth::User()->name}}'s Infos </h4>
                    </div>
                    <div class="col-sm-6 text-right">
                      <a href="{{ route('infos.create') }}" class="btn btn-success mb-2">Add</a> 
                    </div>
                  </div>
 
                   <div class="row">
                        <div class="col-12">          
                          <table class="table table-bordered table table-striped table-gray table-sm" id="info_list" >
                           <thead >
                              <tr>
                                 <th>Issue Type</th>
                                 <th>Case Descripition</th>
                                
                                 <th>Entry Date</th>

                                 <th colspan="2" class="text-center">Action</th>
                              </tr>
                           </thead>
                           <tbody>
                              @foreach($info as $inf)
                              <tr>
                                 <td>{{ $inf->info_type }}</td>
                                 <td>{{ $inf->case_description }}</td>
                               
                                 <td>{{ date('Y-m-d', strtotime($inf->created_at)) }}</td>
                                 <td class="text-center">
                                  <a href="{{ route('infos.edit',$inf->id)}}" class="btn btn-primary btn-sm">View/Edit</a></td>
                                 <td class="text-center">
                                 <form action="{{ route('infos.destroy', $inf->id)}}" method="post">
                                  {{ csrf_field() }}
                                  @method('DELETE')
                                  <button class="btn btn-danger btn-sm" type="submit">Delete</button>
                                </form>
                                </td>
                              </tr>
                              @endforeach
                           </tbody>
                          </table>
                       </div> 
                        {{ $info->links() }}
                   </div>
 @endsection  