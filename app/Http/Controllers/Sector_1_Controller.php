<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\SubArea;



class Sector_1_Controller extends Controller
{
    function index(){
        return view('index');
    }

    function subArea(Request $request){

        if($request->key != null){
            $District_Province_Sector_Canton_SubArea_lists = DB::table('District')
        ->join('Province', 'Province.province_id', '=', 'District.province_id')
        ->join('Sector','Province.sector_id', '=', 'Sector.sector_id')
        ->join('Canton', 'District.district_id', '=', 'Canton.district_id')
        ->join('SubArea', 'SubArea.canton_id', 'Canton.canton_id')
        ->join('TypeSubArea', 'TypeSubArea.type_sub_area_id', 'SubArea.type_sub_area_id')
        ->join('OptionNearCoastal', 'OptionNearCoastal.sub_area_near_coastal', 'SubArea.sub_area_near_coastal')
        ->select('District.district_name', 'Province.province_name', 'Sector.sector_name', 'Canton.canton_name',
        'SubArea.sub_area_name', 'SubArea.sub_area_size', 'SubArea.sub_area_latitude', 'SubArea.sub_area_longitude', 
        'TypeSubArea.type_sub_area_name', 'SubArea.sub_area_id', 'District.district_id',
        'OptionNearCoastal.*')
        ->orderBy('Sector.sector_name', 'ASC')
        ->orderBy('Province.province_name', 'ASC')
        ->orderBy('District.district_name', 'ASC')
        ->orderBy('Canton.canton_name', 'ASC')
        ->orwhere('District.district_name', 'like', '%'.$request->key.'%')
        ->orwhere('Province.province_name', 'like', '%'.$request->key.'%')
        ->orwhere('Sector.sector_name', 'like', '%'.$request->key.'%')
        ->orwhere('Canton.canton_name', 'like', '%'.$request->key.'%')
        ->orwhere('SubArea.sub_area_name', 'like', '%'.$request->key.'%')
        ->orwhere('SubArea.sub_area_size', 'like', '%'.$request->key.'%')
        ->orwhere('SubArea.sub_area_latitude', 'like', '%'.$request->key.'%')
        ->orwhere('SubArea.sub_area_longitude', 'like', '%'.$request->key.'%')
        ->orwhere('SubArea.sub_area_near_coastal', 'like', '%'.$request->key.'%')
        ->orwhere('TypeSubArea.type_sub_area_name', 'like', '%'.$request->key.'%')
        ->orwhere('OptionNearCoastal.sub_area_near_coastal_name', 'like', '%'.$request->key.'%')
        ->paginate(5);
        }
        else{
            $District_Province_Sector_Canton_SubArea_lists = DB::table('District')
        ->join('Province', 'Province.province_id', '=', 'District.province_id')
        ->join('Sector','Province.sector_id', '=', 'Sector.sector_id')
        ->join('Canton', 'District.district_id', '=', 'Canton.district_id')
        ->join('SubArea', 'SubArea.canton_id', 'Canton.canton_id')
        ->join('TypeSubArea', 'TypeSubArea.type_sub_area_id', 'SubArea.type_sub_area_id')
        ->join('OptionNearCoastal', 'OptionNearCoastal.sub_area_near_coastal', 'SubArea.sub_area_near_coastal')
        ->select('District.district_name', 'Province.province_name', 'Sector.sector_name', 'Canton.canton_name',
        'SubArea.sub_area_name', 'SubArea.sub_area_size', 'SubArea.sub_area_latitude', 'SubArea.sub_area_longitude', 
        'TypeSubArea.type_sub_area_name', 'SubArea.sub_area_id', 'District.district_id',
        'OptionNearCoastal.*')
        ->orderBy('Sector.sector_name', 'ASC')
        ->orderBy('Province.province_name', 'ASC')
        ->orderBy('District.district_name', 'ASC')
        ->orderBy('Canton.canton_name', 'ASC')
        ->paginate(5);
        }
        return view('subArea.subArea', compact('District_Province_Sector_Canton_SubArea_lists'));
    }

    function subAreaCreate(){
        $cantons = DB::table('Canton')->get();
        $typesubareas = DB::table('TypeSubArea')->get();
        $sectors = DB::table('Sector')->get();
        $nearCoastal = DB::table('OptionNearCoastal')->get();
        return view('subArea.subAreaCreate', compact('sectors', 'typesubareas', 'cantons', 'nearCoastal'));
    }

    // dropdown Sector
    function subAreaCreate_dropdownfor_Sector(Request $request){
        $id=$request->get('sector_id');
        $result = array();
        $provinces = DB::table('Sector')
        ->join('Province', 'Sector.sector_id', '=', 'Province.sector_id')
        ->select('Province.province_name', 'Province.province_id')
        ->where('Province.sector_id', $id)
        ->get();

        $output = '<option value"">Select your Province | ทำการเลือกข้อมูลจังหวัด</option>';
        foreach($provinces as $province){
            $output .='<option value='.$province->province_id.'>'.$province->province_name.'</option>';
        }
        echo $output;
    }

    function subAreaCreate_dropdownfor_Province(Request $request){
        $id=$request->get('province_id');
        $result = array();
        $districts = DB::table('Province')
        ->join('District', 'Province.province_id', '=', 'District.province_id')
        ->select('District.district_name', 'District.district_id')
        ->where('District.province_id', $id)
        ->get();

        $output = '<option value"">Select your District | ทำการเลือกข้อมูลอำเภอหรือเขต</option>';
        foreach($districts as $district){
            $output .='<option value='.$district->district_id.'>'.$district->district_name.'</option>';
        }
        echo $output;
    }
    
    function subAreaCreate_dropdownfor_District(Request $request){
        $id=$request->get('district_id');
        $result = array();
        $cantons = DB::table('District')
        ->join('Canton', 'Canton.district_id', '=', 'District.district_id')
        ->select('Canton.canton_name', 'Canton.canton_id')
        ->where('Canton.district_id', $id)
        ->get();

        $output = '<option value"">Select your Canton | ทำการเลือกข้อมูลตำบลหรือแขวง</option>';
        foreach($cantons as $canton){
            $output .='<option value='.$canton->canton_id.'>'.$canton->canton_name.'</option>';
        }
        echo $output;
    }

    function subAreaStore(Request $request){
        $request->validate([
            'sub_area_name' => 'required|unique:SubArea',
            'sub_area_size' => 'required',
            'sub_area_latitude' => 'required',
            'sub_area_longitude' => 'required',
        ]);

        $subarea = new SubArea;
        $subarea->sub_area_name = $request->sub_area_name;
        $subarea->sub_area_size = $request->sub_area_size;
        $subarea->sub_area_latitude = $request->sub_area_latitude;
        $subarea->sub_area_longitude = $request->sub_area_longitude;
        $subarea->sub_area_near_coastal = $request->sub_area_near_coastal;
        $subarea->type_sub_area_id = $request->type_sub_area_id;
        $subarea->canton_id = $request->canton_id;
        $subarea->save();
        return redirect()->route('subArea')->with('success', 'SubArea has been created successfully.');

    }

    function subAreaEdit($id, $d_id, $near){
        $cantons = DB::table('Canton')
        ->where('Canton.district_id', $d_id)
        ->select('Canton.*')
        ->get();
        $typesubareas = DB::table('TypeSubArea')->get();
        $subareas = DB::table('SubArea')
        ->where('SubArea.sub_area_id', $id)
        ->select('SubArea.*')
        ->get();
        $nearCoastal = DB::table('OptionNearCoastal')->get();
        return view('subArea.subAreaEdit', compact('subareas', 'typesubareas', 'cantons', 'nearCoastal'));
    }

    function subAreaUpdate(Request $request, $id){
        $request->validate([
            'sub_area_name' => 'required',
            'sub_area_size' => 'required',
            'sub_area_latitude' => 'required',
            'sub_area_longitude' => 'required',
            'sub_area_near_coastal' => 'required',
        ]);
        $subarea = SubArea::find($id);
        $subarea->sub_area_name = $request->sub_area_name;
        $subarea->sub_area_size = $request->sub_area_size;
        $subarea->sub_area_latitude = $request->sub_area_latitude;
        $subarea->sub_area_longitude = $request->sub_area_longitude;
        $subarea->sub_area_near_coastal = $request->sub_area_near_coastal;
        $subarea->type_sub_area_id = $request->type_sub_area_id;
        $subarea->canton_id = $request->canton_id;
        $subarea->save();
        return redirect()->route('subArea')->with('success', 'SubArea has been updated successfully.');

    }
    
    function subAreaDelete($id){
        $subareas = DB::table('SubArea')
        ->join('OptionNearCoastal', 'SubArea.sub_area_near_coastal', 'OptionNearCoastal.sub_area_near_coastal')
        ->select('SubArea.*', 'OptionNearCoastal.*')
        ->where('SubArea.sub_area_id', $id)->get();
        return view('subArea.subAreaDelete', compact('subareas'));
    }

    function subAreaDestroy($id){
        $subarea = SubArea::findOrFail($id);
        $subarea->delete();
        return redirect()->route('subArea')->with('success', 'SubArea has been deleted successfully.');
    }
}
