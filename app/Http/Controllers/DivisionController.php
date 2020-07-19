<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Division;
use Redirect;
use View;
use DB;

class DivisionController extends Controller
{
    public function selectClass(){
        $qs = DB::select(DB::raw("SELECT * from divisions"));
        return view('about',['count'=>$qs]);  
    }

    public function find_class(Request $request){
        $data = $request->all();
        return response()->json(['data'=> $data['class_value']]);
    }
}
