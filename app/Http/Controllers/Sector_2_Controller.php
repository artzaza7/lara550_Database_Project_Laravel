<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\House;



class Sector_2_Controller extends Controller
{
    function house(Request $request){

        if($request->key != null){
            $houses = DB::table('House')
        ->join('SubArea', 'SubArea.sub_area_id', '=', 'House.sub_area_id')
        ->select('House.*', 'SubArea.*')
        ->orderBy('SubArea.sub_area_id', 'ASC')   
        ->orderBy('House.house_number', 'ASC')
            ->orwhere('House.house_id', 'like', '%'.$request->key.'%')
            ->orwhere('House.house_number', 'like', '%'.$request->key.'%')
            ->orwhere('SubArea.sub_area_name', 'like', '%'.$request->key.'%')
        ->paginate(5);
        }
        else{
        $houses = DB::table('House')
        ->join('SubArea', 'SubArea.sub_area_id', '=', 'House.sub_area_id')
        ->select('House.*', 'SubArea.*')
        ->orderBy('SubArea.sub_area_id', 'ASC')   
        ->orderBy('House.house_number', 'ASC')
        ->paginate(5);
        }
        return view('house.house', compact('houses'));
    }

    function houseCreate(){
        $subareas = DB::table('SubArea')->get();
        return view('house.houseCreate', compact('subareas'));
    }

    function houseStore(Request $request){
        $request->validate([
            'house_number' => 'required|unique:House',
        ]);
        $house = new House;
        $house->house_number = $request->house_number;
        $house->sub_area_id = $request->sub_area_id;
        $house->save();
        return redirect()->route('house')->with('success', 'House has been created successfully.');
    }
    
    function houseEdit($sub_area_id, $house_id){
        $subareas = DB::table('SubArea')->get();
        $houses = DB::table('House')->where('House.house_id', $house_id)->get();
        return view('house.houseEdit', compact('subareas', 'houses'));
    }

    function houseUpdate(Request $request, $house_id){
        $request->validate([
            'house_number' => 'required',
        ]);
        $house = House::find($house_id);
        $house->house_number = $request->house_number;
        $house->sub_area_id = $request->sub_area_id;
        $house->save();
        return redirect()->route('house')->with('success', 'House has been updated successfully.');
    }
    
    function houseDelete($house_id){
        $houses = DB::table('House')->where('House.house_id', $house_id)->get();
        return view('house.houseDelete', compact('houses'));
    }
    
    function houseDestroy($house_id){
        $house = House::findOrFail($house_id);
        $house->delete();
        return redirect()->route('house')->with('success', 'House has been deleted successfully.');
    }
}
