<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\Category;
use App\Models\PayApproval;
use Auth;
use Validator;
use DataTables;
use DB;

class PayInApprovalController extends Controller
{

    public function __construct()
    {
        // $this->middleware('Permissions:Consultant_Approval_View',['only'=>['index']]);
        
    }
    
	public function datatables(Request $request){
        $search=[];
        $columns=$request->columns;
        foreach($columns as $colum){
            $search[] = $colum['search']['value'];
        }

        $datas = Appointment::with('consultant','customer','transaction','pay_approvals')->where('status','completed')->orderBy('id','desc')->get();
        // ->when($search[1],function($query,$search){
        //     return $query->where('countries.country_name','LIKE',"%{$search}%");
        // })
        //  dd($datas);
    
        return DataTables::of($datas)
        ->addIndexColumn()
        ->addColumn('booking', function (Appointment $datas){
           return  "B".$datas->id;
        })
        ->editColumn('appointment_date', function (Appointment $datas){
           return  date('d-m-Y H:i', strtotime($datas->appointment_date))."<br/>".$datas->appointment_type;
        })
        ->editColumn('consultant_id', function(Appointment $data){
            $consultant = $data->consultant;
            return ($consultant)?$consultant->name."<br/>".$consultant->phone_no."<br/>".$consultant->email : '';
        })
        ->editColumn('customer_id', function(Appointment $data){
            $customer = $data->customer;
            return ($customer)?$customer->name."<br/>".$customer->phone_no."<br/>".$customer->email: '';
        })
        ->addColumn('amount', function(Appointment $data){
            $transaction = $data->transaction;
            return ($transaction)?$transaction->amount : '';
        })
        ->editColumn('updated_at', function (Appointment $datas){
            return  date('d-m-Y H:i', strtotime($datas->updated_at)); 
        })
        ->addColumn('pay_in_status', function($datas){
            $status = $datas->pay_approvals;
            $temp = null;
            if($status !=""){
                if($status->pay_in_status == 2){
                return $temp = "<span class='badge badge-success'>Approved</span>";
                }
                if($status->pay_in_status == 3){
                    return  $temp = "<span class='badge badge-danger'>Decline</span>";
                }
                return 'Pending';
            }
        })     
        ->addColumn('action',function($datas){
            return [];
        })
        ->rawColumns(['appointment_date','consultant_id','customer_id','action','pay_in_status'])
        ->toJson(); //--- Returning Json Data To Client Side
    }


	public function index(){
		return view('approval.pay_approvals.pay_in');
	}

	public function status(Request $request){
        dd($request);
       
        if($request->status == 'Decline'){
            foreach ($request->id as $key => $id) {
                $approval = PayApproval::where('appointment_id',$id)->first();
                $approval->pay_in_status = 3;
                $approval->update();
            }
            return response()->json(['status'=>true,'msg'=>'Declined']);
        }
        if($request->status == 'Approve'){
            foreach ($request->id as $key => $id) {
                $approval = PayApproval::where('appointment_id',$id)->first();
                $approval->pay_in_status = 2;
                $approval->update();
            }
            return response()->json(['status'=>true,'msg'=>'Approved']);
        }
    }
    
}
