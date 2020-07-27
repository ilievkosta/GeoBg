@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Geo</div>
                @if (session('status'))


                
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
               
            @endif
            <div class="col text-center">
                 <p>File Upload</p>
           
                 <br />
                 <form action="{{ route('fileUp') }}" method="POST" enctype="multipart/form-data">
                     @csrf 
                    <input type="file" name="file"  />
            <br />
            <input type="submit" value=" Save" class="btn btn-primary" />
         
                 </form>
                <a> {{$uploaded ?? ''}}</a>
                <a> 

                    
                 
                    
                  

                    
                <a> </a>
                </div>
                            @auth
                            <div class="col text-center">
                              Hello {{Auth::user()->name}} 
                            </div>
                            @endauth
                            @guest
                            <div class="col text-center">
                              <p class="lead"> Hello Guest</p>
                            </div>

                            @isset($files)
                            @foreach($files as $image)
                            <div class="item"><img src="{{ asset('public/image/' . $image->getFilename())  }}" height=25% width=25% width: 100%;
  height: auto;/></div>
                           @endforeach 
                           @endisset
                            @endguest
        
        </div>
                    
             <div class="card-body">
                   
                   
               
            </div>
        </div>
    </div>
</div>
@endsection


