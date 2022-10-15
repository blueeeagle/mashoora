<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Country;
use App\Models\Consultant;
use App\Models\State;
use App\Models\City;
use Illuminate\Support\Facades\Input;
use DataTables;
use Illuminate\Support\Collection;
use Validator;

class CustomerController extends Controller
{
    public function __construct()
    {
        $this->middleware('Permissions:Customer_View',['only'=>['index']]);
        $this->middleware('Permissions:Customer_Create',['only'=>['create']]);
        $this->middleware('Permissions:Customer_Edit',['only'=>['edit']]);
        $this->middleware('Permissions:Customer_delete',['only'=>['destroy']]);

    }
    
    public function datatableDashboard(Request $request){
        $datas = Customer::orderBy('id','desc')->limit(10)->get();
        return DataTables::of($datas)
        ->addIndexColumn()
        ->addColumn('action', function(Customer $data){
            return ['edit'=> \route('user.customer.edit',$data->id)];
        })
        ->editColumn('created_at', function (Customer $data){
            return  $data->created_at->format('d/m/Y H:i:s');
        })
        ->rawColumns(['action'])
        ->toJson();
    }
    
    public function index(){
        $Country = Country::all();
        $State = State::all();
        $City = City::all();
        return view('customer.index',['City'=>$City,'State'=>$State,'Country'=>$Country]);
    }
    
     public function view(Customer $customer){
        $customer = Customer::with('state','country','city')->where('id',$customer->id)->get()->first();
        $consultant = Consultant::where('status',1)->get()->first();
        // dd($consultant);
        return \view('customer.view',['customer'=>$customer,'consultant'=>$consultant]);
    }

    public function datatable(Request $request){
        $search=[];
        $columns=$request->columns;
        foreach($columns as $colum){
            $search[] = $colum['search']['value'];
        }

        $datas = Customer::with('country')->with('state')->with('city')->when($search[1],function($query,$search){   return $query->where('phone_no','like',"%{$search}%");   })
        ->when($search[2],function($query,$search){   return $query->where('name','like',"%{$search}%");   })
        ->when($search[3],function($query,$search){ $search = explode(',',$search);  return $query->whereBetween('dob',$search);   })
        ->when($search[4],function($query,$search){   return $query->where('gender',$search);   })
        ->when($search[5],function($query,$search){   return $query->where('email','like',"%{$search}%");   })
        ->when($search[6],function($query,$search){   return $query->where('register_address','like',"%{$search}%");   })
        ->when($search[7],function($query,$search){   return $query->where('country_id',$search);   })
        ->when($search[8],function($query,$search){   return $query->where('state_id',$search);   })
        ->when($search[9],function($query,$search){   return $query->where('city_id',$search);   })
        ->when($search[10],function($query,$search){   return $query->where('zipcode','like',"%{$search}%");   })
        ->orderBy('id','desc')->get();

        return DataTables::of($datas)
        ->addIndexColumn()
        ->addColumn('country', function(Customer $data){
            $country = $data->country;
            return ($country)?$country->country_name : '';
        })
        ->addColumn('state', function(Customer $data){
            $state = $data->state;
            return ($state)?$state->state_name : '';
        })
        ->addColumn('city', function(Customer $data){
            $city = $data->city;
            return ($city)?$city->city_name : '';
        })
        ->editColumn('register_address', function(Customer $data){
            
            return $data->register_address;
        })
        ->addColumn('status', function(Customer $data) {
            $status = ($data->status == 1)?'checked':'' ;
            $route = \route('user.customer.status',$data->id);
                return "<div class='form-check form-switch form-check-custom form-check-solid'>
                        <input class='form-check-input' type='checkbox' status data-url='$route' value='' $status />
                    </div>";
        })
        ->addColumn('action', function(Customer $data){
            return ['Delete'=> \route('user.customer.destroy',$data->id),'edit'=> \route('user.customer.edit',$data->id),'view'=> \route('user.customer.view',$data->id)];
        })
        ->rawColumns(['status','action','register_address'])
        ->toJson();
    }

    public function create(){
        $countrys = Country::where('status',1)->get();
        return \view('customer.create',['countrys'=>$countrys]);
    }

    public function edit(Customer $customer){
        $countrys = Country::where('status',1)->get();
        $state = State::where('country_id',$customer->country_id)->where('status',1)->get();
        $city = City::where('state_id',$customer->state_id)->where('status',1)->get();
        return \view('customer.edit',['countrys'=>$countrys,'state'=>$state,'city'=>$city,'customer'=>$customer]);
    }

    public function store(Request $Request){

        $rules=[
			'phone_no' => 'required|unique:customers,phone_no,'.$Request->input('phone_no'),
		];

		$customs=[
			'phone_no.required'  => 'phone no Name should be filled',
			'phone_no.unique'      	=> 'phone no Name already taken',
		];

        $validator = Validator::make($Request->all(), $rules,$customs);

        if ($validator->fails()) {
          return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
        }
        $Customer = new Customer;
        $Customer->fill($Request->all());
        $Customer->status = (isset($Request->status)?1:0);
        $Customer->save();

       return response()->json(['msg'=>'Customer Addes']);
    }

	public function update(Request $Request,Customer $customer){
        $rules=[
			'phone_no' => "required|unique:customers,phone_no,$customer->id,id",
		];

		$customs=[
			'phone_no.required'  => 'phone no Name should be filled',
			'phone_no.unique'      	=> 'phone no Name already taken',
		];
        $validator = Validator::make($Request->all(), $rules,$customs);

        if ($validator->fails()) {
          return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
        }

		$Request->status = (isset($Request->status)?1:0);
        $customer->update($Request->all());

        return response()->json(['msg'=>'Update']);

    }

    public function destroy(Customer $customer){
        $customer->delete();
        $data1['msg'] = 'Data Deleted Successfully.';
        $data1['status'] = true;
        return response()->json($data1);
        //--- Redirect Section Ends
    }
    public function status(Request $request,Customer $customer){
        $customer->status = $request->status;
        $customer->update();
        return response()->json(['status'=>true,'msg'=>'Status Updated']);
    }
    public function search(Request $Request){
        $User = User::where('first_name','like',"%{$Request->search}%")->orWhere('last_name','like',"%{$Request->search}%")->orWhere('email','like',"%{$Request->search}%")->orWhere('phone','like',"%{$Request->search}%")->select(['id','first_name as text'])->get();
        $Customer = Firm::where('comapany_name','like',"%{$Request->search}%")->orWhere('legal_name','like',"%{$Request->search}%")->select(['id','comapany_name as text'])->get();
        $Consultant = Consultant::where('name','like',"%{$Request->search}%")->orWhere('phone_no','like',"%{$Request->search}%")->orWhere('email','like',"%{$Request->search}%")->select(['id','name as text'])->get();
        return response()->json([
                ["title"=>'User','children'=> $User],
                ["title"=>'Firm','children'=> $Firm],
                ["title"=>'Consultant','children'=> $Consultant],
            ]);
    }

}
