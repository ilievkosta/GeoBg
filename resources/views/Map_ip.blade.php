<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <html lang="en">
           
       
        <title>Geo-bg</title>

        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css"
  integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ=="
  crossorigin=""/>
<script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js"
  integrity="sha512-gZwIG9x3wUXg2hdXF6+rVkLF/0Vi9U8D2Ntg4Ga5I5BZpVkVxlJWbSQtXPSiUTtC0TjtGOmxa1AJPuV0CPthew=="
  crossorigin=""></script>
   <style>
       #map{ height: 80% ;
        width: 80% ;
        margin: auto}
   </style>



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
                
               left:5%;
                top: 54px;
            }
            
            #map {
           position: absolute;
                        left:5%;
                        top: 60px;
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
    

           <div id="map"></div>
    
    <script>
        var map = L.map('map').setView([42.64701, 25.39425], 7);

L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
  attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
}).addTo(map);
</script>


@foreach ($last_visits as $last)


 <script>
L.marker([<?php if (($last->lat>41.08)&($last->lat<44.34)){echo $last->lat;}
    
 ?>,<?php if (($last->lon>22.18)&($last->lon<29.69)){echo $last->lon;} ?>]).addTo(map)
  .bindPopup('<?php echo $last->created_at."<br>".$last->ip ?>')
  .openPopup();
  
    </script>

@endforeach


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