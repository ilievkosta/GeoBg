<?php

namespace App\Http\Controllers;

use App\News;
use Illuminate\Http\Request;
use App\Ip;
use Auth;

class WelcomeController extends Controller
{
   
    public function welcome(Request $request)
    {
         $news = News::latest()->paginate(10);
         $user_ip=new Ip;
         
         $user_ip->ip = $request->ip();
         if (isset(Auth::user()->name)) {

         $user_ip->username = Auth::user()->name;
        } else {
            $user_ip->username="Unknown";
        }

        
        $url='http://ip-api.com/php/'.$user_ip->ip.'?fields=61439';
       
        
        
        $content = file_get_contents($url);
        $IParray=unserialize($content);
       if ($IParray['status']=='success'){
           
            $user_ip->city=$IParray['city'];
            $user_ip->lat=$IParray['lat'];
            $user_ip->lon=$IParray['lon'];
            $user_ip->isp=$IParray['isp'];
            $user_ip->country=$IParray['country'];
            $user_ip->country_code=$IParray['countryCode'];
            $user_ip->content=serialize($IParray);

            $user_ip->save();

       }
    
        
        
      
       return view('welcome',compact('news'))
       ->with('i', (request()->input('page', 1) - 1) * 10);
        
    }


}
