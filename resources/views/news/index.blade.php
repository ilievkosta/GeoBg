@extends('layouts.app')

 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>News control panel</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('news.create') }}"> Add Article</a>
            </div>
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Picture</th>
            <th>Title</th>
            <th >Article</th>
            <th >CRUD</th>

        </tr>
        @foreach ($news as $news)
        <tr>
            <td>{{ ++$i }}</td>
            <td width="150px" height="150px" >
                <div class="item">
                   @if ($news->pic_path=='pic')
           
            <img src="/public/images/noimage.png"  width=100% height=100% />
            @else
            
           
            <img src="/public/images/{{$news->pic_path }}" width=100% height=100%  />
            @endif
                  
                  
                  
                  
                  
                  
                  
                   
                 
                </td>
            <td>{{ $news->title }}</td>

            
            <td>
                <?php echo htmlspecialchars_decode($news->article); ?>
                    </td>
            <td>
        
        <form action="{{ route('news.destroy',$news->id) }}" method="POST">
   
                    <a class="btn btn-info" href="{{ route('news.show',$news->id) }}">Show</a>
    
                    <a class="btn btn-primary" href="{{ route('news.edit',$news->id) }}">Edit</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>

      
@endsection 