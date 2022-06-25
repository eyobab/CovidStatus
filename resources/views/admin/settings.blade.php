@extends('adminlte::page')

@section('title', 'Settings')

@section('content_header')
    <h1 class="m-0 text-dark">Change Password</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <p class="mb-0">You can do that here</p>
                    <p class="mb-0">And you are {{ Auth::User()->name }}</p>
                    
                </div>
            </div>
        </div>
    </div>
@stop
