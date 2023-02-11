<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class Sector_4_Controller extends Controller
{
    //
    function result(){
        $results = DB::table('Canton')
        ->leftJoin('SubArea', 'SubArea.canton_id', '=', 'Canton.canton_id')
        ->leftJoin('House', 'House.sub_area_id', '=', 'SubArea.sub_area_id')
        ->leftJoin('HouseRegistration', 'HouseRegistration.house_id', '=', 'House.house_id')
        ->select('Canton.canton_name', DB::raw('COUNT(HouseRegistration.house_registration_id) as total'))
        ->groupBy('Canton.canton_id')
        ->paginate(5);
        return view('result.result', compact('results'));
    }
}
