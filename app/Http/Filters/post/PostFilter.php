<?php

namespace App\Http\Filters\post;

use Spatie\QueryBuilder\QueryBuilder;
use App\Models\Post;
use App\Http\Resources\post\PostResource;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\AllowedSort;
use Spatie\QueryBuilder\Filters\Filter;

class PostFilter
{
    public static function execute($request)
    {

        $posts = QueryBuilder::for(Post::class)
        ->allowedFilters([
            'title',
            'content',
            AllowedFilter::exact('id'),
            AllowedFilter::exact('status'),
            AllowedFilter::exact('categories.id'),
            AllowedFilter::exact('tags.id'),
            AllowedFilter::exact('author_id'),
            AllowedFilter::exact('visibility'),
            
            
        ])
        ->allowedSorts(
            'title',
        )
        ->orderBy('created_at', 'DESC')
        ->paginate($request->itemsPerPage)
        ->appends(request()->query());

        return PostResource::collection($posts);
    }
}