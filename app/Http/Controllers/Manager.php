<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Manager extends Controller
{
    public function soroush($number){
        $formula = $number * 100 + 20 ;
        return view('soroush',compact('formula'));
    }

    public function test(){
        return view('test');
    }

    public function welcome(){
        return view('welcome');
    }
}
