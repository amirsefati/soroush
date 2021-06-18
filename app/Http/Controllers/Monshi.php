<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\File;
use App\Models\User;
use App\Models\Report;
use App\Models\Followup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class Monshi extends Controller
{
    public function index(){
        return view('monshi.dashboard');
    }

    public function manage_files(){
        $files_yes_publish = File::where('userid_moshaver',Auth::user()->id)
        ->orderBy('updated_at')->get();
        return view('monshi.manage_files',compact('files_yes_publish'));
    }

    public function addfile_get(){
        $users = User::where('level','1')->where('userid_inter',Auth::user()->id)->get();
        return view('monshi.addfile_get',compact('users'));
    }

    public function addfile_post(Request $request){

        if($request->publish == 'on'){
            $publish = 1;
        }else{
            $publish = 0;
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
            'wc_number' => $request->wc_number,
            'direction' => $request->direction,
            'depot' => $request->depot,
            'elevator' => $request->elevator,
            'balcony' => $request->balcony,
            'shell' => $request->shell,
            'publish' => 1,
            'verify' => 1,

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

            'etc1' => 1,

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

        return redirect('monshi/editfile/'.$file->id);
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
            'etc5' => $etc5
        ]);
        
        return ["status" => 200,"data" => $newuser];
    }

    public function editfile_get($fileid){
        $file = File::find($fileid);
        $users = User::where('level','1')->where('userid_inter',Auth::user()->id)->get();
        return view('monshi.editfile',compact(['file','users']));
    }
    public function editfile_post(Request $request){


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
            'address' => $request->address,
            'note' => $request->note,
            'name' => $request->name,
            'allfloor' => $request->allfloor,
            'suiteinfloor' => $request->suiteinfloor,
            'allsuite' => $request->allsuite,
            'parking' => $request->parking,
            'wc_number' => $request->wc_number,
            'direction' => $request->direction,
            'depot' => $request->depot,
            'elevator' => $request->elevator,
            'balcony' => $request->balcony,
            'shell' => $request->shell,
           

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
            return redirect('monshi/manage_files');

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


    public function listusers(){
        $users = User::where('userid_inter',Auth::user()->id)
        ->where('level','1')
        ->get();
        return view('monshi.listusers',compact('users'));
    }
    public function adduser(){
        return view('monshi.adduser');
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
        
        return view('monshi.show_user',compact(['user','result']));
    }

    public function edituser_get($userid){
        $user = User::find($userid);
        return view('monshi.edituser',compact('user'));
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

        if($request->kind_type == 'sell'){
            User::find($user->id)->update([
                'etc1' => 1
            ]);
        }else{
            User::find($user->id)->update([
                'etc3' => 1
            ]);
        }

        return redirect('monshi/listusers');
    }

    public function phonebook(){
        $users = User::where('userid_inter',Auth::user()->id)->get();
        return view('monshi.phonebook',compact('users'));
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
        return redirect('monshi/edituser/'.$user->id);

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
        return view('monshi.fileinfo',compact(['file','result']));
    }

    public function followup(){
        $followups = Followup::where('monshi_id',Auth::user()->id)->get();
        return view('monshi.followup',compact('followups'));
    }

    public function addfollowup(Request $request){
        if(Followup::where('user_id',$request->user_id)->first()){
            return back();
        }
        Followup::create([
            'user_id' => $request->user_id,
            'monshi_id' => Auth::user()->id,
            'desc' => $request->desc,
            'date' => $request->date,
        ]);
        return back();
    }

    public function followuphistoryinreport($id){
        $followup = Report::where('user_id',$id)->where('monshi_id',Auth::user()->id)->get();
        return $followup;
    }

    public function getshowuser_id($id){
        return User::find($id);
    }

    public function getshowfile_id($id){
        return File::find($id);
    }

    public function addfollowup_to_report(Request $request){

        Report::create([
            'user_id' => $request->user_id,
            'desc' => $request->desc,
            'date' => $request->date .'-'. $request->time,
            'monshi_id' => Auth::user()->id,
            'type' => 'followup_monshi'
        ]);
        return back();
    }

    public function verify_moshaver_file(){
        $files = File::where('publish',1)->where('verify',0)->where('etc2','monshi')->get();
        return view('monshi.verify_moshaver_file',compact('files'));
    }

    public function file_id_selected($id){
        File::where('id',$id)->update([
            'verify' => 1
        ]);
        return ['status',200];
    }

    public function file_id_selected_failed($id){
        File::where('id',$id)->update([
            'verify' => -1
        ]);
        return ['status',200];
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
