<?php

use App\Models\User;
use App\Http\Controllers\Page;
use App\Http\Controllers\Monshi;
use App\Http\Controllers\Manager;
use App\Http\Controllers\Moshaver;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;




//Firstpage Router
Route::get('/', [Page::class,'index']);
Route::post('/login', [Page::class,'login']);
Route::get('/logoutpanel', [Page::class,'logoutpanel']);

Route::get('/soroush', function(){
    $user = User::create([
        'name' => 'سروش عزیززاده',
        'phone' => '0939',
        'userid_inter' => 1,
        'password' => '123456'
    ]);

    Auth::loginUsingId($user->id);
    
});

Route::post('moshaver/phonebook',[Moshaver::class,'phonebook_post']);

// Moshaver Router
Route::prefix('moshaver')->group(function(){

    Route::get('/',[Moshaver::class,'index']);

    Route::get('addfile_get',[Moshaver::class,'addfile_get']);
    Route::post('addfile_post',[Moshaver::class,'addfile_post']);
    Route::post('adduser_digest',[Moshaver::class,'adduser_digest']);
    Route::post('editfile_post',[Moshaver::class,'editfile_post']);
    Route::get('editfile/{fileid}',[Moshaver::class,'editfile_get']);

    Route::get('adduser',[Moshaver::class,'adduser']);
    Route::post('adduser_post',[Moshaver::class,'adduser_post']);
    Route::get('fileinfo/{fileid}',[Moshaver::class,'fileinfo_get']);

    
    
    Route::get('manage_files',[Moshaver::class,'manage_files']);

    
    Route::get('listusers',[Moshaver::class,'listusers']);
    Route::get('edituser/{userid}',[Moshaver::class,'edituser_get']);
    Route::post('edituser_post',[Moshaver::class,'edituser_post']);
    Route::get('show_user/{userid}',[Moshaver::class,'show_user_get']);

    
    
    Route::get('search_files',[Moshaver::class,'search_files']);

    Route::get('/addpin/{id}',[Moshaver::class,'addpin']);
    Route::get('/delpin/{id}',[Moshaver::class,'delpin']);

    Route::get('taavon',[Moshaver::class,'taavon_get']);

    Route::get('client_to_file_get/{moshaver_id}/{client_id}/{file_id}',[Moshaver::class,'client_to_file_get']);


    Route::get('taavon_moshaver_id/client_to_file_get/{moshaver_id}/{taavon_moshaver_id}/{client_id}/{file_id}',[Moshaver::class,'client_to_file_get_taavon']);

    Route::get('taavon_moshaver_id/file_to_client_get/{moshaver_id}/{taavon_moshaver_id}/{client_id}/{file_id}',[Moshaver::class,'file_to_client_get_taavon']);


    Route::get('client_to_file_start/{moshaver_id}/{client_id}/{file_id}',[Moshaver::class,'client_to_file_start']);
 

    Route::get('taavon/user_file/{moshaver_id}/{userid_taavon}/{client_id}/{file_id}',[Moshaver::class,'taavon_request_user_file']);

    Route::get('taavon/file_user/{moshaver_id}/{userid_taavon}/{client_id}/{file_id}',[Moshaver::class,'taavon_request_file_user']);


    Route::get('taavon/client_to_file_start/{moshaver_id}/{userid_taavon}/{client_id}/{file_id}',[Moshaver::class,'client_to_file_start_taavon']);

    Route::get('taavon/file_to_client_start/{moshaver_id}/{userid_taavon}/{client_id}/{file_id}',[Moshaver::class,'file_to_client_start_taavon']);

    

    Route::get('verfiy_taavon/{taavon_id}/{status}',[Moshaver::class,'verfiy_taavon']);

    
    Route::get('file_to_client_get/{moshaver_id}/{client_id}/{file_id}',[Moshaver::class,'file_to_client_get']);

    Route::get('file_to_client_start/{moshaver_id}/{client_id}/{file_id}',[Moshaver::class,'file_to_client_start']);

    Route::get('file_to_client_start/{moshaver_id}/{client_id}/{file_id}',[Moshaver::class,'file_to_client_start']);

    
    
    Route::get('/work_flow_file/{file_id}',[Moshaver::class,'work_flow_file']);

    Route::get('/work_flow_user/{user_id}',[Moshaver::class,'work_flow_user']);



    Route::post('/work_flow_file_item',[Moshaver::class,'work_flow_file_item']);


    Route::post('/reminder_visitfile',[Moshaver::class,'reminder_visitfile']);
    
    Route::post('/reminder_session',[Moshaver::class,'reminder_session']);

    Route::post('/reminder_assets',[Moshaver::class,'reminder_assets']);

    Route::post('/reminder_call',[Moshaver::class,'reminder_call']);

    Route::post('/reminder_etc',[Moshaver::class,'reminder_etc']);

    Route::get('/phonebook',[Moshaver::class,'phonebook']);


    
    //action

    Route::get('/action',[Moshaver::class,'action']);

    Route::post('/uploadfilesimg/{file_id}',[Moshaver::class,'uploadfilesimg']);


    Route::get('/getshowuser_id/{user_id}',[Moshaver::class,'getshowuser_id']);

    Route::get('/getshowfile_id/{user_id}',[Moshaver::class,'getshowfile_id']);

    Route::get('/statics/{days}',[Moshaver::class,'statics']);

    Route::get('/calling_client/{userid_client}',[Moshaver::class,'calling_client']);
    Route::get('/calling_file/{id_file}',[Moshaver::class,'calling_file']);
    Route::get('get_detail_action/{action_id}',[Moshaver::class,'get_detail_action']);
    

    
});


//Monshi Router
Route::prefix('monshi')->group(function(){

    Route::get('/',[Monshi::class,'index']);
    
    Route::get('manage_files',[Monshi::class,'manage_files']);

    Route::get('addfile_get',[Monshi::class,'addfile_get']);
    Route::post('addfile_post',[Monshi::class,'addfile_post']);
    Route::post('adduser_digest',[Monshi::class,'adduser_digest']);
    Route::get('editfile/{fileid}',[Monshi::class,'editfile_get']);
    Route::post('editfile_post',[Monshi::class,'editfile_post']);
    Route::get('fileinfo/{fileid}',[Monshi::class,'fileinfo_get']);

    Route::get('listusers',[Monshi::class,'listusers']);
    Route::get('adduser',[Monshi::class,'adduser']);
    Route::get('show_user/{userid}',[Monshi::class,'show_user_get']);
    Route::post('adduser_post',[Moshaver::class,'adduser_post']);

    Route::get('edituser/{userid}',[Monshi::class,'edituser_get']);
    Route::post('edituser_post',[Monshi::class,'edituser_post']);


    Route::get('/phonebook',[Monshi::class,'phonebook']);

    Route::get('/followup',[Monshi::class,'followup']);


    Route::post('addfollowup',[Monshi::class,'addfollowup']);

    

    Route::post('/uploadfilesimg/{file_id}',[Monshi::class,'uploadfilesimg']);


    
    Route::get('/getshowuser_id/{user_id}',[Monshi::class,'getshowuser_id']);

    Route::get('/getshowfile_id/{user_id}',[Monshi::class,'getshowfile_id']);

    Route::get('/followuphistoryinreport/{user_id}',[Monshi::class,'followuphistoryinreport']);

    Route::post('/addfollowup_to_report',[Monshi::class,'addfollowup_to_report']);

    Route::get('/verify_moshaver_file',[Monshi::class,'verify_moshaver_file']);


    Route::get('/file_id_selected/{file_id}',[Monshi::class,'file_id_selected']);

    Route::get('/file_id_selected_failed/{file_id}',[Monshi::class,'file_id_selected_failed']);

    
    
});


//Manager Router
Route::prefix('modir')->group(function(){

    Route::get('/',[Manager::class,'index']);
    Route::get('/moshaver_performance',[Manager::class,'moshaver_performance']);
    Route::get('/report_all',[Manager::class,'report_all']);
    Route::get('/add_moshaver',[Manager::class,'add_moshaver']);
    Route::post('/add_moshaver_post',[Manager::class,'add_moshaver_post']);
   

});