<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\HouseRegistration;

class Sector_3_Controller extends Controller
{
    function houseRegister(Request $request){
        if($request->key != null){
            $houseRegistrations = DB::table('HouseRegistration')
        ->join('House', 'House.house_id', '=', 'HouseRegistration.house_id')
        ->join('RegisterPeopleSexTable', 'RegisterPeopleSexTable.register_people_sex_id', '=', 'HouseRegistration.registration_people_sex_id')
        ->select('HouseRegistration.*', 'House.house_number', 'RegisterPeopleSexTable.register_people_sex_name')
        ->orderBy('House.house_number', 'ASC')
        ->orderBy('HouseRegistration.house_registration_id', 'ASC')
            ->orwhere('HouseRegistration.registration_people_name', 'like', '%'.$request->key.'%')
            ->orwhere('HouseRegistration.registration_people_surname', 'like', '%'.$request->key.'%')
            ->orwhere('HouseRegistration.registration_people_number', 'like', '%'.$request->key.'%')
            ->orwhere('RegisterPeopleSexTable.register_people_sex_name', 'like', '%'.$request->key.'%')
            ->orwhere('HouseRegistration.registration_people_birthday', 'like', '%'.$request->key.'%')
            ->orwhere('House.house_number', 'like', '%'.$request->key.'%')
        ->paginate(5);
        }
        else{
            $houseRegistrations = DB::table('HouseRegistration')
        ->join('House', 'House.house_id', '=', 'HouseRegistration.house_id')
        ->join('RegisterPeopleSexTable', 'RegisterPeopleSexTable.register_people_sex_id', '=', 'HouseRegistration.registration_people_sex_id')
        ->select('HouseRegistration.*', 'House.house_number', 'RegisterPeopleSexTable.register_people_sex_name')
        ->orderBy('House.house_number', 'ASC')
        ->orderBy('HouseRegistration.house_registration_id', 'ASC')
        ->paginate(5);
        }
        return view('houseRegistration.houseRegistration', compact('houseRegistrations'));
    }

    function houseRegisterCreate(){
        $registersexs = DB::table('RegisterPeopleSexTable')->get();
        $houses = DB::table('House')->get();
        return view('houseRegistration.houseRegistrationCreate', compact('registersexs', 'houses'));
    }

    function houseRegisterStore(Request $request){
        $request->validate([
            'house_id' => 'required',
            'register_people_sex_id' => 'required',
            'registration_people_name' => 'required',
            'registration_people_surname' => 'required',
            'registration_people_number' => 'required|max:10',
            'registration_people_birthday' => 'required',
        ]);
        $houseRegistration = new HouseRegistration;
        $houseRegistration->house_id = $request->house_id;
        $houseRegistration->registration_people_sex_id = $request->register_people_sex_id;
        $houseRegistration->registration_people_name = $request->registration_people_name;
        $houseRegistration->registration_people_surname = $request->registration_people_surname;
        $houseRegistration->registration_people_number = $request->registration_people_number;
        $houseRegistration->registration_people_birthday = $request->registration_people_birthday;
        $houseRegistration->save();
        return redirect()->route('houseRegister')->with('success', 'HouseRegistration has been created successfully.');
    }

    function houseRegisterEdit($register_id, $sex_id, $house_id){
        $sexs = DB::table('RegisterPeopleSexTable')->get();
        $houses = DB::table('House')->get();
        $registers = DB::table('HouseRegistration')->where('HouseRegistration.house_registration_id', $register_id)->get();
        return view('houseRegistration.houseRegistrationEdit', compact('sexs', 'houses', 'registers'));
    }
    function houseRegisterUpdate(Request $request, $register_id){
        $request->validate([
            'house_id' => 'required',
            'register_people_sex_id' => 'required',
            'registration_people_name' => 'required',
            'registration_people_surname' => 'required',
            'registration_people_number' => 'required|max:10',
            'registration_people_birthday' => 'required',
        ]);
        $register = HouseRegistration::find($register_id);
        $register->house_id = $request->house_id;
        $register->registration_people_sex_id = $request->register_people_sex_id;
        $register->registration_people_name = $request->registration_people_name;
        $register->registration_people_surname = $request->registration_people_surname;
        $register->registration_people_number = $request->registration_people_number;
        $register->registration_people_birthday = $request->registration_people_birthday;
        $register->save();
        return redirect()->route('houseRegister')->with('success', 'HouseRegistration has been updated successfully.');
    }

    function houseRegisterDelete($register_id){
        $registers = DB::table('HouseRegistration')->where('HouseRegistration.house_registration_id', $register_id)->get();
        $sexs = DB::table('RegisterPeopleSexTable')->get();
        return view('houseRegistration.houseRegistrationDelete', compact('registers', 'sexs'));
    }
    
    function houseRegisterDestroy($register_id){
        $houseRegistration = HouseRegistration::findOrFail($register_id);
        $houseRegistration->delete();
        return redirect()->route('houseRegister')->with('success', 'HouseRegistration has been deleted successfully.');
    }
}
