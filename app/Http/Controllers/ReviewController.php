<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\Subscribe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use function App\Helper\applyDefaultFSW;
use function App\Helper\applyDefaultWith;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($request)
    {
        $query = Review::query();

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

        $subscribe =  Subscribe::query()->where('user_id','=', Auth::id())->findOrFail($request->subsribe_id);
        $request->merge([
            'user_id' => $subscribe->user_id,
            'shop_id' => $subscribe->shop_id,
            'menu_id' => $subscribe->menu_id
        ]);

        $review = Review::create($request->all());

        return $review
            ? response()->json($review,201)
            : response()->json([],500);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request , $id)
    {
        $query = Review::query();

        $query = applyDefaultFindById($request, $query);

        return  $query->findOrFail($id);
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Review $review)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function destroy(Review $review)
    {
        //
    }
}
