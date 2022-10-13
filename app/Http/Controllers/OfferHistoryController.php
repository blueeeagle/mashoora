<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\User;
use App\Models\Firm;
use App\Models\OfferHistory;
use Illuminate\Support\Facades\Input;
use DataTables;
use Illuminate\Support\Collection;
use Validator;

class OfferHistoryController extends Controller
{
  
    public function index(){
        return view('history.offer.index');
    }

    public function datatable(Request $request){
        $search=[];
        $columns=$request->columns;
        foreach($columns as $colum){
            $search[] = $colum['search']['value'];
        }

        $datas = OfferHistory::orderBy('id','desc')->get();

        // dd($datas);
        return DataTables::of($datas)
        ->addIndexColumn()
        ->editColumn('created_at', function(OfferHistory $datas) {
            return  $datas->created_at->format('d/m/Y H:i:s');
        })
        ->editColumn('status', function(OfferHistory $datas) {
            if($datas->status == 0) return '<button class="btn btn-success btn-sm">Payment Success</button>';
            if($datas->status == 1) return '<button class="btn btn-danger btn-sm">Payment Failed</button>';
        })
        ->rawColumns(['status'])
        ->toJson();
    }

    

}
