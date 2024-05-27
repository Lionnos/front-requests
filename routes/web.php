<?php

use App\Http\Ajax\AjaxController;
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

    Route::delete('/data/delete/{id}','delete')->name("delete");
});


Route::controller(AjaxController::class)->group(function(){
    Route::get('/ajax','getRequest')->name("ajaxGet");
});
