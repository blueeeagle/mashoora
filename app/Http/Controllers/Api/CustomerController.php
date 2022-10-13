<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Consultant;
use App\Models\Appointment;
use App\Models\Schedule;
use App\Models\Offer;
use App\Models\Discount;
use App\Models\Discountuser;
use App\Models\Review;
use App\Models\Companysetting;
use App\Models\Offerpurchase;
use App\Models\Firm;
use App\Models\Consultantcategory;
use App\Models\Language;
use App\Models\Wallet;
use App\Models\Payment;
use App\Models\Card;

use DataTables;
use Validator;
use DB;
use Carbon\Carbon;
use Auth;
use Session;
use Illuminate\Support\Collection;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class Booking {
    public $consultant = null;
    public $schedule = null;
    public $data = null;
    public $type = null;
    public $Discount = null;
    public $offer = null;
    public $amount = 0;
    public $DiscountAmount = 0;
    // public $OfferAmount = 0;
}

class CustomerController extends Controller
{
    public $Booking = null;
    
    public  function __construct(){

    }
    
    public function checkCustomer(){
        return response()->json(Auth::guard('customer')->check());
    }
    public function getsession(){
        if(Session::has('Booking')){
            $this->Booking =  Session::get('Booking');
        }else{
            $this->Booking = new Booking;
        }
    }
    public function setsession(){
        Session::put('Booking',$this->Booking);
    }
    public function login(Request $Request){
        $Request->session()->put('phone_no', $Request->phone_no);
        $rules=[ 'phone_no' => 'required|unique:customers,phone_no,'.$Request->phone_no];

		$customs=[
			'phone_no.required'  => 'phone no Name should be filled',
			'phone_no.unique'      	=> 'phone no Name already taken',
		];

        $validator = Validator::make($Request->all(), $rules,$customs);
        if ($validator->fails()) {
          return response()->json(array('errors' => $validator->getMessageBag()->toArray(),'status'=>true));
        }
        return response()->json(array('status'=>true));
    }

    public function logout(){
        Auth::guard('customer')->logout();
        return response()->json('redireact');
    }

    public function VerifyOtp(Request $request){
        $phone_no = $request->session()->get('phone_no',null);
        $request['phone_no'] = $phone_no;
        $rules=[ 'phone_no' => "required|unique:customers,phone_no,$phone_no"];

		$customs=[
			'phone_no.required'  => 'phone no Name should be filled',
			'phone_no.unique'      	=> 'phone no Name already taken',
		];

        $validator = Validator::make($request->all(), $rules,$customs);
        if (!$validator->fails()) {
            $Customer  = new Customer;
            $Customer->phone_no = $phone_no;
            $Customer->api_token = Str::random(60);
            $Customer->remember_token = Str::random(60);
            $Customer->phone_no_verify_at = Carbon::now();
            $Customer->save();
            
            $Wallet = new Wallet;
            $Wallet->customer_id = $Customer->id;
            $Wallet->save();
            
            Auth::guard('customer')->login($Customer);
            return response()->json(array('msg'=>'Customer Created','customer'=>$Customer));
        }
        $Customer  = Customer::where('phone_no', $phone_no)->first();
        Auth::guard('customer')->login($Customer);
         $Wallet = Wallet::where('customer_id',Auth::guard('customer')->user()->id)->first();
        if(!$Wallet){
            $Wallet = new Wallet;
            $Wallet->customer_id = $Customer->id;
            $Wallet->save();     
        }
        return response()->json(array('msg'=>'Login Sucess','customer'=>Auth::guard('customer')->user()));
    }

    public function filteringData(){
        $Firm = Firm::select('id','comapany_name')->where('status',1)->get();
        $Consultantcategory = Consultantcategory::where('status',1)->get();
        $Language = Language::where('status',1)->get();

        return response()->json(['orga'=>$Firm,'lang'=>$Language,'spec'=>$Consultantcategory]);
    }
    
    public function updateprofile(Request $request){
        $Customer = Auth::guard('customer')->user();
        $Customer->update($request->all());
        return response()->json('updated', 200);
    }
    
    public function getfirm(Request $request){
        $Firm = Firm::get();
        return response()->json(['firm'=>$Firm]);
    }

    public function consultantfirm(Firm $firm){
        $consultant = $firm->consultant;
        return DataTables::of($consultant)->addIndexColumn()->toJson();
    }
    
    public function consultantcatsub(Request $request,$id,$sub = null){
        
        $type = $request->type;
        $datas = Consultant::with('country')->with('state')->with('city')->where('status',1)
        
        ->when($id,function($query,$search){ return $query->whereRaw("FIND_IN_SET('$search',categorie_id)"); })
        ->when($sub,function($query,$search){ return $query->whereRaw("FIND_IN_SET('$search',categorie_id)"); })
        
        ->when($request->gender,function($query,$search){ return $query->where('gender',$search); })
        ->when($request->orga,function($query,$search){ return $query->where('firm_choose',$search); })

        ->when($request->type,function($query,$search){
            if($search == 'video') return $query->where('video',1);
            if($search == 'voice') return $query->where('voice',1);
            if($search == 'text') return $query->where('text',1);
            if($search == 'direct') return $query->where('direct',1);
        })
        ->when($request->cost,function($query,$search) use ($type){
            if($type == null || $type == 'video') return $query->orderBy('video_amount',$search);
            else if($type == 'voice') return $query->orderBy('voice_amount',$search);
            else if($type == 'text') return $query->orderBy('text_amount',$search);
            else return $query->orderBy('direct_amount',$search);
        });
        if($request->lang){
            $arrays = \explode(',',$request->lang);
            foreach ($arrays as $key => $value) {
                # code...
                if($key == 0) $datas->whereRaw("FIND_IN_SET('$value',language)");
                else $datas->orwhereRaw("FIND_IN_SET('$value',language)");
            }
        }
        if($request->spec){
            $arrays = \explode(',',$request->spec);
            foreach ($arrays as $key => $value) {
                # code...
                if($key == 0) $datas->whereRaw("FIND_IN_SET('$value',specialized)");
                else $datas->orwhereRaw("FIND_IN_SET('$value',specialized)");
            }
        }
        $datas = $datas->orderBy('id','desc')->get();
        
        if($request->has('rating')){
            if($request->rating == 'asc') $datas = (new Collection($datas))->sortBy('review_count');
            if($request->rating == 'desc') $datas = (new Collection($datas))->sortByDesc('review_count');
        }

        return DataTables::of($datas)
        ->addColumn('currencycode',function(Consultant $data){
            if(isset($data->country->currency->currencycode)) return $data->country->currency->currencycode;
            return '';
        })
        ->addIndexColumn()->toJson();
    }
    
    public function consultant(Request $request){
        
        $type = $request->type;
        $datas = Consultant::with('country')->with('state')->with('city')->with('Review')->withCount('Review')->where('status',1)
        ->when($request->gender,function($query,$search){ return $query->where('gender',$search); })
        ->when($request->type,function($query,$search){
            if($search == 'video') return $query->where('video',1);
            if($search == 'voice') return $query->where('voice',1);
            if($search == 'text') return $query->where('text',1);
            if($search == 'direct') return $query->where('direct',1);
        })
        ->when($request->cost,function($query,$search) use ($type){
            if($type == null || $type == 'video') return $query->orderBy('video_amount',$search);
            else if($type == 'voice') return $query->orderBy('voice_amount',$search);
            else if($type == 'text') return $query->orderBy('text_amount',$search);
            else return $query->orderBy('direct_amount',$search);
        })
        ->orderBy('id','desc')->get();
        if($request->has('rating')){
            if($request->rating == 'asc') $datas = (new Collection($datas))->sortBy('review_count');
            if($request->rating == 'desc') $datas = (new Collection($datas))->sortByDesc('review_count');
        }

        return DataTables::of($datas)->addIndexColumn()->toJson();
    }

    public function consultantdetails(Request $request, Consultant $consultant){
        $consultant = Consultant::with('country')->with('state')->with('city')->with('firm')->with('Review')->where('id',$consultant->id)->first();
        if(isset($consultant->country->currency->currencycode)) {
            $consultant->{'currencycode'} = $consultant->country->currency->currencycode;
        }else{
            $consultant->{'currencycode'} = '';
        }
        $this->Booking = new Booking;
        $this->Booking->consultant = $consultant;
        Session::put('Booking',$this->Booking);
        return $consultant;
    }
    public function consultantinsurance(Request $request){
        $this->getsession();
        return $this->Booking->consultant->insurance;
    }
    public function schedule(Request $request,$type){
        $this->getsession();
        $this->Booking->consultant->Schedule;
        
        $data = $this->change_to_API_fORMET($this->getslotsApi($this->Booking->consultant->Schedule,$type),$this->Booking->consultant);
        
        $this->Booking->data = $data;
        $this->Booking->type = $type;
        
        $this->setsession();
        
        if(empty($data)) return response()->json(['data'=>[],'msg'=>'No Schedule found'], 200);
        return response()->json(['data'=>$data,'msg'=>''], 200);
    }
    public function offer(Request $request){
        $this->getsession();
        $this->Booking->consultant->offer;
        $this->setsession();
        return response()->json($this->Booking->consultant->offer);
    }
    public function Applyoffer(Request $request,Offer $offer){
        
        $this->getsession();
        
        $this->Booking->offer = $offer;
        // $this->BooKing->OfferAmount = $offer->amount;
        $amount = $this->Booking->consultant->{$this->Booking->type.'_amount'} - $offer->amount;
        $this->Booking->amount = $amount;
        $this->setsession();
        $test = [];
        $test[] = ['amount'=>$this->Booking->amount];
        return response()->json($test);
    }
    public function Discount(){
        $this->getsession();
        $date = today()->format('m/d/Y');
        $Discount = Discount::where('consultant_id',$this->Booking->consultant->id)->where('from_date','<',$date)->where('to_date','>',$date)->where('status',1)->get();
        return response()->json($Discount);

    }
    public function ApplyDiscount(Request $request){
        $this->getsession();
        $date = today()->format('m/d/Y');
        
        $Discount = Discount::where('promo_code',$request->promocode)->where('to_date','>',$date)->where('from_date','<',$date)->where($this->Booking->type,1)->where('consultant_id',$this->Booking->consultant->id)->where('status',1)->first();
        // dd($date);
        if(empty($Discount)) return response()->json(['status'=>false,'msg'=>'In valide Coupon code']);
        
        $Discountuser = Discountuser::where('discount_id',$Discount->id)->count();
        if($Discount->no_of_coupons > $Discountuser){
            $this->Booking->Discount = $Discount;
            $this->Booking->amount += $this->Booking->DiscountAmount;
            if($Discount->flat_percentage == 0){
                $this->Booking->DiscountAmount = ($this->Booking->consultant->{$this->Booking->type.'_amount'} / 100) * $Discount->amount;
                // $this->Booking->amount = $this->Booking->amount - ($this->Booking->consultant->{$this->Booking->type.'_amount'} / 100) * $Discount->amount;
            }else{
                $this->Booking->DiscountAmount = $Discount->amount;
                // $this->Booking->amount = $this->Booking->amount - $Discount->amount;
            }
            
            $this->Booking->amount = $this->Booking->amount - $this->Booking->DiscountAmount;
            $this->setsession();
            return response()->json(['status'=>true,'msg'=>'Valide','amount'=>$this->Booking->amount]);
        }
    }
      public function appointment(Request $request){
        $this->getsession();
        $Wallet = Wallet::where('customer_id',Auth::guard('customer')->user()->id)->first();
        if($Wallet->balance < $this->Booking->amount){
            return response()->json(['Appointment'=>false,'msg'=>'Insufficient Balance'], 200);
        }
        
        $Appointment = new Appointment;
        $Discountuser = new Discountuser;

        $Appointment->map = $request->id;
        $map = \explode('-',$request->id);
        $Appointment->slot = isset($map[3])?$map[3]:'';

        $Discountuser->customer_id = Auth::guard('customer')->user()->id;
        $Discountuser->discount_id = (isset($this->Booking->Discount))?$this->Booking->Discount->id:'';
        $Discountuser->consultation_id = $this->Booking->consultant->id;
        $Discountuser->offer_id = (isset($this->Booking->offer))?$this->Booking->offer->id:'';

        $Schedule = Schedule::with('Consultant')->where('id',$map[0])->first();
        $this->Booking->schedule = $Schedule;
        $Slotinfojson = json_decode($Schedule->schedule);
        $Slotinfo = $Slotinfojson[$map[1]];
        $appDate = $this->getdateforApp($this->Booking->data,$request->id);
        $appDate = \explode('/',$appDate);
        $appDate = strtotime("$appDate[2]-$appDate[1]-$appDate[0]");
        $Appointment->appointment_date = date("Y-m-d", $appDate).'T'.$Slotinfo->kt_docs_repeater_nested_inner[0]->from;
        $Appointment->schedule_id = $Schedule->id;
        $Appointment->type = $Schedule->schedule_type;
        $Appointment->from_date = $Schedule->from_date;
        $Appointment->to_date = $Schedule->to_date;
        $Appointment->appointment_type = $request->appointment_type;
        $Appointment->customer_id = Auth::guard('customer')->user()->id;
        $Appointment->consultant_id = $Schedule->Consultant->id;
        $Appointment->insurance_id = $request->insurance_id;
        $Appointment->policyid = $request->policyid;
        $Appointment->rawdata = utf8_encode(bzcompress(serialize($this->Booking), 9));
        $Appointment->save();
        $payment = $this->addsubammount($this->Booking->amount,'sub','Booking',$Appointment->id);
        $Discountuser->appointment_id = $Appointment->id;
        if(isset($this->Booking->Discount)) $Discountuser->save();

        $this->setsession();
        return response()->json(['Appointment'=>true], 200);
    }
    
    public function booking(){
        $upcoming = Appointment::with('Consultant')->with('Review')->where('status','!=','completed')->where('status','!=','cancelled')->where('customer_id',Auth::guard('customer')->user()->id)->where('appointment_date','<','now()')->get();
        $past = Appointment::with('Consultant')->with('Review')->orwhere('status','completed')->orwhere('status','cancelled')->where('customer_id',Auth::guard('customer')->user()->id)->get();
        $upcoming = $this->modefyAppointment($upcoming);
        $past = $this->modefyAppointment($past);
        return response()->json(['upcoming'=>$upcoming,'past'=>$past], 200);
    }
    
    public function bookingdetail(Request $request, Appointment $Appointment){
        $Appointment->Consultant;
        $Appointment->Review;
        $Booking = unserialize(bzdecompress(utf8_decode($Appointment->rawdata)));
        $date = date_create($Appointment->appointment_date);

        $Companysetting = Companysetting::with('country')->where('id',1)->first();
        $countdown = strtotime($Appointment->appointment_date) - strtotime('now');

        $myObj = new \stdClass();
        $myObj->{'id'} = $Appointment->id;
        $myObj->{'ConsultantName'} = $Booking->consultant->name;
        $myObj->{'Bookingid'} = "BK-$Appointment->id";
        $myObj->{'Date'} = date_format($date,"M d,Y,l");
        $myObj->{'Time'} = $this->getFromToTimeSchedule($Booking->schedule,\explode('-',$Appointment->map));
        $myObj->{'status'} = $Appointment->status;
        $myObj->{'Amount'} = $Booking->amount;
        $myObj->{'Consultant'} = $Appointment->Consultant;
        $myObj->{'countdown'} = $countdown;

        if($countdown > $this->strtotimeconvert($Companysetting->reschedule_cut_off_time))
            $myObj->{'Rescheule'} = ['status'=>true,'MSG'=>'Are You sure want to reschedule your appointment to another data & time'];
        else
            $myObj->{'Rescheule'} = ['status'=>false,'MSG'=>"Sorry your appointment reschedule is not accept Due to $Companysetting->reschedule_cut_off_time hours policy"];
        if($countdown > $this->strtotimeconvert($Companysetting->discard_cut_off_time))
            $myObj->{'cancel'} = ['status'=>true,'MSG'=>'Are You sure want to cancel your appointment? if yes amount Will be refunded to your wallet'];
        else
            $myObj->{'cancel'} = ['status'=>false,'MSG'=>"Are You sure want to cancel your appointment? Refund is not appliable due to $Companysetting->discard_cut_off_time hours policy"];

        return response()->json($myObj);
    }

    public function bookingCancel(Request $request, Appointment $Appointment){
        $msg = '';
        $Companysetting = Companysetting::with('country')->where('id',1)->first();
        $Time = strtotime($Appointment->appointment_date) - strtotime('now');
        
        if($Time <= $this->strtotimeconvert($Companysetting->discard_cut_off_time)){
            $msg = "Your appointment have be cancelled sucessfully. Refund is not appliable due to $Companysetting->discard_cut_off_time hours polic";
        }else{
            $msg = 'Your appointment have be cancelled sucessfully. Amount refunded sucessfully to your wallet';
        }

        $Appointment->status = "cancelled";
        $Appointment->update();
        return response()->json(['status' => true,'msg'=>$msg]);
    }
    
    public function bookingReschedule(Request $request, Appointment $Appointment){

        $msg = '';
        $Companysetting = Companysetting::with('country')->where('id',1)->first();
        $countdown = strtotime($Appointment->appointment_date) - strtotime('now');

        if($countdown > $this->strtotimeconvert($Companysetting->reschedule_cut_off_time)){
            $Appointment->status = 'cancelled';
            $Appointment->update();
            return response()->json(['status'=>true,'MSG'=>'Your appointment is cancled for reschedule']);
        }
        else return response()->json(['status'=>false,'MSG'=>"Sorry your appointment reschedule is not accept Due to $Companysetting->reschedule_cut_off_time hours policy"]);
    }
    
    public function review(Request $request,Appointment $Appointment){
        $Review  = new Review;
        $Review->consultant_id = $Appointment->consultant_id;
        $Review->customer_id = Auth::guard('customer')->user()->id;
        $Review->appointment_id = $Appointment->id;
        $Review->rating = $request->rating;
        $Review->comments = $request->comments;
        $Review->save();
        return response()->json(['status' => true]);
    }
    
    public function offerindex(Request $request){

        $date = today()->format('m/d/Y');
        $Offer = Offer::when($request->cat,function($query,$search){ return $query->where('category_id',$search); })
        ->when($request->sub,function($query,$search){ return $query->where('sub_category_id',$search); })
        ->where('has_validity','!=',1)->orWhere('has_validity',1)->where('from_date','<',$date)->where('to_date','>',$date)
        ->get();
        $banner = (new Collection($Offer))->map(function($data, $key) {
            return $data;
        });

        return response()->json(['offer'=>DataTables::of($Offer)->addIndexColumn()->toJson(),'banner'=>$banner]);
    }

    public function offerdetail(Offer $offer){
        return response()->json($offer);
    }

    public function offerpurchased(Offer $offer){
        $payment = $this->addsubammount($offer->amount,'sub','offer purchas');

        $Offerpurchase = new Offerpurchase;
        $Offerpurchase->rawoffer = utf8_encode(bzcompress(serialize($offer), 9));
        $Offerpurchase->customer_id = Auth::guard('customer')->user()->id;
        $Offerpurchase->offer_id = $offer->id;
        $Offerpurchase->payment_id = \rand(1999,99999);
        $Offerpurchase->purchase_date = date('Y-m-d H:i:s');
        $Offerpurchase->save();
        return response()->json(['status'=>true]);

    }
    
    public function wallet(){
        $Wallet = Wallet::where('customer_id',Auth::guard('customer')->user()->id)->first();
        $Payment = Payment::where('customer_id',Auth::guard('customer')->user()->id)->orderBy('id','desc')->get();
        return response()->json(['wallet'=>$Wallet,'payment'=>$Payment]);
    }

    public function addwallet(Request $request){
        $payment = $this->addsubammount($request->amount,'add','Added to Wallet');
        return response()->json(['msg'=>'updated']);
    }

    public function getcard(){
        $Card = Card::where('customer_id',Auth::guard('customer')->user()->id)->get();
        return response()->json(['card'=>$Card]);
    }
    public function Addcard(Request $request){
        $Old = Card::where('cardno',$request->cardno)->where('customer_id',Auth::guard('customer')->user()->id)->first();
        if($Old) return response()->json(['status'=>false,'msg'=>'Card already taken']);
        
        $Card = new Card;
        $Card->cardno = $request->cardno;
        $Card->customer_id = Auth::guard('customer')->user()->id;
        $Card->expdate = $request->expdate;
        $Card->scv = $request->scv;
        $Card->save();
        return response()->json(['msg'=>'Card Added']);
    }
    public function deletecard(Request $request,Card $card){
        $card->delete();
        return response()->json(['msg'=>'Card Deleted']);

    }
    
    function modefyAppointment($Appointment){
        return $Appointment->map(function ($data){
            $date = date_create($data->appointment_date);
            $Booking = unserialize(bzdecompress(utf8_decode($data->rawdata)));

            $myObj = new \stdClass();
            $myObj->{'id'} = $data->id;
            $myObj->{'Bookingid'} = "BK-$data->id";
            $myObj->{'Date'} = date_format($date,"M d,Y,l");
            $myObj->{'Time'} = $this->getFromToTimeSchedule($Booking->schedule,\explode('-',$data->map));
            $myObj->{'ConsultantName'} = $Booking->consultant->name;
            // $myObj->{'approval'} = $data->approval;
            $myObj->{'status'} = $data->status;
            $myObj->{'countdown'} = strtotime($data->appointment_date) - strtotime('now');

            return $myObj;
        });
    }
    
    function strtotimeconvert($data){
        $data = \explode(':',$data);
        return ($data[0]*60*60) + ($data[1]*60);
    }
    
    function getdateforApp($data,$id){
        foreach ($data as $key => $value) {
            # code...
            foreach ($value['Morning'] as $compare) {
                # code...
                if($compare['id'] == $id) return $key;
            }
            foreach ($value['Afternoon'] as $compare) {
                # code...
                if($compare['id'] == $id) return $key;
            }
            foreach ($value['Evening'] as $compare) {
                # code...
                if($compare['id'] == $id) return $key;
            }
            foreach ($value['Night '] as $compare ) {
                # code...
                if($compare['id'] == $id) return $key;
            }
        }
    }
    
    function addsubammount($amount,$type,$action,$appointment_id = ''){
        
        $Payment = new Payment;
        $Payment->amount = $amount;
        $Payment->type = $type;
        $Payment->action = $action;
        $Payment->customer_id = Auth::guard('customer')->user()->id;
        $Payment->appointment_id = $appointment_id;
        $Payment->save();

        $Wallet = Wallet::where('customer_id',Auth::guard('customer')->user()->id)->first();
        if($type == 'add') $Wallet->balance = $Wallet->balance + $amount;
        else $Wallet->balance = $Wallet->balance - $amount;
        $Wallet->update();
        
        return $Payment;
    }
    
}
