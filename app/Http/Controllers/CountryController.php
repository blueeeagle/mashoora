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
    public function __construct()
    {
        $this->middleware('Permissions:Country_View',['only'=>['index']]);
    }
    
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
                            ->addColumn('country_code', function(Country $datas) {
                                return $datas->country_code;
                            })
                            ->addColumn('country_name', function(Country $datas) {
                                return $datas->country_name;
                            })
                            ->addColumn('dialing', function(Country $datas) {
                                return $datas->dialing;
                            })
                            ->addColumn('has_state', function(Country $datas) {
                                $state = ($datas->has_state == 1)?'checked':'' ;
                                $route = \route('master.country.has_state',$datas->id);
                                return "<div class='form-check form-switch form-check-custom form-check-solid'>
                                        <input class='form-check-input' type='checkbox' status data-url='$route' value='' $state />
                                    </div>";
                            })
                            ->addColumn('status', function(Country $datas) {
                                $status = ($datas->status == 1)?'checked':'' ;
                                $route = \route('master.country.status',$datas->id);
                                return "<div class='form-check form-switch form-check-custom form-check-solid'>
                                        <input class='form-check-input' type='checkbox' status data-url='$route' value='' $status />
                                    </div>";
                            })
                             ->addColumn('action', function(Country $datas){
                                return ['edit'=> \route('master.country.edit',$datas->id)];
                            })
       
                            ->rawColumns(['country_code','country_name','dialing','action','status','has_state'])
                            ->toJson();
    }

    public function getState(Request $request){
    	$state=[];
        $currency = null;
        $city = [];
        $Country = Country::where('id',$request->id)->first();
        if($Country){
            $currencySelect = Currency::where('countryname',$Country->country_name)->first();
            if($currencySelect) $currency = $currencySelect;
            if($Country->has_state){
                $state = State::where('country_id',$request->id)->where('status',1)->get();
            }else{
                $city = City::where('country_id',$request->id)->where('status',1)->get();
            }
        }
    	return response()->json(['states'=>$state,'currency'=>$currency,'Country'=>$Country,'city'=>$city]);
    }
    
     public function edit(Country $country){
	//dd($country);
		return view('country.edit',compact('country'));
	}
	
	public function update(Request $Request,Country $country){
        // dd($Request);
       
        $country->update($Request->all());
        return response()->json(['msg'=>'Updated Successfully']);

    }

    public function getCity(Request $request){
    	$city=DB::table('cities')->where('state_id',$request->id)->where('status',1)->get();
    	return response()->json($city);
    }
    
    public function has_state(Request $request,Country $country){
        $country->has_state = $request->status;
        $country->update();
        return response()->json(['status'=>true,'msg'=>'Has State Updated']);
    }
     public function status(Request $request,Country $country){
        $country->status = $request->status;
        $country->update();
        return response()->json(['status'=>true,'msg'=>'Status Updated']);
    }
}
