<?php

namespace App\Http\Filters\podcast;

use Spatie\QueryBuilder\QueryBuilder;
use App\Models\Podcast;
use App\Http\Resources\podcast\PodcastResource;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\AllowedSort;
use Spatie\QueryBuilder\Filters\Filter;

class PodcastFilter
{
    public static function execute($request)
    {

        $podcast_seires = QueryBuilder::for(Podcast::class)
        ->allowedFilters([
            'title',
            AllowedFilter::exact('id'),
            AllowedFilter::exact('podcast_series_id'),

        ])
        ->allowedSorts(
            'name',
        )
        ->orderBy('created_at', 'DESC')
        ->paginate($request->itemsPerPage)
        ->appends(request()->query());
        return PodcastResource::collection($podcast_seires);
    }
}