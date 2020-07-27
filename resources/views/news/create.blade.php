@extends('layouts.app')

 
@section('content')

        <main class="py-4">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
        
        <h1>Please enter new Article</h1>
   
        <form  action="{{ route('news.store') }}" method="POST" enctype="multipart/form-data" >
            @csrf 
            <input type="text" name="title" > Title
            <br><br>
           <div class='form'>
            <textarea  id="summernote" name="article"  ></textarea> 
           </div>
           
            <br><br>
           <input type="file" name="file"  />
            <br><br>
            
            <input type="submit" class="block" value="submit"/>

        </form>
    </div>
</div>
</div>
</main>
    <script>
    $(document).ready(function() {
      $('#summernote').summernote();
    });</script>
       

       @endsection


                    



                
          
                           
                   
   