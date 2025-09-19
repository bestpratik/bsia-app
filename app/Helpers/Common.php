<?php

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Ebook;
use Illuminate\Support\Facades\DB;


function seoManageHelper(Request $request)
{

    $segments = $request->segments(1);
    // dd($segments);
    $lastTwoSegments = array_slice($segments, -1);
    // dd($lastTwoSegments);
    $combinedSegments = implode('/', $lastTwoSegments);
    $seosite = Course::where('slug', $combinedSegments)->first();
    // dd($seosite);

    if (!$seosite) {
        $seosite = Ebook::where('slug', $combinedSegments)->first();
    }

    return $seosite;
}
