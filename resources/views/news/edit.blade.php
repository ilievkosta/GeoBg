@extends('layouts.app')

 
@section('content')
   
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit news</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('news.index') }}"> Back</a>
            </div>
        </div>
    </div>


    @if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('news.update',$news->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Title:</strong>
                
                <input type="text" name="title" value="{{ $news->title }}" class="form-control" placeholder="title">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Article:</strong>
                <div class='form'>
                    <textarea  id="summernote" name="article"  >{{ $news->article }}</textarea> 
                   </div>   
            </div>
            <input type="file" name="file"  />
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
          <button type="submit" class="btn btn-primary">Update</button>
        </div>
    </div>

</form>

<script>
    $(document).ready(function() {
      $('#summernote').summernote();
    });</script>

@endsection 


                    



                
          
                           
                   
   