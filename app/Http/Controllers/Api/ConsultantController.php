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

class Booking {
    public $consultant = null;
    public $schedule = null;
    public $data = null;
    public $type = null;
    public $Discount = null;
    public $offer = null;
    public $amount = 0;
}


class ConsultantController extends Controller{

    public $Booking = null;

    public function login(Request $Request){

        $Request->session()->put('phone_no', $Request->phone_no);
        $rules=[ 'phone_no' => 'required|unique:consultants,phone_no,'.$Request->phone_no];

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
        Auth::guard('consultant')->logout();
        return response()->json('redireact');
    }

    public function VerifyOtp(Request $request){

        $phone_no = $request->session()->get('phone_no',null);
        if(!isset($phone_no)){
            return response()->json(['status'=>false,'msg'=>'phone NO is empty']);
        }
        $request['phone_no'] = $phone_no;

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
            $consultant->api_token = Str::random(60);
            $consultant->remember_token = Str::random(60);
            $consultant->phone_no_verify_at = Carbon::now();
            $consultant->step ='1';
            $consultant->save();

            $Wallet = new Wallet;
            $Wallet->consultant_id = $consultant->id;
            $Wallet->save();

            Auth::guard('consultant')->login($consultant);
            return response()->json(array('msg'=>'Consultant Created','consultant'=>$consultant));
        }

        $consultant  = Consultant::where('phone_no',$phone_no)->first();
        Auth::guard('consultant')->login($consultant);
        return response()->json(array('msg'=>'Login Sucess','consultant'=>Auth::guard('consultant')->user()));
    }
    public function getspeclization(){
        $Consultant = Auth::guard('consultant')->user();
        $categorie_id = \explode(',',$Consultant->categorie_id);
        $Consultantcategory = Consultantcategory::where('status',1)->whereIn('subcategorie_id',$categorie_id)->orwhereIn('categorie_id',$categorie_id)->get();
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

    public function storeProfile(Request $request){

        $Consultant = Consultant::where('id',Auth::guard('consultant')->user()->id)->first();
        if(!isset($request->mobile_step)) return response()->json(['next' => false,'msg' =>'Required mobile_step value']);

        switch($request->mobile_step){
            case '0':
                $Consultant->type = $request->type;
                $Consultant->firm_choose = $request->firm_choose;
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
                if($Consultant->mobile_step < 9 ) $Consultant->mobile_step = 4;
                $Consultant->update();
                $Insurance = Insurance::where('status',1)->get();
                return response()->json(['next' => true,'msg' =>'sub category updated','insurance'=>$Insurance,'Consultant'=>$Consultant]);
            break;
            case '3.5':
                $Consultant->specialized = \implode(',',$request->specialized);
                if($Consultant->mobile_step < 9 ) $Consultant->mobile_step = 4;
                $Consultant->update();
                $Insurance = Insurance::where('status',1)->get();
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

    public function todaybooking(){
        $today = Appointment::where('status','!=','completed')->where('status','!=','cancelled')->where('consultant_id',Auth::guard('consultant')->user()->id)->whereRaw('appointment_date >= now()')->whereRaw('appointment_date < CURRENT_DATE() + INTERVAL 1 DAY')->get();
        return response()->json($today);
    }

    public function booking(){
        $upcoming = Appointment::where('status','!=','completed')->where('status','!=','cancelled')->where('consultant_id',Auth::guard('consultant')->user()->id)->whereRaw('appointment_date >= now()')->get();
        $past = Appointment::where('status','=','completed')->where('status','=','cancelled')->where('consultant_id',Auth::guard('consultant')->user()->id)->get();
        $acceptreject = Appointment::where('status','=','cancelled')->where('consultant_id',Auth::guard('consultant')->user()->id)->get();
        return response()->json(['upcoming'=>$upcoming,'past'=>$past,'accept'=>$acceptreject]);

    }
    public function bookingdetail(Request $request, Appointment $Appointment){
        $Appointment->Review;
        $Booking = unserialize(bzdecompress(utf8_decode($Appointment->rawdata)));
        $date = date_create($Appointment->appointment_date);

        $Companysetting = Companysetting::with('country')->where('id',1)->first();
        $countdown = strtotime($Appointment->appointment_date) - strtotime('now');

        $myObj = new \stdClass();
        $myObj->{'id'} = $Appointment->id;
        $myObj->{'Bookingid'} = "BK-$Appointment->id";
        $myObj->{'Date'} = date_format($date,"M d,Y,l");
        $myObj->{'Time'} = $this->getFromToTimeSchedule($Booking->schedule,\explode('-',$Appointment->map));
        $myObj->{'status'} = $Appointment->status;
        $myObj->{'Amount'} = $Booking->amount;
        $myObj->{'Customer'} = $Appointment->Customer;
        $myObj->{'countdown'} = $countdown;

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
        $Appointment->status = 'cancelled';
        $Appointment->update();
        return response()->json(['status' => true,]);
    }
    public function bookingcompleted(Request $request, Appointment $Appointment){
        $Appointment->status = 'completed';
        $Appointment->update();
        return response()->json(['status' => true,]);
    }


    public function wallet(){
        $Wallet = Wallet::where('consultant_id',Auth::guard('consultant')->user()->id)->first();
        $Payment = Payment::where('consultant_id',Auth::guard('consultant')->user()->id)->orderBy('id','desc')->get();
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
