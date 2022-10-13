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
use DB;
use App\Models\Companysetting;
use App\Models\Language;


class helperController extends Controller
{
    public function getcountry(){
        $Country  = Country::where('status','1')->get();
        return response()->json(array('Country' => $Country));
    }
    public function getState(Request $request){

        $rules=[ 'id' => 'required' ];
		$customs=[ 'id.required'  => 'Choose Country' ];
        $validator = Validator::make($request->all(), $rules,$customs);

        if ($validator->fails()) {
          return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
        }
        $Country  = Country::where('id',$request->id)->first();
        if(!$Country){ return response()->json('country not found', 200);  }

        if($Country->has_state){
            $State = State::where('status',1)->where('country_id',$Country->id)->get();
            return response()->json(array('has_state'=>true,'state'=>$State), 200);
        }else{
            $City = City::where('status',1)->where('country_id',$Country->id)->get();
            return response()->json(array('has_state'=>false,'city'=>$City), 200);
        }
    }

    public function getCity(Request $request){

        $rules=[ 'id' => 'required' ];
		$customs=[ 'id.required'  => 'Choose State' ];
        $validator = Validator::make($request->all(), $rules,$customs);

        if ($validator->fails()) {
          return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
        }

    	$City = City::where('status',1)->where('state_id',$request->id)->get();
        return response()->json(array('city'=>$City), 200);
    }

    public function company(Request $request){
        $Companysetting = Companysetting::with('country')->first();
    	return response()->json($Companysetting);
    }
public function firm(){
        $Firm = Firm::where('status',1)->get();
        return response()->json(['firm'=>$Firm]);
    }
    public function language(){
        $Language = Language::where('status',1)->get();
        return response()->json(['langauge'=>$Language]);
    }
    public function uploadimage(Request $Request){
        if($Request->has('image')){
            $img = explode(";", $Request->image);
            $img = explode(",", $img[1]);
            $data = base64_decode($img[1]);
            $imageName = time() . '.png';
            file_put_contents(public_path().'/storage/uploadFiles/temp/'.$imageName, $data);
            return response()->json(['Name'=>$imageName], 200);
        }
    }
    
    public function getCategory(Request $request)
    
    {
        $mainCategory = Category::where('type',0)->where('status',1)->orderBy('sort_no_list')->get();
        $subCategory = Category::where('categories_id',$request->category_id)->where('status',1)->orderBy('sort_no_list')->get();
        return response()->json(['mainCategory'=>$mainCategory,'subCategory'=>$subCategory], 200);
    }
}
