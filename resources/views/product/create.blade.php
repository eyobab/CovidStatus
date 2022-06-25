@extends('adminlte::page')

@section('title', 'Settings')

@section('content_header')
    <h1 class="m-0 text-dark">New product</h1>
@stop
   

@section('content')
<div class="row">
    <div class="col-sm-6">
        <h4>Add Product</h4>
    </div>
    <div class="col-sm-6 text-right">
        <a href="{{ route('products.index') }}" class="btn btn-danger mb-2">Go Back</a> 
    </div>    
</div>
<hr />
 
<form action="{{ route('products.store') }}" method="POST" name="add_product">
    {{ csrf_field() }}
      
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <strong>Title</strong>
                <input type="text" name="title" class="form-control" placeholder="Enter Title">
                <span class="text-danger">{{ $errors->first('title') }}</span>
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <strong>Product Code</strong>
                <input type="text" name="product_code" class="form-control" placeholder="Enter Product Code">
                <span class="text-danger">{{ $errors->first('product_code') }}</span>
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <strong>Description</strong>
                <textarea class="form-control" col="4" name="description" placeholder="Enter Description"></textarea>
                <span class="text-danger">{{ $errors->first('description') }}</span>
            </div>
        </div>
        <div class="col-md-12">
            <button type="submit" class="btn btn-primary">Submit</button>
            <a href="{{ route('products.index') }}" class="btn btn-danger">Cancel</a> 
        </div>
    </div>     
</form>
@endsection