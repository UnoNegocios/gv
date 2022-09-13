<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Podcast;

class PodcastSerie extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'image_url',
        'description'
    ];

    public function podcasts(){
        return $this->hasMany(Podcast::class, 'podcast_series_id')->orderBy('created_at', 'DESC');
    }
}
