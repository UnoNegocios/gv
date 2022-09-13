<?php
namespace App\Http\Controllers\api\v1\ad;

use App\Models\Ad;
use App\Models\AdCampaign;

use Illuminate\Support\Arr;

Class GenerateAd
{
    public function __invoke(){
       /* $anuncios = Arr::flatten(Ad::all()->pluck('impressions'));

        return array_keys($anuncios, min($anuncios));*/

        $adCampagin = 
        AdCampaign::with('ads')->get();

        $keyed = $adCampagin->mapWithKeys(function ($item, $key) {
            return [$item['name'] => $item['created_at']];
        });

        
    }
}