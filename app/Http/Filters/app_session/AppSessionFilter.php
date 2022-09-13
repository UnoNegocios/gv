<?php

namespace App\Http\Filters\app_session;

use Spatie\QueryBuilder\QueryBuilder;
use App\Models\AppSession;
use App\Http\Resources\app_session\AppSessionResource;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\AllowedSort;
use Spatie\QueryBuilder\Filters\Filter;

class AppSessionFilter
{
    public static function execute($request)
    {

        $app_sessions = QueryBuilder::for(AppSession::class)
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
        ->get();

        return AppSessionResource::collection($app_sessions);
    }
}