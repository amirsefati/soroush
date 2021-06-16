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
        $reports = [];
        $all_instagram_ads = Tablighat::where('images', '!=', NULL)->get();

        foreach($all_instagram_ads as $instagram_ad){

            $moshaver = User::where('id', $instagram_ad->user_id)->first();
            $file = File::where('id', $instagram_ad->file_id)->first();
            $ad_times = Tablighat::where('id', $instagram_ad->id)->where('has_done', 1)->count();

            $arr = ['tablighat' => $instagram_ad, 'moshaver' => $moshaver, 'file' => $file, 'ad_times' => $ad_times];
            array_push($reports, $arr);
        }

        return view('tablighat.instagram', compact('reports'));
    }

    public function sms_panel(){
        $reports = [];
        $all_sms_ads = Tablighat::where('sms_text', '!=', NULL)->get();

        foreach($all_sms_ads as $sms_ad){

            $moshaver = User::where('id', $sms_ad->user_id)->first();
            $file = File::where('id', $sms_ad->file_id)->first();
            $ad_times = Tablighat::where('id', $sms_ad->id)->where('has_done', 1)->count();

            $arr = ['tablighat' => $sms_ad, 'moshaver' => $moshaver, 'file' => $file, 'ad_times' => $ad_times];
            array_push($reports, $arr);
        }

        return view('tablighat.sms_panel', compact('reports'));
    }
}
