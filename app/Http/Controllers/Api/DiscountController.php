<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Discount;
use App\Models\Consultantcategory;
use App\Models\Category;
use App\Models\Consultant;
use DataTables;
use Validator;
use DB;
use Carbon\Carbon;
use Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class DiscountController extends Controller
{

    public function index(Request $request)
    {
        $Discount = Discount::where('consultant_id',Auth::guard('consultant')->user()->id)->get();
        return DataTables::of($Discount)->addIndexColumn()->toJson();
    }

    public function create(){
        $Consultantcategory = Consultantcategory::where('status',1)->get();
        $Category = Category::where('status',1)->get();
        return response()->json(['specialization'=>$Consultantcategory,'category'=>$Category]);
    }

    public function edit(Request $request,Discount $discount){
        $Consultantcategory = Consultantcategory::where('status',1)->get();
        $Category = Category::where('status',1)->get();
        return response()->json(['edit_discount'=>$discount,'specialization'=>$Consultantcategory,'category'=>$Category], 200);
    }

    public function store(Request $Request)
    {

        $rules=[
            'promo_title' => "required|unique:discount,promo_title,$Request->promo_title",
            'promo_code' => "required|unique:discount,promo_code,$Request->promo_code",
			'no_of_coupons' => 'required',
			'flat_percentage' => 'required',
			'amount' => 'required',
			'from_date' => 'required',
			'to_date' => 'required',
			'image' => 'required',
			'category_id' => 'required',
			'specialization_id' => 'required',
		];

		$customs=[
			'promo_title.required'  => 'Title Name should be filled',
			'promo_title.unique'  => 'Title Name Taken',
            'promo_code.required'  => 'promo Code Name should be filled',
			'promo_code.unique'  => 'promo Code Taken',

			'no_of_coupons.required'  => 'No of coupon Name should be filled',
			'flat_percentage.required'  => 'flat or % Name should be filled',
			'amount.required'  => 'Amount Name should be filled',
			'from_date.required'  => 'From Date Name should be filled',
			'to_date.required'  => 'To Date Name should be filled',
			'image.required'  => 'Image Name should be filled',
			'category_id.required'  => 'Category Name should be filled',
			'specialization_id.required'  => 'specialization Name should be filled',
		];

        $validator = Validator::make($Request->all(), $rules,$customs);
        if ($validator->fails()) {
          return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
        }


        $Discount = new Discount;
        $Discount->fill($Request->all());
        if($Request->has('image')){
            $Discount->image = $Request->file('image')->store("uploadFiles/Discount/",'public_custom');
        }

        $Discount->consultant_id = Auth::guard('consultant')->user()->id;
        $Discount->status = (isset($Request->status)?1:0);
        $Discount->save();

        return response()->json(['msg'=>'Discount Addes'], 200);
    }

    public function update(Request $Request,Discount $discount)
    {

        $rules=[
            'promo_title' => "required|unique:discount,promo_title,$discount->id,id",
            'promo_code' => "required|unique:discount,promo_code,$discount->id,id",
			'no_of_coupons' => 'required',
			'flat_percentage' => 'required',
			'amount' => 'required',
			'from_date' => 'required',
			'to_date' => 'required',
			'category_id' => 'required',
			'specialization_id' => 'required',
		];

		$customs=[
			'promo_title.required'  => 'Title Name should be filled',
			'promo_title.unique'  => 'Title Name Taken',
            'promo_code.required'  => 'promo Code Name should be filled',
			'promo_code.unique'  => 'promo Code Taken',

			'no_of_coupons.required'  => 'No of coupon Name should be filled',
			'flat_percentage.required'  => 'flat or % Name should be filled',
			'amount.required'  => 'Amount Name should be filled',
			'from_date.required'  => 'From Date Name should be filled',
			'to_date.required'  => 'To Date Name should be filled',
			'category_id.required'  => 'Category Name should be filled',
			'specialization_id.required'  => 'specialization Name should be filled',
		];

        $validator = Validator::make($Request->all(), $rules,$customs);
        if ($validator->fails()) {
          return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
        }

        if($Request->has('image')){
           $pauth = $Request->file('image')->store("uploadFiles/Discount/",'public_custom');
        }
        $Request->image = $pauth;
        $Request->status = (isset($Request->status)?1:0);
        $discount->update($Request->all());
        return response()->json(['msg'=>'Update Successfully']);
    }

    public function destroy(Request $request,Discount $discount){
        $discount->delete();
        $data1['msg'] = 'Data Deleted Successfully.';
        $data1['status'] = true;
        return response()->json($data1);
    }

}
