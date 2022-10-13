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
use App\Models\Document;
use App\Models\Consultantcategory;
use App\Models\Insurance;
use App\Models\Language;
use App\Models\Firm;
use App\Models\State;
use App\Models\City;
use App\Models\Companysetting;
use Illuminate\Support\Facades\Storage;

class ConsultantController extends Controller
{
	public function __construct()
    {
        $this->middleware('Permissions:Consultant_View',['only'=>['index']]);
        $this->middleware('Permissions:Consultant_Create',['only'=>['create']]);
        $this->middleware('Permissions:Consultant_Edit',['only'=>['edit']]);
        $this->middleware('Permissions:Consultant_delete',['only'=>['destroy']]);

    }

	public function datatables(){ }

	public function index(){
		return view('consultant.index');
	}

    public function datatable(Request $request){

        $search=[];
        $columns=$request->columns;
        foreach($columns as $colum){
            $search[] = $colum['search']['value'];
        }

        $datas = Consultant::with('country')->with('state')->with('city')
        // ->when($search[1],function($query,$search){ return $query->where('comapany_name','like',"%{$search}%");   })
        // ->when($search[1],function($query,$search){ return $query->where('comapany_name','like',"%{$search}%");   })
        // ->when($search[1],function($query,$search){ return $query->where('comapany_name','like',"%{$search}%");   })
        // ->when($search[1],function($query,$search){ return $query->where('comapany_name','like',"%{$search}%");   })
        ->orderBy('id','desc')->get();

        return DataTables::of($datas)
            ->addIndexColumn()
            ->editColumn('country_id', function(Consultant $data){
                $country = $data->country;
                return ($country)?$country->country_name : '';
            })
            ->editColumn('state_id', function(Consultant $data){
                $state = $data->state;
                return ($state)?$state->state_name : '';
            })
            ->editColumn('city_id', function(Consultant $data){
                $city = $data->city;
                return ($city)?$city->city_name : '';
            })
            ->editColumn('status', function(Consultant $data) {
                $status = ($data->status == 1)?'checked':'' ;
                $route = \route('consultant.consultant.status',$data->id);
                    return "<div class='form-check form-switch form-check-custom form-check-solid'>
                            <input class='form-check-input' type='checkbox' status data-url='$route' value='' $status />
                        </div>";
            })
            ->editColumn('created_at', function (Consultant $data){
                return  $data->created_at->format('d/m/Y');
            })
            ->editColumn('action', function(Consultant $data){
                               return ['Delete'=> \route('consultant.consultant.destroy',$data->id),'view'=> \route('consultant.consultant.view',$data->id),'edit'=> \route('consultant.consultant.edit',$data->id)];

            })
            ->rawColumns(['action','status'])
            ->toJson();
    }

	public function create(){
        $countrys = Country::where('status',1)->get();
        $state = State::where('status',1)->get();
        $city = City::where('status',1)->get();
        $Category = Category::with('child','childCategory')->where('status',1)->where('type',0)->get();
        $Speclize = Consultantcategory::with('Category')->with('SubCategory')->where('status',1)->get();
        $Insurance = Insurance::where('status',1)->get();
        $Language = Language::where('status',1)->get();
        $firm = Firm::where('status',1)->get();
        $tree = []; $tree1 = [];
        // dd($Category);

        foreach ($Category as $key => &$value) {
            # code...
            $temp = null;
            $temp1 = null;
            $temp = [
                'id' => $value->id,
                'text' => $value->name,
            ];
            // $tree1 = [];
            $Category = Category::where('status',1)->where('categories_id',$value->id)->where('type',1)->get();
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
            // dd($tree1);
            $tree[] = $temp;
        }
        //  dd($tree);

		return view('consultant.create',['countrys' => $countrys,
                'state'=> $state,'city'=>$city,'tree'=>$tree,
                'tree1'=>$tree1,'Insurance'=>$Insurance,
                'firm'=>$firm,'Language'=>$Language,
                'Categorys'=>$Category,
            ]);
	}

    function getName($data){
        
        $text ='';
        if(isset($data->Category)) $text = $data->Category->name;
        if(isset($data->SubCategory)){ 
            $t = $data->SubCategory->name;
            $text = "$text -- $t"; 
            
        }
        return $text;
    }
    public function subCategory(Request $request){

        $Category = Category::where('status',1)->whereIn('id',explode(",",$request->categorie_id))->get();
        $tree = [];
        $tree1 = [];
        $documents_id = [];
        $ids = [];
        foreach ($Category as $key => &$value) {
            $documents_id = array_merge($documents_id,\explode(',',$value->document_id));
            $ids[] = $value->id;
            
        }
        $Consultantcategory = Consultantcategory::with('Category','SubCategory')->where('status',1)->whereIn('subcategorie_id',$ids)->get();
        
        foreach ($Consultantcategory as $key2 => $value2) {
            $text = $this->getName($value2);
                    $tree1[] = [
                        'id' => $value2->id,
                        'text' => "$value2->title ( $text )",
                    ];
                }
                
        $Document = Document::whereIn('id',$documents_id)->where('status',1)->get();
        return response()->json(['tree'=>$tree1,'Document'=>$Document]);
    }


	public function store(Request $request){ }



	public function status(Request $request,Consultant $consultant){
        $consultant->status = $request->status;
        $consultant->update();
        return response()->json(['status'=>true,'msg'=>'Status Updated']);
    }

    public function edit(Consultant $consultant){
        $consultant = Consultant::with('country','state','city','firm.state','firm.city')->where('id',$consultant->id)->get()->first();

        $viewCategory = Category::with('child','spec')->whereIn('id',explode(',',$consultant->categorie_id))->get();
        $specialization = Consultantcategory::with('Category')->with('SubCategory')->where('status',1)->get();
        $insurance = Insurance::whereIn('id',explode(',',$consultant->insurance_id))->get();

        $Category = Category::where('status',1)->where('type',0)->get();
        $Insurance = Insurance::where('status',1)->get();
        $tree1 = [];
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
        //  dd($tree1);
        $lang = Language::whereIn('id',explode(',',$consultant->language))->get();
        return \view('consultant.edit',['consultant'=>$consultant,'tree1'=>$tree1,'lang'=>$lang,'viewCategory'=>$viewCategory,'specialization'=>$specialization,'insurance'=>$insurance]);
    }

    public function destroy(Consultant $consultant){
        $consultant->delete();
        $data1['msg'] = 'Data Deleted Successfully.';
        $data1['status'] = true;
        return response()->json($data1);
    }

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
        $phone_no = $request->c_code.''.$request->phone_no;
        switch($request->step){
            case '0':
                $consultant = Consultant::where('phone_no',$phone_no)->first();
                if($consultant){
                    $country = Country::where('id',$consultant->country_code)->first();
                    if($consultant->step > 5){
                        $Category = Category::where('status',1)->whereIn('id',\explode(',',$consultant->categorie_id))->get();
                        $ids = [];
                        $consultant_id = [];
                        foreach ($Category as $key => $value) {
                            # code...
                            $ids = array_merge($ids,\explode(',',$value->document_id));
                            $consultant_id[] = $value->id;
                        }
                        $Document = Document::whereIn('id',$ids)->where('status',1)->get();
                        $tree = [];

                        $Consultantcategory = Consultantcategory::where('status',1)->whereIn('subcategorie_id',$consultant_id)->get();
                        foreach ($Consultantcategory as $key2 => $value2) {
                            $tree[] = [
                                'id' => $value2->id,
                                'text' => $value2->title,
                            ];
                        }
                        return response()->json(['next' => true,'step'=>$consultant->step,'country'=>$country,'Document'=>$Document,'tree'=>$tree]);
                    }
                    return response()->json(['next' => true,'step'=>$consultant->step,'country'=>$country,]);

                }
                $rules=[
                    'phone_no' => 'required|unique:consultants,phone_no,'.$phone_no,
                ];

                $customs=[
                    'phone_no.required'  => 'Phone number Name should be filled',
                    'phone_no.unique'      	=> 'Phone number Name already taken',
                ];
                $validator = Validator::make(['phone_no'=>$phone_no], $rules,$customs);
                if($validator->fails()){
                    return response()->json(['next' => false,'errors' => $validator->getMessageBag()->toArray()]);
                }
                $consultant = new Consultant;
                $consultant->phone_no = $phone_no;
                $consultant->country_code = $request->country_code;
                $consultant->save();
                $country = Country::where('id',$consultant->country_code)->first();
                return response()->json(['next' => true,'country'=>$country]);
            break;
case '1':
                $Consultant = Consultant::where('phone_no',$phone_no)->first();
                $Consultant->other = $request->other;
                $Consultant->type = $request->type;
                $Consultant->firm_choose = $request->firm_choose;
                $Consultant->step = 2;
                $Consultant->update();
                return response()->json(['next' => true]);
            break;

            case '2':
                $Consultant = Consultant::where('phone_no',$phone_no)->first();
                $picture = Storage::disk('public_custom')->move("/uploadFiles/temp/$request->picture","/uploadFiles/constant/$request->picture");
                $Consultant->picture = "/uploadFiles/consultant/".$request->picture;
                $Consultant->bio_data = $request->bio_data;
                $Consultant->dob = $request->dob;
                $Consultant->email = $request->email;
                $Consultant->exp_year = $request->exp_year;
                $Consultant->landline = $request->landline;
                $Consultant->language = $request->language;
                $Consultant->gender = $request->gender;
                $Consultant->name = $request->name;
                $Consultant->step = 3;
                $Consultant->update();
                return response()->json(['next' => true]);
            break;

            case '3':
                $Consultant = Consultant::where('phone_no',$phone_no)->first();
                $Consultant->register_address = $request->register_address;
                $Consultant->country_id = $request->country_id;
                $Consultant->state_id = $request->state_id;
                $Consultant->city_id = $request->city_id;
                $Consultant->zipcode = $request->zipcode;
                $Consultant->step = 4;
                $Consultant->update();
                return response()->json(['next' => true]);
            break;

            case '4':
                $Consultant = Consultant::where('phone_no',$phone_no)->first();
                $Category = Category::where('status',1)->whereIn('id',\explode(",",$request->categorie_id))->where('type',1)->get();
                $ids = [];
                foreach ($Category as $key => $value) {
                    # code...
                    $ids[] = $value->id;
                    if($value->categories_id){
                        $ids[] = (int)$value->categories_id;
                    }
                }
                $Consultant->categorie_id = \implode(',',$ids);
                $Consultant->step = 5;
                $Consultant->update();
                return response()->json(['next' => true]);
            break;

            case '5':
                $Consultant = Consultant::where('phone_no',$phone_no)->first();
                $Consultant->specialized = $request->specialized;
                $Consultant->step = 6;
                $Consultant->update();
                return response()->json(['next' => true]);
            break;

            case '6':
                $Consultant = Consultant::where('phone_no',$phone_no)->first();
                $Consultant->insurance_id = implode(',',$request->insurance_id);
                $Consultant->step = 7;
                $Consultant->update();
                return response()->json(['next' => true]);
            break;


            case '7':
                $Consultant = Consultant::where('phone_no',$phone_no)->first();
                $Consultant->direct = $request->direct;
                $Consultant->direct_amount = $request->direct_amount;
                $Consultant->preferre_slot = $request->preferre_slot;
                $Consultant->text = $request->text;
                $Consultant->text_amount = $request->text_amount;
                $Consultant->video = $request->video;
                $Consultant->video_amount = $request->video_amount;
                $Consultant->voice = $request->voice;
                $Consultant->voice_amount = $request->voice_amount;
                $Consultant->step = 8;
                $Consultant->update();
                return response()->json(['next' => true]);
            break;

            case '8':
                $Consultant = Consultant::where('phone_no',$phone_no)->first();
                $proof = [];
                foreach ($request->file('proof') as $key => $value) {
                    $IMGname = $value->getClientOriginalName();
                    $path = $value->store("public/uploadFiles/proof/$request->phone_no/",'public_custom');
                    $proof[] = $path;
                }
                $Consultant->proof = \implode(',',$proof);
                $Consultant->step = 9;
                $Consultant->update();
                return response()->json(['next' => true]);
            break;

            case '9':
                $Consultant = Consultant::where('phone_no',$phone_no)->first();
                $Consultant->com_con_type = $request->com_con_type;
                $Consultant->com_off_type = $request->com_off_type;
                $Consultant->com_pay_type = $request->com_pay_type;
                $Consultant->com_con_amount = $request->com_con_amount;
                $Consultant->com_off_amount = $request->com_off_amount;
                $Consultant->com_pay_amount  = $request->com_pay_amount;

                $Consultant->step = 10;
                $Consultant->update();
                return response()->json(['next' => true]);
            break;

            case '10':
                $Consultant = Consultant::where('phone_no',$phone_no)->first();
                $Consultant->account_number = $request->account_number;
                $Consultant->account_name = $request->account_name;
                $Consultant->ifsc_code = $request->ifsc_code;
                $Consultant->bank_name = $request->bank_name;
                $Consultant->branch = $request->branch;
                $Consultant->bank_status = $request->bank_status;
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
    
    public function view(Consultant $consultant){
        $consultant = Consultant::with('country','state','city','firm.state','firm.city','appointment.customer','appointment_completed','appointment.transaction','wallet','offer_historys.offer','offer_historys.customer','wallet_trans','reviewForView.customer','currency')->where('id',$consultant->id)->first();
        
        $companySetting_country_price = Companysetting::with('country.currency')->get()->first();
        $consultant_country = Country::with('currency')->where('id',$consultant->country_code)->first();
        
        $countrys = Country::where('status',1)->get();
        $state = State::where('status',1)->get();
        $city = City::where('status',1)->get();
        $firm = Firm::where('status',1)->get();
        $app_completed =  count($consultant->appointment_completed);
        $insurance = Insurance::where('status',1)->get();
        $language = Language::where('status',1)->get();
        
        $consultant_category = explode(',',$consultant->categorie_id);
        $consultant_specialized = explode(',',$consultant->specialized);
        $Category = Category::where('status',1)->where('type',0)->get();
       
        $reviews = $consultant->reviewForView;
        $rating = 0;
        if(is_array($reviews)){
            
            $sum = 0;
            foreach ($reviews as  $review) {
                $sum += $review->rating;
            }
            $rating = $sum/count($reviews);
            
        }
     
        
        $temp = null;
        $temp1 = null;
        $tree = [];
        $tree1 = [];
        foreach ($Category as $key => &$value) {
            # code...
           
            $temp = [
                'id' => $value->id,
                'text' => $value->name,                
            ];
            $is_select_all = \in_array($value->id, $consultant_category);
           
            $subCategory = Category::where('status',1)->where('categories_id',$value->id)->where('type',1)->get();
            
            foreach ($subCategory as $key1 => $value1) {
                # code...
                if(\in_array($value1->id, $consultant_category)) $is_select_all = true;
                else $is_select_all = false;
               
                $temp['children'][]= [
                    'id' => $value1->id,
                    'text' => $value1->name,
                    'state' => [
                        'selected' => \in_array($value1->id, $consultant_category)  //'selected' does NOT take effect after refresh
                    ]
                ];
            }
            $temp['state'] = [ 'selected' => $is_select_all ];
            $tree[] = $temp;
        }
       
        //Specialization
        $Specialization = ConsultantCategory::where('status',1)->whereIn('id',explode(',',$consultant->specialized))->get();

        foreach ($Specialization as $key => &$value2) {
            $cat = Category::where('status',1)->where('type',0)->where('id',$value2->categorie_id)->get()->first();
            $sub = Category::where('status',1)->where('type',1)->where('id',$value2->subcategorie_id)->get()->first();
           
            $temp1 = [
                'id' => $value2->id,
                'text' => "$cat->name - $value2->title",    
                'state' => [
                    'selected' => \in_array($value2->id, $consultant_specialized)  //'selected' does NOT take effect after refresh
                ]          
            ];

            if(!is_null($sub)){
                $temp1 = [
                    'id' => $value2->id,
                    'text' => "$cat->name - $sub->name - $value2->title",    
                    'state' => [
                        'selected' => \in_array($value2->id, $consultant_specialized)  //'selected' does NOT take effect after refresh
                    ]          
                ];
            }
        
           
            $tree1[] = $temp1;
        }

        
        // dd($tree1);
        return \view('consultant.view',['consultant'=>$consultant,'firm'=>$firm,'rating'=>$rating,'consultant_country'=>$consultant_country,'companySetting_country_price'=>$companySetting_country_price,'tree'=>$tree,'tree1'=>$tree1,'insurance'=>$insurance,'language'=>$language,'app_completed'=>$app_completed,'countrys'=>$countrys,'state'=>$state,'city'=>$city]);
    }
    
    public function update(Request $Request)
    {
        $consultant = Consultant::where('id',$Request->id)->first();
      
        if($Request->form =="personal"){
            // $phone_no = $Request->data['dial_code'].' '. $Request->data['phone_no'];
           
            // $consultant->phone_no = $phone_no;
            $consultant->gender = $Request->data['gender'];
            $consultant->exp_year = $Request->data['exp_year'];
            $consultant->register_address = $Request->data['register_address'];
            $consultant->country_id = $Request->data['country_id'];
            $consultant->state_id = $Request->data['state_id'];
            $consultant->city_id = $Request->data['city_id'];
            $consultant->zipcode = $Request->data['zipcode'];
            $consultant->bio_data = $Request->data['bio_data'];
            $consultant->update();
            return response()->json(['msg' =>"Personal Details Updated"]);
        }
        if($Request->form =="consultant_amount"){
            $consultant->video = $Request->data['video'];
            $consultant->video_amount = $Request->data['video_amount'];
            $consultant->voice = $Request->data['voice'];
            $consultant->voice_amount = $Request->data['voice_amount'];
            $consultant->text = $Request->data['text'];
            $consultant->text_amount = $Request->data['text_amount'];
            $consultant->direct = $Request->data['direct'];
            $consultant->direct_amount = $Request->data['direct_amount'];
            $consultant->com_con_type = $Request->data['com_con_type'];
            $consultant->com_con_amount = $Request->data['com_con_amount'];
            $consultant->com_off_type = $Request->data['com_off_type'];
            $consultant->com_off_amount = $Request->data['com_off_amount'];
            $consultant->com_pay_type = $Request->data['com_pay_type'];
            $consultant->com_pay_amount = $Request->data['com_pay_amount'];
            $consultant->update();
            return response()->json(['msg' =>"Consultant Amount Details Updated"]);
        }

        if($Request->form =="firm_individual"){
            $consultant->type = $Request->data['type'];
            $consultant->firm_choose = $Request->data['firm_choose'];
            $consultant->other = $Request->data['other'];
            $consultant->update();
            return response()->json(['msg' =>"Firm/Individual Details Updated"]);
        }

        if($Request->form =="category"){
           
            $consultant->categorie_id = $Request->data['categorie_id'];
            $consultant->specialized = $Request->data['specialized'];
            $consultant->update();
            return response()->json(['msg' =>"Category/Specialization Updated"]);
        }

        if($Request->form =="others"){
        //    dd($Request);
            $consultant->language = $Request->data['language'];
            $consultant->insurancecheckbox = isset($Request->data['insurancecheckbox'])? $Request->data['insurancecheckbox'] :$consultant->insurancecheckbox;
            $consultant->insurance_id = isset($Request->data['insurance_id'])? $Request->data['insurance_id'] :'';
            $consultant->account_number = $Request->data['account_number'];
            $consultant->account_name = $Request->data['account_name'];
            $consultant->ifsc_code = $Request->data['ifsc_code'];
            $consultant->bank_name = $Request->data['bank_name'];
            $consultant->branch = $Request->data['branch'];
            $consultant->bank_status = isset($Request->data['bank_status'])? $Request->data['bank_status'] :'';
            $consultant->update();
            return response()->json(['msg' =>"Updated"]);
        }

    }
}
