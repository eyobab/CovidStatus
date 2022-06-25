@extends('adminlte::page')
   
@section('content')
                   <div class="row">
                    <div class="col-sm-6">
                      <h4>{{ Auth::User()->name}}'s Status List</h4>
                    </div>
                    <div class="col-sm-6 text-right">
                      <a href="{{ route('statuses.create') }}" class="btn btn-success mb-2">Add</a> 
                    </div>
                  </div>
                
              
                   
                   <div class="row">
                        <div class="col-12">          
                          <table class="table table-bordered table table-striped table-gray table-sm" id="status_list" >
                           <thead >
                              <tr>
                                 <th>Condition</th>
                                 <th>Cough</th>
                                 <th>Fever</th>
                                 <th>Wet Nose</th>
                                 <th>Confirmed</th>
                                 <th>Suspect</th>
                                 <th>Entry Date</th>

                                 <th colspan="2" class="text-center">Action</th>
                              </tr>
                           </thead>
                           <tbody>
                              @foreach($status as $stat)
                              <tr>
                                 <td>{{ $stat->condition }}</td>
                                 <td>{{ $stat->cough  == 1 ? 'Y':'N'}}</td>
                                 <td>{{ $stat->fever  == 1 ? 'Y':'N'}}</td>
                                 <td>{{ $stat->wet_nose  == 1 ? 'Y':'N'}}</td>
                                 <td>{{ $stat->nearby_confirmed  == 1 ? 'Y':'N' }}</td>
                                 <td>{{ $stat->nearby_suspect  == 1 ? 'Y':'N'}}</td>
                            
                                 <td>{{ date('Y-m-d', strtotime($stat->created_at)) }}</td>
                                 <td class="text-center">
                                  <a href="{{ route('statuses.edit',$stat->id)}}" class="btn btn-primary btn-sm">View/Edit</a></td>
                                 <td class="text-center">
                                 <form action="{{ route('statuses.destroy', $stat->id)}}" method="post">
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
                        {{ $status->links() }}
                   </div>
 @endsection  