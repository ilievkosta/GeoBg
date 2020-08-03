<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Ip;
use Illuminate\Support\Facades\Validator;

class IpController extends Controller
{

    public function show_ip(Request $data){

        $validatedData = $data->validate([
       
            'days' => 'required|numeric'
        ]);
      
        $days = $data->input('days');
      
 
    $date = \Carbon\Carbon::today()->subDays($days);

    $last_visits= Ip::where('created_at', '>=', $date)->orderBy('created_at', 'desc')->get();
    return view('welcome_ip',compact('last_visits'));

}
public function show_ip_hours(Request $last_hours){
    
    $validatedData = $last_hours->validate([
       
        'hours' => 'required|numeric'
    ]);
  
    $hours=$last_hours->input('hours');
    $date = \Carbon\Carbon::now()->subHours($hours);

    $last_visits= Ip::where('created_at', '>=', $date)->get();
    return view('welcome_ip',compact('last_visits'));

}

public function LatLon(Request $data){
   
   $firstDate= $data->input('first');
   $lastDate= $data->input('last');
   $inputCountry= $data->input('country');
   $lastDate++;
 
   
      if($inputCountry=='BG'){
          $last_visits= Ip::where('created_at', '>=', $firstDate)->where('created_at', '<=', $lastDate)->where('country_code', '=', $inputCountry)->get();
    return view('Map_ip',compact('last_visits'));
      }
else {
  $last_visits= Ip::where('created_at', '>=', $firstDate)->where('created_at', '<=', $lastDate)->get();
   return view('Map_ip_World',compact('last_visits'));
  
}

  


}
}
