<?php

use App\Http\Controllers\Manager;
use App\Http\Controllers\Monshi;
use App\Http\Controllers\Moshaver;
use App\Http\Controllers\Page;
use Illuminate\Support\Facades\Route;




//Firstpage Router
Route::get('/', [Page::class,'index']);
Route::post('/login', [Page::class,'login']);
Route::get('/logoutpanel', [Page::class,'logoutpanel']);



// Moshaver Router
Route::prefix('moshaver')->group(function(){

    Route::get('/',[Moshaver::class,'index']);
    Route::get('addfilelist',[Moshaver::class,'addfilelist']);
    Route::get('addfile_get',[Moshaver::class,'addfile_get']);
    Route::post('addfile_post',[Moshaver::class,'addfile_post']);
    Route::post('adduser_digest',[Moshaver::class,'adduser_digest']);
    Route::post('editfile_post',[Moshaver::class,'editfile_post']);

    Route::get('adduser',[Moshaver::class,'adduser']);
    Route::post('adduser_post',[Moshaver::class,'adduser_post']);
    Route::get('editfile/{fileid}',[Moshaver::class,'editfile_get']);
    Route::get('fileinfo/{fileid}',[Moshaver::class,'fileinfo_get']);

    
    
    Route::get('manage_files',[Moshaver::class,'manage_files']);

    
    Route::get('listusers',[Moshaver::class,'listusers']);
    Route::get('edituser/{userid}',[Moshaver::class,'edituser_get']);
    Route::post('edituser_post',[Moshaver::class,'edituser_post']);
    Route::get('show_user/{userid}',[Moshaver::class,'show_user_get']);

    
    
    Route::get('search_files',[Moshaver::class,'search_files']);

    Route::get('/addpin/{id}',[Moshaver::class,'addpin']);
    Route::get('/delpin/{id}',[Moshaver::class,'delpin']);

    Route::get('file_find_user/{id}',[Moshaver::class,'file_find_user']);

    Route::get('user_find_file/{id}',[Moshaver::class,'user_find_file']);



    Route::get('taavon',[Moshaver::class,'taavon_get']);

    Route::get('client_to_file_get/{moshaver_id}/{client_id}/{file_id}',[Moshaver::class,'client_to_file_get']);

    Route::get('taavon_moshaver_id/client_to_file_get/{moshaver_id}/{taavon_moshaver_id}/{client_id}/{file_id}',[Moshaver::class,'client_to_file_get_taavon']);


    Route::get('client_to_file_start/{moshaver_id}/{client_id}/{file_id}',[Moshaver::class,'client_to_file_start']);

    
    Route::get('taavon/user_file/{moshaver_id}/{userid_taavon}/{client_id}/{file_id}',[Moshaver::class,'taavon_request']);

    Route::get('verfiy_taavon/{taavon_id}/{status}',[Moshaver::class,'verfiy_taavon']);

    

    //action

    Route::get('/action',[Moshaver::class,'action']);
});


//Monshi Router
Route::prefix('monshi')->group(function(){

    Route::get('/',[Monshi::class,'index']);
    
});


//Manager Router
Route::prefix('manager')->group(function(){

    Route::get('/',[Manager::class,'index']);
    
});