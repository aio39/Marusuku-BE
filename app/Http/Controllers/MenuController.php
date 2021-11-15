<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Shop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Shop $shop)
    {
        $per = $request->per;
        return $shop->menus()->where('vanish','!=',1)  ->paginate($per ?? 50);
    }

    ## todo vanish true query

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Shop $shop)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
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
