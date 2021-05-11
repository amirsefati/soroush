<?php

namespace App\Http\Controllers;

use App\Models\Action;
use App\Models\File;
use App\Models\Taavon;
use App\Models\User;
use App\Models\Work;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Moshaver extends Controller
{
    public function index(){
        $works = Work::where('moshaver_id',Auth::user()->id)->get();    
        return view('moshaver.index',compact('works'));
    }

  

    public function addfile_get(){
        $users = User::where('level','1')->where('userid_inter',Auth::user()->id)->get();
        return view('moshaver.addfile_get',compact('users'));
    }

    public function addfile_post(Request $request){
        
        $images = '';
        $videos = '';

        $thumbnail = '';
        if ($request->hasFile('thumbnail')) {
            $image = $request->file('thumbnail');
            $name = time().'-'. rand(100,10000) .'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/projectsfiles');
            $image->move($destinationPath, $name);   
            $thumbnail = '/projectsfiles/' . $name; 
        }

        if($request->publish == 'on'){
            $publish = 1;
        }else{
            $publish = 0;
        }

        File::create([
            'type' => $request->type,
            'kind_type' => $request->kind_type,
            'userid_moshaver' => $request->userid_moshaver,
            'userid_file' => $request->userid_file,
            'area' => $request->area,
            'age' => $request->age,
            'price' => $request->price,
            'rent_annual' => $request->rent_annual,
            'rent_month' => $request->rent_month,
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
            'thumbnail' => $thumbnail,
            'images' => $images,
            'videos' => $videos,
            'publish' => $publish,

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
        return redirect('moshaver/manage_files');
    }

    public function editfile_post(Request $request){

        $images = '';
        $videos = '';

        $thumbnail = File::find($request->fileid)->thumbnail;
        if ($request->hasFile('thumbnail')) {
            $image = $request->file('thumbnail');
            $name = time().'-'. rand(100,10000) .'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/projectsfiles');
            $image->move($destinationPath, $name);   
            $thumbnail = '/projectsfiles/' . $name; 
        }

        if($request->publish == 'on'){
            $publish = 1;
        }else{
            $publish = 0;
        }

        File::where('id',$request->fileid)->update([
            'type' => $request->type,
            'kind_type' => $request->kind_type,
            'userid_moshaver' => $request->userid_moshaver,
            'userid_file' => $request->userid_file,
            'area' => $request->area,
            'age' => $request->age,
            'price' => $request->price,
            'rent_annual' => $request->rent_annual,
            'rent_month' => $request->rent_month,
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
            'thumbnail' => $thumbnail,
            'images' => $images,
            'videos' => $videos,
            'publish' => $publish,

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
        
            return redirect('moshaver/manage_files');

    }

    public function adduser_digest(Request $request){
        $request->validate([
            'name' => 'required',
            'phone' => 'required|unique:users'
        ]);
        
        User::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'kind_type' => 'sell',
            'userid_inter' => Auth::user()->id,
            'password' => '1234567801'
        ]);

        return back();
    }

   

    public function adduser(){
        return view('moshaver.adduser');
    }

    public function adduser_post(Request $request){

        $all_images = [];
        if(strlen($request->documnts) > 5){
            foreach($request->documnts as $doc){
                $name = rand(10000,99999).'.'.$doc->getClientOriginalExtension();
                $destinationPath = public_path('/userdocs/');
                $doc->move($destinationPath, $name);
                $file_item = '/userdocs/' . $name ; 
                array_push($all_images,$file_item);
            }
        }
        
        User::create([
            'userid_inter' => $request->userid_inter,
            'name' => $request->name,
            'phone' => $request->phone,
            'price' => $request->price,
            'rent_annual' => $request->rent_annual,
            'rent_month' => $request->rent_month,
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
            'work' => json_encode($request->work),
            'likes' => json_encode($request->likes),

            'elevator' =>  ($request->elevator == 'on' ? 1 : null),
            'depot'    =>  (   $request->depot == 'on' ? 1 : null),
            'parking'  =>  ( $request->parking == 'on' ? 1 : null),
            'balcony'  =>  ( $request->balcony == 'on' ? 1 : null),

            'password' => '1234567801'

        ]);
        return redirect('moshaver/listusers');

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
            'phone' => $request->phone,
            'price' => $request->price,
            'rent_annual' => $request->rent_annual,
            'rent_month' => $request->rent_month,
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
            'work' => json_encode($request->work),
            'likes' => json_encode($request->likes),

            'elevator' =>  ($request->elevator == 'on' ? 1 : null),
            'depot'    =>  (   $request->depot == 'on' ? 1 : null),
            'parking'  =>  ( $request->parking == 'on' ? 1 : null),
            'balcony'  =>  ( $request->balcony == 'on' ? 1 : null),

            'password' => '1234567801'

        ]);
        return redirect('moshaver/listusers');

    }

    public function editfile_get($fileid){
        $file = File::find($fileid);
        $users = User::where('level','1')->get();
        return view('moshaver.editfile',compact(['file','users']));
    }
    public function listusers(){
        $users = User::where('userid_inter',Auth::user()->id)
        ->where('level','1')
        ->get();
        return view('moshaver.listusers',compact('users'));
    }

    public function manage_files(){
        $files_yes_publish = File::where('userid_moshaver',Auth::user()->id)
        ->orderBy('etc1','DESC')->orderBy('updated_at')->get();
        return view('moshaver.manage_files',compact('files_yes_publish'));
    }


    public function search_files(){

        return view('moshaver.search_files');
    }

    public function addpin($id){
        File::find($id)->update(['etc1'=>'1']);
        return back();
    }
    public function delpin($id){
        File::find($id)->update(['etc1'=>'0']);
        return back();
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
                ->whereBetween('price',[($user->price)*0.8,($user->price)*1.4])->get();
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
                ->whereBetween('price',[($file->price)*0.8,($file->price)*1.4])->get();
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
        Work::create([
            'moshaver_id' => $moshaver_id,
            'client_id' => $client_id,
            'file_id' => $file_id,
            'type' => 1,
        ]);

        return redirect('/');
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


    public function reminder_visitfile(Request $request){
        Action::create([
            'moshaver_id' => Auth::user()->id,
            'kind' => 1,
            'file_id' => $request->file_id,
            'client_id' => $request->client_id,
            'date' => $request->timer . '-' .$request->hour,
            'text' => $request->desc
        ]);
        return back();
    }

    public function reminder_session(Request $request){
        Action::create([
            'moshaver_id' => Auth::user()->id,
            'kind' => 2,
            'file_id' => $request->file_id,
            'client_id' => $request->client_id,
            'date' => $request->timer . '-' .$request->hour,
            'text' => $request->desc
        ]);
        return back();
    }
    
    public function reminder_assets(Request $request){
        Action::create([
            'moshaver_id' => Auth::user()->id,
            'kind' => 3,
            'file_id' => $request->file_id,
            'date' => $request->timer . '-' .$request->hour,
            'text' => $request->desc
        ]);
        return back();
    }

    public function reminder_call(Request $request){
        Action::create([
            'moshaver_id' => Auth::user()->id,
            'kind' => 4,
            'client_id' => $request->client_id,
            'date' => $request->timer . '-' .$request->hour,
            'text' => $request->desc
        ]);
        return back();
    }

    public function reminder_etc(Request $request){
        Action::create([
            'moshaver_id' => Auth::user()->id,
            'kind' => 5,
            'file_id' => $request->file_id,
            'client_id' => $request->client_id,
            'date' => $request->timer . '-' .$request->hour,
            'text' => $request->desc,
            'title' => $request->title
            
        ]);
        return back();
    }


    
}
