<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Country;
use Illuminate\Support\Facades\Input;
use DataTables;
use Illuminate\Support\Collection;
use Validator;

class CustomerController extends Controller
{
    public function index(){
        return view('customer.index');
    }

    public function datatable(){
        $datas = Customer::orderBy('id','desc')->get();
        return DataTables::of($datas)
        ->addIndexColumn()
        ->toJson();
    }

    public function create(){
        $countrys = Country::where('status',1)->get();
        return \view('customer.create',['countrys'=>$countrys]);
    }

    public function edit(Article $Document ){
        return \view('customer.edit',['Document'=>$Document]);
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

	public function update(Request $Request,$id){
        $rules=[
			'title' => 'required|unique:documents,title,'.$id,
		];

		$customs=[
			'title.required'  => 'Title Name should be filled',
			'title.unique' => 'Title Name already taken',
		];
        $validator = Validator::make($Request->all(), $rules,$customs);

        if ($validator->fails()) {
          return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
        }
		$Document = Document::findOrFail($id);
        $Document->title = $Request->title;
        $Request->status = (isset($Request->status)?1:0);
        $Document->update();
        return response()->json(['msg'=>'Update']);

    }

    public function search(Request $Request){
        $User = User::where('first_name','like',"%{$Request->search}%")->orWhere('last_name','like',"%{$Request->search}%")->orWhere('email','like',"%{$Request->search}%")->orWhere('phone','like',"%{$Request->search}%")->select(['id','first_name as text'])->get();
        $Firm = Firm::where('comapany_name','like',"%{$Request->search}%")->orWhere('legal_name','like',"%{$Request->search}%")->select(['id','comapany_name as text'])->get();
        $Consultant = Consultant::where('name','like',"%{$Request->search}%")->orWhere('phone_no','like',"%{$Request->search}%")->orWhere('email','like',"%{$Request->search}%")->select(['id','name as text'])->get();
        return response()->json([
                ["title"=>'User','children'=> $User],
                ["title"=>'Firm','children'=> $Firm],
                ["title"=>'Consultant','children'=> $Consultant],
            ]);
    }

}
