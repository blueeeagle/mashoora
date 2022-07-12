<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\State;
use App\Models\City;
use Auth;
use Validator;
use DataTables;

class CityController extends Controller
{

	public function datatables(Request $request){
        $search=[];
        $columns=$request->columns;
        foreach($columns as $colum){
            $search[] = $colum['search']['value'];
        }

         $datas = City::leftJoin('countries','cities.country_id','=','countries.id')->leftJoin('states','cities.state_id','=','states.id')
        ->when($search[1],function($query,$search){
            return $query->where('countries.country_name','LIKE',"%{$search}%");
        })
        ->when($search[2],function($query,$search){
            return $query->where('states.state_name','LIKE',"%{$search}%");
        })
        ->when($search[3],function($query,$search){
            return $query->where('cities.city_name','LIKE',"%{$search}%");
        })
        ->orderBy('cities.id','desc')->select('cities.*','countries.country_name as country_name','states.state_name as state_name')->get();

         return DataTables::of($datas)
                ->addIndexColumn()
                ->addColumn('status', function(City $data) {
                    $status = ($data->status == 1)?'checked':'' ;
                    $route = \route('master.city.status',$data->id);
                        return "<div class='form-check form-switch form-check-custom form-check-solid'>
                                <input class='form-check-input' type='checkbox' status data-url='$route' value='' $status />
                            </div>";
                })
                ->addColumn('action', function(City $data){
                    return ['Delete'=> \route('master.city.destroy',$data->id),'edit'=> \route('master.city.edit',$data->id)];
                })
                ->rawColumns(['status','action'])
                ->toJson(); //--- Returning Json Data To Client Side
    }


	public function index(){
		return view('city.index');
	}

	public function create(){
		$countrys=Country::where('status','1')->get();
		$data=State::where('status','1')->get();
		return view('city.create',compact('data','countrys'));
	}

	public function store(Request $request){
		$requestedData=$request->all();

		$rules=[

			'countryName' => 'required',
			'stateName' => 'required',
			'cityName' => "required|unique:cities,city_name,null,null,state_id,$request->stateName,country_id,$request->countryName,city_name,$request->cityName",

		];

		$customs=[
			'countryName.required'  => 'Country Name should be filled',
			'stateName.required'  	=> 'State Name should be filled',
			'cityName.required'  	=> 'City Name should be filled',
			'cityName.unique'      	=> 'City Name already taken for this state',
		];

		$validator = Validator::make($request->all(), $rules,$customs);

        if ($validator->fails()) {
          return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
        }

        $data = new City;

        $data->country_id=$requestedData['countryName'];
        $data->state_id=$requestedData['stateName'];
        $data->city_name=$requestedData['cityName'];
        $data->save();

		$data1['msg'] = 'New City Added Successfully.';
        return response()->json($data1);

	}


	public function update(Request $request,City $city){
		$rules=[
			'country_id' => 'required',
			'state_id' => 'required',
			'city_name' => "required|unique:cities,city_name,$city->id,id,state_id,$request->state_id,country_id,$request->country_id,city_name,$request->city_name",
		];
		$customs=[
			'country_id.required'  	=> 'Country Name should be filled',
			'state_id.required'  	=> 'State Name should be filled',
			'city_name.required'  	=> 'City Name should be filled',
			'city_name.unique'      	=> 'City Name already taken for this state & Country',
		];

		$validator = Validator::make($request->all(), $rules,$customs);
        if ($validator->fails()) {
          return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
        }
        // $city->fillable($request->all());
        $city->update($request->all());

		$data1['msg'] = 'City Updated Successfully.';
        return response()->json($data1);
	}

	public function status(Request $request,City $city){
        $city->status = $request->status;
        $city->update();
        return response()->json(['status'=>true,'msg'=>'Status Updated']);
    }


    public function edit(City $city){
		$countrys = Country::where('status','1')->get();
		$state = State::where('status','1')->get();
		return view('city.edit',compact('state','countrys','city'));
	}


    public function destroy(City $city)
    {
        $city->delete();
        $data1['msg'] = 'Data Deleted Successfully.';
        $data1['status'] = true;
        return response()->json($data1);
        //--- Redirect Section Ends
    }

}
