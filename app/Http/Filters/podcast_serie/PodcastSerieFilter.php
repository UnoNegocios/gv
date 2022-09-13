<?php

namespace App\Http\Filters\podcast_serie;

use Spatie\QueryBuilder\QueryBuilder;
use App\Models\PodcastSerie;
use App\Http\Resources\podcast_serie\PodcastSerieResource;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\AllowedSort;
use Spatie\QueryBuilder\Filters\Filter;

class PodcastSerieFilter
{
    public static function execute($request)
    {

        $podcast_seires = QueryBuilder::for(PodcastSerie::class)
        ->allowedFilters([
            'name',
            AllowedFilter::exact('id'),
            AllowedFilter::exact('podcast.name'),
        ])
        ->allowedSorts(
            'name',
        )
        ->orderBy('created_at', 'DESC')
        ->paginate($request->itemsPerPage)
        ->appends(request()->query());
        return PodcastSerieResource::collection($podcast_seires);
    }
}