<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\File;
use App\Models\User;
use App\Models\Work;
use App\Models\Report;
use App\Models\Followup;
use Illuminate\Http\Request;
use App\Models\RangeMoshaver;
use App\Models\Statment;
use Illuminate\Support\Facades\Auth;

class Manager extends Controller
{
    public function index(){
        return view('modir.dashboard');
    }

    public function moshaver_performance(){
        return view('modir.moshaver_performance');
    }

    public function report_all(){
        $report = [];
        $all_moshaver_monshi = User::where('level', 2)->orWhere('level', 3)->get();
        
        foreach($all_moshaver_monshi as $moshaver_monshi){

            $files = File::where('userid_moshaver', $moshaver_monshi->id)->get();
            $clients = User::Where('userid_inter', $moshaver_monshi->id)->get();
            $calls = Report::Where('moshaver_id', $moshaver_monshi->id)->Where('type', 'call-file')->orWhere('type', 'call-user')->get();
            $services = Work::Where('moshaver_id', $moshaver_monshi->id)->Where('gotofile', '!=', NULL)->get();
            $contracts = Work::Where('moshaver_id', $moshaver_monshi->id)->Where('contruct', '!=', NULL)->get();


            $arr = ['user' => $moshaver_monshi, 'files' => $files, 'clients' => $clients, 'calls' => $calls, 'services' => $services, 'contracts' => $contracts];
            array_push($report, $arr);
        }
        return $report;

    }

    public function add_moshaver(){
        return view('modir.add_moshaver');
    }

    public function add_moshaver_post(Request $request){

        $space_200 = 0;
        $space_200_350 = 0;
        $space_350 = 0;
        foreach($request->space as $space){
            if ($space == 1){
                $space_200 = 1;
            }

            if ($space == 2){
                $space_200_350 = 1;
            }

            if ($space == 3){
                $space_350 = 1;
            }
        }

        $user = User::create([
            "name" => $request->name,
            "phone" => $request->phone,
            "password" => $request->password,
            "level" => 2,
            "userid_inter" => Auth::user()->id,
        ]);

        RangeMoshaver::create([
            "user_id" => $user->id,
            "seller" => $request->seller == 'on' ? 1 : 0,
            "renter" => $request->renter == 'on' ? 1 : 0,
            "kolangi" => $request->kolangi == 'on' ? 1 : 0,
            "tejari" => $request->tejari == 'on' ? 1 : 0,
            "mostaghelat" => $request->mostaghelat == 'on' ? 1 : 0,
            "space_200" => $space_200,
            "space_200_350" => $space_200_350,
            "space_350" => $space_350
        ]);

        return back();
    }


    public function manage_files(){
        $files = File::all();        
        return view('modir.manage_files',compact('files'));
    }


    public function listusers(){
        $users = User::all();
        return view('modir.listusers',compact('users'));
    }

    public function add_monshi(){
        return view('modir.add_monshi');
    }

    public function add_monshi_post(Request $request){

        User::create([
            "name" => $request->name,
            "phone" => $request->phone,
            "password" => $request->password,
            "level" => 3,
            "userid_inter" => Auth::user()->id,
        ]);

        return back();
    }

    public function verify_moshaver_file(){
        $files = File::where('publish',1)->where('verify',0)->where('etc2','modir')->get();
        return view('modir.verify_moshaver_file',compact('files'));
    }


    public function Manager($days){
        $statics = [];

        $i = 0;
        for($i; $i <= $days; $i++){
            $date = Carbon::now()->subDays($i);
            $date_jalali = \Morilog\Jalali\CalendarUtils::toJalali(date_format($date, 'Y'), date_format($date, 'm'), date_format($date, 'd'));
            $date_jalali_str = $date_jalali[0].'-'.$date_jalali[1].'-'.$date_jalali[2];
            $files = File::whereDate('created_at',Carbon::now()->subDays($i)->format('Y-m-d'))->get();
            $users = User::whereDate('created_at',Carbon::now()->subDays($i)->format('Y-m-d'))->get();
            $calls = Report::whereDate('created_at',Carbon::now()->subDays($i)->format('Y-m-d'))->get();

            $statics_day = ["time"=>$date_jalali_str,"files"=>$files,"users"=>$users,"calls"=>$calls];
            array_push($statics,$statics_day);
        }
        $statics = array_reverse($statics);
        return $statics;
    }

    public function followup(){
        $followups = Followup::all();
        return view('modir.followup',compact('followups'));
    }

    public function announcement(){
        $anns = [];
        $raw_anns = Statment::all();

        return view('modir.announcement', compact('anns'));
    }

    public function followuphistoryinreport($id){
        $followup = Report::all();
        return $followup;
    }
   
}

