<?php

namespace App\Http\Controllers;

use App\Models\File;
use Illuminate\Http\Request;

class Moshaver extends Controller
{
    public function index(){      
        return view('moshaver.master');
    }

    //add file
    public function addfilelist(){
        return view('moshaver.addfilelist');
    }

    public function addfile_get(){
        return view('moshaver.addfile_get');
    }

    public function addfile_post(Request $request){
        return $request;
    }
}
