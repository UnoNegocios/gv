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
}
