<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Tablighat extends Controller
{
    
    public function index(){

        return view('tablighat.index');
    }

    public function instagram(){
        return view('tablighat.instagram');
    }

    public function sms_panel(){
        return view('tablighat.sms_panel');
    }
}
