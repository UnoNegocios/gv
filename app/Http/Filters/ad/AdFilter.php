<?php

namespace App\Http\Filters\ad;

use Spatie\QueryBuilder\QueryBuilder;
use App\Models\Ad;
use App\Http\Resources\ad\AdResource;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\AllowedSort;
use Spatie\QueryBuilder\Filters\Filter;

class AdFilter
{
    public static function execute($request)
    {

        $ad = QueryBuilder::for(Ad::class)
        ->allowedFilters([
            AllowedFilter::exact('id'),
            AllowedFilter::scope('created_between'),
            AllowedFilter::exact('position'),
            AllowedFilter::exact('user.gender'),
            AllowedFilter::exact('user.segment_id'),
        ])
        ->allowedSorts(
            'name',
        )
        ->orderBy('created_at', 'DESC')
        ->paginate($request->itemsPerPage)
        ->appends(request()->query());

        return AdResource::collection($ad);
    }
}