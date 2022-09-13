<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\PodcastSerie;

class Podcast extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'url',
        'duration',
        'podcast_series_id',
        'description'
    ];

    public function podcastSerie(){
        return $this->belongsTo(PodcastSerie::class, 'podcast_series_id');
    }
}
