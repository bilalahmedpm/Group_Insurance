<?php

namespace App\Http\Controllers;

use App\GiRate;
use Illuminate\Http\Request;

class GiRateController extends Controller
{
    public function fetchRate(Request $request)
    {
        $date = \Carbon\Carbon::createFromFormat('d/m/Y', $request->dor)->format('Y-m-d');
        $rate = GiRate::whereDate('begindate', '<=', $date)->whereDate('enddate', '>=',$date)->where('grade', '=', $request->grade)->first();
        return response()->json($rate);
    }
    public function addMore()
    {
        return response()->json(['data' => view('admin.employee.admore')->render()]);
    }
    public  function fetchretirement()
    {
        $dor = '30-06-2007';
        $rate = GiRate::whereDate('enddate', '>=', date('Y-m-d', strtotime($dor)))->whereDate('begindate', '<=', date('Y-m-d', strtotime($dor)))->where('grade', '=', '09')->first();
        return $rate;
//        return response()->json($rate);
    }
}
