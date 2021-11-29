<?php

namespace App\Http\Controllers;

use App\Http\Resources\MenuCollection;
use App\Http\Resources\MenuResource;
use App\Models\Menu;
use App\Models\Shop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Shop $shop)
    {
//        $per = $request->per;
        $query = Menu::query();

        if($request->sort){
            $sorts =  explode(',' ,$request->input('sort',''));
            foreach ($sorts as $sortColumn){
                $sortDirection = Str::startsWith($sortColumn,'-') ? 'desc':'asc';
                $sortColumn = ltrim($sortColumn,'-');
                $query->orderBy($sortColumn,$sortDirection);
            }
        }

//        ?filter=category:food,id:2
        $query->when(request()->filled('filter'), function ($query) {
           $filters = explode(',',request('filter'));
           foreach ($filters as $filter){
               [$criteria,$value] = explode(':',$filter);
               $query->where($criteria,$value);
           }
           return $query;
        });

        $query->when(request()->filled('with'), function ($query) {
            $withs = explode(',',request('with'));
            if($withs){
                  $query->with($withs);
            }
            return $query;
        });

        if($request->vanish === 'all'){ // 모든 상품
            $query->where('vanish','!=',1);
        } elseif ($request->vanish === 'only'){ // 판매 중지된 상품만
            $query->where('vanish','=',1);
        } else{ // 판매중인 상품만
            $query->where('vanish','!=',1);
        }


//        return  MenuResource::collection($query->paginate($request->get('per_page') ?: 50));
        return  new MenuCollection($query->paginate($request->get('per_page') ?: 50));

//        return $shop->menus()->where('vanish','!=',1)  ->paginate($per ?? 50);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Shop $shop)
    {
        $shop_id = $shop->id;
        //  복합 유니크 검증
        $validatedData = $request->validate([
            'name' =>  ['required','max:255',
                Rule::unique('menus', 'name')->where(function ($query) use ($shop_id) {
                    return $query->where('shop_id', $shop_id);
                })
            ],
            'price' => 'required',
        ]);

        Gate::authorize('shop-owner', $shop);

        $menu = $shop->menus()->create($request->all());

        return  response()->json($menu,201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function show($shop_id,Menu $menu)
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
