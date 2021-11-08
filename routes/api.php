<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Http;
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

Route::post('/login','LoginController@login');
Route::post('/logout','LoginController@logout');


Route::resource('/places','PlaceController' );

Route::get('/geocode',function (Request $request){
    if($request->query('address') == null){
        return response()->json(["message"=>"address not exist"],500);
    }

    $response = Http::withoutVerifying()->get('https://maps.googleapis.com/maps/api/geocode/json', [
        'address' => $request->query('address'),
        'lang'=>'ko',
        'key'=>env('GOOGLE_API')
    ]);
    $result = $response->json();
    if ($result['status'] == "OK"){
        return $result['results'][0]['geometry']['location'];
    } else {
       return response()->json([],500);
    }
});


Route::group(['middleware'=>'auth:sanctum'],function(){
//    Route::get('/user', function (Request $request) {return $request->user();});
    Route::apiResource('/user','UserController');
    Route::post('/user/register/{user}','UserController@register');
});

Route::post('/user',function(Request $request){
    $data = $request->all();
    $data['password'] = \Hash::make($request->password);

    $user = User::create($data);
    return $user
        ? response()->json($user,201)
        : response()->json([],500);
});

Route::any('/test',function (Request  $request){
//    dd(Storage::get('places.csv'));
//    dd(file('../storage/app/places.csv'));
    $csv = array_map('str_getcsv', file('../storage/app/places.csv'));
    dd($csv);
});
