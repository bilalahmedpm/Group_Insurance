<?php

namespace App\Http\Controllers;

use App\GiRate;
use Illuminate\Http\Request;

class GiRateController extends Controller
{
    public function fetchRate(Request $request)
    {
        $rate = GiRate::where('begindate', '<', date('Y-m-d', strtotime($request->dor)))->where('enddate', '>', date('Y-m-d', strtotime($request->dor)))->where('grade', '=', $request->grade)->first();
        return response()->json($rate);
    }
}
