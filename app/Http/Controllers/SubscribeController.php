<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Subscribe;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use function App\Helper\applyDefaultFSW;

class SubscribeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
//        return Subscribe::query()->with(['shop','menu'])->where('user_id','=',Auth::id())
//            ->when($request->shop_id,function ($query, $shop_id) {
//                return $query->where('shop_id', $shop_id);
//            })->get();

        $query = Subscribe::query();
        $query->with(['shop','menu']);

        $query = applyDefaultFSW($request,$query);

        return  $query->paginate($request->get('per_page') ?: 50);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $menu_id = $request->menu_id;

        $menu = Menu::query()->findOrFail($menu_id);

        $now =Carbon::now();

        $subscibe = new Subscribe;
        $subscibe->user_id = Auth::id();
        $subscibe->menu_id = $menu_id;
        $subscibe->settlement_date = $now->addMonth($menu->cycle_month)->toDateTimeString();
        $subscibe->end_date = $now->addMonth(1)->subMinute(1)->toDateTimeString();
        $subscibe->shop_id = $menu->shop_id;
        $subscibe->saveOrFail();

        return $subscibe;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $subscribe_id)
    {

        $subscribe = Subscribe::with(['shop','menu'])->where('id',"=",$subscribe_id)->firstOrFail();
        return response()->json($subscribe,200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Subscribe  $subscribe)
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
