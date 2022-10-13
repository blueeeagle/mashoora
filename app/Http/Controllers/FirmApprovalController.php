<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Firm;
use App\Models\Category;
use Auth;
use Validator;
use DataTables;
use DB;


class FirmApprovalController extends Controller
{
    public function __construct()
    {
        $this->middleware('Permissions:Firm_Approval_View',['only'=>['index']]);
       
    }
    public function datatables(Request $request){
        $search=[];
        $columns=$request->columns;
        foreach($columns as $colum){
            $search[] = $colum['search']['value'];
        }

        $datas = Firm::orderBy('id','desc')->get();
        // ->when($search[1],function($query,$search){
        //     return $query->where('countries.country_name','LIKE',"%{$search}%");
        // })
        //   dd($datas);
    
        return DataTables::of($datas)
        ->addIndexColumn()
        ->editColumn('created_at', function (Firm $datas){
           return  $datas->created_at->format('d/m/Y');
        })
        ->editColumn('updated_at', function(Firm $datas){
            return $datas->updated_at->format('d/m/Y H:i:s');
        })
        ->addColumn('category', function(Firm $datas){
            $cat = Category::whereIn('id',explode(',',$datas->categorie_id))->get();
            $template='';
            for($i = 0;$i<count($cat); $i++){
                $template .=  $cat[$i]->name."<br>";       
            }
            return $template;
          
        })
        ->addColumn('dropdown',function($datas){
            return [
                'ped'=> route('approval.firm.status',['firm'=>$datas->id,'status'=>1]),
                'acc'=> route('approval.firm.status',['firm'=>$datas->id,'status'=>2]),
                'dec'=> route('approval.firm.status',['firm'=>$datas->id,'status'=>3]),
                'select' => $datas->approval
            ];
        })        
        ->addColumn('option',function($datas){
            return ['view'=> \route('user.firms.edit',$datas->id)];
        })
        ->rawColumns(['category','status','action'])
        ->toJson(); //--- Returning Json Data To Client Side
    }


	public function index(){
		return view('approval.firm.index');
	}

	public function status(Firm $firm,$status){
       
        $firm->approval = $status;
        $firm->update();
        return response()->json(['status'=>true,'msg'=>'Status Updated']);
    }
}
