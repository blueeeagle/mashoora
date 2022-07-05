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
        return view('consultantcategory.index');
    }

    public function datatable(){
        $datas = Consultantcategory::orderBy('id','desc')->get();
        return DataTables::of($datas)
        ->addIndexColumn()
        ->addColumn('title', function(Consultantcategory $data) {
            return $data->title;
        })
        ->addColumn('categorie_id', function(Consultantcategory $data) {
            return $data->Category();
        })
        ->addColumn('subcategorie_id', function(Consultantcategory $data) {
            return $data->SubCategory();
        })
        ->addColumn('status', function(Consultantcategory $data) {
            return $data->status;
        })
        ->addColumn('action', function(Consultantcategory $data) {
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
        ->rawColumns(['title','categorie_id','subcategorie_id','status','action'])
        ->toJson();
    }
    // public function datatable(Request $request)
    // {
    //     $search=[];
    //     $columns=$request->columns;
    //     foreach($columns as $colum){
    //         $search[] = $colum['search']['value'];
    //     }

    //     $data = Document::orderBy('id','desc')->get();
    //     $recordsFiltered = count($data);
    //     $recordsTotal = Document::count();
    //     $rangeRow = (new Collection($data));

    //     return response()->json(['data'=>$rangeRow,'recordsFiltered'=>$recordsFiltered,'recordsTotal'=>$recordsTotal]);

    // }

    public function create(){
        $Category = Category::where('type',0)->get();
        $ChildCategory = Category::where('type',1)->get();
        return \view('consultantcategory.create',['Category'=>$Category,'ChildCategory'=>$ChildCategory]);
    }
    public function edit($Document){
        $Consultantcategory = Consultantcategory::where('id',$Document)->first();
        $Category = Category::where('type',0)->get();
        $ChildCategory = Category::where('type',1)->get();
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

}
