@extends('adminlte::page')
   
@section('content')
                   <div class="row">
                    <div class="col-sm-6">
                      <h4>Status List of all employees</h4>
                    </div>
                  
                  </div>
                
                   
                   <div class="row">
                        <div class="col-12">          
                          <table class="table table-bordered table table-striped table-gray table-sm" id="status_list" >
                           <thead >
                              <tr>
                                 <th>Name</th>
                                 <th>Condition</th>
                                 <th>Cough</th>
                                 <th>Fever</th>
                                 <th>Wet Nose</th>
                                 <th>Confirmed</th>
                                 <th>Suspect</th>
                                 <th>Entry Date</th>

                                 <th colspan="2" class="text-center">location</th>
                              </tr>
                           </thead>
                           <tbody>
                              @foreach($status as $stat)
                              <tr>
                                <?php $name = \App\User::find($stat->user_id)->name; ?>
                                 <td>{{ $name }}</td>
                                 <td>{{ $stat->condition }}</td>
                                 <td>{{ $stat->cough  == 1 ? 'Y':'N'}}</td>
                                 <td>{{ $stat->fever  == 1 ? 'Y':'N'}}</td>
                                 <td>{{ $stat->wet_nose  == 1 ? 'Y':'N'}}</td>
                                 <td>{{ $stat->nearby_confirmed  == 1 ? 'Y':'N' }}</td>
                                 <td>{{ $stat->nearby_suspect  == 1 ? 'Y':'N'}}</td>
                            
                                 <td>{{ date('Y-m-d', strtotime($stat->created_at)) }}</td>
                                 <td class="text-center">
                                     {{ $stat->latitude  }}</td>
                                 <td class="text-center">
                                    {{ $stat->longitude }}
                                </td>
                              </tr>
                              @endforeach
                           </tbody>
                          </table>
                       </div> 
                        {{ $status->links() }}
                   </div>
 @endsection  