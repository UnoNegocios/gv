<?php

namespace App\Http\Filters\post;

use Spatie\QueryBuilder\Filters\Filter;
use Illuminate\Database\Eloquent\Builder;

Class FiltersTitleOrContent implements Filter
{
    public function __invoke(Builder $query, $value, string $property): Builder
    {
       return $query->select('posts.*')
          ->where('title', 'LIKE', '%' . $value . '%')
          ->orWhere('content', 'LIKE', '%' . $value . '%');
    }
}