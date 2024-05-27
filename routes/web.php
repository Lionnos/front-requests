<?php

use App\Http\Several\RequestController;
use App\Http\Controllers\CrudController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::controller(CrudController::class)->group(function(){
    Route::post('/data/create','create')->name("create");
    Route::get('/data/getall','getall')->name("getall");
    Route::post('/data/getbyid','getbyid')->name("getbyid");
    Route::put('/data/update','update')->name("update");
    Route::delete('/data/delete','delete')->name("delete");
    Route::delete('/data/delete/{id}','deletebyid')->name("deletebyid");
});


Route::controller(RequestController::class)->group(function(){
    Route::get('/ajax','requestAjax')->name("requestAjax");
    Route::get('/fetch','requestFetch')->name("requestFetch");
});
