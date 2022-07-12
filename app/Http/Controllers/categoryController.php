<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Support\Facades\Input;
use DataTables;
use Illuminate\Support\Collection;
use Validator;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    public function index(){
        $Category = Category::where('type',0)->get();
        return view('category.index',['Category'=>$Category]);
    }

    public function datatable(Request $request){
        $search=[];
        $columns=$request->columns;
        foreach($columns as $colum){
            $search[] = $colum['search']['value'];
        }

        $datas = Category::when($search[1],function($query,$search){   return $query->where('type',$search);   })
        ->when($search[2],function($query,$search){ return $query->where('name','like',"%{$search}%");   })
        ->when($search[3],function($query,$search){ $search = \explode(',',$search); return $query->whereIn('categories_id',$search);   })
        ->when($search[4],function($query,$search){ return $query->where('description','like',"%{$search}%");   })
        ->when($search[5],function($query,$search){ return $query->where('tags','like',"%{$search}%");   })
        ->when($search[6],function($query,$search){ return $query->where('display_in_home',$search);   })
        ->when($search[7],function($query,$search){ return $query->where('status',$search);   })
        ->orderBy('id','desc')->get();


        return DataTables::of($datas)
        ->addIndexColumn()
        // ->addColumn('type', function(Category $data) {  return ($data->type == 0)?'Parent':'Child';  })
        ->addColumn('display_in_home', function(Category $data) {
            $status = ($data->display_in_home == 1)?'checked':'' ;
            $route = \route('master.category.display_in_home',$data->id);
            return "<div class='form-check form-switch form-check-custom form-check-solid'>
                    <input class='form-check-input' type='checkbox' status data-url='$route' value=''$status />
                </div>";
        })
        // ->addColumn('categories_id', function (Category $data){
        //     if($data->categories_id) return $data->child->name;
        //     return "";
        // })
        ->addColumn('status', function(Category $data) {
            $status = ($data->status == 1)?'checked':'' ;
            $route = \route('master.category.status',$data->id);
            return "<div class='form-check form-switch form-check-custom form-check-solid'>
                    <input class='form-check-input' type='checkbox' status data-url='$route' value='' $status />
                </div>";
        })
        ->addColumn('action', function(Category $data){
            return ['Delete'=> \route('master.category.destroy',$data->id),'edit'=> \route('master.category.edit',$data->id),'Delete_text' => ($data->type == 0)?'If You Delete Parent Child also Delete':null];
        })
        ->addColumn('img', function(Category $data){
            $exists = Storage::disk('public_custom')->exists($data->img);
            if($exists) return "<img     width = 120
            height = 150 src='".asset("storage/$data->img")."' />";
            return "";
        })

        ->rawColumns(['type','status','action','img','display_in_home','categories_id'])
        ->toJson();
    }

    public function create(){
        $Category = Category::where('type',0)->get();
        return \view('category.create',['Category'=>$Category]);
    }
    public function edit(Category $Category){
        $Parent = Category::where('type',0)->get();
        return \view('category.edit',['Category'=>$Category,'Parent'=>$Parent]);
    }
    public function store(Request $Request){

        $rules=[
			'name' => 'required|unique:categories,name,'.$Request->input('name'),
            'img'  => 'required'
		];

		$customs=[
			'name.required'  => 'Title Name should be filled',
			'img.required'  => 'Choose a Image',
			'name.unique'      	=> 'Title Name already taken',
		];

        $validator = Validator::make($Request->all(), $rules,$customs);

        if ($validator->fails()) {
          return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
        }
        $IMGname = $Request->file('img')->getClientOriginalName();
        $path = $Request->file('img')->store('uploadFiles/category','public_custom');

        $Category = new Category();
        $Category->type = $Request->type;
        $Category->name = $Request->name;
        $Category->categories_id = $Request->categories_id;
        $Category->description = $Request->description;
        $Category->tags = $Request->tags;
        $Category->sort_no_list = $Request->sort_no_list;
        $Category->sort_no_home = $Request->sort_no_home;
        $Category->display_in_home = (isset($Request->display_in_home)?1:0);
        $Category->status =  (isset($Request->status)?1:0);

        $Category->img = $path;
        $Category->save();

        return response()->json(['msg'=>'Category Added']);
    }

	public function update(Request $Request,$id){
        $rules=[
			'name' => 'required|unique:categories,name,'.$id,
		];

		$customs=[
			'name.required'  => 'Title Name should be filled',
			'name.unique'      	=> 'Title Name already taken',
		];
        $validator = Validator::make($Request->all(), $rules,$customs);

        if ($validator->fails()) {
          return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
        }
        if(isset($Request->img)){
            $IMGname = $Request->file('img')->getClientOriginalName();
            $path = $Request->file('img')->store('uploadFiles/category','public_custom');
        }

		$Category = Category::findOrFail($id);
        $Category->type = $Request->type;
        $Category->name = $Request->name;
        $Category->categories_id = ($Request->type == 1)?$Request->categories_id:'';
        $Category->description = $Request->description;
        $Category->tags = $Request->tags;
        $Category->sort_no_list = $Request->sort_no_list;
        $Category->sort_no_home = $Request->sort_no_home;
        $Category->display_in_home = (isset($Request->display_in_home)?1:0);
        $Category->status =  (isset($Request->status)?1:0);
        if(isset($Request->img)){
            $Category->img = $path;
        }

        $Category->update();
        return response()->json(['msg'=>'Update']);

    }
    public function status(Request $request,Category $category){
        $category->status = $request->status;
        $category->update();
        return response()->json(['status'=>true,'msg'=>'Status Updated']);
    }
    public function destroy(Category $category){
        if($category->type == 0){
            $cat = Category::where('categories_id',$category->id)->get();
            foreach ($cat as $key => $value) {
                # code...
                $value->delete();
            }
            $category->delete();
            $data1['msg'] = 'Data Deleted Successfully.';
            $data1['status'] = true;
            return response()->json($data1);
        }else{
            $category->delete();
            $data1['msg'] = 'Data Deleted Successfully.';
            $data1['status'] = true;
            return response()->json($data1);
        }
    }
    public function display_in_home(Request $request,Category $category){
        $category->display_in_home = $request->status;
        $category->update();
        return response()->json(['status'=>true,'msg'=>'Status Updated']);
    }
    public function getchild(Request $Request,Category $category){
        $child = Category::where('categories_id',$category->id)->where('status',1)->get();
    	return response()->json(['child'=>$child]);
    }
}
