<?php

namespace App\Http\Controllers;

use App\Http\Resources\MenuCollection;
use App\Http\Resources\ShopCollection;
use App\Models\Shop;
use Illuminate\Http\Request;
use App\Http\Requests\ShopRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use function App\Helper\applyDefaultFSW;

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
    public function find(Request $request)
    {

        // Bounds
        $t = $request->t;
        $b = $request->b;
        $r = $request->r;
        $l = $request->l;

        $polygon = $t.' '.$l.','.$t.' '. $r.','.$b .' '.$r.','.$b.' '. $l.','.$t.' '. $l;

        $take = $request->take;
//        return Shop::query()->whereRaw("ST_Contains(ST_GeomFromText('Polygon((? ?,? ?,? ?,? ?,? ?))',4326),location)",[$t, $l,$t, $r,$b ,$r,$b, $l,$t, $l])->get();

        $result= Shop::query()->whereRaw("ST_Contains(ST_GeomFromText('Polygon((".$polygon."))',4326),location)")->take($take ? $take : 50)->get();

        return $result;
    }


    /**
     * @return \Illuminate\Support\Collection
     */
    public function index(Request $request)
    {
        $query = Shop::query();

        $query = applyDefaultFSW($request,$query);

        return  new ShopCollection($query->paginate($request->get('per_page') ?: 50));

//        $shop= Shop::query()->where('user_id','=',Auth::id())->take(1)->get();
//
//        return $shop
//            ? response()->json($shop[0],201)
//            : response()->json([],500);
//
//        return $result;
    }


    /**
     * @param ShopRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(ShopRequest $request)
    {
        $request->merge([
            'user_id' =>Auth::id()
        ]);
        $shop = Shop::create($request->all()); // create 이용할려면 Model fillable 설정

        return $shop
            ? response()->json($shop,201)
            : response()->json([],500);
    }

    public function show(Shop $shop)
    {
        return response()->json($shop);
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
