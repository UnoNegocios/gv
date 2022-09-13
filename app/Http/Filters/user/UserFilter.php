<?php

namespace App\Http\Filters\user;

use Spatie\QueryBuilder\QueryBuilder;
use App\Models\User;
use App\Http\Resources\user\UserResource;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\AllowedSort;
use Spatie\QueryBuilder\Filters\Filter;

class UserFilter
{
    public static function execute($request)
    {

        $users = QueryBuilder::for(User::class)
        ->allowedFilters([
            AllowedFilter::exact('id'),
            'name',
            AllowedFilter::exact('conversation_id'),
            AllowedFilter::exact('userId'),
            AllowedFilter::exact('user_id'),
            AllowedFilter::exact('channel'),
        ])
        ->allowedSorts(
            'name',
        )
        ->orderBy('created_at', 'DESC')
        ->paginate($request->itemsPerPage)
        ->appends(request()->query());
        return UserResource::collection($users);
    }
}