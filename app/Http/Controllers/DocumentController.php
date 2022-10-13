<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Document;
use Illuminate\Support\Facades\Input;
use DataTables;
use Illuminate\Support\Collection;
use Validator;

class DocumentController extends Controller
{
    public function __construct()
    {
        $this->middleware('Permissions:Document_View',['only'=>['index']]);
        $this->middleware('Permissions:Document_Create',['only'=>['create']]);
        $this->middleware('Permissions:Document_Edit',['only'=>['edit']]);
        $this->middleware('Permissions:Document_delete',['only'=>['destroy']]);
    }
    
    public function index(){
        return view('document.index');
    }

    public function datatable(Request $request){
        $search=[];
        $columns=$request->columns;
        foreach($columns as $colum){
            $search[] = $colum['search']['value'];
        }

        $datas = Document::when($search[1],function($query,$search){
            return $query->where('title','LIKE',"%{$search}%");
        })->orderBy('id','desc')->get();


        return DataTables::of($datas)
        ->addIndexColumn()
        ->editColumn('created_at', function(Document $data){
            $date=date_create($data->created_at);
            return  date_format($date,"Y-m-d");
        })
        ->addColumn('status', function(Document $data) {
            $status = ($data->status == 1)?'checked':'' ;
            $route = \route('master.documents.status',$data->id);
            return "<div class='form-check form-switch form-check-custom form-check-solid'>
                    <input class='form-check-input' type='checkbox' status data-url='$route' value='' $status />
                </div>";
        })
        ->addColumn('action', function(Document $data){
            return ['Delete'=> \route('master.documents.destroy',$data->id),'edit'=> \route('master.documents.edit',$data->id)];
        })
        ->rawColumns(['status','action'])
        ->toJson();
    }

    public function create(){
        return \view('document.create');
    }
    public function edit(Document $Document ){
        return \view('document.edit',['Document'=>$Document]);
    }
    public function store(Request $Request){

        $rules=[
			'title' => 'required|unique:documents,title,'.$Request->input('title'),
		];

		$customs=[
			'title.required'  => 'Title Name should be filled',
			'title.unique'      	=> 'Title Name already taken',
		];

        $validator = Validator::make($Request->all(), $rules,$customs);

        if ($validator->fails()) {
          return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
        }
        $Document = new Document();
        $Document->title = $Request->title;
        $Document->save();
        return response()->json(['msg'=>'Document Added']);
    }

	public function update(Request $Request,Document $Document){
        // dd($Document);
        $rules=[
			'title' => "required|unique:documents,title,$Document->id,id",
		];

		$customs=[
			'title.required'  => 'Title Name should be filled',
			'title.unique' => 'Title Name already taken',
		];
        $validator = Validator::make($Request->all(), $rules,$customs);

        if ($validator->fails()) {
          return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
        }
        $Document->title = $Request->title;
        $Document->update();
        return response()->json(['msg'=>'Update']);
    }

    public function status(Request $request,Document $document){
        $document->status = $request->status;
        $document->update();
        return response()->json(['status'=>true,'msg'=>'Status Updated']);
    }

    public function destroy(Document $document){
        $document->delete();
        $data1['msg'] = 'Data Deleted Successfully.';
        $data1['status'] = true;
        return response()->json($data1);
    }

}
