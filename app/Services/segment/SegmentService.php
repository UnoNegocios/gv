<?php

namespace App\Services\segment;

use App\Models\Segment;
use Illuminate\Support\Facades\Log;

class SegmentService
{
    public static function defineSegment($birthdate){

        $userAge = date_diff(date_create($birthdate), now())->format('%y');
        $segments = Segment::all();

        foreach ($segments as $segment => $value) {
            if($userAge >= $value->age_start && $userAge <= $value->age_end){
                return $value->id;
            }
        }
    }
}