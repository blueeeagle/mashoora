<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\State;
use App\Models\City;
use Auth;
use Validator;
use Illuminate\Support\Facades\Input;
use DataTables;
use Illuminate\Support\Collection;

class StateController extends Controller
{
    public function __construct()
    {
        $this->middleware('Permissions:State_View',['only'=>['index']]);
        $this->middleware('Permissions:State_Create',['only'=>['create']]);
        $this->middleware('Permissions:State_Edit',['only'=>['edit']]);
        $this->middleware('Permissions:State_delete',['only'=>['destroy']]);

    }
    
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
            ->addColumn('status', function(State $data) {
                $status = ($data->status == 1)?'checked':'' ;
                $route = \route('master.state.status',$data->id);
                    return "<div class='form-check form-switch form-check-custom form-check-solid'>
                            <input class='form-check-input' type='checkbox' status data-url='$route' value='' $status />
                        </div>";
            })
            ->addColumn('action', function(State $data){
                return ['Delete'=> \route('master.state.destroy',$data->id),'edit'=> \route('master.state.edit',$data->id)];
            })
            ->rawColumns(['status','action'])
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


	public function update(Request $request,State $state){
		$requestedData=$request->all();
		$rules=[
			'country_id' => 'required',
			'state_name' => 'required|unique:states,state_name,'.$state->id.',id,country_id,'.$request->country_id.',state_name,'.$request->state_name,
		];
		$customs=[
			'country_id.required'  => 'Country Name should be filled',
			'state_name.required'  	=> 'State Name should be filled',
			'state_name.unique'      => 'State Name already taken for this country',
		];
		$validator = Validator::make($request->all(), $rules,$customs);
        if ($validator->fails()) {
          return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
        }

        $state->country_id=$request->country_id;
        $state->state_name=$request->state_name;
        $state->update();
		$data1['msg'] = 'State Updated Successfully.';
        return response()->json($data1);
	}

	public function status(Request $request,State $state)
      {
          $state->status = $request->status;
          $state->update();
          return response()->json(['status'=>true,'msg'=>'Status Updated']);
      }

    public function edit(Request $request,State $state){
		$data = Country::where('status','1')->get();
		return view('state.edit',compact('state','data'));
	}

    public function destroy(State $state)
    {
        $state->delete();
        $data1['msg'] = 'Data Deleted Successfully.';
        $data1['status'] = true;
        return response()->json($data1);
    }

}
