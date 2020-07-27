

@extends('layouts.app')
<style>
 
    h1 {
  text-align: center;
  text-transform: uppercase;
  color: blue;
}

.article {
  text-indent: 50px;
  text-align: justify;
  letter-spacing: 2px;
  font-family: "Comic Sans MS", cursive, sans-serif;
}

a {
  text-decoration: none;
  color: #008CBA;
}

.center {
  margin: auto;
  width: 80%;

}
p {
              margin-top: 50px;
            }
    </style>

@section('content')
   <p>
        <h5 class='center'>{{ $news->title }}  </h5>
     
                 </p>  
               <p class='center'>                
       
       @if ($news->pic_path=='pic')
        
    <img src="/public/images/DrillRig.jpeg" class="img-fluid" alt="Responsive image">
            @else
            
           
           <img src="/public/images/{{$news->pic_path }}" class="img-fluid" alt="Responsive image">
            @endif
    
         <div class="col-lg-10">
        
        <p><?php echo (htmlspecialchars_decode($news->article)); ?>
        
        </p>
      <a class="btn btn-primary" href={{route('welcome')}}> Back</a>
              </div>
                 
                 
</div>

     
 


   
@endsection



