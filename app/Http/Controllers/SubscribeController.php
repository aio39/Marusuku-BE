<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Subscribe;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SubscribeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request,$user_id)
    {
        return Subscribe::query()->with('shops')->where('user_id','=',Auth::id())
            ->when($request->shop_id,function ($query, $shop_id) {
                return $query->where('shop_id', $shop_id);
            })->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,User $user)
    {

        $menu_id = $request->menu_id;

        $menu = Menu::query()->findOrFail($menu_id);
//        $user =  User::find(Auth::id());
//        $user->subscribes()->attach($menu_id,['settlement_times'=> Carbon::now()->addMonth(1),'shop_id'=>$menu->shop_id]);
        if($menu == null){
            return response()->json([],500);
        }
//        dd(Carbon::now()->addMonth(1)->toDateTimeString());

        $subscibe = new Subscribe;
        $subscibe->user_id = Auth::id();
        $subscibe->menu_id = $menu_id;
        $subscibe->settlement_date = Carbon::now()->addMonth(1)->toDateTimeString();
        $subscibe->shop_id = $menu->shop_id;
        $subscibe->save();
        dd($subscibe);
//        Subscribe::query()->create();


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request,$user_id,  $subscribe_id)
    {

        $subscribe = Subscribe::with('shops')->where('id',"=",$subscribe_id)->firstOrFail();
        return response()->json($subscribe,200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $user_id, Subscribe  $subscribe)
    {
       $result =  $subscribe->updateOrFail(['continue',$request->continue]);

       return  response()->json([],200);
    }

//    /**
//     * Remove the specified resource from storage.
//     *
//     * @param  int  $id
//     * @return \Illuminate\Http\Response
//     */
//    public function destroy(Request $request, $id)
//    {
//        //
//    }
}
