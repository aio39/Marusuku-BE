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
    public function index(Request $request)
    {
        $query = Shop::query();

        if ($request->t){
            $t = $request->t;
            $b = $request->b;
            $r = $request->r;
            $l = $request->l;

            $polygon = $t.' '.$l.','.$t.' '. $r.','.$b .' '.$r.','.$b.' '. $l.','.$t.' '. $l;
            $query->whereRaw("ST_Contains(ST_GeomFromText('Polygon((".$polygon."))',4326),location)");
        } elseif ($request->distance and  $request->lng and $request->lat){
            $query->leftJoin(  DB::raw('
            (select ST_Distance(
                    ST_SRID(Point('.$request->lng.','.$request->lat.'),4326),
                    ST_SRID(s.location,4326)
                    ) as dis , s.id
                    from shops as s
                    ) as d'), function ($join){
                $join->on('d.id','=','shops.id');
            } );
            $query->where('d.dis','<',$request->distance);
            if(!$request->has('sort')){ // 다른 sort 조건이 없으면 가까운순 기본 적용
                $query->orderBy('d.dis');
            }
        }
        $query = applyDefaultFSW($request,$query);

        return  new ShopCollection($query->paginate($request->get('per_page') ?: 50));
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

        $path = $request->file('image')->store('shop', 's3');

        $requestData = $request->except('image');
        $requestData['img'] = $path;

        $shop = Shop::create($requestData); // create 이용할려면 Model fillable 설정

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
