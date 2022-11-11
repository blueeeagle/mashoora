<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use DataTables;
use Validator;
use DB;
use Carbon\Carbon;
use Auth;
use Session;

use App\Models\Wallet;
use App\Models\Firm;
use App\Models\Payment;
use App\Models\Appointment;
use App\Models\Consultant;
use App\Models\Schedule;
use App\Models\Language;
use App\Models\Insurance;
use App\Models\Category;
use App\Models\Companysetting;
use App\Models\Card;
use App\Models\Consultantcategory;
use App\Models\Document;
use App\Models\Country;

class Booking {
    public $consultant = null;
    public $schedule = null;
    public $data = null;
    public $type = null;
    public $Discount = null;
    public $offer = null;
    public $amount = 0;
    public $DiscountAmount = 0;

    public $cancellcustomer = ['status'=> false,'msg'=>''];
    public $cancellconsultant = ['status'=> false,'msg'=>''];
    
    
    public $admincurrnecy = null;
    public $consultantcurrency = null;
    public $customercurrnecy = null;
    public $Companysetting = null;

    public $customerTimeZone = null;
    public $consultantTimeZone = null;
    public $diff = 0;

}

class ConsultantController extends Controller{

    public $Booking = null;

    public function login(Request $Request){

        $Request->session()->put('phone_no', $Request->phone_no);
        $Request->session()->put('country_code', $Request->country_code);

        $rules=[
            'phone_no' => 'required|unique:consultants,phone_no,'.$Request->phone_no,
            'country_code' => 'required',
        ];

		$customs=[
			'phone_no.required'  => 'phone no Name should be filled',
			'phone_no.unique'      	=> 'phone no Name already taken',
			'country_code.required'  => 'country code should be filled',

		];

        $validator = Validator::make($Request->all(), $rules,$customs);
        if ($validator->fails()) {
            $Consultant = Consultant::where('phone_no',$Request->phone_no)->first();
            if($Consultant->status == 0) return response()->json(array('status'=>false,'msg'=>'Your account is Deactive contact admin'));
            // if($Consultant->approval == 1) return response()->json(array('status'=>false,'msg'=>'Your account is Decline contact admin'));
            
          return response()->json(array('errors' => $validator->getMessageBag()->toArray(),'status'=>true));
        }
        return response()->json(array('status'=>true));
    }

    public function logout(){
        Auth::guard('consultant')->logout();
        return response()->json('redireact');
    }

    public function VerifyOtp(Request $request){

        $phone_no = $request->session()->get('phone_no');
        $country_code = $request->session()->get('country_code');

        if(!isset($phone_no)){
            return response()->json(['status'=>false,'msg'=>'phone NO is empty']);
        }
        if(!isset($country_code)){
            return response()->json(['status'=>false,'msg'=>'County code']);
        }
        $request['phone_no'] = $phone_no;
        $request['country_code'] = $country_code;

        $rules=[
            'phone_no' => 'required|unique:consultants,phone_no,'.$phone_no
        ];

		$customs=[
			'phone_no.required'  => 'phone no Name should be filled',
			'phone_no.unique'      	=> 'phone no Name already taken',
		];

        $validator = Validator::make($request->all(), $rules,$customs);

        if (!$validator->fails()) {
            $consultant  = new Consultant;
            $consultant->phone_no = $phone_no;
            $consultant->country_code = $country_code;
            $consultant->api_token = Str::random(60);
            $consultant->remember_token = Str::random(60);
            $consultant->phone_no_verify_at = Carbon::now();
            $consultant->step ='1';
            $consultant->status = 1;
            $consultant->save();

            $Wallet = new Wallet;
            $Wallet->consultant_id = $consultant->id;
            $Wallet->save();
            $consultant->country;
            $consultant->{'parent_Cat'} = $consultant->parentcat();
            $consultant->{'sub_Cat'} = $consultant->subcat();
            $consultant->{'Insurance'} = $consultant->Insurance;
            
            Auth::guard('consultant')->login($consultant);
            return response()->json(array('msg'=>'Consultant Created','consultant'=>$consultant));
        }

        $consultant  = Consultant::where('phone_no',$phone_no)->first();
            if($consultant->status == 0) return response()->json(array('status'=>false,'msg'=>'Your account is Deactive contact admin'));
            // if($consultant->approval == 1) return response()->json(array('status'=>false,'msg'=>'Your account is Decline contact admin'));
        
        $consultant->country;
        $consultant->{'parent_Cat'} = $consultant->parentcat();
        $consultant->{'sub_Cat'} = $consultant->subcat();
        $consultant->{'Insurance'} = $consultant->Insurance;
        
        Auth::guard('consultant')->login($consultant);
        return response()->json(array('msg'=>'Login Sucess','consultant'=>Auth::guard('consultant')->user()));
    }
    public function getconsultant(){
        $consultant  = Consultant::where('id',Auth::guard('consultant')->user()->id)->first();
        $consultant->country;
        $consultant->state;
        $consultant->city;
        $consultant->firm;
        $consultant->{'language'} = $consultant->getLanguage();
        $consultant->{'parent_Cat'} = $consultant->parentcat();
        $consultant->{'sub_Cat'} = $consultant->subcat();
        $consultant->{'Insurance'} = $consultant->Insurance;
        
        return response()->json($consultant);
    }
    public function getspeclization(){
        $Consultant = Auth::guard('consultant')->user();
        $categorie_id = \explode(',',$Consultant->categorie_id);
        
        $Consultantcategory = [];
        $Category = Category::whereIn('id',$categorie_id)->where('type',1)->get();
        if(count($Category) > 0) $Consultantcategory = Consultantcategory::whereIn('subcategorie_id',$Category->pluck('id')->toArray())->get();
        else{
            $Category = Category::whereIn('id',$categorie_id)->where('type',0)->first();
            $Consultantcategory = Consultantcategory::where('categorie_id',$Category->id)->get();
        }
        
        return response()->json($Consultantcategory);
    }
    public function getdocuments(){
        $Consultant = Auth::guard('consultant')->user();
        $categorie_id = \explode(',',$Consultant->categorie_id);
        $Category = Category::where('status',1)->whereIn('id',$categorie_id)->get();
        $documents_id = [];
        foreach ($Category as $key => &$value) {
            $documents_id = array_merge($documents_id,\explode(',',$value->document_id));
        }
        $Document = Document::whereIn('id',$documents_id)->where('status',1)->get();
        return response()->json($Document);
    }
    
    public function getinsurance(){
        $Consultant = Consultant::where('id',Auth::guard('consultant')->user()->id)->first();
        
        $Category = Category::where('status',1)->whereIn('id',explode(",",$Consultant->categorie_id))->where('insurance',1)->get();
        
        if(empty($Category)) response()->json([]);
        
        $Insurance = Insurance::where('country_id',$Consultant->country->id)->where('status',1)->get();
        return response()->json($Insurance);
    }
    public function storeProfile(Request $request){

        $Consultant = Consultant::where('id',Auth::guard('consultant')->user()->id)->first();
        if(!isset($request->mobile_step)) return response()->json(['next' => false,'msg' =>'Required mobile_step value']);

        switch($request->mobile_step){
            case '0':
                
                $Consultant->type = $request->type;
                $Consultant->firm_choose = $request->firm_choose;
                if($request->type == 2 && isset($request->c_name) && isset($request->email) && isset($request->c_no)){
                    $Firm = Firm::where('email',$request->email)->first();
                    if($Firm) return response()->json(['next' => false,'msg' =>'Email Id Already Taken']);
                    $Firm = new Firm;
                    $Firm->comapany_name = $request->c_name;
                    $Firm->email = $request->email;
                    $Firm->contact = $request->c_no;
                    $Firm->by_consultant = 1;
                    $Firm->save();
                    $Consultant->firm_choose = $Firm->id;
                }
                if($Consultant->mobile_step < 9 ) $Consultant->mobile_step = 1;
                $Consultant->update();
                return response()->json(['next' => true,'msg' =>'Updated','Consultant'=>$Consultant]);

            break;
            case '1':
                $Consultant->name = $request->name;;
                $Consultant->email = $request->email;
                $Consultant->dob = $request->dob;
                $Consultant->gender = $request->gender;
                $Consultant->landline = $request->landline;
                $Consultant->bio_data = $request->bio_data;
                $Consultant->exp_year = $request->exp_year;
                $Consultant->language = implode(',',$request->language);
                if($request->has('image')){
                    $path = $request->file('image')->store("/uploadFiles/consultant",'public_custom');
                    $Consultant->picture = $path;
                }
                
                if($Consultant->mobile_step < 9 ) $Consultant->mobile_step = 2;
                $Consultant->update();

                return response()->json(['next' => true,'msg' =>'contact updated','Consultant'=>$Consultant]);
            break;
            case '1.5':
                $Consultant->register_address = $request->register_address;
                $Consultant->country_id = $request->country_id;
                $Consultant->state_id = $request->state_id;
                $Consultant->city_id = $request->city_id;
                $Consultant->zipcode = $request->zipcode;

                if($Consultant->mobile_step < 9 ) $Consultant->mobile_step = 2;
                $Consultant->update();
                $Category = Category::where('status',1)->where('type',0)->get();

                return response()->json(['next' => true,'msg' =>'Address updated','category'=>$Category,'Consultant'=>$Consultant]);
            break;

            case '2':
                $Category = Category::with('child')->where('status',1)->whereId('id',$request->categorie_id)->where('type',0)->get();
                $Consultant->categorie_id =  \implode(',',$request->categorie_id);
                if($Consultant->mobile_step < 9 ) $Consultant->mobile_step = 3;
                $Consultant->update();
                return response()->json(['next' => true,'msg' =>'category updated','category'=>$Category,'Consultant'=>$Consultant]);
            break;

            case '3':
                $categorie_id = \explode(',',$Consultant->categorie_id);
                $categorie_id = array_unique( array_merge( $categorie_id , $request->sub_categorie_id ) );
                $Consultant->categorie_id = \implode(',',$categorie_id);
                $Consultant->update();
                $Insurance = Insurance::where('status',1)->get();
                return response()->json(['next' => true,'msg' =>'sub category updated','insurance'=>$Insurance,'Consultant'=>$Consultant]);
            break;
            case '3.5':
                $Consultant->specialized = \implode(',',$request->specialized);
               
                $Consultant->update();
                $country = Country::where('id',$Consultant->country->id)->first();
                $Insurance = Insurance::where('country_id',$country->id)->where('status',1)->get();
                return response()->json(['next' => true,'msg' =>'sub category updated','insurance'=>$Insurance,'Consultant'=>$Consultant]);
            break;

            case '4':
                $Consultant->insurance_id = \implode(',',$request->insurance_id);
                if($Consultant->mobile_step < 9 ) $Consultant->mobile_step = 5;
                $Consultant->update();
                return response()->json(['next' => true,'msg' =>'insurance update','Consultant'=>$Consultant]);
            break;

            case '5':
                $Consultant->direct = $request->direct;
                $Consultant->direct_amount = $request->direct_amount;
                $Consultant->preferre_slot = $request->preferre_slot;
                $Consultant->text = $request->text;
                $Consultant->text_amount = $request->text_amount;
                $Consultant->video = $request->video;
                $Consultant->video_amount = $request->video_amount;
                $Consultant->voice = $request->voice;
                $Consultant->voice_amount = $request->voice_amount;
                if($Consultant->mobile_step < 9 ) $Consultant->mobile_step = 6;
                $Consultant->update();
                return response()->json(['next' => true,'msg' =>'updated','Consultant'=>$Consultant]);
            break;
            case '6':
                $proof = [];
                foreach ($request->file('proof') as $key => $value) {
                    $IMGname = $value->getClientOriginalName();
                    $path = $value->store("uploadFiles/proof/$Consultant->phone_no/",'public_custom');
                    $proof[] = $path;
                }
                $Consultant->proof = \implode(',',$proof);
                if($Consultant->mobile_step < 9 ) $Consultant->mobile_step = 10;
                $Consultant->update();
                return response()->json(['next' => true,'msg' =>'proof updated','Consultant'=>$Consultant]);
            break;
            default:
            return response()->json(['next' => true,'msg' =>'step Not found']);


        }
    }
    
    //schedule
    public function getfromdate(){
        $Schedule = Schedule::where('consultant_id',Auth::guard('consultant')->user()->id)->orderBy('id', 'desc')->first();
        if($Schedule){
           return response()->json(date('Y-m-d', \strtotime($Schedule->to_date."+1 day")));
        }
        return response()->json(date('Y-m-d', strtotime("+1 day")), 200);
    }
    public function deleteschedule(Schedule $schedule){
        $AppointmentCount = Appointment::where('schedule_id',$schedule->id)->count();
        if($AppointmentCount != 0){
            $data1['msg'] = 'Schedule has Appointment.';
            $data1['status'] = false;
            return response()->json($data1);
        }
        $schedule->delete();
        $data1['msg'] = 'Data Deleted Successfully.';
        $data1['status'] = true;
        return response()->json($data1);
    }
    public function indexschedule(){
        $Schedule = Schedule::where('consultant_id',Auth::guard('consultant')->user()->id)->get();
        return DataTables::of($Schedule)->addIndexColumn()->toJson();
    }
    public function saveschedule(Request $request){
        $Schedule = new Schedule;
        $Schedule->consultant_id = Auth::guard('consultant')->user()->id;
        $Schedule->from_date = $request->from_date;
        $Schedule->to_date = $request->to_date;
        $Schedule->recurring = $request->to_date;
        $Schedule->schedule = $request->schedule;
        $Schedule->save();
        return response()->json(['status'=>true,'msg'=>'saved']);
    }
    public function saveschedulecopy(Request $request, Schedule $schedule){
        $copy = $schedule->replicate();
        $copy->from_date = $request->from_date;
        $copy->to_date = $request->to_date;
        $copy->recurring = $request->to_date;
        $copy->save();
        return response()->json(['status'=>true,'msg'=>'copy'], 200);
    }

    public function todaybooking(){
        $consultantTimeZone = \DateTimeZone::listIdentifiers(\DateTimeZone::PER_COUNTRY, Auth::guard('consultant')->user()->country->country_code)[0];
        date_default_timezone_set($consultantTimeZone);
        
        // $today = Appointment::where('status','!=','completed')->where('status','!=','Cancelled')->where('consultant_id',Auth::guard('consultant')->user()->id)->whereRaw('appointment_date < CURRENT_DATE() + INTERVAL 1 DAY')->get();
        $today = Appointment::where('consultant_id',Auth::guard('consultant')->user()->id)->get();
        return response()->json($this->modefyAppointment($today));
    }

    public function booking(){
        $consultantTimeZone = \DateTimeZone::listIdentifiers(\DateTimeZone::PER_COUNTRY, Auth::guard('consultant')->user()->country->country_code)[0];
        date_default_timezone_set($consultantTimeZone);
        
        $upcoming = Appointment::where('status','!=','completed')->where('status','!=','Cancelled')->where('consultant_id',Auth::guard('consultant')->user()->id)->get();
        $past = Appointment::where('status','=','completed')->orwhere('status','=','Cancelled')->where('consultant_id',Auth::guard('consultant')->user()->id)->get();
        $acceptreject = Appointment::where('status','!=','Cancelled')->where('status','!=','pending')->where('consultant_id',Auth::guard('consultant')->user()->id)->get();
        
        $upcoming = $this->modefyAppointment($upcoming);
        $past = $this->modefyAppointment($past);
        $acceptreject = $this->modefyAppointment($acceptreject);
        return response()->json(['upcoming'=>$upcoming,'past'=>$past,'accept'=>$acceptreject]);

    }
    public function bookingdetail(Request $request, Appointment $Appointment){
        $consultantTimeZone = \DateTimeZone::listIdentifiers(\DateTimeZone::PER_COUNTRY, Auth::guard('consultant')->user()->country->country_code)[0];
        date_default_timezone_set($consultantTimeZone);
        $Booking = unserialize(bzdecompress(utf8_decode($Appointment->rawdata)));
        $date = date_create($Appointment->appointment_date);

        $date = strtotime($Appointment->appointment_date) - ($Booking->diff);
        $date = date("Y-m-d H:i",$date);
        $Companysetting = Companysetting::with('country')->where('id',1)->first();
        $countdown = strtotime($date) - strtotime('now');
        $date = date_create($date);

        $myObj = new \stdClass();
        $myObj->{'id'} = $Appointment->id;
        $myObj->{'Bookingid'} = "BK-$Appointment->id";
        $myObj->{'Date'} = date_format($date,"M d,Y,l");
        $myObj->{'Time'} = date_format($date,"h:i a")." - ". date("h:i a",strtotime(date_format($date,"Y-m-d H:i")) + $Booking->consultant->preferre_slot*60);
        $myObj->{'type'} = $Booking->type;
        $myObj->{'Customer'} = $Appointment->Customer;
        $myObj->{'Amount'} = ($Booking->amount/$Booking->customercurrnecy->price)*$Booking->consultantcurrency->price;
        $myObj->{'status'} = $Appointment->status;
        $myObj->{'countdown'} = $countdown;
        $myObj->{'review'} = $Appointment->consultantsingleAppreview;

        if($countdown > strtotime($Companysetting->discard_cut_off_time))
            $myObj->{'cancel'} = ['status'=>true,'MSG'=>'Are You sure want to cancel your appointment? if yes amount Will be refunded to your wallet'];
        else
            $myObj->{'cancel'} = ['status'=>false,'MSG'=>"Are You sure want to cancel your appointment? Refund is not appliable due to $Companysetting->discard_cut_off_time hours policy"];

        return response()->json($myObj);
    }

    public function bookingaccept(Request $request, Appointment $Appointment){

        $Appointment->status = 'conformed';
        $Appointment->update();
        return response()->json(['status' => true]);
    }

    public function bookingcancel(Request $request, Appointment $Appointment){
        $Booking = unserialize(bzdecompress(utf8_decode($Appointment->rawdata)));
        date_default_timezone_set($Booking->consultantTimeZone);
        $Booking->cancellconsultant = ['status'=> true,'msg'=>'Appointment have be cancelled sucessfully','now'=> date("Y-m-d H:i")];
        $Appointment->consultant_command = ($request->consultant_command)?$request->consultant_command:'';
        // $this->setsession();
        $Appointment->rawdata = utf8_encode(bzcompress(serialize($Booking), 9));
        $Appointment->status = 'Cancelled';
        $Appointment->cancell_consultant = Auth::guard('consultant')->user()->id;
        $Appointment->update();
        return response()->json(['status' => true,]);
    }
    public function bookingcompleted(Request $request, Appointment $Appointment){
        $Appointment->status = 'Completed';
        $Appointment->consultant_command = ($request->consultant_command)?$request->consultant_command:'';
        $Appointment->update();
        return response()->json(['status' => true,]);
    }

     function modefyAppointment($Appointment){
        return $Appointment->map(function ($data){
            $Booking = unserialize(bzdecompress(utf8_decode($data->rawdata)));
            date_default_timezone_set($Booking->consultantTimeZone);
            $date = strtotime($data->appointment_date) - ($Booking->diff);
            $date = date("Y-m-d H:i",$date);
            $countdown = strtotime($date) - strtotime('now');
            $date = date_create($date);
            
            $myObj = new \stdClass();
            $myObj->{'id'} = $data->id;
            $myObj->{'Bookingid'} = "BK-$data->id";
            $myObj->{'Date'} = date_format($date,"M d,Y,l");
            $myObj->{'Time'} = date_format($date,"h:i a")." - ". date("h:i a",strtotime(date_format($date,"Y-m-d H:i")) + $Booking->consultant->preferre_slot*60);
            $myObj->{'type'} = $Booking->type;
            $myObj->{'Customer'} = $data->customer;
            $myObj->{'Amount'} = ($Booking->amount/$Booking->customercurrnecy->price)*$Booking->consultantcurrency->price;
            $myObj->{'status'} = $data->status;
            $myObj->{'countdown'} = $countdown;

            return $myObj;
        });
    }
    
    public function wallet(){
        $Wallet = Wallet::where('consultant_id',Auth::guard('consultant')->user()->id)->first();
        $Payment = Payment::where('consultant_id',Auth::guard('consultant')->user()->id)->orderBy('id','desc')->get();
        $Payment = $Payment->map(function ($data){ 
            $data->{'tX'} = "TX-$data->id";
            $data->{'tx-date'} = date('d M Y',strtotime($data->updated_at));
            return $data;
        });
        
        return response()->json(['wallet'=>$Wallet,'payment'=>$Payment]);
    }

    public function addwallet(Request $request){
        $payment = $this->addsubammount($request->amount,'add','Added to Wallet');
        return response()->json(['msg'=>'updated']);
    }

    public function getcard(){
        $Card = Card::where('consultant_id',Auth::guard('consultant')->user()->id)->get();
        return response()->json(['card'=>$Card]);
    }
    public function Addcard(Request $request){
        $Card = new Card;
        $Old = Card::where('cardno',$request->cardno)->where('consultant_id',Auth::guard('consultant')->user()->id)->first();
        if($Old) return response()->json(['status'=>false,'msg'=>'Card already taken']);
        $Card->cardno = $request->cardno;
        $Card->consultant_id = Auth::guard('consultant')->user()->id;
        $Card->expdate = $request->expdate;
        $Card->scv = $request->scv;
        $Card->save();
        return response()->json(['status'=>true,'msg'=>'Card Added']);
    }
    public function deletecard(Request $request,Card $card){
        $card->delete();
        return response()->json(['msg'=>'Card Deleted']);
    }

    function strtotimeconvert($data){
        $data = \explode(':',$data);
        return ($data[0]*60*60) + ($data[1]*60);
    }

    function addsubammount($amount,$type,$action){
        $Payment = new Payment;
        $Payment->amount = $amount;
        $Payment->type = $type;
        $Payment->action = $action;
        $Payment->consultant_id = Auth::guard('consultant')->user()->id;
        $Payment->save();

        $Wallet = Wallet::where('consultant_id',Auth::guard('consultant')->user()->id)->first();
        if($type == 'add') $Wallet->balance = $Wallet->balance + $amount;
        else $Wallet->balance = $Wallet->balance - $amount;
        $Wallet->update();

        return $Payment;
    }
    
}
