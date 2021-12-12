<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\Shop;
use App\Models\Subscribe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use function App\Helper\applyDefaultFindById;
use function App\Helper\applyDefaultFSW;
use function App\Helper\applyDefaultWith;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
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

        $subscribe =  Subscribe::query()->where('user_id','=', Auth::id())->findOrFail($request->subscribe_id);
        $request->merge([
            'user_id' => $subscribe->user_id,
            'shop_id' => $subscribe->shop_id,
            'menu_id' => $subscribe->menu_id
        ]);

        DB::beginTransaction();

        try {
            $review = Review::create($request->all());
            Shop::query()->where('id',$subscribe->shop_id)->update([
            //  NOTE  Raw Binding 최선인가? , Validation은 해주지만...
                'score_total' => DB::raw('score_total + '.$request->score),
                'score_count' => DB::raw('score_count + 1'),
                'score'=>DB::raw('(score_total + '.$request->score.') / (score_count + 1)')
            ]);
            DB::commit();
        }catch (\Exception $e){
            DB::rollBack();
            throw  $e;
        }

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
    public function update(Request $request, $review_id)
    {
        $request->validate([
            'score' => 'min:0|max:5',
            'content' => 'min:0|max:1000',
        ]);

        $review = Review::query()->with(['user','shop','menu'])->findOrFail($review_id);

        $change_amount =  $review->score - $request->score;

        DB::beginTransaction();

        try {
            $review->shop()->update([
                'score_total' => DB::raw('score_total - '.$change_amount),
                'score_count' => DB::raw('score_count'),
                'score'=>DB::raw('(score_total - '.$change_amount.') / (score_count)')
            ]);

            $review->updateOrFail($request->only(['content','score']));

            DB::commit();
        }catch (\Exception $e){
            DB::rollBack();
            throw  $e;
        }

        return response()->json($review,200);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function destroy(Review $review)
    {
        DB::transaction(function () use($review){
            $review->deleteOrFail();
        });
    }
}
