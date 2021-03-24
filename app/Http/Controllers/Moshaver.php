<?php

namespace App\Http\Controllers;

use App\Models\File;
use App\Models\User;
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
        $users = User::all();
        return view('moshaver.addfile_get',compact('users'));
    }

    public function addfile_post(Request $request){
        return $request;
    }

    public function adduser_digest(Request $request){
        $request->validate([
            'name' => 'required',
            'phone' => 'required|unique:users'
        ]);
        
        User::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'userid_inter' => 1, //Auth::user()->id,
            'password' => '1234567801'
        ]);

        return back();
    }
}
