<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class geobg extends Controller
{
    public function geo(){
        return view("geo");
    }
    
    
        public function hydro(){
            $myArr = array( "name"=>"John", "age"=>35, "city"=>"New York"  ) ;


            $myJSON = json_encode($myArr);
            
            return view('hydro')->with('json',$myJSON);
           
           // return view('hydro',array(
               
               // 'page' => $page));
           
           // $info = 'Informaciq';

            // return view('hydro',['info'=>$info]);
           
        }}




