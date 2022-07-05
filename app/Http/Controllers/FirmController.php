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
        $datas = Firm::orderBy('id','desc')->get();
        return DataTables::of($datas)
                			->addIndexColumn()
                            ->addColumn('comapany_name', function(Firm $data) {
                                return $data->comapany_name;
                            })
                            ->addColumn('legal_name', function(Firm $data) {
                                return $data->legal_name;
                            })
                            ->addColumn('taxation_number', function(Firm $data) {
                                return $data->taxation_number;
                            })
                            ->addColumn('register_on', function(Firm $data) {
                                return $data->register_on;
                            })
                            ->addColumn('register_address',function(Firm $data){
                                return $data->register_address;
                            })
                            // ->addColumn('action', function(Currency $data) {
                            //     return '<div class="action-list"><a href="' . route('admin-vendor-edit',$data->id) . '"><i class="fas fa-edit"></i>Edit</a><a href="' . route('admin-vendor-delete',$data->id) . '"  class="delete"><i class="fas fa-trash-alt"></i>Delete</a></div>';
                            // })
                            ->rawColumns(['comapany_name','legal_name','taxation_number','register_on','register_address'])
                            ->toJson();
    }
    public function destroy($id, Currency $Currency)
    {
        return $Currency->find($id)->delete();
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


        $Request['cname'] = \implode(',',$cname);
        $Request['ctitle'] = \implode(',',$ctitle);
        $Request['cemail'] = \implode(',',$cemail);
        $Request['cmobile'] = \implode(',',$cmobile);
        $Request['cphone'] = \implode(',',$cphone);


        $IMGname = $Request->file('logo')->getClientOriginalName();
        $path = $Request->file('logo')->store('public/uploadFiles/firm');
        $Request['logo'] = $path;
        $Request->register_on = date("Y-m-d H:i:s", strtotime($Request->register_on));
        $Request->status = (isset($Request->status)?1:0);
        $Companysetting = new Firm;
        $Companysetting->fill($Request->all());

        $Companysetting->save();

       return response()->json(['msg'=>'Company Addes']);
    }
}
