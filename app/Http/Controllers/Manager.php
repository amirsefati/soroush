<?php

namespace App\Http\Controllers;

use App\Models\File;
use App\Models\RangeMoshaver;
use App\Models\Report;
use App\Models\User;
use App\Models\Work;
use Illuminate\Http\Request;
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
}

