<?php

namespace App\Http\Filters\client;

use Spatie\QueryBuilder\QueryBuilder;
use App\Models\Client;
use App\Http\Resources\client\ClientResource;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\AllowedSort;
use Spatie\QueryBuilder\Filters\Filter;

class ClientFilter
{
    public static function execute($request)
    {

        $clients = QueryBuilder::for(Client::class)
        ->allowedFilters([
            AllowedFilter::exact('id'),
            'name',
            AllowedFilter::exact('conversation_id'),
            AllowedFilter::exact('clientId'),
            AllowedFilter::exact('client_id'),
            AllowedFilter::exact('channel'),
        ])
        ->allowedSorts(
            'name',
        )
        ->orderBy('created_at', 'DESC')
        ->paginate($request->itemsPerPage)
        ->appends(request()->query());
        return ClientResource::collection($clients);
    }
}