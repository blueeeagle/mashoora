<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Consultant;
use App\Models\Category;
use Auth;
use Validator;
use DataTables;
use DB;

class ConsultantApprovalController extends Controller
{

    public function __construct()
    {
        $this->middleware('Permissions:Consultant_Approval_View',['only'=>['index']]);
        
    }
    
	public function datatables(Request $request){
        $search=[];
        $columns=$request->columns;
        foreach($columns as $colum){
            $search[] = $colum['search']['value'];
        }

        $datas = Consultant::orderBy('id','desc')->get();
        // ->when($search[1],function($query,$search){
        //     return $query->where('countries.country_name','LIKE',"%{$search}%");
        // })
        //  dd($datas);
    
        return DataTables::of($datas)
        ->addIndexColumn()
        ->editColumn('created_at', function (Consultant $datas){
           return  $datas->created_at->format('d/m/Y');
        })
        ->editColumn('updated_at', function(Consultant $datas){
            return $datas->updated_at->format('d/m/Y H:i:s');
        })
        ->addColumn('category', function(Consultant $datas){
            $cat = Category::whereIn('id',explode(',',$datas->categorie_id))->get();
            $template='';
            for($i = 0;$i<count($cat); $i++){
                $template .= "<span class='badge badge-success'>".$cat[$i]->name."</span>"."<br/>";       
            }
            return $template;
          
        })
        ->editColumn('approval',function(Consultant $datas){
            if($datas->approval == 2){
                return $temp = "<span class='badge badge-success'>Approved</span>";
            }
            if($datas->approval == 3){
                return  $temp = "<span class='badge badge-danger'>Decline</span>";
            }
            return 'Pending';
        })        
        ->addColumn('option',function($datas){
            return ['view'=> \route('consultant.consultant.view',$datas->id)];
        })
        ->addColumn('select',function($datas){
            return ['select'];
        })
        ->rawColumns(['category','status','approval'])
        ->toJson(); //--- Returning Json Data To Client Side
    }


	public function index(){
		return view('approval.consultant.index');
	}

	public function status(Request $request){
        // dd($request);
        if($request->status == 'Decline'){
            foreach ($request->id as $key => $id) {
                $approval = Consultant::where('id',$id)->first();
                $approval->approval = 3;
                $approval->update();
            }
            return response()->json(['status'=>true,'msg'=>'Declined']);
        }
        if($request->status == 'Approve'){
            foreach ($request->id as $key => $id) {
                $approval = Consultant::where('id',$id)->first();
                $approval->approval = 2;
                $approval->update();
            }
            return response()->json(['status'=>true,'msg'=>'Approved']);
        }
    }

    
}
