@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Hydro</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @guest
                    Hello Guest
                    @endguest
                    @auth
                    Hello  {{Auth::user()->name}} 

                    <h2>Create Object from JSON String</h2>

                    <p id="demo"></p>
                    <p id="j">{{$json}}</p>
                    <script>
                    var txt = document.getElementById("j").innerHTML;
                    var obj = JSON.parse(txt);
                    document.getElementById("demo").innerHTML = obj.name + ", " + obj.age;
                    </script>


                    @endauth

                     
                   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
