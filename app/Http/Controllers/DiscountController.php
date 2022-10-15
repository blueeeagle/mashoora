<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\User;
use App\Models\Firm;
use App\Models\Consultant;
use App\Models\Discount;
use App\Models\Category;
use App\Models\Consultantcategory;
use Illuminate\Support\Facades\Input;
use DataTables;
use DB;
use Illuminate\Support\Collection;
use Validator;
use Illuminate\Support\Facades\Storage;

class DiscountController extends Controller
{
    public function __construct()
    {
      $this->middleware('Permissions:Discount_View',['only'=>['index']]);
      $this->middleware('Permissions:Discount_Create',['only'=>['create']]);
      $this->middleware('Permissions:Discount_Edit',['only'=>['edit']]);
      $this->middleware('Permissions:Discount_delete',['only'=>['destroy']]);

    }
  public function index(){
    $consultant = Consultant::where('status',1)->get();
    $category = Category::where('status',1)->get();
    $specialization = Consultantcategory::where('status',1)->get();
    return view('discount.index',[
        'consultant'=>$consultant,
        'category'=>$category,
        'specialization'=>$specialization,

    ]);
  }

  public function datatable(Request $request){

    $search=[];
    $columns=$request->columns;
    foreach($columns as $colum){
        $search[] = $colum['search']['value'];
    }
    $datas = Discount::with('category')->with('specialization')->with('consultant')
            ->when($search[1],function($query,$search){return $query->where('consultant_id',$search);})
            ->when($search[2],function($query,$search){return $query->where('promo_title','LIKE',"%{$search}%");})
            ->when($search[3],function($query,$search){return $query->where('promo_code','LIKE',"%{$search}%");})
            ->when($search[4],function($query,$search){return $query->where('no_of_coupons',$search);})
            ->when($search[6],function($query,$search){return $query->where('amount',$search);})
            ->when($search[9],function($query,$search){return $query->where('category_id',$search);})
            ->when($search[10],function($query,$search){return $query->where('specialization_id',$search);})
            ->orderBy('id','desc')->get();

    // dd($datas);
    return DataTables::of($datas)
      ->addIndexColumn()
      ->addColumn('consultantId', function(Discount $data){

        $consultant_name= '';
        if($data->consultant !=''){
          $consultant_name = $data->consultant->name;
        }
        else{
          $consultant_name = '';
        }
        return $consultant_name;
      })
      ->addColumn('categoryID', function(Discount $data){

        $category_name= '';
        if($data->category !=''){
          $category_name = $data->category->name;
        }
        else{
          $category_name = '';
        }
        return $category_name;
      })
      ->addColumn('specializationID', function(Discount $data){

        $specialization= '';
        if($data->specialization !=''){
          $specialization = $data->specialization->title;
        }
        else{
          $specialization = '';
        }
        return $specialization;
      })
      ->editColumn('flat_percentage', function(Discount $data){

        $flat_percentage= '';
        if($data->flat_percentage == 0){
          $flat_percentage = 'Flat';
        }
        if($data->flat_percentage == 1){
          $flat_percentage = 'Percentage';
        }
        return $flat_percentage;
      })
      ->editColumn('status', function(Discount $data) {
          $status = ($data->status == 1)?'checked':'' ;
          $route = \route('other.discount.status',$data->id);
              return "<div class='form-check form-switch form-check-custom form-check-solid'>
                      <input class='form-check-input' type='checkbox' status data-url='$route' value='' $status />
                  </div>";
      })
      ->addColumn('action', function(Discount $data){

          return ['Delete'=> \route('other.discount.destroy',$data->id),'edit'=> \route('other.discount.edit',$data->id)];
      })
      ->editColumn('image', function(Discount $data){
        $exists = Storage::disk('public_custom')->exists($data->image);
        if($exists) return asset("storage/$data->image");
        return "";
      })
      ->rawColumns(['consultantId','categoryID','specializationID','status','action'])
      ->toJson();
  }

  public function getConsultant(Request $request){
      $Consultant = Consultant::where('id',$request->id)->first();
      $ConsultantCategory = ConsultantCategory::where('id',explode(',',$Consultant->specialized))->where('status',1)->get();
      $Category = Category::where('id',explode(',',$Consultant->categorie_id))->where('status',1)->get();
      return response()->json(['ConsultantCategory'=>$ConsultantCategory,'Category'=>$Category]);
  }

  public function create(){
      $Consultant = Consultant::with('country.currency')->where('status',1)->get();
      return \view('discount.create',['consultants'=>$Consultant]);
  }

  public function edit(Discount $discount ){
    $discount = Discount::with('consultant.country.currency')->where('id',$discount->id)->get()->first();
    // dd($discount);
    $Consultant = Consultant::with('country.currency')->where('status',1)->get();
    $ConsultantCategory = ConsultantCategory::where('id',$discount->specialization_id)->where('status',1)->get();
    $Category = Category::where('id',$discount->category_id)->where('status',1)->get();

    return \view('discount.edit',['discount'=>$discount,'specialization'=>$ConsultantCategory,'category'=>$Category,
                                  'consultants'=>$Consultant,
                                ]);
  }
  public function store(Request $Request){
    $rules=[
			'promo_code' => 'required|unique:discount,promo_code,'.$Request->promo_code,
      'consultant_id' => 'required',
      'no_of_coupons' => 'required',
      'flat_percentage' => 'required',
      'amount' => 'required',
      'from_date' => 'required',
      'to_date' => 'required',
      'category_id' => 'required',
      'specialization_id' => 'required',
		];

		$customs=[
			'promo_code.required'  => 'Promo Code should be filled',
			'promo_code.unique'      	=> 'Promo Code already taken',
      'consultant_id.required' => 'Consultant should be filled',
      'category_id.required' => 'Consultant should be filled',
      'specialization_id.required' => 'Consultant should be filled',
      'amount.required' => 'Consultant should be filled',
		];

    $validator = Validator::make($Request->all(), $rules,$customs);

    if ($validator->fails()) {
      return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
    }
    $Discount = new Discount;
    $Discount->fill($Request->all());
    
    if(Storage::disk('public_custom')->exists("/uploadFiles/temp/$Request->image")){
            Storage::disk('public_custom')->move("/uploadFiles/temp/$Request->image","/uploadFiles/Discount/$Request->image");
            $Request['image'] =  "/uploadFiles/Discount/$Request->image";
        }
        
   
    $Discount->image = $Request->image;
    $Discount->status = (isset($Request->status)?1:0);
    $Discount->save();

    return response()->json(['msg'=>'Discount Addes']);
  }

	public function update(Request $Request,Discount $discount){
    $rules=[
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
      'promo_code.required'  => 'Promo Code should be filled',
			'promo_code.unique'      	=> 'Promo Code already taken',
      'category_id.required' => 'Category should be filled',
      'specialization_id.required' => 'Specilazation should be filled',
      'amount.required' => 'Amount should be filled',
    ];

    $validator = Validator::make($Request->all(), $rules,$customs);
    // dd($Request);
    if ($validator->fails()) {
      return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
    }

    if(Storage::disk('public_custom')->exists("/uploadFiles/temp/$Request->image") && $Request->image){
            Storage::disk('public_custom')->move("/uploadFiles/temp/$Request->image","/uploadFiles/Discount/$Request->image");
            $Request['image'] =  "/uploadFiles/Discount/$Request->image";
        }else{
            $Request['image'] = $discount->image;
        }
        $Request->image = $Request['image'];
        
    $Request->status = (isset($Request->status)?1:0);
    $discount->update($Request->all());
    return response()->json(['msg'=>'Update']);

  }

  public function search(Request $Request){
    $User = User::where('first_name','like',"%{$Request->search}%")->orWhere('last_name','like',"%{$Request->search}%")->orWhere('email','like',"%{$Request->search}%")->orWhere('phone','like',"%{$Request->search}%")->select(['id','first_name as text'])->get();
    $Firm = Firm::where('comapany_name','like',"%{$Request->search}%")->orWhere('legal_name','like',"%{$Request->search}%")->select(['id','comapany_name as text'])->get();
    $Consultant = Consultant::where('name','like',"%{$Request->search}%")->orWhere('phone_no','like',"%{$Request->search}%")->orWhere('email','like',"%{$Request->search}%")->select(['id','name as text'])->get();
    return response()->json([
          ["title"=>'User','children'=> $User],
          ["title"=>'Firm','children'=> $Firm],
          ["title"=>'Consultant','children'=> $Consultant],
    ]);
  }

  public function status(Request $request,Discount $discount){
    $discount->status = $request->status;
    $discount->update();
    return response()->json(['status'=>true,'msg'=>'Status Updated']);
  }


  public function destroy(Discount $discount){
    $discount->delete();
    $data1['msg'] = 'Data Deleted Successfully.';
    $data1['status'] = true;
    return response()->json($data1);
      //--- Redirect Section Ends
  }

}
