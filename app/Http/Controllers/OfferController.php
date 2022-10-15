<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\User;
use App\Models\Firm;
use App\Models\Consultant;
use App\Models\Category;
use App\Models\Offer;
use Illuminate\Support\Facades\Input;
use DataTables;
use Illuminate\Support\Collection;
use Validator;
use Illuminate\Support\Facades\Storage;

class OfferController extends Controller
{
    public function __construct()
    {
        $this->middleware('Permissions:Offer_View',['only'=>['index']]);
        $this->middleware('Permissions:Offer_Create',['only'=>['create']]);
        $this->middleware('Permissions:Offer_Edit',['only'=>['edit']]);
        $this->middleware('Permissions:Offer_delete',['only'=>['destroy']]);

    }
    
    public function index(){
        $consultant = Consultant::where('status',1)->get();
        $firm = Firm::where('status',1)->get();
        $category = Category::where('type',0)->get();
        $sub_category = Category::where('type',1)->get();

        return view('offer.index',[
            'consultant'=>$consultant,
            'firm'=>$firm,
            'category'=>$category,
            'sub_category'=>$sub_category,
        ]);
    }

    public function datatable(Request $request){
        $search=[];
        $columns=$request->columns;
        foreach($columns as $colum){
            $search[] = $colum['search']['value'];
        }

        $datas = Offer::with('consultant')->with('firm')->with('category')->with('sub_category')
                ->when($search[1],function($query,$search){ return $query->where('firm_consultant',$search);})
                ->when($search[2],function($query,$search){ return $query->where('firm_id',$search);})
                ->when($search[3],function($query,$search){ return $query->where('consultant_id',$search);})
                ->when($search[4],function($query,$search){ return $query->where('offer_title','like',"%{$search}%");})
                ->when($search[6],function($query,$search){ return $query->where('description','like',"%{$search}%");})
                ->when($search[7],function($query,$search){ return $query->where('amount','like',"%{$search}%");})
                ->when($search[8],function($query,$search){ return $query->where('has_validity',$search);})
                // ->when($search[9],function($query,$search){ return $query->where('from_date','like',"%{$search}%");})
                // ->when($search[10],function($query,$search){ return $query->where('offer_title','like',"%{$search}%");})
                ->when($search[11],function($query,$search){ return $query->where('category_id',$search);})
                ->when($search[12],function($query,$search){ return $query->where('sub_category_id',$search);})
                ->orderBy('id','desc')->get();
        //  dd($datas);

        return DataTables::of($datas)
        ->addIndexColumn()
        ->editColumn('firm_consultant', function(Offer $data) {
            if($data->firm_consultant == 0) return 'Firm';
            if($data->firm_consultant == 1) return 'Consultant';
           
        })
        ->editColumn('has_validity', function(Offer $data) {
          
            if($data->has_validity == 1) { return 'Yes';}
            
            return 'No';                      
        })
        ->addColumn('consultantID', function(Offer $data) {
            $consultant= '';
            if($data->consultant !=''){
              $consultant = $data->consultant->name;
            }
            else{
              $consultant = '';
            }
            return $consultant;                      
        })
        ->addColumn('firmID', function(Offer $data) {
            $firm= '';
            if($data->firm !=''){
              $firm = $data->firm->comapany_name;
            }
            else{
              $firm = '';
            }
            return $firm;
           
        })
        ->addColumn('categoryID', function(Offer $data) {
            $category= '';
            if($data->category !=''){
              $category = $data->category->name;
            }
            else{
              $category = '';
            }
            return $category;
           
        })
        ->addColumn('subCategoryID', function(Offer $data) {
            $sub_category= '';
            if($data->sub_category !=''){
              $sub_category = $data->sub_category->name;
            }
            else{
              $sub_category = '';
            }
            return $sub_category;
           
        })
        ->addColumn('Image', function(Offer $data){
                                $exists = Storage::disk('public_custom')->exists($data->image);
                                if($exists) return asset("storage/$data->image");
                                return "";
                            })
        ->editColumn('status', function(Offer $data) {
            $status = ($data->status == 1)?'checked':'' ;
            $route = \route('other.offer.status',$data->id);
                return "<div class='form-check form-switch form-check-custom form-check-solid'>
                        <input class='form-check-input' type='checkbox' status data-url='$route' value='' $status />
                    </div>";
        })
        ->addColumn('action', function(Offer $data){
            return ['Delete'=> \route('other.offer.destroy',$data->id),'edit'=> \route('other.offer.edit',$data->id)];
        })
        ->rawColumns(['consultantID','firmID','categoryID','subCategoryID','status','action','Image'])->toJson();
    }

    public function create(){
        $consultant = Consultant::with('country.currency')->where('status',1)->get();
       
        $firm = Firm::where('status',1)->get();
        // dd($consultant);
        return \view('offer.create',['consultant'=>$consultant,'firm'=>$firm,]);
    }

    public function getCategory(Request $request)
    {
        $category = Category::whereIn('id',explode(",",$request->id))->get(); 
        return response()->json(['category'=>$category]);

    }
    
    public function edit(Request $request ,Offer $offer){

        //  dd($offer);
        $offer = Offer::with('consultant.country.currency')->where('id',$offer->id)->first();
        //   dd($offer);
        $consultant = Consultant::with('country.currency')->where('status',1)->get();
        $firm = Firm::where('status',1)->get();
        $category = Category::where('type',0)->get();
        $sub_category = Category::where('type',1)->get();
        return \view('offer.edit',['offer'=>$offer,'category'=>$category,
                                    'firm'=>$firm,'consultant'=>$consultant,
                                    'sub_category'=>$sub_category]);
    }
    public function store(Request $Request){
      
        // dd($Request->all());
        $rules=[
			
			'description' => 'required',
			'amount' => 'required',
			'has_validity' => 'required',
			'from_date' => 'required',
		
		];

		$customs=[
			// 'title.required'  => 'Title Name should be filled',
			// 'title.unique'      	=> 'Title Name already taken',
		];

        $validator = Validator::make($Request->all(), $rules,$customs);

        if ($validator->fails()) {
          return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
        }
        $Offer = new Offer;
        // dd($Request->all());
        $Offer->fill($Request->all());

        if(Storage::disk('public_custom')->exists("/uploadFiles/temp/$Request->image")){
            Storage::disk('public_custom')->move("/uploadFiles/temp/$Request->image","/uploadFiles/offer/$Request->image");
            $Request['image'] =  "/uploadFiles/offer/$Request->image";
        }
        
        $Offer->image = $Request->image;
        $Offer->status = (isset($Request->status)?1:0);
        $Offer->save();

       return response()->json(['msg'=>'Offer Addes']);

    }

	public function update(Request $Request,Offer $offer){
        $rules=[
			'description' => 'required',
			'amount' => 'required',
			'has_validity' => 'required',
			'from_date' => 'required',
			
		];

		$customs=[
			// 'title.required'  => 'Title Name should be filled',
			// 'title.unique'      	=> 'Title Name already taken',
		];

        $validator = Validator::make($Request->all(), $rules,$customs);

        if ($validator->fails()) {
          return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
        }

        if(Storage::disk('public_custom')->exists("/uploadFiles/temp/$Request->image") && $Request->image){
            Storage::disk('public_custom')->move("/uploadFiles/temp/$Request->image","/uploadFiles/offer/$Request->image");
            $Request['image'] =  "/uploadFiles/offer/$Request->image";
        }else{
            $Request['image'] = $offer->image;
        }
        $Request->image = $Request->image;
        $Request->status = (isset($Request->status)?1:0);
        $offer->update($Request->all());
        return response()->json(['msg'=>'Updated Successfully']);

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

    public function status(Request $request,Offer $offer){
        $offer->status = $request->status;
        $offer->update();
        return response()->json(['status'=>true,'msg'=>'Status Updated']);
    }


    public function destroy(Offer $offer)
    {
        $offer->delete();
        $data1['msg'] = 'Data Deleted Successfully.';
        $data1['status'] = true;
        return response()->json($data1);
        //--- Redirect Section Ends
    }

}
