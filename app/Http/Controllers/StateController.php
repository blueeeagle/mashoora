<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\State;
use Auth;
use Validator;
use Illuminate\Support\Facades\Input;
use DataTables;
use Illuminate\Support\Collection;

class StateController extends Controller
{
    public function datatables(Request $request){
        $search=[];
        $columns=$request->columns;
        foreach($columns as $colum){
            $search[] = $colum['search']['value'];
        }

        $datas = State::leftJoin('countries','states.country_id','=','countries.id')
        ->when($search[1],function($query,$search){
            return $query->where('countries.country_name','LIKE',"%{$search}%");
        })
        ->when($search[2],function($query,$search){
            return $query->where('states.state_name','LIKE',"%{$search}%");
        })
        ->orderBy('states.id','desc')->select('states.*','countries.country_name as country_name')->get();

        return DataTables::of($datas)
                			->addIndexColumn()
                            ->addColumn('country_name', function(State $data) {
                                 return $data->country_name;
                            })
                            ->addColumn('state_name', function(State $data) {
                                return $data->state_name;
                            })
                            ->addColumn('status', function(State $data) {
                                return $data->status;
                            })
                            ->addColumn('action', function(State $data) {
                                return '<div class="action-list"><a href=""><i class="fas fa-edit"></i>Edit</a></div>';
                            })
                            ->rawColumns(['country_name','state_name','status','action'])
                            ->toJson();
    }

	public function index(){
		return view('state.index',['action'=>route('master.state.create')]);
	}
	public function index1(){
		return view('admin.state.index1');
	}

	public function create(){
		$data=Country::where('status','1')->get();
		return view('state.create',['data'=>$data,'bread'=>[]]);
	}

	public function store(Request $request){
		$requestedData=$request->all();

		$rules=[

			'countryName' => 'required',
			'stateName' => 'required|unique:states,state_name,NULL,id,country_id,'.$request->input('countryName'),

		];

		$customs=[
			'countryName.required'  => 'Country Name should be filled',
			'stateName.required'  	=> 'State Name should be filled',
			'stateName.unique'      => 'State Name already taken for this country',
		];

		$validator = Validator::make($request->all(), $rules,$customs);

        if ($validator->fails()) {
          return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
        }

        $data = new State;

        $data->country_id=$requestedData['countryName'];
        $data->state_name=$requestedData['stateName'];
        $data->save();

		$data1['msg'] = 'New State Added Successfully.';
        return response()->json($data1);
	}


	public function update(Request $request,$id){
		$requestedData=$request->all();

		$rules=[

			'countryName' => 'required',
			'stateName' => 'required|unique:states,state_name,NULL,id,country_id,'.$id,

		];

		$customs=[
			'countryName.required'  => 'Country Name should be filled',
			'stateName.required'  	=> 'State Name should be filled',
			'stateName.unique'      => 'State Name already taken for this country',
		];

		$validator = Validator::make(Input::all(), $rules,$customs);

        if ($validator->fails()) {
          return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
        }

        $data = State::findOrFail($id);

        $data->country_id=$requestedData['countryName'];
        $data->state_name=$requestedData['stateName'];
        $data->save();

		$data1['msg'] = 'State Updated Successfully.';
        return response()->json($data1);

	}

	public function status($id1,$id2)
      {
          $data = State::findOrFail($id1);
          $data->status = $id2;
          $data->update();
      }
	  public function status1($id1,$id2)
      {
          $data = Country::findOrFail($id1);
          $data->status = $id2;
          $data->update();
      }


    public function edit($id){
		$data=State::findOrFail($id);
		$data1=Country::where('status','1')->get();
		return view('admin.state.edit',compact('data','data1'));
	}


    public function destroy($id)
    {
        $data = State::findOrFail($id);

        $data->delete();
        //--- Redirect Section
        $data1['msg'] = 'Data Deleted Successfully.';
        return response()->json($data1);
        //--- Redirect Section Ends
    }

}
