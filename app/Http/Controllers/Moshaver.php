<?php

namespace App\Http\Controllers;

use App\Models\File;
use App\Models\User;
use Illuminate\Http\Request;

class Moshaver extends Controller
{
    public function index(){      
        return view('moshaver.master');
    }

    //add file
    public function addfilelist(){
        $files_no_publish = File::where('publish',0)->get();
        return view('moshaver.addfilelist',compact('files_no_publish'));
    }

    public function addfile_get(){
        $users = User::all();
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
        return redirect('moshaver/addfilelist');
    }

    public function adduser_digest(Request $request){
        $request->validate([
            'name' => 'required',
            'phone' => 'required|unique:users'
        ]);
        
        User::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'userid_inter' => 1, //Auth::user()->id,
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
    }

    public function editfile_get($fileid){
        $file = File::find($fileid);
        $users = User::all();
        return view('moshaver.editfile',compact(['file','users']));
    }
    public function listusers(){
        $users = User::where('userid_inter',1)->get();
        return view('moshaver.listusers',compact('users'));
    }
}
