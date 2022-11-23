<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\Category;
use App\Models\PayApproval;
use App\Models\wallet;
use App\Models\Payment;
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
        $datas =  Appointment::with('consultant','customer','transaction','pay_approvals')->where('status','completed')->where('pay_in',1)->orderBy('id','desc')->get();

        if($request->searchTable == 'Approved') $datas =  Appointment::with('consultant','customer','transaction','pay_approvals')->where('status','completed')->where('pay_in',2)->orderBy('id','desc')->get();
        if($request->searchTable == 'Decline') $datas = Appointment::with('consultant','customer','transaction','pay_approvals')->where('status','completed')->where('pay_in',3)->orderBy('id','desc')->get();

        return DataTables::of($datas)
        ->addIndexColumn()
        ->editColumn('customer_id', function(Appointment $datas) {
            $datas->booking;
            if(isset($datas->customer)) $datas->customer->country;
            return $datas->customer;
        })
        ->editColumn('status', function(Appointment $datas) {
            if(($datas->status)== "Completed" )
            return $temp = "<span class='badge badge-success'>Completed</span>";
        })
        ->addColumn('consultant_id', function(Appointment $datas) {
            return $datas->booking->consultant;
        })
        ->addColumn('cus_date_slot', function(Appointment $datas){

            if(!isset($datas->booking)) return [];
            $date = date_create($datas->appointment_date);
            $Time = date_format($date,"h:i a")." - ". date("h:i a",strtotime(date_format($date,"Y-m-d H:i")) + $datas->booking->consultant->preferre_slot*60);
          
            return ['Date'=>date_format($date,"M d,Y,l"),'Time'=>$Time,'Amount'=>$datas->booking->customercurrnecy->currencycode.' ' .number_format($datas->booking->amount,2)];

        })
        ->addColumn('cons_date_slot', function(Appointment $datas){
            if(!isset($datas->booking)) return [];
            $date = strtotime($datas->appointment_date) - ($datas->booking->diff);
            $date = date("Y-m-d H:i",$date);
            $date = date_create($date);
           
            $Time = date_format($date,"h:i a")." - ". date("h:i a",strtotime(date_format($date,"Y-m-d H:i")) + $datas->booking->consultant->preferre_slot*60);
            $temp = $datas->booking->consultant->com_con_amount;
            if(isset($temp)){
                $ComissionAmount = $datas->booking->consultant->com_con_amount;
            }
            else{
                 $ComissionAmount=0;
            }
            return ['Date'=>date_format($date,"M d,Y,l"),'Time'=>$Time,'Amount'=>$datas->booking->consultantcurrency->currencycode.' '.number_format(($datas->booking->amount/$datas->booking->customercurrnecy->price)*$datas->booking->consultantcurrency->price,2),'ComissionAmount'=>$ComissionAmount];
        })
        ->addColumn('pay_in_status', function($datas){
        
            if($datas->pay_in == 2){
            return $temp = "<span class='badge badge-success'>Approved</span>";
            }
            if($datas->pay_in == 3){
                return  $temp = "<span class='badge badge-danger'>Decline</span>";
            }
            return 'Pending';
        })     
      
        ->addColumn('action',function($datas){
            return [];
        })
        ->rawColumns(['status','pay_in_status','cons_date_slot','cus_date_slot'])
        ->toJson(); //--- Returning Json Data To Client Side
    }


	public function index(){
		return view('approval.pay_approvals.pay_in');
	}

    function GETComm_Amount($consultant,$customercurrnecy,$consultantcurrency,$amount){
        if($consultant->com_con_type == 0){
            $comm_Amount =  ($consultant->com_con_amount/$consultantcurrency->price)*$customercurrnecy->price;
            return (($amount - $comm_Amount)/$customercurrnecy->price)*$consultantcurrency->price;
        }else{
            $comm_Amount = ($amount/100)*$consultant->com_con_amount;
            return (($amount - $comm_Amount)/$customercurrnecy->price)*$consultantcurrency->price;
        }
        //log           
    }

	public function status(Request $request){
         
        $approval = Appointment::whereIn('id',$request->id)->get();
        $failed = [];
        foreach ($approval as $key => $value) {
            # code...
            if($value->pay_in ==  1 && $value->status == 'Completed') {
                try {
                    $Booking = unserialize(bzdecompress(utf8_decode($value->rawdata)));
                    
                    $consultant = $Booking->consultant;
                    $Amount = $this->GETComm_Amount($consultant,$Booking->customercurrnecy,$Booking->consultantcurrency,$Booking->amount);
                    $value->pay_in = 2;                
                    $value->update();
                    $wallet = wallet::where('consultant_id',$value->consultant_id)->first();
                    $this->addsubammountcustomer($Amount,'add','Pay In',$wallet,$value->id);

                   
                } catch (\Throwable $th) {
                    //throw $th;
                    $failed[] = $value->id;
                   
                }                
            }
        }
        
        return response()->json(['status'=>true,'msg'=>'Approved']);

    }

    function addsubammountcustomer($amount,$type,$action,$Wallet,$appointment_id){

        $Payment = new Payment;
        $Payment->amount = $amount;
        $Payment->type = $type;
        $Payment->action = $action;
        $Payment->consultant_id = $Wallet->consultant_id;
        $Payment->appointment_id = $appointment_id;
        $Payment->save();

        // dd($Payment);
        if($type == 'add') $Wallet->balance = $Wallet->balance + $amount;
        else $Wallet->balance = $Wallet->balance - $amount;
        $Wallet->update();

        return $Payment;
    }

    public function view(Request $request)
    {
        $appointment = Appointment::with('consultant','customer','transaction','pay_approvals')->where('id',$request->id)->first();

        $temp = $appointment->booking->consultant->com_con_amount;
            if(isset($temp)){
                $ComissionAmount = $appointment->booking->consultant->com_con_amount;
            } else{
                 $ComissionAmount=0;
            }

        $customerTimeZone ='';
        $consultantTimeZone ='';
        // Consultant time
        $date = strtotime($appointment->appointment_date) - ($appointment->booking->diff);
        $date = date("Y-m-d H:i",$date);
        $date = date_create($date);
        $con_date_model = date_format($date,"M d,Y,l");
        
        // customer time
       $cus_date = date_create($appointment->appointment_date);
       $cus_date_model = date_format($cus_date,"M d,Y,l");
       
       $conAmount = $appointment->booking->consultantcurrency->currencycode.' '.number_format(($appointment->booking->amount/$appointment->booking->customercurrnecy->price)*$appointment->booking->consultantcurrency->price,2);
       $cusAmount = $appointment->booking->customercurrnecy->currencycode.' ' .number_format($appointment->booking->amount,2);
       
       if(isset($appointment->customer)){
           $customerTimeZone = \DateTimeZone::listIdentifiers(\DateTimeZone::PER_COUNTRY, $appointment->customer->country_code);
       }
       
       $consultantTimeZone = \DateTimeZone::listIdentifiers(\DateTimeZone::PER_COUNTRY, $appointment->booking->consultant->country_code);
       $consultantTime = date_format($date,"h:i a")." - ". date("h:i a",strtotime(date_format($date,"Y-m-d H:i")) + $appointment->booking->consultant->preferre_slot*60);
       $customerTime = date_format($cus_date,"h:i a")." - ". date("h:i a",strtotime(date_format($cus_date,"Y-m-d H:i")) + $appointment->booking->consultant->preferre_slot*60);
       
       $appointment['conAmount']= $conAmount;
       $appointment['cusAmount']= $cusAmount;
       $appointment['consultantTimeZone']= $customerTimeZone;
       $appointment['consultantTimeZone']= $consultantTimeZone;
       $appointment['consultantTime']= $consultantTime;
       $appointment['customerTime']= $customerTime;
       $appointment['customerDate']= $cus_date_model;
       $appointment['consultantDate']= $con_date_model;
       $appointment['ComissionAmount']= $ComissionAmount;
       
       
       // dd($customerTime);
       unset($appointment->rawdata);
       return response()->json(['status'=>true,'App_data'=>$appointment]);
    }

}
