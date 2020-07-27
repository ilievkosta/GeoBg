<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        @include('meta::manager', [
    'title'         => 'Инженерна геология и Хидрогеология Стара Загора',
    'description'   => 'Хидрогеоложки и инженерногеоложки изследвания, доклади, добив на подземни води, разрешителни за ползване, РИОСВ, Стара Загора',
    'image'         => 'Url to the image',
])
    
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <script async defer crossorigin="anonymous" src="https://connect.facebook.net/bg_BG/sdk.js#xfbml=1&version=v6.0&appId=174759247089677&autoLogAppEvents=1"></script>

        <!-- Styles -->
        <style>
            html, body {
                 background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;


                background: url('/public/images/background.jpg') no-repeat center center fixed;
                -webkit-background-size: cover;
                -moz-background-size: cover;
                background-size: cover;
                -o-background-size: cover;
            }
            
      

            .full-height {
                height: 50vh;
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
                top: 18px;
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
                    <a href="{{ url('/ip') }}">Show Ip</a>
                    
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
                </div>
            @endif

            <div class="content">
                <h1>
                <div class="title m-b-md">
                    <font  color="blue">Geo-Bg.eu</font>
                 
                </div>
</h1>
                <div class="links">
                    <a href="{{ route('geo') }}">Инженерна Геология</a>
                    <a href="{{ route('hydro') }}">Хидрогеология и проекти за добив</a>

                </div>
            </div> </div>
        
         <div class='flex-center'>
<div class="row">
    <div class="span8">
      <div class="row">
          
         
          <h4>Инженерногеоложки и Хидрогеоложки услуги: </h3>
          <font size="4">
                  <li>Изготвяне на разрешителни за водовземане от подземни води.</li>
                        <li>Проектиране на санитарно – охранителни зони.</li>
                         <li>Изготвяне на оценка на ресурсите на подземните води.</li>
                         <li> Инженерногеоложки проучвания с лабораторни изследвания </li> 
                        <li> Изготвяне на инженерно-геоложки доклади. </li>     <li>Полеви инженерно-геоложки изработки – шурфове и сондажи.</li> 
        <li>Пробовзимане с цел лабораторни изследвания. <br><br></li>
                    Цената е  в зависимост от категорията на сградата и полевите работи.<br>
   </font>
         
            <font size="4"> За Контакти: инж. Костадин Илиев тел. 0887508896, 0878883626<br></p></font>
           </div>  </div> </div>
            </div>
       
       
          </div>
        @foreach ($news as $news)
    <div class='flex-center'>
    <div class="row">
    <div class="span8">
      <div class="row">
           <p><strong><a href="{{ route('news.show',$news->id) }}">{{ $news->title }}</a></strong></p>
        <div class="span1" >
         
         
        </div>
      </div>
      <div class="row">
        <div class="span2">
        
            @if ($news->pic_path=='pic')
            <img src="/public/images/DrillRig.jpeg">
    
            @else
            
            <img src="/public/images/{{$news->pic_path }}">
           
            @endif
          
         
          
        </div>
        <div class="span6" >      
     
           <?php 
           
           $article=htmlspecialchars_decode($news->article);
           $article = wordwrap($article,500);
           $article = explode("\n", $article);
           $article = $article[0] . '...';
                       echo strip_tags($article)  ?> 
          
  
      </div>
      <div class="row">
        <div class="span8">
          <p> <i class="icon-calendar"></i> {{$news->created_at}}
          </p>
         <p></p> <form method="post" action="{{ route('showArticle') }}">
      @csrf  
    <input type="hidden" name="id" value="{{ $news->id }}">
    <input type="submit" name="button" class="btn btn-primary" value="Прочети цялата новина">
</form> 
        </div>
      </div>
    </div>
  </div>
  <br>
</div>
</div>
  @endforeach
  <footer class="page-footer font-small white">


  <div class="footer-copyright text-center py-3">© 2020 Copyright:
    <a href="/"> Kostadin Iliev</a>
    Contact me: +359887508896  Please email me at <a href="mailto:ilievkosta@gmail.com">ilievkosta@gmail.com</a><div class="fb-like" data-href="https://web.facebook.com/GeoBg.eu/" data-width="" data-layout="standard" data-action="like" data-size="small" data-share="true"></div>
  </div>


</footer>
    </body>
</html>
<link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>