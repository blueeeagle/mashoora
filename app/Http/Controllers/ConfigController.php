<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\State;
use App\Models\City;
use App\Models\Discount;
use App\Models\Offer;
use App\Models\Category;
use App\Models\Config;
use Auth;
use Validator;
use DataTables;

class ConfigController extends Controller
{
    public function __construct()
    {
        $this->middleware('Permissions:Config_View',['only'=>['index']]);
        $this->middleware('Permissions:Config_Create',['only'=>['create']]);
        $this->middleware('Permissions:Config_Edit',['only'=>['edit']]);
        $this->middleware('Permissions:Config_delete',['only'=>['destroy']]);
    }

	public function datatable(Request $request){
        $search=[];
        $columns=$request->columns;
        foreach($columns as $colum){
            $search[] = $colum['search']['value'];
        }
            
        $datas = Config::with('discount')->with('offer')                
                    ->when($search[0],function($query,$search){
                        return $query->where('choose_section','LIKE',"%{$search}%");
                    })
                    ->orderBy('id','desc')->get();
                    // ->when($search[6],function($query,$search){
                    //     return $query->where('states.state_name','LIKE',"%{$search}%");
                    // })
                    // ->when($search[3],function($query,$search){
                    //     return $query->where('cities.city_name','LIKE',"%{$search}%");
                    // })
        // dd($datas);   
        return DataTables::of($datas)
        ->addIndexColumn()
        ->addColumn('typeOfConfig', function(Config $datas) {
            $type ='';
            if($datas->type==1){
                return 'Discount';
            }
            if($datas->type==2){
                return 'Offer';
            }
            
        })
        ->addColumn('discount_offer',function(Config $datas){
            $dis_off = '';
            if($datas->discount!='' && $datas->type==1){
                $dis_off = $datas->discount->promo_title;
            }
            if($datas->offer!='' && $datas->type==2){
                $dis_off = $datas->offer->offer_title;
            }
            return $dis_off;
            
        })
        ->addColumn('status', function(Config $datas) {
            $status = ($datas->status == 1)?'checked':'' ;
            $route = \route('activities.config.status',$datas->id);
                return "<div class='form-check form-switch form-check-custom form-check-solid'>
                        <input class='form-check-input' type='checkbox' status data-url='$route' value='' $status />
                    </div>";
        })
        ->addColumn('action', function(Config $datas){
            return ['Delete'=> \route('activities.config.destroy',$datas->id),'edit'=> \route('activities.config.edit',$datas->id)];
        })
        ->rawColumns(['typeOfConfig','discount_offer','status','action'])
            //--- Returning Json Data To Client Side
        ->toJson();
    }


	public function index(){
		return view('config.index');
	}

	public function create(){
		$discount=Discount::where('status','1')->get();
		$offer=Offer::where('status','1')->get();
		$category=Category::where('status','1')->get();
       
		return view('config.create',compact('discount','offer','category'));
	}

    public function store(Request $Request){
        
        //   dd($Request->toArray());
        $config_home_Screen = new Config;

        $Request->category_id = implode(',',$Request->category_id);
        $config_home_Screen->fill($Request->all());
        $config_home_Screen->category_id = $Request->category_id;
        $config_home_Screen->status = (isset($Request->status)?1:0);
        $config_home_Screen->save();
    
        return response()->json(['msg'=>'Config Home Screen Addes']);
    }
    
    public function update(Request $Request,Config $config){
    
        $config->status = (isset($Request->status)?1:0);
        
        // dd($config->category_id);
        $config->update($Request->all());
        $config->category_id = implode(',',$Request->category_id);
        $config->update();
        return response()->json(['msg'=>'Updated Successfully']);
    }

	public function status(Request $request,Config $config){
        $config->status = $request->status;
        $config->update();
        return response()->json(['status'=>true,'msg'=>'Status Updated']);
    }
    public function edit(Request $request,Config $config ){
        $discount=Discount::where('status','1')->get();
		$offer=Offer::where('status','1')->get();
		$category=Category::where('status','1')->get();
		
        // dd($configHomeScreen->all());
        return \view('config.edit',
        [   'config'=>$config,
            'offer'=>$offer,'discount'=>$discount,
            'category'=>$category,
        ]);
    }



    public function destroy(Config $config)
    {
        $config->delete();
        $data1['msg'] = 'Data Deleted Successfully.';
        $data1['status'] = true;
        return response()->json($data1);
        //--- Redirect Section Ends
    }

}
