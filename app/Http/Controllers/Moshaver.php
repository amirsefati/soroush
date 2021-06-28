<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\File;
use App\Models\User;
use App\Models\Work;
use App\Models\Action;
use App\Models\Report;
use App\Models\Taavon;
use App\Models\Tablighat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class Moshaver extends Controller
{
    public function index(){
        $clients = User::where('userid_inter',Auth::user()->id)->orderBy("updated_at","DESC")->get();
        $files = File::where('userid_moshaver',Auth::user()->id)->orderBy("updated_at","DESC")->get();
        $taavons = Taavon::where('moshaver_id',Auth::user()->id)->orderBy("updated_at","DESC")->get();
        $works = Work::where('moshaver_id',Auth::user()->id)->orderBy("updated_at","DESC")->get();
        $today = Carbon::now()->toDateString();
        $tomorrow = Carbon::now()->addDays(1)->toDateString();
        $actions = Action::where('moshaver_id',Auth::user()->id)->whereDate('date',Carbon::now()->format('Y-m-d'))->get(); 
        return view('moshaver.index',compact(['works','clients','files','taavons','actions']));
    }


    public function addfile_get(){
        $users = User::where('level','1')->where('userid_inter',Auth::user()->id)->get();
        return view('moshaver.addfile_get',compact('users'));
    }

    public function addfile_post(Request $request){

        $etc2 = null;
        $publish = 0;

        if($request->publish == 'monshi'){
            $etc2 = 'monshi';
            $publish = 1;
        }elseif($request->publish == 'modir'){
            $etc2 = 'modir';
            $publish = 1;
        }
        
        $address = $request->address1 .'-'. $request->address2 .'-'. $request->address3
        .'-'. $request->address4 .'-'. $request->address5;
        
        $file = File::create([
            'type' => $request->type,
            'kind_type' => $request->kind_type,
            'userid_moshaver' => $request->userid_moshaver,
            'userid_file' => $request->userid_file,
            'area' => $request->area,
            'age' => $request->age,
            'price' => $request->price ? str_replace(",","",$request->price) : null,
            'rent_annual' => $request->rent_annual ? str_replace(",","", $request->rent_annual) : null,
            'rent_month' => $request->rent_month ? str_replace(",","", $request->rent_month) : null,
            'bedroom_number' => $request->bedroom_number,
            'floor' => $request->floor,
            'phone1' => $request->phone1,
            'address' => $address,
            'note' => $request->note,
            'name' => $request->name,
            'allfloor' => $request->allfloor,
            'suiteinfloor' => $request->suiteinfloor,
            'allsuite' => $request->allsuite,
            'parking' => $request->parking,
            'master_number' => $request->master_number,
            'wc_number' => $request->wc_number,
            'direction' => $request->direction,
            'depot' => $request->depot,
            'elevator' => $request->elevator,
            'balcony' => $request->balcony,
            'shell' => $request->shell,
            'publish' => $publish,
            'etc2' => $etc2,
            'ad_text'=> $request->ad_text,

            'wc' => json_encode($request->wc),
            'floor_type' => json_encode($request->floor_type),
            'outdoor_face' => json_encode($request->outdoor_face),
            'indoor_face' => json_encode($request->indoor_face),
            'cabinet' => json_encode($request->cabinet),
            'cooling' => json_encode($request->cooling),

            'kitchen' => json_encode($request->kitchen),
            'cooling' => json_encode($request->cooling),
            'indoor_facility' => json_encode($request->indoor_facility),
            'secure_facility' => json_encode($request->secure_facility),
            'sport_facility' => json_encode($request->sport_facility),
            'welfair_facility' => json_encode($request->welfair_facility),
            'outdoor_status' => json_encode($request->outdoor_status),
            'indoor_status' => json_encode($request->indoor_status),

            'evacuation_status' => $request->evacuation_status,
            'deed_type' => $request->deed_type,
            'convertible' => $request->convertible,

            'presell_date' => $request->presell_y. '-' . $request->presell_m,

            
        ]);
        if($request->kind_type == 'sell'){
            User::find($request->userid_file)->update([
                'etc2' => 1
            ]);
        }else{
            User::find($request->userid_file)->update([
                'etc4' => 1
            ]); 
        }
        
        return redirect('moshaver/editfile/'.$file->id);
    }

    public function editfile_post(Request $request){

        
        $etc2 = null;
        $publish = 0;

        if($request->publish == 'monshi'){
            $etc2 = 'monshi';
            $publish = 1;
        }elseif($request->publish == 'modir'){
            $etc2 = 'modir';
            $publish = 1;
        }

        $address = $request->address1 .'-'. $request->address2 .'-'. $request->address3
        .'-'. $request->address4 .'-'. $request->address5;
        

        File::where('id',$request->fileid)->update([
            'type' => $request->type,
            'kind_type' => $request->kind_type,
            'userid_moshaver' => $request->userid_moshaver,
            'userid_file' => $request->userid_file,
            'area' => $request->area,
            'age' => $request->age,
            'price' => $request->price ? str_replace(",","",$request->price) : null,
            'rent_annual' => $request->rent_annual ? str_replace(",","", $request->rent_annual) : null,
            'rent_month' => $request->rent_month ? str_replace(",","", $request->rent_month) : null,
            'bedroom_number' => $request->bedroom_number,
            'floor' => $request->floor,
            'phone1' => $request->phone1,
            'address' => $address,
            'note' => $request->note,
            'name' => $request->name,
            'allfloor' => $request->allfloor,
            'suiteinfloor' => $request->suiteinfloor,
            'allsuite' => $request->allsuite,
            'parking' => $request->parking,
            'master_number' => $request->master_number,
            'wc_number' => $request->wc_number,
            'direction' => $request->direction,
            'depot' => $request->depot,
            'elevator' => $request->elevator,
            'balcony' => $request->balcony,
            'shell' => $request->shell,
            'publish' => $publish,
            'etc2' => $etc2,
            'ad_text'=> $request->ad_text,

            'wc' => json_encode($request->wc),
            'floor_type' => json_encode($request->floor_type),
            'outdoor_face' => json_encode($request->outdoor_face),
            'indoor_face' => json_encode($request->indoor_face),
            'cabinet' => json_encode($request->cabinet),
            'cooling' => json_encode($request->cooling),

            'kitchen' => json_encode($request->kitchen),
            'cooling' => json_encode($request->cooling),
            'indoor_facility' => json_encode($request->indoor_facility),
            'secure_facility' => json_encode($request->secure_facility),
            'sport_facility' => json_encode($request->sport_facility),
            'welfair_facility' => json_encode($request->welfair_facility),
            'outdoor_status' => json_encode($request->outdoor_status),
            'indoor_status' => json_encode($request->indoor_status),

            'evacuation_status' => $request->evacuation_status,
            'deed_type' => $request->deed_type,
            'convertible' => $request->convertible,
            'presell_date' => $request->presell_y. '-' . $request->presell_m,

        ]);
        if($request->kind_type == 'sell'){
            User::find($request->userid_file)->update([
                'etc2' => 1
            ]);
        }else{
            User::find($request->userid_file)->update([
                'etc4' => 1
            ]); 
        }
        return redirect('moshaver/manage_files');

    }

    public function adduser_digest(Request $request){

        $request->validate([
            'name' => 'required',
            'phone' => 'required|unique:users'
        ]);

        $etc5 = 0;
        if(Auth::user()->level == 3){
            $etc5 = 1;
        }
        
        $newuser = User::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'kind_type' => 'sell',
            'userid_inter' => Auth::user()->id,
            'password' => '1234567801',
            'etc5' => $request->label == 'مالک' ? $etc5 : null,
            'label' => $request->label
        ]);
        
        return ["status" => 200,"data" => $newuser];
    }

   

    public function adduser(){
        return view('moshaver.adduser');
    }

    public function adduser_post(Request $request){

        
        $user = User::create([
            'userid_inter' => $request->userid_inter,
            'name' => $request->name,
            'phone' => $request->phone,
            'price' => $request->price ? str_replace(",","",$request->price) : null,
            'rent_annual' => $request->rent_annual ? str_replace(",","", $request->rent_annual) : null,
            'rent_month' => $request->rent_month ? str_replace(",","", $request->rent_month) : null,
            'type' => $request->type,
            'religen' => $request->religen,
            'bedroom_number' => $request->bedroom_number,
            'desc' => $request->desc,
            'age' => $request->age,
            'info' => $request->info,
            'region' => $request->region,
            'kind_type' => $request->kind_type,
            'area' => $request->area,

            'sporty' => json_encode($request->sporty),
            'religen' => json_encode($request->religen),
            'work' => $request->work,
            'likes' => json_encode($request->likes),

            'elevator' =>  ($request->elevator == 'on' ? 1 : null),
            'depot'    =>  (   $request->depot == 'on' ? 1 : null),
            'parking'  =>  ( $request->parking == 'on' ? 1 : null),
            'balcony'  =>  ( $request->balcony == 'on' ? 1 : null),

            'password' => '1234567801',
        ]);
        if($request->kind_type == 'sell'){
            User::find($user->id)->update([
                'etc1' => 1
            ]);
        }else{
            User::find($user->id)->update([
                'etc3' => 1
            ]);
        }
        return redirect('moshaver/edituser/'.$user->id);

    }

    public function edituser_get($userid){
        $user = User::find($userid);
        return view('moshaver.edituser',compact('user'));
    }

    public function edituser_post(Request $request){

        $all_images = $request->documents;
        if(strlen($request->documnts) > 5){
            foreach($request->documnts as $doc){
                $name = rand(10000,99999).'.'.$doc->getClientOriginalExtension();
                $destinationPath = public_path('/userdocs/');
                $doc->move($destinationPath, $name);
                $file_item = '/userdocs/' . $name ; 
                array_push($all_images,$file_item);
            }
        }
        
        User::where('id',$request->userid)->update([
            'userid_inter' => $request->userid_inter,
            'name' => $request->name,
            'price' => $request->price ? str_replace(",","",$request->price) : null,
            'rent_annual' => $request->rent_annual ? str_replace(",","", $request->rent_annual) : null,
            'rent_month' => $request->rent_month ? str_replace(",","", $request->rent_month) : null,
            'type' => $request->type,
            'religen' => $request->religen,
            'bedroom_number' => $request->bedroom_number,
            'desc' => $request->desc,
            'age' => $request->age,
            'info' => $request->info,
            'kind_type' => $request->kind_type,
            'region' => $request->region,
            'area' => $request->area,

            'sporty' => json_encode($request->sporty),
            'religen' => json_encode($request->religen),
            'work' => $request->work,
            'likes' => json_encode($request->likes),

            'elevator' =>  ($request->elevator == 'on' ? 1 : null),
            'depot'    =>  (   $request->depot == 'on' ? 1 : null),
            'parking'  =>  ( $request->parking == 'on' ? 1 : null),
            'balcony'  =>  ( $request->balcony == 'on' ? 1 : null),

            'password' => '1234567801',

            'etc1' => $request->kind_type == 'sell' ? 1 : null,
            'etc3' => $request->kind_type == 'rent' ? 1 : null

        ]);
        return redirect('moshaver/listusers');

    }

    public function editfile_get($fileid){
        $file = File::find($fileid);
        $users = User::where('level','1')->where('userid_inter',Auth::user()->id)->get();
        return view('moshaver.editfile',compact(['file','users']));
    }
    public function listusers(){
        $users = User::where('userid_inter',Auth::user()->id)
        ->where('level','1')
        ->where('archived', null)
        ->get();
        return view('moshaver.listusers',compact('users'));
    }

    public function archived_users(){
        $users = User::where('userid_inter',Auth::user()->id)
        ->where('level','1')
        ->where('archived', 1)
        ->get();
        return view('moshaver.archived_users',compact('users'));
    }

    public function manage_files(){
        $files_yes_publish = File::where('archived', null)->where('userid_moshaver',Auth::user()->id)
        ->orderBy('updated_at')->get();
        return view('moshaver.manage_files',compact('files_yes_publish'));
    }


    public function search_files(){

        return view('moshaver.search_files');
    }

    
   
    public function taavon_get(){
        $taavons = Taavon::where('taavon_id',Auth::user()->id)
        ->orWhere('moshaver_id',Auth::user()->id)
        ->get();
        return view('moshaver.taavon_get',compact('taavons'));
    }
  
    
    public function show_user_get($id){
        $user = User::find($id);

        if($user->kind_type == "sell"){
            $result = File::where('type',$user->type)
                ->where('kind_type','sell')
                ->whereBetween(DB::raw('price * area'),[($user->price)*0.8,($user->price)*1.4])
                ->get();
        }else{
            $result = File::where('type',$user->type)
                ->where('kind_type','rent')
                ->whereBetween('rent_annual',[($user->rent_annual)*0.6,($user->rent_annual)*1.6])
                ->whereBetween('rent_month',[($user->rent_month)*0.6,($user->rent_month)*1.4])
                ->get();
        }
        
        return view('moshaver.show_user',compact(['user','result']));
    }

    public function fileinfo_get($id){
        $file = File::find($id);

        if($file->kind_type == "sell"){
            $result = User::where('type',$file->type)
                ->where('kind_type','sell')
                ->whereBetween('price',[($file->price)*($file->area)*0.8,($file->price)*($file->area)*1.4])->get();
        }else{
            $result = User::where('type',$file->type)
                ->where('kind_type','rent')
                ->whereBetween('rent_annual',[($file->rent_annual)*0.6,($file->rent_annual)*1.6])
                ->whereBetween('rent_month',[($file->rent_month)*0.6,($file->rent_month)*1.4])
                ->get();
        }
        return view('moshaver.fileinfo',compact(['file','result']));
    }

    public function client_to_file_get($moshaver_id,$client_id,$file_id){
        
        $moshaver = User::find($moshaver_id);
        $client = User::find($client_id);
        $file = File::find($file_id);

        return view('moshaver.client_to_file_get',compact(['moshaver','client','file']));
    }

    public function file_to_client_get($moshaver_id,$client_id,$file_id){
        $moshaver = User::find($moshaver_id);
        $client = User::find($client_id);
        $file = File::find($file_id);

        return view('moshaver.file_to_client_get',compact(['moshaver','client','file']));
    }


    public function client_to_file_get_taavon($moshaver_id,$taavon_moshaver_id,$client_id,$file_id){
        
        $taavon_moshaver = User::find($taavon_moshaver_id);
        $moshaver = User::find($moshaver_id);
        $client = User::find($client_id);
        $file = File::find($file_id);

        return view('moshaver.client_to_file_get_taavon',compact(['taavon_moshaver','moshaver','client','file']));

    }


    public function file_to_client_get_taavon($moshaver_id,$taavon_moshaver_id,$client_id,$file_id){
        
        $taavon_moshaver = User::find($taavon_moshaver_id);
        $moshaver = User::find($moshaver_id);
        $client = User::find($client_id);
        $file = File::find($file_id);

        return view('moshaver.file_to_client_get_taavon',compact(['taavon_moshaver','moshaver','client','file']));

    }
    

    public function client_to_file_start($moshaver_id,$client_id,$file_id){

        Work::create([
            'moshaver_id' => $moshaver_id,
            'client_id' => $client_id,
            'file_id' => $file_id,
            'type' => 0,
        ]);

        return redirect('/');
    }

    public function file_to_client_start($moshaver_id,$client_id,$file_id){
        $work = Work::where('moshaver_id', $moshaver_id)
                ->where('client_id' , $client_id,)
                ->where('file_id', $file_id)->first();
        if($work){
            return back();
        }
        Work::create([
            'moshaver_id' => $moshaver_id,
            'client_id' => $client_id,
            'file_id' => $file_id,
            'type' => 1,
        ]);

        return redirect('/moshaver/work_flow_file/'.$file_id);
    }
    public function taavon_request_user_file($moshaver_id,$userid_taavon,$client_id,$file_id){
        
        if(Taavon::where('moshaver_id',$moshaver_id)->where('taavon_id',$userid_taavon)
        ->where('client_id',$client_id)->where('file_id',$file_id)->count() > 0){
            return back();  
        }
        
        Taavon::create([
            'kind' => 0,
            'moshaver_id' => $moshaver_id,
            'client_id' => $client_id,
            'file_id' => $file_id,
            'taavon_id' => $userid_taavon,
            'verify' => 0,
            'etc1' => $userid_taavon,

        ]);

        return back();
    }

    public function taavon_request_file_user($moshaver_id,$userid_taavon,$client_id,$file_id){
        
        if(Taavon::where('moshaver_id',$moshaver_id)->where('taavon_id',$userid_taavon)
        ->where('client_id',$client_id)->where('file_id',$file_id)->count() > 0){
            return back();  
        }
        
        Taavon::create([
            'kind' => 1,
            'moshaver_id' => $moshaver_id,
            'client_id' => $client_id,
            'file_id' => $file_id,
            'taavon_id' => $userid_taavon,
            'verify' => 0,

        ]);

        return back();
    }

    public function client_to_file_start_taavon($moshaver_id,$userid_taavon,$client_id,$file_id){
        Work::create([
            'type' => 0,
            'moshaver_id' => $moshaver_id,
            'client_id' => $client_id,
            'taavon_id' =>$userid_taavon,
            'file_id' => $file_id,
        ]);
        return redirect('/');
    }

    public function file_to_client_start_taavon($moshaver_id,$userid_taavon,$client_id,$file_id){
        Work::create([
            'type' => 1,
            'moshaver_id' => $moshaver_id,
            'client_id' => $client_id,
            'taavon_id' =>$userid_taavon,
            'file_id' => $file_id,
        ]);
        return redirect('/');
    }
    
    public function verfiy_taavon($taavon_id,$status){
        Taavon::find($taavon_id)->update([
            'verify' => $status
        ]);

        return back();
    }

    public function action(){
        $action = Action::all();
        return view('moshaver.action.action',compact('action'));
    }

    public function work_flow_file($file_id){
        $works = Work::where('file_id',$file_id)->where('moshaver_id',Auth::user()->id)
        ->where('type',1)->get();
        return view("moshaver.work_flow_file",compact(['works','file_id']));
    }

    public function work_flow_user($user_id){
        $works = Work::where('client_id',$user_id)->where('moshaver_id',Auth::user()->id)
        ->where('type',0)->get();
        return view("moshaver.work_flow_user",compact(['works','user_id']));
    }

    public function work_flow_file_item(Request $request){

        $item = ["like" => $request->like , "desc" => $request->desc , "timer" => $request->timer];
        
        if($request->like == "0"){
            Work::find($request->workid)->update([
                "etc1" => 0,
                "etc2" => $item,
                "etc3" => $request->step
            ]);
            return back();
        }


        if($request->step == 1){
            Work::find($request->workid)->update([
                "showfile" => json_encode($item),
                "etc1" => 2
            ]);
        }elseif($request->step == 2){
            Work::find($request->workid)->update([
                "gotofile" => json_encode($item),
                "etc1" => 3
            ]);
        }elseif($request->step == 3){
            Work::find($request->workid)->update([
                "meeting" => json_encode($item),
                "etc1" => 4
            ]);
        }elseif($request->step == 4){

            $picture = [];
                if(strlen(json_encode($request->picture)) > 5){
                    foreach($request->picture as $doc){
                        $name = Auth::user()->id . '_' . rand(1,99999).'.'.$doc->getClientOriginalExtension();
                        $destinationPath = public_path('/contract/');
                        $doc->move($destinationPath, $name);
                        $file_item = '/contract/' . $name ; 
                        array_push($picture,$file_item);
                    }
                }
            
            Work::find($request->workid)->update([
                "contruct" => json_encode($item),
                "etc1" => 5,
                "picture" => json_encode($picture)
            ]);
        }
        
        return back();

    }
    function convertpe($string) {
        $persian = ['۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹'];
    
        $num = range(0, 9);
        $convertedPersianNums = str_replace($persian, $num, $string);
    
        return $convertedPersianNums;
    }

    public function reminder_visitfile(Request $request){
        $time = $request->timer;
        $time = explode('/',$time);
        $time = \Morilog\Jalali\CalendarUtils::toGregorian($this->convertpe($time[0]), $this->convertpe($time[1]), $this->convertpe($time[2]));
        $hour = $request->hour;
        $hour = explode(':',$hour);
        if($time[1] < 10){$time[1] = '0' . $time[1];}
        if($time[2] < 10){$time[2] = '0' . $time[2];}
        $time = $time[0] .'-'. $time[1] .'-'. $time[2] .'T'. $this->convertpe($hour[0]) .':'. $this->convertpe($hour[1]) .':00' ;
        Action::create([
            'moshaver_id' => Auth::user()->id,
            'kind' => 1,
            'file_id' => $request->file_id,
            'client_id' => $request->client_id,
            'date' => $time,
            'text' => $request->desc
        ]);
        return back();
    }

    public function reminder_session(Request $request){
        $time = $request->timer;
        $time = explode('/',$time);
        $time = \Morilog\Jalali\CalendarUtils::toGregorian($this->convertpe($time[0]), $this->convertpe($time[1]), $this->convertpe($time[2]));
        $hour = $request->hour;
        $hour = explode(':',$hour);
        if($time[1] < 10){$time[1] = '0' . $time[1];}
        if($time[2] < 10){$time[2] = '0' . $time[2];}
        $time = $time[0] .'-'. $time[1] .'-'. $time[2] .'T'. $this->convertpe($hour[0]) .':'. $this->convertpe($hour[1]) .':00' ;
        
        Action::create([
            'moshaver_id' => Auth::user()->id,
            'kind' => 2,
            'file_id' => $request->file_id,
            'client_id' => $request->client_id,
            'date' => $time,
            'text' => $request->desc
        ]);
        return back();
    }
    
    public function reminder_assets(Request $request){
        $time = $request->timer;
        $time = explode('/',$time);
        $time = \Morilog\Jalali\CalendarUtils::toGregorian($this->convertpe($time[0]), $this->convertpe($time[1]), $this->convertpe($time[2]));
        $hour = $request->hour;
        $hour = explode(':',$hour);
        if($time[1] < 10){$time[1] = '0' . $time[1];}
        if($time[2] < 10){$time[2] = '0' . $time[2];}
        $time = $time[0] .'-'. $time[1] .'-'. $time[2] .'T'. $this->convertpe($hour[0]) .':'. $this->convertpe($hour[1]) .':00' ;
        
        Action::create([
            'moshaver_id' => Auth::user()->id,
            'kind' => 3,
            'file_id' => $request->file_id,
            'date' => $time,
            'text' => $request->desc
        ]);
        return back();
    }

    public function reminder_call(Request $request){
        $time = $request->timer;
        $time = explode('/',$time);
        $time = \Morilog\Jalali\CalendarUtils::toGregorian($this->convertpe($time[0]), $this->convertpe($time[1]), $this->convertpe($time[2]));
        $hour = $request->hour;
        $hour = explode(':',$hour);
        if($time[1] < 10){$time[1] = '0' . $time[1];}
        if($time[2] < 10){$time[2] = '0' . $time[2];}
        $time = $time[0] .'-'. $time[1] .'-'. $time[2] .'T'. $this->convertpe($hour[0]) .':'. $this->convertpe($hour[1]) .':00' ;
        
        Action::create([
            'moshaver_id' => Auth::user()->id,
            'kind' => 4,
            'client_id' => $request->client_id,
            'date' => $time,
            'text' => $request->desc
        ]);
        return back();
    }

    public function reminder_etc(Request $request){
        $time = $request->timer;
        $time = explode('/',$time);
        $time = \Morilog\Jalali\CalendarUtils::toGregorian($this->convertpe($time[0]), $this->convertpe($time[1]), $this->convertpe($time[2]));
        $hour = $request->hour;
        $hour = explode(':',$hour);
        if($time[1] < 10){$time[1] = '0' . $time[1];}
        if($time[2] < 10){$time[2] = '0' . $time[2];}
        $time = $time[0] .'-'. $time[1] .'-'. $time[2] .'T'. $this->convertpe($hour[0]) .':'. $this->convertpe($hour[1]) .':00' ;
        
        Action::create([
            'moshaver_id' => Auth::user()->id,
            'kind' => 5,
            'file_id' => $request->file_id,
            'client_id' => $request->client_id,
            'date' => $time,
            'text' => $request->desc,
            'title' => $request->title
            
        ]);
        return back();
    }

    public function phonebook(){
        $users = User::where('userid_inter',Auth::user()->id)->get();
        return view('moshaver.phonebook',compact('users'));
    }

    public function phonebook_post(Request $request){
        
        $exist = User::where('phone',$request->phone)->first();

        if(!$exist){
            User::create([
                'name' => $request->name,
                'phone' => $request->phone,
                'userid_inter' => Auth::user()->id,
                'password' => '1234567801',
                'etc1' => $request->kind == 1 ? '1' : null,
                'etc2' => $request->kind == 2 ? '1' : null,
                'etc3' => $request->kind == 3 ? '1' : null,
                'etc4' => $request->kind == 4 ? '1' : null,
                'kind_type' => $request->kind < 3 ? 'sell' : 'rent' 
            ]);
        }else{
            User::where('phone',$request->phone)->update([
                'etc1' => (($exist->etc1 == null && $request->kind == 1) ? '1' : $exist->etc1),
                'etc2' => (($exist->etc2 == null && $request->kind == 2) ? '1' : $exist->etc2),
                'etc3' => (($exist->etc3 == null && $request->kind == 3) ? '1' : $exist->etc3),
                'etc4' => (($exist->etc4 == null && $request->kind == 4) ? '1' : $exist->etc4),

            ]);
        }

        return back();
    }
    
    public function uploadfilesimg(Request $request,$file_id){
        
        $allimage = [];
        if ($request->hasFile('files')) {
            $image = $request->file('files')[0];
            $name = time().'-'. rand(100,10000) .'-'. $request->name .'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/projectsfiles');
            $image->move($destinationPath, $name);   
            $img = '/projectsfiles/' . $name; 
        }
        $images = File::find($file_id)->images;
        $images = json_decode($images);

        if($images){
            foreach($images as $i){
                array_push($allimage,$i);
            }
        }

        array_push($allimage,$img);

        File::find($file_id)->update([
            'images' => json_encode($allimage)
        ]); 
        File::find($file_id)->update([
            'thumbnail' => $allimage[0]
        ]);
    }

    public function getshowuser_id($id){
        return User::find($id);
    }

    public function getshowfile_id($id){
        return File::find($id);
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

    public function calling_client($userid_client){
        Report::create([
            'user_id' => $userid_client,
            'moshaver_id' => Auth::user()->id,  
            'type' => 'call-user'
        ]);
    }

    public function calling_file($id_file){
        $userid_client = File::find($id_file)->userid_file;
        Report::create([
            'user_id' => $userid_client,
            'file_id' => $id_file,
            'moshaver_id' => Auth::user()->id,  
            'type' => 'call-file'
        ]);
    }

    public function get_detail_action($action_id){
        
        $action = Action::find($action_id);
        $client = User::find($action->client_id);
        $file = File::find($action->file_id);

        return ['action'=> $action, 'client' => $client, 'file' => $file];

    }

    public function file_talighat($file_id){
        $file = File::find($file_id);
        return view('moshaver.file_talighat',compact('file'));
    }
    
    public function tablisht_data(Request $request){
        Tablighat::create([
            'user_id' => Auth::user()->id,
            'file_id' => $request->file_id,
            'images' => $request->images,
            'ad_text' => $request->ad_text,
            'type' => 'instagram'

        ]);

        return redirect('/moshaver/fileinfo/'.$request->file_id);
    }

    public function tablighat_sms($file_id){
        $file = File::find($file_id);
        return view('moshaver.tablighat_sms',compact('file'));
    }

    public function tablishtsms_data(Request $request){

        Tablighat::create([
            'user_id' => Auth::user()->id,
            'file_id' => $request->file_id,
            'ad_text' => $request->ad_text,
            'type' => 'sms'

        ]);

        return redirect('/moshaver/fileinfo/'.$request->file_id);
    }

    public function tablighat_ds($file_id){
        $file = File::find($file_id);
        return view('moshaver.tablighat_ds',compact('file'));
    }

    public function tablighat_ds_data(Request $request){

        Tablighat::create([
            'user_id' => Auth::user()->id,
            'file_id' => $request->file_id,
            'ad_text' => $request->ad_text,
            'images' => $request->images,
            'type' => 'ds'

        ]);

        return redirect('/moshaver/fileinfo/'.$request->file_id);
    }


    public function archived_file_selected(Request $request){
        File::find($request->archive_desc_file_id)->update([
            'archived_desc' => $request->archive_desc,
            'archived' => 1
        ]);
        return redirect('/moshaver/manage_files');
    }

    public function archived_user_selected(Request $request){
        User::find($request->archive_desc_user_id)->update([
            'archived_desc' => $request->archive_user_desc,
            'archived' => 1
        ]);
        return redirect('/moshaver/listusers');
    }

    public function pinfile($file_id){
        $pin = File::find($file_id)->pin;
        File::find($file_id)->update([
            'pin' => $pin == 1 ? null : 1
        ]);
        return back();
    }

    public function add_role(Request $request){
        
        User::where('userid',$request->user_id)->update([

        ]);
    }

    public function pin_user($user_id,$pin){
        User::find($user_id)->update([
            'pin' => $pin
        ]);
        return back();
    }
    
    public function archived_files(){
        $files_archived = File::where('archived', 1)->where('userid_moshaver',Auth::user()->id)
        ->orderBy('updated_at')->get();
        return view('moshaver.archived_files',compact('files_archived'));
    }
}
