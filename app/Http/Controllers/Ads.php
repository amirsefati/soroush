<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\File;
use App\Models\User;
use App\Models\Report;
use App\Models\Tablighat;
use Illuminate\Http\Request;
use Facade\Ignition\Tabs\Tab;
use Illuminate\Support\Facades\Auth;

class Ads extends Controller
{
    
    public function index(){

        return view('tablighat.index');
    }

    public function instagram(){
        $reports = [];
        $all_instagram_ads = Tablighat::where('type','instagram')->get();

        foreach($all_instagram_ads as $instagram_ad){

            $moshaver = User::where('id', $instagram_ad->user_id)->first();
            $file = File::where('id', $instagram_ad->file_id)->first();
            $ad_times = Tablighat::where('id', $instagram_ad->id)->where('has_done', 1)->count();

            $arr = ['tablighat' => $instagram_ad, 'moshaver' => $moshaver, 'file' => $file, 'ad_times' => $ad_times];
            array_push($reports, $arr);
        }

        return view('tablighat.divar_sheypoor', compact('reports'));
    }

    public function instagram_result(Request $request){

        $request->validate([
            'result_instagram_link' => 'active_url'
        ]);

        Tablighat::find($request->tablighat_id)->update([
            'instagram_link' => $request->result_instagram_link,
            'has_done' => 1,
            'when_done' => Carbon::now()
        ]);

        return back();
    }

    public function sms_panel(){
        $reports = [];
        $all_sms_ads = Tablighat::where('type', 'sms')->get();

        foreach($all_sms_ads as $sms_ad){

            $moshaver = User::where('id', $sms_ad->user_id)->first();
            $file = File::where('id', $sms_ad->file_id)->first();
            $ad_times = Tablighat::where('id', $sms_ad->id)->where('has_done', 1)->count();

            $arr = ['tablighat' => $sms_ad, 'moshaver' => $moshaver, 'file' => $file, 'ad_times' => $ad_times];
            array_push($reports, $arr);
        }

        return view('tablighat.sms_panel', compact('reports'));
    }
    
    public function sms_panel_result(Request $request){

        Tablighat::find($request->sms_tablighat_id)->update([
            'sms_text' => $request->final_sms_text,
            'has_done' => 1,
            'when_done' => Carbon::now()
        ]);

        return back();
    }

    
    public function divar_sheypoor(){
        $reports = [];
        $divar_sheypoor_ads = Tablighat::where('type', 'ds')->get();

        foreach($divar_sheypoor_ads as $divar_sheypoor_ad){

            $moshaver = User::where('id', $divar_sheypoor_ad->user_id)->first();
            $file = File::where('id', $divar_sheypoor_ad->file_id)->first();
            $ad_times = Tablighat::where('id', $divar_sheypoor_ad->id)->where('has_done', 1)->count();

            $arr = ['tablighat' => $divar_sheypoor_ad, 'moshaver' => $moshaver, 'file' => $file, 'ad_times' => $ad_times];
            array_push($reports, $arr);
        }

        return view('tablighat.divar_sheypoor', compact('reports'));
    }

    public function ds_result(Request $request){

        $request->validate([
            'result_instagram_story_link' => 'active_url'
        ]);

        Tablighat::find($request->ds_tablighat_id)->update([
            'instagram_link' => $request->result_instagram_story_link,
            'has_done' => 1,
            'when_done' => Carbon::now()
        ]);

        return back();
    }


    
    public function statics($days){
        $statics = [];

        $i = 0;
        for($i; $i <= $days; $i++){
            $date = Carbon::now()->subDays($i);
            $date_jalali = \Morilog\Jalali\CalendarUtils::toJalali(date_format($date, 'Y'), date_format($date, 'm'), date_format($date, 'd'));
            $date_jalali_str = $date_jalali[0].'-'.$date_jalali[1].'-'.$date_jalali[2];
            $files = File::where('userid_moshaver',Auth::user()->id)->whereDate('created_at',Carbon::now()->subDays($i)->format('Y-m-d'))->get();
            $users = User::where('userid_inter',Auth::user()->id)->whereDate('created_at',Carbon::now()->subDays($i)->format('Y-m-d'))->get();
            $calls = Report::where('moshaver_id',Auth::user()->id)->whereDate('created_at',Carbon::now()->subDays($i)->format('Y-m-d'))->get();

            $statics_day = ["time"=>$date_jalali_str,"files"=>$files,"users"=>$users,"calls"=>$calls];
            array_push($statics,$statics_day);
        }
        $statics = array_reverse($statics);
        return $statics;
    }
}
