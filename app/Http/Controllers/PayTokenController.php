<?php

namespace App\Http\Controllers;

use App\Models\PayToken;
use App\Models\Subscribe;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use function App\Helper\applyDefaultFSW;

class PayTokenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = PayToken::query();
//        $query->with(['shop','menu']);
        if($request->has('start')){
           $query->whereBetween('created_at',[$request->start,$request->end]);
        }

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
        # 현재 로그인한 유저가 실재로 구독중인지 확인
        # 구독은 기간이 남아야함.
        $subscribe =  Subscribe::query()->where('user_id','=',Auth::id())->whereDate('end_date','>',Carbon::now()->toDateTimeString())->findOrFail($request->subscribe_id);

        $payToken = new PayToken();
        $payToken->uuid = Str::uuid();
        $payToken->user_id = $subscribe->user_id;
        $payToken->menu_id = $subscribe->menu_id;
        $payToken->shop_id = $subscribe->shop_id;
        $payToken->subscribe_id = $subscribe->id;
        $payToken->saveOrFail();

        return  $payToken->refresh();

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PayToken  $payToken
     * @return \Illuminate\Http\Response
     */
    public function show(PayToken $payToken)
    {



    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PayToken  $payToken
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PayToken $payToken)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PayToken  $payToken
     * @return \Illuminate\Http\Response
     */
    public function destroy(PayToken $payToken)
    {
        //
    }
}
