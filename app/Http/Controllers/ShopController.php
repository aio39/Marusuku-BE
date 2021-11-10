<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use Illuminate\Http\Request;
use App\Http\Requests\ShopRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ShopController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:checkUser,task')->only([
            'update','updateDone','destroy'
        ]);
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function index(Request $request)
    {
//        return Shop::orderByDesc('id')->get();

        $t = $request->t;
        $b = $request->b;
        $r = $request->r;
        $l = $request->l;

//        return Shop::query()->whereRaw("ST_Contains(ST_GeomFromText('Polygon((? ?,? ?,? ?,? ?,? ?))',4326),location)",[$t, $l,$t, $r,$b ,$r,$b, $l,$t, $l])->get();


        $polygon = $t.' '.$l.','.$t.' '. $r.','.$b .' '.$r.','.$b.' '. $l.','.$t.' '. $l;
        $result= Shop::query()->whereRaw("ST_Contains(ST_GeomFromText('Polygon((".$polygon."))',4326),lacation)")->take(20)->get();

        return $result;


    }


    /**
     * @param ShopRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(ShopRequest $request)
    {
//        dd($request->all());
        $request->merge([
            'user_id' =>Auth::id()
        ]);
        $shop = Shop::create($request->all()); // create 이용할려면 Model fillable 설정

        return $shop
            ? response()->json($shop,201)
            : response()->json([],500);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Shop  $shop
     * @return \Illuminate\Http\Response
     */
    public function show(Shop $shop)
    {
        //
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Shop  $shop
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, Shop $shop)
    {
        $shop->name = $request->name;

        return $shop->update()
            ? response()->json($shop)
            : response()->json([],500);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Shop  $shop
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Shop $shop)
    {
        return $shop->delete()
            ? response()->json($shop)
            : response()->json([],500);
    }


    /**
     * @param Shop $shop
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function updateBookmark(Shop $shop, Request $request){
        $shop->bookmark = $request->check;
//        abort(500);
        return $shop->update() ? response()->json($shop) : response()->json([],500);
    }
}
