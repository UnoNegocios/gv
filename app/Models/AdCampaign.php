<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Ad;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Carbon;

class AdCampaign extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'client_id',
        'start_time',
        'end_time',
        'views',
        'clicks',
        'is_active'
    ];

    public function ads(){
        return $this->hasMany(Ad::class, 'ad_campaing_id');
    }

    public function scopeDateBetween(Builder $query)
    {
        
     $query->where('start_time','<=', now() && now(), '>=', 'end_time');

    }
}
