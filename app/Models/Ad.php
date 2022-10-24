<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Client;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Builder;


class Ad extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'alt',
        'url',
        'image_url',
        'image_path',
        'views',
        'impressions',
        'clicks',
        'is_active',
        'start_time',
        'end_time',
        'start_hour',
        'end_hour',
        'height',
        'width',
        'position',
        'ad_campaing_id',
        'client_id',
    ];

    public function client(){
        return $this->belongsTo(Client::class);
    }

    public function scopeDateBetween(Builder $query, $date, $date2): Builder
    {
        
    return $query->whereBetween('date', [Carbon::parse($date)->startOfDay(), Carbon::parse($date2)->endOfDay()]);

    }
}
