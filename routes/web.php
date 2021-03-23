<?php

use App\Http\Controllers\Manager;
use App\Http\Controllers\Monshi;
use App\Http\Controllers\Moshaver;
use App\Http\Controllers\Page;
use Illuminate\Support\Facades\Route;




//Firstpage Router
Route::get('/', [Page::class,'index']);


// Moshaver Router
Route::prefix('moshaver')->group(function(){

    Route::get('/',[Moshaver::class,'index']);
    Route::get('addfilelist',[Moshaver::class,'addfilelist']);
    Route::get('addfile_get',[Moshaver::class,'addfile_get']);
    Route::post('addfile_post',[Moshaver::class,'addfile_post']);

    
    
});


//Monshi Router
Route::prefix('monshi')->group(function(){

    Route::get('/',[Monshi::class,'index']);
    
});


//Manager Router
Route::prefix('manager')->group(function(){

    Route::get('/',[Manager::class,'index']);
    
});