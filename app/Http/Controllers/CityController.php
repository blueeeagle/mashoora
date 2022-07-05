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

	public function datatables()
    {

         $datas = City::orderBy('id','desc')->get();
         //--- Integrating This Collection Into Datatables
         return DataTables::of($datas)
                			->addIndexColumn()
							->addColumn('Country_id', function(City $data) {
                				$getName=$data->country_id;
                				$city_name=Country::where('id',$getName)->first();
                				if(empty($city_name)){
                				    return "Not Found";
                				}
                				return $city_name->country_name;
                  				})
                			->addColumn('state_id', function(City $data) {
                				$getName=$data->state_id;
                				$state_name=State::where('id',$getName)->first();
                				if(empty($state_name)){
                				    return "Not Found";
                				}
                				return $state_name->state_name;

                  				})
                			->addColumn('status', function(City $data) {
                                return $data->status;
                             })
                            ->addColumn('action', function(City $data) {
                                return '<a href="#" class="btn btn-sm btn-light btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
                                    <span class="svg-icon svg-icon-5 m-0">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                            <path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="currentColor" />
                                        </svg>
                                    </span>
                                    <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold fs-7 w-125px py-4" data-kt-menu="true">
                                        <div class="menu-item px-3">
                                            <a href="../../demo1/dist/apps/ecommerce/catalog/edit-product.html" class="menu-link px-3">Edit</a>
                                        </div>
                                        <div class="menu-item px-3">
                                            <a href="#" class="menu-link px-3" data-kt-ecommerce-product-filter="delete_row">Delete</a>
                                        </div>
                                    </div>';
                            })
                            ->rawColumns(['Country_id','state_id','status','action'])
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
			'cityName' => 'required|unique:cities,city_name,NULL,id,state_id,'.$request->stateName,

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


	public function update(Request $request,$id){
		$requestedData=$request->all();

		$rules=[

			'countryName' => 'required',
			'stateName' => 'required',
			'cityName' => 'required|unique:cities,city_name,NULL,id,state_id,'.$id,

		];

		$customs=[
			'countryName.required'  	=> 'Country Name should be filled',
			'stateName.required'  	=> 'State Name should be filled',
			'cityName.required'  	=> 'City Name should be filled',
			'cityName.unique'      	=> 'City Name already taken for this state',
		];

		$validator = Validator::make(Input::all(), $rules,$customs);

        if ($validator->fails()) {
          return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
        }

        $data = City::findOrFail($id);

        $data->country_id=$requestedData['countryName'];
        $data->state_id=$requestedData['stateName'];
        $data->city_name=$requestedData['cityName'];
        $data->save();

		$data1['msg'] = 'City Updated Successfully.';
        return response()->json($data1);
	}

	public function status($id1,$id2)
      {
          $data = City::findOrFail($id1);
          $data->status = $id2;
          $data->update();
      }


    public function edit($id){
		$data=City::findOrFail($id);
		$country=Country::where('status','1')->get();
		$data1=State::where('status','1')->get();
		return view('admin.city.edit',compact('data','data1','country'));
	}


    public function destroy($id)
    {
        $data = City::findOrFail($id);

        $data->delete();
        //--- Redirect Section
        $data1['msg'] = 'Data Deleted Successfully.';
        return response()->json($data1);
        //--- Redirect Section Ends
    }

}
