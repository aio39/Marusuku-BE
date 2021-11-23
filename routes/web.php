<?php

use Illuminate\Support\Facades\Route;


//Route::any('{all}', function () {
//    return view('index');
//})->where('all', '^(?!storage).+');

//Route::get('{all}', function () {
//    return view('index');
//})->where(['all'=>'.*']);


Route::get('/broadcast',function (){
    broadcast(new \App\Events\Hello());
//    return "true";
});
