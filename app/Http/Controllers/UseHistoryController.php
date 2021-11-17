<?php

namespace App\Http\Controllers;

use App\Models\PayToken;
use App\Models\Shop;
use App\Models\UseHistory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class UseHistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $userId)
    {
        $shop = Shop::query()->findOrFail($request->shop_id);
        # 바코드를 찍는 계정이 실재 가게 계정인지 확인합니다.
        Gate::authorize('shop-owner',$shop);

        $payToken   = PayToken::query()->findOrFail($request->paytoken_id);

        if($payToken->uuid == $request->uuid){
            $useHistory = new UseHistory();
            $useHistory->discount = $request->discount ? $request->discount : 0;
            $useHistory->user_id = $payToken->user_id;
            $useHistory->menu_id = $payToken->menu_id;
            $useHistory->shop_id = $payToken->shop_id;
            $useHistory->saveOrFail();
            return response()->json($useHistory->refresh(),200);
        }
        return response()->json(["message"=>"옳바르지 않는 토큰입니다."],401);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UseHistory  $useHistory
     * @return \Illuminate\Http\Response
     */
    public function show(UseHistory $useHistory)
    {
        //
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\UseHistory  $useHistory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UseHistory $useHistory)
    {
        //
    }

//    /**
//     * Remove the specified resource from storage.
//     *
//     * @param  \App\Models\UseHistory  $useHistory
//     * @return \Illuminate\Http\Response
//     */
//    public function destroy(UseHistory $useHistory)
//    {
//        //
//    }
}
