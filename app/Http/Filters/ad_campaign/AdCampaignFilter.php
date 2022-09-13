<?php

namespace App\Http\Filters\ad_campaign;

use Spatie\QueryBuilder\QueryBuilder;
use App\Models\AdCampaign;
use App\Http\Resources\ad_campaign\AdCampaignResource;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\AllowedSort;
use Spatie\QueryBuilder\Filters\Filter;

class AdCampaignFilter
{
    public static function execute($request)
    {

        $ad_campaign = QueryBuilder::for(AdCampaign::class)
        ->allowedFilters([
            AllowedFilter::exact('id'),
            AllowedFilter::scope('created_between'),
            AllowedFilter::exact('user.id'),
            AllowedFilter::exact('user.gender'),
            AllowedFilter::exact('user.segment_id'),
        ])
        ->allowedSorts(
            'name',
        )
        ->orderBy('created_at', 'DESC')
        ->paginate($request->itemsPerPage)
        ->appends(request()->query());

        return AdCampaignResource::collection($ad_campaign);
    }
}