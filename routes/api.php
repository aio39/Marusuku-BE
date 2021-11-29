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

Route::get('/test',function (){ return 'Hello World';});
Route::post('/login','LoginController@login');
Route::get('/logout','LoginController@logout');


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


//Route::prefix('shops')->group(function (){
//    Route::apiResource('','ShopController')->parameters([''=>'shop']);
//    Route::prefix('{shop}/menus')->group(function (){
//        Route::apiResource('','MenuController' )->parameters([''=>'menu']);
//    });
//});

Route::get('/shops/find','ShopController@find');
Route::apiResource('/shop','ShopController');
Route::apiResource('/menu','MenuController');



Route::prefix('users')->middleware(['auth:sanctum'])->group(function(){
    Route::apiResource('','UserController')->parameters([''=>'user']);
    Route::prefix('{user}/subscribes')->group(function (){
        Route::apiResource('','SubscribeController' )->parameters([''=>'subscribe']);
    });
    Route::prefix('{user}/pay_tokens')->group(function (){
        Route::apiResource('','PayTokenController' )->parameters([''=>'payToken']);
    });
    Route::prefix('{user}/use_histories')->group(function (){
        Route::apiResource('','UseHistoryController' )->parameters([''=>'useHistory']);
    });
});


Route::post('/user',function(Request $request){
    $data = $request->all();
    $data['password'] = \Hash::make($request->password);

    $user = User::create($data);
    return $user
        ? response()->json($user,201)
        : response()->json([],500);
});


