<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Language;
use Illuminate\Support\Facades\Input;
use DataTables;
use Illuminate\Support\Collection;
use Validator;

class LanguagesController extends Controller
{
    public function __construct()
    {
        $this->middleware('Permissions:Language_View',['only'=>['index']]);
        $this->middleware('Permissions:Language_Create',['only'=>['create']]);
        $this->middleware('Permissions:Language_Edit',['only'=>['edit']]);
        $this->middleware('Permissions:Language_delete',['only'=>['destroy']]);

    }

    public function index(){
        return view('language.index');
    }

    public function datatable(Request $request){
        $search=[];
        $columns=$request->columns;
        foreach($columns as $colum){
            $search[] = $colum['search']['value'];
        }

        $datas = Language::when($search[1],function($query,$search){
            return $query->where('title','LIKE',"%{$search}%");
        })->orderBy('id','desc')->get();


        return DataTables::of($datas)
        ->addIndexColumn()
        ->editColumn('created_at', function (Language $datas){
            // return date('d-m-Y H:i:s',strtotime($datas->created_at));
            return  $datas->created_at->format('d/m/Y H:i:s');
         })
        ->addColumn('status', function(Language $datas) {
            $status = ($datas->status == 1)?'checked':'' ;
            $route = \route('master.language.status',$datas->id);
            return "<div class='form-check form-switch form-check-custom form-check-solid'>
                    <input class='form-check-input' type='checkbox' status data-url='$route' value='' $status />
                </div>";
        })
        ->addColumn('action', function(Language $datas){
            return ['Delete'=> \route('master.language.destroy',$datas->id),'edit'=> \route('master.language.edit',$datas->id)];
        })
        ->rawColumns(['status','action'])
        ->toJson();
    }

    public function create(){
        return \view('language.create');
    }
    public function edit(Language $language ){
        return \view('language.edit',['language'=>$language]);
    }
    public function store(Request $Request){

        $rules=[
			'title' => 'required|unique:languages,title,'.$Request->input('title'),
		];

		$customs=[
			'title.required'  => 'Title Name should be filled',
			'title.unique'      	=> 'Title Name already taken',
		];

        $validator = Validator::make($Request->all(), $rules,$customs);

        if ($validator->fails()) {
          return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
        }
        $language = new Language();
        $language->title = $Request->title;
        $language->save();
        return response()->json(['msg'=>'Language Added']);
    }

	public function update(Request $Request,Language $language){
        // dd($Document);
        $rules=[
			'title' => "required|unique:languages,title,$language->id,id",
		];

		$customs=[
			'title.required'  => 'Title Name should be filled',
			'title.unique' => 'Title Name already taken',
		];
        $validator = Validator::make($Request->all(), $rules,$customs);

        if ($validator->fails()) {
          return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
        }
        $language->title = $Request->title;
        $language->update();
        return response()->json(['msg'=>'Update']);
    }

    public function status(Request $request,Language $language){
        $language->status = $request->status;
        $language->update();
        return response()->json(['status'=>true,'msg'=>'Status Updated']);
    }

    public function destroy(Language $language){
        $language->delete();
        $data1['msg'] = 'Data Deleted Successfully.';
        $data1['status'] = true;
        return response()->json($data1);
    }

}
