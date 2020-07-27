@extends('layouts.app')
   
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Admin options</div>
                <div class="card-body">
       
             @if (Route::has('login'))
             
                    @if (auth()->check())
                    @if (auth()->user()->is_admin == 1)
                    
                    <a class="btn btn-primary" href="{{ url('/news') }}" role="button">Edit News</a>
                  
                    <a class="btn btn-primary" href="{{ url('/ip') }}" role="button">Show Ip</a>
                   
                    @endif
                 @endif
                  @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection