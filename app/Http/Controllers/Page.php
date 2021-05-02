<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Page extends Controller
{
    public function index(){
        if(Auth::check())
        {
            return redirect('moshaver');

        }else{
            return view('page.login');

        }
    }

    public function login(Request $request){

        if(User::where('phone',$request->phone)->first()){
            if($user = User::where('phone',$request->phone)->where('password',$request->pass)->first()){
                Auth::loginUsingId($user->id,true);
                return redirect('/moshaver');
            }else{
                return back();
            }
        }else{
            return back();
        }
    }

    public function logoutpanel(){
        Auth::logout();
        return redirect('/');
    }
}
