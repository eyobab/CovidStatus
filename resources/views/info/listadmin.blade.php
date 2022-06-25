@extends('adminlte::page')
   
@section('content')
                   <div class="row">
                    <div class="col-sm-6">
                      <h4>Status List of all employees</h4>
                    </div>
                   </div>
                
                   <div class="row">
                        <div class="col-12">          
                          <table class="table table-bordered table table-striped table-gray table-sm" id="report_list" >
                           <thead >
                              <tr>
                                 <th>Reported By</th>
                                 <th>Report Type</th>
                                 <th>Key Points</th>
                                
                                 <th>Entry Date</th>

                                 <th colspan="2" class="text-center">Action</th>
                              </tr>
                           </thead>
                           <tbody>
                              @foreach($report as $rep)
                              <tr>
                                 <?php $name = \App\User::find($rep->user_id)->name; ?> 
                                 <td>{{ $name }}</td>
                                 <td>{{ $rep->report_type }}</td>
                                 <td>{{ $rep->key_points }}</td>
                               
                                 <td>{{ date('Y-m-d', strtotime($rep->created_at)) }}</td>
                                 <td class="text-center">
                                  <a href="{{ route('reports.edit',$rep->id)}}" class="btn btn-primary btn-sm">View</a></td>
                                 <td class="text-center">
                                 <form action="{{ route('reports.destroy', $rep->id)}}" method="post">
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
                        {{ $report->links() }}
                   </div>
 @endsection  