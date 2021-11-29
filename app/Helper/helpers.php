<?php
namespace App\Helper;
use Illuminate\Support\Str;

if (! function_exists('applyDefaultFSW')) {
    function applyDefaultFSW($request, $query)
    {
        if($request->sort){
            $sorts =  explode(',' ,$request->input('sort',''));
            foreach ($sorts as $sortColumn){
                $sortDirection = Str::startsWith($sortColumn,'-') ? 'desc':'asc';
                $sortColumn = ltrim($sortColumn,'-');
                $query->orderBy($sortColumn,$sortDirection);
            }
        }
////        ?filter=category:food,id:2
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

        return $query;
    }
}

