<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Manager extends Controller
{
<<<<<<< HEAD
    public function soroush($number){
        $formula = $number * 100 + 20 ;
        return view('soroush',compact('formula'));
    }

    public function test(){
        return view('test');
    }

    public function welcome(){
        return view('welcome');
=======
    public function index(){
        return 'manager';
>>>>>>> ab0aaee1bd1d2774afe976df4da03c1a05ce5ab8
    }
}
