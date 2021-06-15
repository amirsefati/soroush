<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tablighat;
use App\Models\User;
use App\Models\File;
use Facade\Ignition\Tabs\Tab;

class Ads extends Controller
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

    public function instagram_report(){
        $report = [];
        $all_instagram_ads = Tablighat::all();

        foreach($all_instagram_ads as $instagram_ad){

            $moshavers = User::where('id', $instagram_ad->user_id)->get();
            $files = File::where('id', $instagram_ad->file_id)->get();


            $arr = ['moshavers' => $moshavers, 'files' => $files];
            array_push($report, $arr);
        }
        return $report;

    }
}
