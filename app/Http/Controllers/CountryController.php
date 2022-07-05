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

    public function getStates(Request $request){
    $country=$request["country_name"];
		$state=State::where('status',1)->get();
		$city=City::where('status',1)->get();
		$pincode=Pincode::where('status',1)->get();
    if(is_numeric($country)){
      $type=0;
      $data1=[$type];
    return response()->json($data1);
    }
    $data=new Country();
    $data->country_name=$country;
    $data->save();
    $id=$data->id;
    $type=1;
    $data1=[$type,$id];
    return response()->json($data1);


		// $address=Address::findOrFail($request->addid);
		// $id = $request->id;
		// return view('admin.customer.state',compact('pincode','city','state','address','id'))->render();
	}

  public function getCities(Request $request){
    $country=$request["country"];
    $state=$request["state_name"];
    $city=City::where('status',1)->get();
    $pincode=Pincode::where('status',1)->get();
    if(!empty($state) && !empty($country)){
    if(is_numeric($state)){
      $datas=State::where('country_id',$country)->where('id',$state)->get();

      if(count($datas) == 0){
      $type=0;
      $data1=[$type];
    return response()->json($data1);

      }
    }
    $data=new State();
    $data->country_id=$country;
    $data->state_name=$state;
    $data->save();
    $id=$data->id;
    $type=1;
    $data1=[$type,$id];
    return response()->json($data1);

  }

  }
      public function getPincodes(Request $request){
    $country=$request["country"];;
    $state=$request["state"];
    $city=$request["city_name"];
    $pincode=Pincode::where('status',1)->get();
    if(is_numeric($city)){
      $datas=City::where('country_id',$country)->where('state_id',$state)->where('id',$city)->get();
      if(count($datas) == 0){
    $type=0;
      $data1=[$type];
    return response()->json($data1);


      }

    }
    $data=new City();
    $data->country_id=$country;
    $data->state_id=$state;
    $data->city_name=$city;
    $data->save();
    $id=$data->id;
    $type=1;
    $data1=[$type,$id];
    return response()->json($data1);

  }

  public function addPincodes(Request $request){
    $country=$request["country"];;
    $state=$request["state"];
    $city=$request["city"];
    $pincode=$request["pincode"];
    $datas=Pincode::where('country_id',$country)->where('state_id',$state)->where('city_id',$city)->where('id',$pincode)->orWhere('pincode',$pincode)->get();
      if(count($datas) == 0){
          $data=new Pincode();
    $data->country_id=$country;
    $data->state_id=$state;
    $data->city_id=$city;
    $data->pincode=$pincode;
    $data->save();
    $id=$data->id;
    $type=1;
    $data1=[$type,$id];
    return response()->json($data1);


      }
      $type=0;
      $data1=[$type];
      return response()->json($data1);



  }
}
