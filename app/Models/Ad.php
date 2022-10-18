<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Client;

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
        'height',
        'width',
        'position',
        'ad_campaign_id'
    ];

    public function client(){
        return $this->belongsTo(Client::class);
    }
}
