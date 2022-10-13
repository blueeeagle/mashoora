<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\User;
use App\Models\Appointment;
use Illuminate\Support\Facades\Input;
use DataTables;
use Illuminate\Support\Collection;
use Validator;

class AppointmentController extends Controller
{
  
    public function index(){
        return view('history.appointment.index');
    }

    public function datatable(Request $request){
        $search=[];
        $columns=$request->columns;
        foreach($columns as $colum){
            $search[] = $colum['search']['value'];
        }
        // dd(now());
        $datas = Appointment::with('customer','consultant')
                ->when($search[4],function($query,$search){ return $query->where('status',$search);   })
                ->whereDate('appointment_date', now())
                ->get();

        // dd($datas);
        return DataTables::of($datas)
        ->addIndexColumn()
        ->editColumn('appointment_date', function(Appointment $datas) {
            
            return  date("H:i:s", strtotime($datas->appointment_date));
        })
        ->editColumn('customer_id', function(Appointment $datas) {
            $customer = $datas->customer;
            return  ($customer)? $customer->name:'';
        })
        ->editColumn('consultant_id', function(Appointment $datas) {
            $consultant = $datas->consultant;
            return  ($consultant)? $consultant->name:'';
        })
        ->addColumn('mobile', function(Appointment $datas) {
            $customer = $datas->customer;
            return  ($customer)? $customer->phone_no:'';
        })
        ->addColumn('email', function(Appointment $datas) {
            $customer = $datas->customer;
            return  ($customer)? $customer->email:'';
        })
        ->editColumn('status', function(Appointment $datas) {
            if($datas->status == 1) return '<button class="btn btn-primary btn-sm">Booked</button>';
            if($datas->status == 2) return '<button class="btn btn-info btn-sm">Process</button>';
            if($datas->status == 3) return '<button class="btn btn-danger btn-sm">Cancelled</button>';
            if($datas->status == 4) return '<button class="btn btn-success btn-sm">Completed</button>';
        })
        ->rawColumns(['status'])
        ->toJson();
    }

    

}
