<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DataTables\CurrencyDataTable;
use App\Models\Firm;
use App\Models\Category;
use App\Models\State;
use App\Models\City;
use DataTables;
use App\Models\Country;
use Validator;
use App\Models\Currency;
use Illuminate\Support\Facades\Storage;

class FirmController extends Controller
{
    public function __construct()
    {
        $this->middleware('Permissions:Firm_View',['only'=>['index']]);
        $this->middleware('Permissions:Firm_Create',['only'=>['create']]);
        $this->middleware('Permissions:Firm_Edit',['only'=>['edit']]);
        $this->middleware('Permissions:Firm_delete',['only'=>['destroy']]);

    }
    
    public function index()
    {
        return view('firm.index');
    }
    public function datatable(Request $request){
        $search=[];
        $columns=$request->columns;
        foreach($columns as $colum){
            $search[] = $colum['search']['value'];
        }

        $datas = Firm::with('country')->with('state')->with('city')
        ->when($search[1],function($query,$search){ return $query->where('comapany_name','like',"%{$search}%");   })
        ->when($search[2],function($query,$search){ return $query->where('have_tax',$search);   })
        ->when($search[3],function($query,$search){ return $query->where('taxation_number','like',"%{$search}%");   })
        // ->when($search[4],function($query,$search){ return $query->where('comapany_name','like',"%{$search}%");   })
        ->when($search[5],function($query,$search){ return $query->where('about_us','like',"%{$search}%");   })
        // ->when($search[6],function($query,$search){ return $query->where('comapany_name','like',"%{$search}%");   })
        ->when($search[7],function($query,$search){ return $query->where('register_address','like',"%{$search}%");   })
        ->when($search[8],function($query,$search){ return $query->where('country_id',$search);   })
        ->when($search[9],function($query,$search){ return $query->where('state_id',$search);   })
        ->when($search[10],function($query,$search){ return $query->where('city_id',$search);   })
        ->when($search[11],function($query,$search){ return $query->where('zipcode','like',"%{$search}%");   })
        ->when($search[12],function($query,$search){ return $query->where('cname','like',"%{$search}%");   })
        ->when($search[13],function($query,$search){ return $query->where('ctitle','like',"%{$search}%");   })
        ->when($search[14],function($query,$search){ return $query->where('cemail','like',"%{$search}%");   })
        ->when($search[15],function($query,$search){ return $query->where('cmobile','like',"%{$search}%");   })
        ->when($search[16],function($query,$search){ return $query->where('cphone','like',"%{$search}%");   })
        ->when($search[17],function($query,$search){ return $query->where('categorie_id',$search);   })
        ->when($search[18],function($query,$search){ return $query->where('account_number','like',"%{$search}%");   })
        ->when($search[19],function($query,$search){ return $query->where('account_name','like',"%{$search}%");   })
        ->when($search[20],function($query,$search){ return $query->where('ifsc_code','like',"%{$search}%");   })
        ->when($search[21],function($query,$search){ return $query->where('bank_name','like',"%{$search}%");   })
        ->when($search[22],function($query,$search){ return $query->where('branch','like',"%{$search}%");   })
        // ->when($search[13],function($query,$search){ return $query->where('comapany_name','like',"%{$search}%");   })
        ->when($search[24],function($query,$search){ return $query->where('email','like',"%{$search}%");   })
        ->when($search[25],function($query,$search){ return $query->where('user_name','like',"%{$search}%");   })
        // ->when($search[1],function($query,$search){ return $query->where('comapany_name','like',"%{$search}%");   })
        // ->when($search[1],function($query,$search){ return $query->where('comapany_name','like',"%{$search}%");   })
        // ->when($search[1],function($query,$search){ return $query->where('comapany_name','like',"%{$search}%");   })
        // ->when($search[1],function($query,$search){ return $query->where('comapany_name','like',"%{$search}%");   })
        // ->when($search[1],function($query,$search){ return $query->where('comapany_name','like',"%{$search}%");   })
        // ->when($search[1],function($query,$search){ return $query->where('comapany_name','like',"%{$search}%");   })
        // ->when($search[1],function($query,$search){ return $query->where('comapany_name','like',"%{$search}%");   })
        // ->when($search[1],function($query,$search){ return $query->where('comapany_name','like',"%{$search}%");   })
        // ->when($search[1],function($query,$search){ return $query->where('comapany_name','like',"%{$search}%");   })
        // ->when($search[1],function($query,$search){ return $query->where('comapany_name','like',"%{$search}%");   })
        // ->when($search[1],function($query,$search){ return $query->where('comapany_name','like',"%{$search}%");   })
        // ->when($search[1],function($query,$search){ return $query->where('comapany_name','like',"%{$search}%");   })
        ->orderBy('id','desc')->get();
        return DataTables::of($datas)
                			->addIndexColumn()
                            ->editColumn('have_tax', function(Firm $data){
                                return ($data->have_tax == 1)?'Yes':'No';
                            })
                            ->editColumn('country_id', function(Firm $data){
                                $country = $data->country;
                                return ($country)?$country->country_name : '';
                            })
                            ->editColumn('state_id', function(Firm $data){
                                $state = $data->state;
                                return ($state)?$state->state_name : '';
                            })
                            ->editColumn('city_id', function(Firm $data){
                                $city = $data->city;
                                return ($city)?$city->city_name : '';
                            })
                            ->editColumn('categorie_id', function(Firm $data){
                                $ids = \explode(',',$data->categorie_id);
                                $categorie_id = Category::whereIn('id',$ids)->where('status',1)->get()->pluck('name')->toArray();
                                return implode(',',$categorie_id);

                            })
                            ->editColumn('bank_status', function(Firm $data) {
                                $status = ($data->bank_status == 1)?'checked':'' ;
                                $route = \route('user.firms.bankstatus',$data->id);
                                    return "<div class='form-check form-switch form-check-custom form-check-solid'>
                                            <input class='form-check-input' type='checkbox' status data-url='$route' value='' $status />
                                        </div>";
                            })
                            ->editColumn('login_status', function(Firm $data) {
                                $status = ($data->login_status == 1)?'checked':'' ;
                                $route = \route('user.firms.loginstatus',$data->id);
                                    return "<div class='form-check form-switch form-check-custom form-check-solid'>
                                            <input class='form-check-input' type='checkbox' status data-url='$route' value='' $status />
                                        </div>";
                            })
                            ->editColumn('status', function(Firm $data) {
                                $status = ($data->status == 1)?'checked':'' ;
                                $route = \route('user.firms.status',$data->id);
                                    return "<div class='form-check form-switch form-check-custom form-check-solid'>
                                            <input class='form-check-input' type='checkbox' status data-url='$route' value='' $status />
                                        </div>";
                            })
                            ->editColumn('logo', function(Firm $data){
                                $exists = Storage::disk('public_custom')->exists($data->logo);
                                if($exists) return "<img width = 120 height = 150 src='".asset("storage/$data->logo")."' alter='$data->logo' />";
                                return "";
                            })
                            // ->editColumn('gallery', function(Firm $data){
                            //     $exists = Storage::disk('public_custom')->exists($data->gallery);
                            //     if($exists) return "<img width = 120 height = 150 src='".asset("storage/$data->gallery")."' alter='$data->gallery' />";
                            //     return "";
                            // })
                            ->editColumn('action', function(Firm $data){
                                return ['Delete'=> \route('user.firms.destroy',$data->id),'edit'=> \route('user.firms.edit',$data->id)];
                            })
                            ->rawColumns(['status','action','about_us','register_address','bank_status','login_status','logo','gallery'])
                            ->toJson(); //--- Returning Json Data To Client Side
    }
    public function destroy(Firm $firm){
        $firm->delete();
        $data1['msg'] = 'Data Deleted Successfully.';
        $data1['status'] = true;
        return response()->json($data1);
    }

    public function create(){
        $countrys = Country::where('status',1)->get();
        $state = State::where('status',1)->get();
        $city = City::where('status',1)->get();
        $tree = [];
        $Category = Category::where('status',1)->where('type',0)->get();
        foreach ($Category as $key => &$value) {
            # code...
            $temp = null;
            $temp = [
                'id' => $value->id,
                'text' => $value->name,
            ];
            $Category = Category::where('status',1)->where('categories_id',$value->id)->where('type',1)->get();
            foreach ($Category as $key1 => $value1) {
                # code...
                $temp['children'][] = [
                    'id' => $value1->id,
                    'text' => $value1->name,
                ];
            }
            $tree[] = $temp;
        }
        return \view('firm.create',['countrys'=>$countrys,'tree'=>$tree,'state'=>$state,'city'=>$city]);
    }
    public function update(Request $Request , Firm $firm){
        // dd($Request->taxation_number);
        
        $rules=[
			'taxation_number' => "unique:firms,taxation_number,".$firm->id,
			'email' => "unique:firms,email,".$firm->id,
		];

		$customs=[
			'taxation_number.unique'=> 'Taxation Number Already Taken',
			'email.unique'=> 'E-mail Already Taken',
		];

        $validator = Validator::make($Request->all(), $rules,$customs);
        if ($validator->fails()) {
            return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
        }

        $cname = [];$ctitle = [];$cemail = [];$cmobile = [];$cphone = [];
        // sunday','monday','tuesday','wednesday','thursday','friday','saturday'
        foreach ($Request->kt_docs_repeater_basic as $key => $value) {
            # code...
            $cname[] = $value['cname'];$ctitle[] = $value['ctitle'];$cemail[] = $value['cemail'];$cmobile[] = $value['cmobile'];$cphone[] = $value['cphone'];
        }

        $sunday = [];
        $monday = [];
        $tuesday = [];
        $wednesday = [];
        $thursday = [];
        $friday = [];
        $saturday = [];

        foreach($Request->kt_docs_repeater_nested_inner as $key => $value){

            if(isset($value['sunday_from'])) $sunday[] = ['sunday_from'=>$value['sunday_from'],'sunday_to'=>$value['sunday_to'],'day'=>'sunday'];
            if(isset($value['monday_from'])) $monday[] = ['monday_from'=>$value['monday_from'],'monday_to'=>$value['monday_to'],'day'=>'monday'];
            if(isset($value['tuesday_from'])) $tuesday[] = ['tuesday_from'=>$value['tuesday_from'],'tuesday_to'=>$value['tuesday_to'],'day'=>'tuesday'];
            if(isset($value['wednesday_from'])) $wednesday[] = ['wednesday_from'=>$value['wednesday_from'],'wednesday_to'=>$value['wednesday_to'],'day'=>'wednesday'];
            if(isset($value['thursday_from'])) $thursday[] = ['thursday_from'=>$value['thursday_from'],'thursday_to'=>$value['thursday_to'],'day'=>'thursday'];
            if(isset($value['friday_from'])) $friday[] = ['friday_from'=>$value['friday_from'],'friday_to'=>$value['friday_to'],'day'=>'friday'];
            if(isset($value['saturday_from'])) $saturday[] = ['saturday_from'=>$value['saturday_from'],'saturday_to'=>$value['saturday_to'],'day'=>'saturday'];
        }

        $Request['sunday'] = json_encode($sunday);
        $Request['monday'] = json_encode($monday);
        $Request['tuesday'] = json_encode($tuesday);
        $Request['wednesday'] = json_encode($wednesday);
        $Request['thursday'] = json_encode($thursday);
        $Request['friday'] = json_encode($friday);
        $Request['saturday'] = json_encode($saturday);

        $Request['cname'] = \implode(',',$cname);
        $Request['ctitle'] = \implode(',',$ctitle);
        $Request['cemail'] = \implode(',',$cemail);
        $Request['cmobile'] = \implode(',',$cmobile);
        $Request['cphone'] = \implode(',',$cphone);
        
        if(Storage::disk('public_custom')->exists("/uploadFiles/temp/$Request->logo") && $Request->logo){
            Storage::disk('public_custom')->move("/uploadFiles/temp/$Request->logo","/uploadFiles/logo/$Request->logo");
            $Request['logo'] =  "/uploadFiles/logo/$Request->logo";
        }else{
            $Request['logo'] = $firm->logo;
        }
        
        // dd($Request->logo);
        $gallery = [];

        if($Request->has('gallery')){
            foreach ($Request->file('gallery') as $key => $value) {
                $IMGname = $value->getClientOriginalName();
                $path = $value->store('uploadFiles/firm/gallery','public_custom');
                $gallery[] = $path;
            }
        }
        if(isset($Request->gallerys)) $gallery = array_merge($Request->gallerys,$gallery);
       
        $Request->register_on = date("Y-m-d H:i:s", strtotime($Request->register_on));
        $Request->status = (isset($Request->status)?1:0);
        $Request->login_status = (isset($Request->login_status)?1:0);
        $Request->bank_status = (isset($Request->bank_status)?1:0);

        $firm->fill($Request->all());
        $firm->gallery = \implode(',',$gallery);
        $firm->logo = $Request->logo;
        $firm->update();

       return response()->json(['msg'=>'updated']);
    }
    public function edit(Firm $firm){
        $countrys = Country::where('status',1)->get();
        $state = State::where('country_id',$firm->country_id)->where('status',1)->get();
        $city = City::where('state_id',$firm->state_id)->where('status',1)->get();
        $category_id = \explode(',',$firm->categorie_id);
        $tree = [];
        $Category = Category::where('status',1)->where('type',0)->get();
        foreach ($Category as $key => &$value) {
            # code...
            $temp = null;
            $temp = [
                'id' => $value->id,
                'text' => $value->name,
            ];
            $Category = Category::where('status',1)->where('categories_id',$value->id)->where('type',1)->get();
            foreach ($Category as $key1 => $value1) {
                # code...
                $temp['children'][] = [
                    'id' => $value1->id,
                    'text' => $value1->name,
                    'state' => [
                        'selected' => \in_array($value1->id,$category_id)  //'selected' does NOT take effect after refresh
                    ]
                ];
            }
            $tree[] = $temp;
        }
        $day = [];
        $day[] = json_decode($firm->sunday);
        $day[] = json_decode($firm->monday);
        $day[] = json_decode($firm->tuesday);
        $day[] = json_decode($firm->wednesday);
        $day[] = json_decode($firm->thursday);
        $day[] = json_decode($firm->friday);
        $day[] = json_decode($firm->saturday);

        $cname = \explode(',',$firm->cname);
        $ctitle = \explode(',',$firm->ctitle);
        $cemail = \explode(',',$firm->cemail);
        $cmobile = \explode(',',$firm->cmobile);
        $cphone = \explode(',',$firm->cphone);
        $gallery = \explode(',',$firm->gallery);

        $Contact = [];
        foreach ($cname as $key => $value) {
            # code...
            $data = [];
            $data['cname'] = $cname[$key];
            $data['ctitle'] = $ctitle[$key];
            $data['cemail'] = $cemail[$key];
            $data['cmobile'] = $cmobile[$key];
            $data['cphone'] = $cphone[$key];
            $Contact[] = $data;
        }
        // $Days=[];
        foreach ($day as $key => $value) {
            # code...
            foreach ($value as $data => $value) {

                $Days[] = $value->day;
            }
        }
       
        return \view('firm.edit',['firm'=>$firm,'day'=>$day,'Days'=>$Days,'countrys'=>$countrys,'tree'=>$tree,'state'=>$state,'city'=>$city,'contact'=>$Contact,'gallery'=>$gallery]);
    }
    public function store(Request $Request){
        // dd($Request);
        $rules=[
			'taxation_number' => 'unique:firms,taxation_number,'.$Request->taxation_number,
			'email' => "unique:firms,email,".$Request->email,
		];

		$customs=[
			'taxation_number.unique'      	=> 'Taxation Number Already Taken',
			'email.unique'      	=> 'Email Already Taken',
		];

        $validator = Validator::make($Request->all(), $rules,$customs);
        if ($validator->fails()) {
            return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
        }
        $cname = [];$ctitle = [];$cemail = [];$cmobile = [];$cphone = [];
        // sunday','monday','tuesday','wednesday','thursday','friday','saturday'
        foreach ($Request->kt_docs_repeater_basic as $key => $value) {
            # code...
            $cname[] = $value['cname'];$ctitle[] = $value['ctitle'];$cemail[] = $value['cemail'];$cmobile[] = $value['cmobile'];$cphone[] = $value['cphone'];
        }
        $days = isset($Request->kt_docs_repeater_nested_outer[0]['kt_docs_repeater_nested_inner'])?$Request->kt_docs_repeater_nested_outer[0]['kt_docs_repeater_nested_inner']:[];
       
        
        $sunday = [];
        $monday = [];
        $tuesday = [];
        $wednesday = [];
        $thursday = [];
        $friday = [];
        $saturday = [];
       


        foreach ($days as $key => $value) {
            # code...
          
            if(isset($value['sunday_from'])) $sunday[] = ['sunday_from'=>$value['sunday_from'],'sunday_to'=>$value['sunday_to'],'day'=>'sunday'];
            if(isset($value['monday_from'])) $monday[] = ['monday_from'=>$value['monday_from'],'monday_to'=>$value['monday_to'],'day'=>'monday'];
            if(isset($value['tuesday_from'])) $tuesday[] = ['tuesday_from'=>$value['tuesday_from'],'tuesday_to'=>$value['tuesday_to'],'day'=>'tuesday'];
            if(isset($value['wednesday_from'])) $wednesday[] = ['wednesday_from'=>$value['wednesday_from'],'wednesday_to'=>$value['wednesday_to'],'day'=>'wednesday'];
            if(isset($value['thursday_from'])) $thursday[] = ['thursday_from'=>$value['thursday_from'],'thursday_to'=>$value['thursday_to'],'day'=>'thursday'];
            if(isset($value['friday_from'])) $friday[] = ['friday_from'=>$value['friday_from'],'friday_to'=>$value['friday_to'],'day'=>'friday'];
            if(isset($value['saturday_from'])) $saturday[] = ['saturday_from'=>$value['saturday_from'],'saturday_to'=>$value['saturday_to'],'day'=>'saturday'];
        }

        $Request['sunday'] = json_encode($sunday);
        $Request['monday'] = json_encode($monday);
        $Request['tuesday'] = json_encode($tuesday);
        $Request['wednesday'] = json_encode($wednesday);
        $Request['thursday'] = json_encode($thursday);
        $Request['friday'] = json_encode($friday);
        $Request['saturday'] = json_encode($saturday);

        $Request['cname'] = \implode(',',$cname);
        $Request['ctitle'] = \implode(',',$ctitle);
        $Request['cemail'] = \implode(',',$cemail);
        $Request['cmobile'] = \implode(',',$cmobile);
        $Request['cphone'] = \implode(',',$cphone);

        if(Storage::disk('public_custom')->exists("/uploadFiles/temp/$Request->logo")){
            Storage::disk('public_custom')->move("/uploadFiles/temp/$Request->logo","/uploadFiles/logo/$Request->logo");
            $Request['logo'] =  "/uploadFiles/logo/$Request->logo";
        }

        $gallery = [];
        foreach ($Request->file('gallery') as $key => $value) {
            $IMGname = $value->getClientOriginalName();
            $path = $value->store('uploadFiles/firm/gallery','public_custom');
            $gallery[] = $path;
        }

        $Request->register_on = date("Y-m-d H:i:s", strtotime($Request->register_on));
        $Request->status = (isset($Request->status)?1:0);
        $Request->login_status = (isset($Request->login_status)?1:0);
        $Request->bank_status = (isset($Request->bank_status)?1:0);

        $Firm = new Firm;
        $Firm->fill($Request->all());
        $Firm->gallery = \implode(',',$gallery);
        $Firm->logo = $Request->logo;
        $Firm->save();

       return response()->json(['msg'=>'Firm Addes']);
    }
    public function bankstatus(Request $request,Firm $firms){
        $firms->bank_status = $request->status;
        $firms->update();
        return response()->json(['status'=>true,'msg'=>'Status Updated']);
    }
    public function loginstatus(Request $request,Firm $firms){
        $firms->login_status = $request->status;
        $firms->update();
        return response()->json(['status'=>true,'msg'=>'Status Updated']);
    }
    public function status(Request $request,Firm $firms){
        $firms->status = $request->status;
        $firms->update();
        return response()->json(['status'=>true,'msg'=>'Status Updated']);
    }
}
