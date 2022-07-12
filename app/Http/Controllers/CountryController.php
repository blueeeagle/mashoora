<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Models\Country;
use App\Models\Pincode;
use App\Models\State;
use App\Models\City;
use App\Models\Currency;
use DataTables;

class CountryController extends Controller
{
    public function index()
    {
        return view('country.index');
    }
    public function datatable(Request $request){
        $search=[];
        $columns=$request->columns;
        foreach($columns as $colum){
            $search[] = $colum['search']['value'];
        }

        $datas = Country::orderBy('id','desc')
        ->when($search[1],function($query,$search){
            return $query->where('country_name','LIKE',"%{$search}%");
        })
        ->when($search[2],function($query,$search){
            return $query->where('country_code','LIKE',"%{$search}%");
        })
        ->when($search[3],function($query,$search){
            return $query->where('dialing','LIKE',"%{$search}%");
        })
        ->get();
        return DataTables::of($datas)
                			->addIndexColumn()
                            ->addColumn('country_code', function(Country $data) {
                                return $data->country_code;
                            })
                            ->addColumn('country_name', function(Country $data) {
                                return $data->country_name;
                            })
                            ->addColumn('dialing', function(Country $data) {
                                return $data->dialing;
                            })
                            ->addColumn('action', function(Country $data) {
                                return '<div class="action-list"><a href=""><i class="fas fa-edit"></i>Edit</a></div>';
                            })
                            ->rawColumns(['country_code','country_name','dialing','action'])
                            ->toJson();
    }

    public function getState(Request $request){
    	$state=DB::table('states')->where('country_id',$request->id)->where('status',1)->get();
        $currency = null;
        $Country = Country::where('id',$request->id)->first();
        if($Country){
            $currencySelect = Currency::where('countryname',$Country->country_name)->first();
            if($currencySelect) $currency = $currencySelect;
        }
    	return response()->json(['states'=>$state,'currency'=>$currency,'Country'=>$Country]);
    }

    public function getCity(Request $request){
    	$city=DB::table('cities')->where('state_id',$request->id)->where('status',1)->get();
    	return response()->json($city);
    }
}
