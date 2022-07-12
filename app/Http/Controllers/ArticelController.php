<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\User;
use App\Models\Firm;
use App\Models\Consultant;
use Illuminate\Support\Facades\Input;
use DataTables;
use Illuminate\Support\Collection;
use Validator;

class ArticelController extends Controller
{
    public function index(){
        return view('article.index');
    }

    public function datatable(){
        $datas = Article::orderBy('id','desc')->get();
        return DataTables::of($datas)
        ->addIndexColumn()
        ->toJson();
    }

    public function create(){
        return \view('article.create');
    }
    public function edit(Article $Document ){
        return \view('document.edit',['Document'=>$Document]);
    }
    public function store(Request $Request){

        $rules=[
			'title' => 'required|unique:articles,title,'.$Request->input('title'),
		];

		$customs=[
			'title.required'  => 'Title Name should be filled',
			'title.unique'      	=> 'Title Name already taken',
		];

        $validator = Validator::make($Request->all(), $rules,$customs);

        if ($validator->fails()) {
          return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
        }
        $Article = new Article;
        $Article->fill($Request->all());

        $IMGname = $Request->file('image')->getClientOriginalName();
        $path = $Request->file('image')->store('public/Articel');
        $Article->image = $path;
        $Article->status = (isset($Request->status)?1:0);
        $Article->save();

       return response()->json(['msg'=>'Articel Addes']);
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
