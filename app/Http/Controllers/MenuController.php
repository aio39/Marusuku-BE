<?php

namespace App\Http\Controllers;

use App\Helper\Helpers;
use App\Http\Resources\MenuCollection;
use App\Http\Resources\MenuResource;
use App\Models\Menu;
use App\Models\Shop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use function App\Helper\applyDefaultFSW;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
//        $per = $request->per;
        $query = Menu::query();

        $query = applyDefaultFSW($request,$query);

        if($request->vanish === 'all'){ // 모든 상품
//            $query->where('vanish','!=',1);
        } elseif ($request->vanish === 'only'){ // 판매 중지된 상품만
            $query->where('vanish','=',1);
        } else{ // 판매중인 상품만
            $query->where('vanish','!=',1);
        }

//        TODO  groupby + 조인으로 메뉴별 평점 구하기

        return  new MenuCollection($query->paginate($request->get('per_page') ?: 50));

    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $shop_id = $request->shop_id;

        // NOTE 복합 유니크 검증
        $validatedData = $request->validate([
            'name' =>  ['required','max:255',
                Rule::unique('menus', 'name')->where(function ($query) use ($shop_id) {
                    return $query->where('shop_id', $shop_id);
                })
            ],
            'price' => 'required',
        ]);
        $shop = Shop::query()->find($shop_id);
        Gate::authorize('shop-owner', $shop);


        $path = $request->file('image')->store('menu', 's3');

        $requestData = $request->except('image');
        $requestData['img'] = $path;

        $menu = $shop->menus()->create($requestData);

//        Storage::disk('s3')->put('avatars/1', $request->file('image'));

//        $exists = Storage::disk('s3')->url('file.jpg');

        return  response()->json($menu,201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function show(Menu $menu)
    {
        return response()->json($menu);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Menu $menu)
    {
        // 이거 변경식 결제 비용 등등 어떻게 하지 ?
        // show 옵션 필요.

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function destroy($shop_id,Menu $menu)
    {
        $menu->vanish = true;
        $menu->vanish_at = now();
        $menu->save();

        return response()->json($menu);
    }
}
