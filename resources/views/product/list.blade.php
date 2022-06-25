@extends('adminlte::page')

@section('title', 'Settings')

@section('content_header')
    <h1 class="m-0 text-dark">Product List</h1>
@stop
   
@section('content')
 <div class="row">
  <div class="col-sm-6">
    <h4>Product List</h4>
  </div>
  <div class="col-sm-6 text-right">
    <a href="{{ route('products.create') }}" class="btn btn-success mb-2">Add</a> 
  </div>
</div>
 
 <div class="row">
      <div class="col-12">          
        <table class="table table-bordered" id="laravel_crud">
         <thead>
            <tr>
               <th>Id</th>
               <th>Title</th>
               <th>Product Code</th>
               <th>Description</th>
               <th>Created at</th>
               <th colspan="2" class="text-center">Action</th>
            </tr>
         </thead>
         <tbody>
            @foreach($products as $product)
            <tr>
               <td>{{ $product->id }}</td>
               <td>{{ $product->title }}</td>
               <td>{{ $product->product_code }}</td>
               <td>{{ $product->description }}</td>
               <td>{{ date('Y-m-d', strtotime($product->created_at)) }}</td>
               <td class="text-center">
                <a href="{{ route('products.edit',$product->id)}}" class="btn btn-primary">Edit</a></td>
               <td class="text-center">
               <form action="{{ route('products.destroy', $product->id)}}" method="post">
                {{ csrf_field() }}
                @method('DELETE')
                <button class="btn btn-danger" type="submit">Delete</button>
              </form>
              </td>
            </tr>
            @endforeach
 
            @if(count($products) < 1)
              <tr>
               <td colspan="10" class="text-center">There are no product available yet!</td>
              </td>
            </tr>
            @endif
         </tbody>
        </table>
        {!! $products->links() !!}
     </div> 
 </div>
 @endsection  