<?php

namespace App\Http\Filters\ad;

use Spatie\QueryBuilder\QueryBuilder;
use App\Models\Ad;
use App\Http\Resources\ad\AdResource;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\AllowedSort;
use Spatie\QueryBuilder\Filters\Filter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Carbon;


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
            AllowedFilter::callback('is_in_time', function (Builder $query, $value) {
                $date_now = Carbon::now()->toDateString();
                $query->whereDate('start_time', '<=', $date_now)->whereDate('end_time', '>=', $date_now);
            }),
            AllowedFilter::callback('is_in_hour', function (Builder $query, $value) {
                $time_now = Carbon::now()->toTimeString();
                $query->whereTime('start_hour', '<=', $time_now)->whereTime('end_hour', '>=', $time_now);
            }),
        ])
        ->defaultSort('impressions')
        ->orderBy('created_at', 'DESC')
        ->take($request->itemsPerPage)
        ->get();
        //->appends(request()->query());

        $display_ads = $ad;

        $display_ads->each(function ($item, $key) {
            $item->increment('impressions', 1);
        });
        //$display_ad->increment('impressions', 1);
        return  $display_ads;
    }
}