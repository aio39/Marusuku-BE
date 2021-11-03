<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\User;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('login','LoginController@login');
Route::post('logout','LoginController@logout');


Route::group(['middleware'=>'auth:sanctum'],function(){
//    Route::get('/user', function (Request $request) {return $request->user();});
    Route::post('/user/register/{user}','UserController@register');
    Route::apiResource('user','UserController');
});

Route::post('/user',function(Request $request){
    $data = $request->all();
    $data['password'] = \Hash::make($request->password);

    $user = User::create($data);
    return $user
        ? response()->json($user,201)
        : response()->json([],500);
});
