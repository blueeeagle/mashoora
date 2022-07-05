<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Validator;
use DataTables;
use Session;
use App\Models\Country;

class ConsultantController extends Controller
{


	public function datatables(){ }

	public function index(){
		return view('city.index');
	}

	public function create(){
        $countrys = Country::where('status',1)->get();
		return view('consultant.create',['countrys' => $countrys]);
	}

	public function store(Request $request){ }

	public function update(Request $request,$id){ }

	public function status($id1,$id2){ }

    public function edit($id){ }

    public function destroy($id){ }

    public function generateotp(){
        $rand = rand(0, 9999);
        Session::put('otp', $rand);
        return response()->json(['otp' => $rand]);
    }

    public function verify(Request $request){
        $otp = Session::get('otp');
        if($request->otp == $otp) return response()->json(['otp_status' => true]);
        return response()->json(['otp_status' => false]);
    }
}
