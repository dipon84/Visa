<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\library;
use Illuminate\Support\Facades\DB;
use App\Models\Visatype;
use App\Models\Profession;
use App\Models\Applyvisa;


class myController extends Controller
{
    public function dynamicDropdown()
    {
        $data = library::pluck('name', 'id'); // Replace 'column_name' with the actual column you want to display in the dropdown
        $profession = Profession::pluck('name', 'id');

        return view('AddStudent', compact('data', 'profession'));
    }

    public function index(){
        return view('AddStudent');
    }

    public function country_wise_visa_type($id){
        // echo $id;
        $data = [];
        if($id <> 'NULL'){
            $visaTypes = Visatype::where('country_id',$id)->pluck('name', 'id');
            $data['found'] = true;
            $data['visa_types'] = $visaTypes;
        }else{
            $data['found'] = false;
            $data['visa_types'] = [];
        }
        
        // print_r($data);
        //return '{"status":"$id"}';
        return json_encode($data);

    }

    


    public function addStudent(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();
            

            $applyvisa = new Applyvisa();
            $applyvisa->name = $data['name'];
            $applyvisa->email = $data['email'];
            $applyvisa->phone = $data['phone'];
            $applyvisa->passport = $data['passport'];
            $applyvisa->validity = $data['validity'];
            $applyvisa->country_id = $data['country'];
            $applyvisa->visa_id = $data['visa_type'];
            $applyvisa->profession_id = $data['profession'];
            $applyvisa->travel_date = $data['travel_date'];
            $applyvisa->dob = $data['dob'];

            $res = $applyvisa->save();
            if($res){
                return back()->with('success', 'You have registered successfully');
            }else{
                return back()->with('fail', 'Something wrong');
            }

            // echo '<pre>';
            // print_r($data);
        }
    }

    public function view_all_visa(){

        $all_visa = DB::table('applyvisas')
        ->join('country', 'applyvisas.country_id', '=', 'country.id')
        ->join('visatype', 'applyvisas.visa_id', '=', 'visatype.id')
        ->join('professions', 'applyvisas.profession_id', '=', 'professions.id')
        ->select('applyvisas.name as visa_name', 'email', 'phone', 'passport', 'validity', 'country.name as country_name', 'visatype.name as visa_type', 'professions.name as profession_name', 'travel_date', 'dob')
        ->get();
        // echo '<pre>';
        // print_r($all_visa);
        return view('ViewAllVisa', compact('all_visa'));
    }
    
    
  
    
}
