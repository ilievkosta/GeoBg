<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use App\News;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\File;



class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $news = News::latest()->paginate(100);
  
       return view('news.index',compact('news'))
       ->with('i', (request()->input('page', 1) - 1) * 5);
        
    }
    public function welcome()
    {
         $news = News::latest()->paginate(100);
    


       return view('welcome',compact('news'))
       ->with('i', (request()->input('page', 1) - 1) * 5);
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('news.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
        if($request->has('file')){
            $request->file('file')->move($_SERVER['DOCUMENT_ROOT']. '/public/images', $request->file('file')->getClientOriginalName());
         
          
        } 
        
    
        
     
   
        echo $request->input('title');
        $this->validate($request, [
            'title' => 'required',
            'article' => 'required'
        ]);
            $news= new news;
                if ($request->has('file')) {
         $image_name = $request->file('file')->getClientOriginalName();
      $news->pic_path= $image_name;
    }
            $news->title = $request->input('title');
    $news->article = $request->input('article');
      
    $news->save();
    return redirect()->route('news.index')
                        ->with('success','New article is added');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(news $news)
    {
        return view('news.show',compact('news'));
    }
    
    public function showArticle(Request $req)
    {
  
        $news=News::where('id',$req["id"])->first();
       
        return view('news.show',compact('news'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(news $news)
    {
        return view('news.edit',compact('news'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id){
        

    if($request->has('file')){
      $request->file('file')->move($_SERVER['DOCUMENT_ROOT']. '/public/images', $request->file('file')->getClientOriginalName());
    $news=News::where('id',$id)->first();
    if (file_exists($_SERVER['DOCUMENT_ROOT']. '/public/images/'.$news->pic_path)) {
     unlink($_SERVER['DOCUMENT_ROOT']. '/public/images/'.$news->pic_path);}
     $pic_name=$request->file('file')->getClientOriginalName();
     DB::table('news')
     ->where("id", '=',  $id)
     ->update(['pic_path'=>$pic_name ]);
     News::where('id',$id)->first()->update($request->all());

     return redirect()->route('news.index')
                       ->with('success','Article updated successfully with updated pic !');
    }
    News::where('id',$id)->first()->update($request->all());

    return redirect()->route('news.index')
                      ->with('success','Article updated ! ');
    
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(news $news)
    {
        if (file_exists($_SERVER['DOCUMENT_ROOT']. '/public/images/'.$news->pic_path)) {
            unlink($_SERVER['DOCUMENT_ROOT']. '/public/images/'.$news->pic_path);
            $news->delete();
            return redirect()->route('news.index')
            ->with('success','Article deleted');
        }
else {
        $news->delete();
       
        return redirect()->route('news.index')
                        ->with('success','News deleted, but there is not such file');
    }
}
}
