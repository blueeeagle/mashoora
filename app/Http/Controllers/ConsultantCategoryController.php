<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Consultantcategory;
use Illuminate\Support\Facades\Input;
use DataTables;
use Illuminate\Support\Collection;
use Validator;
use App\Models\Category;

class ConsultantCategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('Permissions:ConsultantCategoryController_view')->only('index');
    }

    public function index(){
        $Category = Category::where('type',0)->get();
        $ChildCategory = Category::where('type',0)->get();
        return view('consultantcategory.index',['Category'=>$Category,'ChildCategory'=>$ChildCategory]);
    }

    public function datatable(Request $request){
        $search=[];
        $columns=$request->columns;
        foreach($columns as $colum){
            $search[] = $colum['search']['value'];
        }

        $datas = Consultantcategory::when($search[1],function($query,$search){  return $query->where('title','LIKE',"%{$search}%"); })
        ->when($search[2],function($query,$search){  $search = \explode(',',$search);  return $query->whereIn('categorie_id',$search); })
        ->when($search[3],function($query,$search){  $search = \explode(',',$search);  return $query->whereIn('subcategorie_id',$search);  })
        ->orderBy('id','desc')->get();

        return DataTables::of($datas)
        ->addIndexColumn()
        ->addColumn('categorie_id', function(Consultantcategory $data){
            return $data->Category();
        })
        ->addColumn('subcategorie_id', function(Consultantcategory $data){
            return $data->SubCategory();
        })
        ->addColumn('status', function(Consultantcategory $data) {
            $status = ($data->status == 1)?'checked':'' ;
            $route = \route('master.consultantcategory.status',$data->id);
            return "<div class='form-check form-switch form-check-custom form-check-solid'>
                    <input class='form-check-input' type='checkbox' status data-url='$route' value='' $status />
                </div>";
        })
        ->addColumn('action', function(Consultantcategory $data){
            return ['Delete'=> \route('master.consultantcategory.destroy',$data->id),'edit'=> \route('master.consultantcategory.edit',$data->id)];
        })
        ->rawColumns(['status','action'])
        ->toJson();
    }

    public function create(){
        $Category = Category::where('type',0)->get();
        $ChildCategory = Category::where('type',1)->get();
        return \view('consultantcategory.create',['Category'=>$Category,'ChildCategory'=>$ChildCategory]);
    }
    public function edit($Document){
        $Consultantcategory = Consultantcategory::where('id',$Document)->first();
        $Category = Category::where('type',0)->get();
        $ChildCategory = Category::where('type',1)->where('categories_id',$Consultantcategory->subcategorie_id)->get();
        return \view('consultantcategory.edit',['Document'=>$Consultantcategory,'Category'=>$Category,'ChildCategory'=>$ChildCategory]);
    }
    public function store(Request $Request){

        $rules=[
			'title' => 'required|unique:consultantcategories,title,'.$Request->input('title'),
		];

		$customs=[
			'title.required'  => 'Title Name should be filled',
			'title.unique'      	=> 'Title Name already taken',
		];

        $validator = Validator::make($Request->all(), $rules,$customs);

        if ($validator->fails()) {
          return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
        }
        $Consultantcategory = new Consultantcategory();
        $Consultantcategory->title = $Request->title;
        $Consultantcategory->categorie_id = $Request->categorie_id;
        $Consultantcategory->subcategorie_id = $Request->subcategorie_id;
        $Consultantcategory->status =  (isset($Request->status)?1:0);
        $Consultantcategory->save();
        return response()->json(['msg'=>'Added']);
    }

	public function update(Request $Request,$id){
        $rules=[
			'title' => 'required|unique:consultantcategories,title,'.$id,
		];

		$customs=[
			'title.required'  => 'Title Name should be filled',
			'title.unique' => 'Title Name already taken',
		];
        $validator = Validator::make($Request->all(), $rules,$customs);

        if ($validator->fails()) {
          return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
        }
		$Consultantcategory = Consultantcategory::findOrFail($id);
        $Consultantcategory->title = $Request->title;
        $Consultantcategory->categorie_id = $Request->categorie_id;
        $Consultantcategory->subcategorie_id = $Request->subcategorie_id;
        $Consultantcategory->status =  (isset($Request->status)?1:0);
        $Consultantcategory->update();
        return response()->json(['msg'=>'Update']);

    }
    public function status(Request $request,Consultantcategory $Consultantcategory){
        $Consultantcategory->status = $request->status;
        $Consultantcategory->update();
        return response()->json(['status'=>true,'msg'=>'Status Updated']);
    }
    public function destroy(Consultantcategory $Consultantcategory){
        $Consultantcategory->delete();
        $data1['msg'] = 'Data Deleted Successfully.';
        $data1['status'] = true;
        return response()->json($data1);
    }

}
