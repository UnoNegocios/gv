<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\Tag;
use App\Models\User;

class Post extends Model
{
    use \Staudenmeir\EloquentJsonRelations\HasJsonRelationships;
    use HasFactory;

    protected $fillable =[
        'title',
        'status',
        'content',
        'featured_media_path',
        'categories',
        'tags',
        'author_id',
        'visibility',
        'short_description'
    ];

    protected $casts =[
        'categories' => 'array',
        'tags' => 'array',
        'visibility' => 'array'
    ];

    public function Categories()
    {
        return $this->belongsToJson(Category::class, 'categories');
    }

    public function Tags()
    {
        return $this->belongsToJson(Tag::class, 'tags->[]');
    }

    public function author(){
        return $this->belongsTo(User::class, 'author_id');
    }
}

