<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <html lang="en">
           
       
        <title>Geo-bg</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;

            }

            .full-height {
                height: 100vh;
            }
      
            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 10px;
            }
            .text{
                position: absolute;
               left:4%;
                top: 54px;
            }


            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @if (auth()->check())
                    @if (auth()->user()->is_admin == 1)
                    <a href="{{ url('/news') }}">Edit News</a>
                   
                    @endif
                 @endif

                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
               
            @endif
            </div>
           </div>
      
   <div class="text">
   <table class="table">
  <tr>
    <th>id</th>
    <th>ip</th>
    <th>city</th>
    <th>isp</th>
    <th>time</th>
    <th>username</th>
    
  </tr>
  
  @foreach ($last_visits as $last)
  <tr>
    <td>{{$last->id}} </td>
    <td>{{$last->ip}}</td>
    <td>{{$last->city}}</td>
    <td>{{$last->isp}}</td>
    <td>{{$last->created_at}}</td>
    <td>{{$last->username}}</td>
  </tr>
  @endforeach

</table>   
</p>
</div>

</div>
 
    </body>
</html>
<link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>