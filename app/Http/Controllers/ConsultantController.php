<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Validator;
use DataTables;
use Session;
use App\Models\Country;
use App\Models\Consultant;
use App\Models\Category;
use App\Models\Consultantcategory;
use App\Models\Insurance;
class ConsultantController extends Controller
{


	public function datatables(){ }

	public function index(){
		return view('consultant.index');
	}

    public function datatable(Request $request){
        $datas = Consultant::orderBy('id','desc')->get();
        return DataTables::of($datas)
            ->addIndexColumn()
            // ->rawColumns()
            ->toJson();
    }

	public function create(){
        $countrys = Country::where('status',1)->get();
        $Category = Category::where('status',1)->where('type',0)->get();
        $Insurance = Insurance::where('status',1)->get();
        foreach ($Category as $key => &$value) {
            # code...
            $temp = null;
            $temp1 = null;
            $temp = [
                'id' => $value->id,
                'text' => $value->name,
            ];
            $tree1 = [];
            $Category = Category::where('status',1)->where('categories_id',$value->id)->where('type',1)->get();
            // $value['child'] = Category::where('status',1)->where('id',$value->id)->where('type',1)->get();
            foreach ($Category as $key1 => $value1) {
                # code...
                $temp['children'][] = [
                    'id' => $value1->id,
                    'text' => $value1->name,
                ];

                $temp1 = [
                    'text' => "$value->name - $value1->name"
                ];
                $Consultantcategory = Consultantcategory::where('status',1)->where('categorie_id',$value->id)->where('subcategorie_id',$value1->id)->get();
                foreach ($Consultantcategory as $key2 => $value2) {
                    $temp1['children'][] = [
                        'id' => $value2->id,
                        'text' => $value2->title,
                    ];
                }
                $tree1[] = $temp1;
            }

            $tree[] = $temp;
        }

		return view('consultant.create',['countrys' => $countrys,'tree'=>$tree,'tree1'=>$tree1,'Insurance'=>$Insurance]);
	}

	public function store(Request $request){ }

	public function update(Request $request,$id){ }

	public function status($id1,$id2){ }

    public function edit($id){ }

    public function destroy($id){ }

    public function generateotp(){
        $rand = rand(0, 9999);
        Session::put('otp', $rand);
        return response()->json(['otp' => $rand]);
    }

    public function verify(Request $request){
        $otp = Session::get('otp');
        if($request->otp == $otp) return response()->json(['otp_status' => true]);
        return response()->json(['otp_status' => false]);
    }

    public function save(Request $request){
        switch($request->step){
            case '0':
                $rules=[
                    'phone_no' => 'required|unique:consultants,phone_no,'.$request->phone_no,
                ];

                $customs=[
                    'phone_no.required'  => 'taxation number Name should be filled',
                    'phone_no.unique'      	=> 'taxation number Name already taken',
                ];
                $validator = Validator::make($request->all(), $rules,$customs);
                if($validator->fails()){
                    return response()->json(['next' => true,'step'=>9]);
                }
                $Consultant = new Consultant;
                $Consultant->phone_no = $request->phone_no;
                $Consultant->save();
                return response()->json(['next' => true,'step'=>1]);
            break;

            case '1':
                $Consultant = Consultant::where('phone_no',$request->phone_no)->first();
                $Consultant->bio_data = $request->bio_data;
                $Consultant->dob = $request->dob;
                $Consultant->email = $request->email;
                $Consultant->exp_year = $request->exp_year;
                $Consultant->landline = $request->landline;
                $Consultant->language = $request->language;
                $Consultant->name = $request->name;
                $Consultant->step = 2;
                $Consultant->update();
                return response()->json(['next' => true]);
            break;

            case '2':
                $Consultant = Consultant::where('phone_no',$request->phone_no)->first();
                $Consultant->register_address = $request->register_address;
                $Consultant->country_id = $request->country_id;
                $Consultant->state_id = $request->state_id;
                $Consultant->city_id = $request->city_id;
                $Consultant->zipcode = $request->zipcode;
                $Consultant->step = 3;
                $Consultant->update();
                return response()->json(['next' => true]);
            break;

            case '3':
                $Consultant = Consultant::where('phone_no',$request->phone_no)->first();
                $Consultant->other = $request->other;
                $Consultant->type = $request->type;
                $Consultant->firm_choose = $request->firm_choose;
                $Consultant->step = 4;
                $Consultant->update();
                return response()->json(['next' => true]);
            break;

            case '4':
                $Consultant = Consultant::where('phone_no',$request->phone_no)->first();
                $Consultant->categorie_id = $request->categorie_id;
                $Consultant->step = 5;
                $Consultant->update();
                return response()->json(['next' => true]);
            break;

            case '5':
                $Consultant = Consultant::where('phone_no',$request->phone_no)->first();
                $Consultant->specialized = $request->specialized;
                $Consultant->step = 6;
                $Consultant->update();
                return response()->json(['next' => true]);
            break;

            case '6':
                $Consultant = Consultant::where('phone_no',$request->phone_no)->first();
                $Consultant->direct = $request->direct;
                $Consultant->direct_amount = $request->direct_amount;
                $Consultant->preferre_slot = $request->preferre_slot;
                $Consultant->text = $request->text;
                $Consultant->text_amount = $request->text_amount;
                $Consultant->video = $request->video;
                $Consultant->video_amount = $request->video_amount;
                $Consultant->voice = $request->voice;
                $Consultant->voice_amount = $request->voice_amount;
                $Consultant->step = 7;
                $Consultant->update();
                return response()->json(['next' => true]);
            break;

            case '7':
                $Consultant = Consultant::where('phone_no',$request->phone_no)->first();
                $Consultant->account_number = $request->account_number;
                $Consultant->account_name = $request->account_name;
                $Consultant->ifsc_code = $request->ifsc_code;
                $Consultant->bank_name = $request->bank_name;
                $Consultant->branch = $request->branch;
                $Consultant->bank_status = $request->bank_status;
                $Consultant->step = 8;

                $Consultant->update();
                return response()->json(['next' => true]);
            break;

            case '8':
                $Consultant = Consultant::where('phone_no',$request->phone_no)->first();
                $proof = [];
                foreach ($request->file('proof') as $key => $value) {
                    $IMGname = $value->getClientOriginalName();
                    $path = $value->store("public/uploadFiles/proof/$request->phone_no/");
                    $proof[] = $path;
                }
                $Consultant->proof = \implode(',',$proof);
                $Consultant->step = 9;
                $Consultant->update();
                return response()->json(['next' => true]);
            break;

            case '9':
                $Consultant = Consultant::where('phone_no',$request->phone_no)->first();
                $Consultant->insurance_id = $request->insurance_id;
                $Consultant->step = 10;
                $Consultant->update();
                return response()->json(['next' => true]);
            break;

            case '10':
                $Consultant = Consultant::where('phone_no',$request->phone_no)->first();
                $Consultant->com_con_type = $request->com_con_type;
                $Consultant->com_off_type = $request->com_off_type;
                $Consultant->com_pay_type = $request->com_pay_type;
                $Consultant->com_con_amount = $request->com_con_amount;
                $Consultant->com_off_amount = $request->com_off_amount;
                $Consultant->com_pay_amount  = $request->com_pay_amount;

                $Consultant->step = 11;
                $Consultant->update();
                return response()->json(['next' => true]);
            break;
        }
    }

    public function getdata(Request $request){
        $Consultant = Consultant::where('phone_no',$request->phone_no)->first();
        return response()->json(['data' => $Consultant]);
    }
}
