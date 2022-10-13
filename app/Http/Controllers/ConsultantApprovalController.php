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
                $template .= $cat[$i]->name."<br>";       
            }
            return $template;
          
        })
        ->addColumn('dropdown',function($datas){
            return [
                'ped'=> route('approval.consultant.status',['consultant'=>$datas->id,'status'=>1]),
                'acc'=> route('approval.consultant.status',['consultant'=>$datas->id,'status'=>2]),
                'dec'=> route('approval.consultant.status',['consultant'=>$datas->id,'status'=>3]),
                'select' => $datas->approval
            ];
        })        
        ->addColumn('option',function($datas){
            return ['view'=> \route('consultant.consultant.edit',$datas->id)];
        })
        ->rawColumns(['category','status','action'])
        ->toJson(); //--- Returning Json Data To Client Side
    }


	public function index(){
		return view('approval.consultant.index');
	}

	
	public function status(Consultant $consultant,$status){
        $error = [];
        $errorstat = false;

        if($consultant->com_con_amount == ""){
            $error[]  = 'Update Commission Amount';
            $errorstat = true;
        }
        if($consultant->com_off_amount == ""){
            $error[]  = 'Update Commission Offer Amount';
            $errorstat = true;
        }
        if($consultant->com_pay_amount == ""){
            $error[]  = 'Update Commission Pay Amount';
            $errorstat = true;
        }
        if($errorstat && $status == 2){
            return response()->json(['status'=>false,'error'=>$error]);
        }
        $consultant->approval = $status;
        $consultant->update();
        return response()->json(['status'=>true,'msg'=>'Status Updated']);
    }

    
}
