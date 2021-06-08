<?php

namespace App\Http\Controllers;

use App\Models\File;
use App\Models\Report;
use App\Models\User;
use App\Models\Work;
use Illuminate\Http\Request;

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
}

