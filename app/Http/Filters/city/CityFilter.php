<?php

namespace App\Http\Filters\city;

use Spatie\QueryBuilder\QueryBuilder;
use App\Models\City;
use App\Http\Resources\city\CityResource;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\AllowedSort;
use Spatie\QueryBuilder\Filters\Filter;

class CityFilter
{
    public static function execute($request)
    {

        $cities = QueryBuilder::for(City::class)
        ->allowedFilters([
            AllowedFilter::exact('id'),
            'state.name',
            AllowedFilter::exact('state_id'),
        ])
        ->allowedSorts(
            'name',
        )
        ->orderBy('name', 'ASC')
        ->get();
        return $cities;
    }
}