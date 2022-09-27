<?php
namespace App\Http\Controllers\api\v1\ad;

use App\Models\Ad;
use App\Models\AdCampaign;
use App\Http\Filters\ad\AdFilter;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


use Illuminate\Support\Arr;

Class GenerateAd
{
    public function __invoke(Request $request){
      return AdFilter::execute($request); 
    }
}