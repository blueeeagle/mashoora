<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DataTables\CurrencyDataTable;
use App\Models\Firm;
use App\Models\Category;
use DataTables;
use App\Models\Country;
use Validator;
use App\Models\Currency;

class FirmController extends Controller
{
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

        $datas = Firm::orderBy('id','desc')->get();
        return DataTables::of($datas)
                			->addIndexColumn()
                            ->addColumn('have_tax', function(Firm $data){
                                return ($data->have_tax == 1)?'Yes':'No';
                            })
                            ->addColumn('country_id', function(Firm $data){
                                $country = $data->country;
                                return ($country)?$country->country_name : '';
                            })
                            ->addColumn('state_id', function(Firm $data){
                                $state = $data->state;
                                return ($state)?$state->state_name : '';
                            })
                            ->addColumn('city_id', function(Firm $data){
                                $city = $data->city;
                                return ($city)?$city->city_name : '';
                            })
                            ->addColumn('status', function(Firm $data) {
                                $status = ($data->status == 1)?'checked':'' ;
                                $route = \route('user.firms.status',$data->id);
                                    return "<div class='form-check form-switch form-check-custom form-check-solid'>
                                            <input class='form-check-input' type='checkbox' status data-url='$route' value='' $status />
                                        </div>";
                            })
                            ->addColumn('action', function(Firm $data){
                                return ['Delete'=> \route('user.firms.destroy',$data->id),'edit'=> \route('master.city.edit',$data->id)];
                            })
                            ->rawColumns(['status','action','about_us','register_address'])
                            ->toJson(); //--- Returning Json Data To Client Side
    }
    public function destroy(Firm $firm){
        $Firm->delete();
        $data1['msg'] = 'Data Deleted Successfully.';
        $data1['status'] = true;
        return response()->json($data1);
    }

    public function edit(Firm $firms){

    }

    public function create(){
        $countrys = Country::where('status',1)->get();
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
            // $value['child'] = Category::where('status',1)->where('id',$value->id)->where('type',1)->get();
            foreach ($Category as $key1 => $value1) {
                # code...
                $temp['children'][] = [
                    'id' => $value1->id,
                    'text' => $value1->name,
                ];
            }
            $tree[] = $temp;
        }
        return \view('firm.create',['countrys'=>$countrys,'tree'=>$tree]);
    }

    public function store(Request $Request){

        // dd($Request->all());
        $rules=[
			'taxation_number' => 'required|unique:companysettings,taxation_number,'.$Request->taxation_number,
		];

		$customs=[
			'taxation_number.required'  => 'taxation number Name should be filled',
			'taxation_number.unique'      	=> 'taxation number Name already taken',
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
        $days = $Request->kt_docs_repeater_nested_outer[0]['kt_docs_repeater_nested_inner'];

        $sunday = [];
        $monday = [];
        $tuesday = [];
        $wednesday = [];
        $thursday = [];
        $friday = [];
        $saturday = [];


        foreach ($days as $key => $value) {
            # code...
            if(isset($value['sunday_from'])) $sunday[] = ['sunday_from'=>$value['sunday_from'],'sunday_to'=>$value['sunday_to']];
            if(isset($value['monday_from'])) $monday[] = ['monday_from'=>$value['monday_from'],'monday_to'=>$value['monday_to']];
            if(isset($value['tuesday_from'])) $tuesday[] = ['tuesday_from'=>$value['tuesday_from'],'tuesday_to'=>$value['tuesday_to']];
            if(isset($value['wednesday_from'])) $wednesday[] = ['wednesday_from'=>$value['wednesday_from'],'wednesday_to'=>$value['wednesday_to']];
            if(isset($value['thursday_from'])) $thursday[] = ['thursday_from'=>$value['thursday_from'],'thursday_to'=>$value['thursday_to']];
            if(isset($value['friday_from'])) $friday[] = ['friday_from'=>$value['friday_from'],'friday_to'=>$value['friday_to']];
            if(isset($value['saturday_from'])) $saturday[] = ['saturday_from'=>$value['saturday_from'],'saturday_to'=>$value['saturday_to']];
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

        $logo = '';
        if($Request->has('logo')){
            $IMGname = $Request->file('logo')->getClientOriginalName();
            $path = $Request->file('logo')->store('uploadFiles/firm/logo','public_custom');
            $logo = $path;
        }
        $gallery = '';
        if($Request->has('gallery')){
            $IMGname = $Request->file('gallery')->getClientOriginalName();
            $path = $Request->file('gallery')->store('uploadFiles/firm/gallery','public_custom');
            $gallery = $path;
        }
        $Request->register_on = date("Y-m-d H:i:s", strtotime($Request->register_on));
        $Request->status = (isset($Request->status)?1:0);
        $Request->login_status = (isset($Request->login_status)?1:0);
        $Request->bank_status = (isset($Request->bank_status)?1:0);

        $Firm = new Firm;
        $Firm->fill($Request->all());
        $Firm->gallery = $gallery;
        $Firm->logo = $logo;
        $Firm->save();

       return response()->json(['msg'=>'Firm Addes']);
    }
    public function status(Request $request,Firm $firms){
        $city->status = $request->status;
        $city->update();
        return response()->json(['status'=>true,'msg'=>'Status Updated']);
    }
}
