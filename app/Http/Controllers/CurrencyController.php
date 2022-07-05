<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DataTables\CurrencyDataTable;
use App\Models\Currency;
use DataTables;

class CurrencyController extends Controller
{
    //
    public function index()
    {
        return view('currency.index');
    }
    public function datatable(Request $request){
        $search=[];
        $columns=$request->columns;
        foreach($columns as $colum){
            $search[] = $colum['search']['value'];
        }

        $datas = Currency::orderBy('id','desc')
        ->when($search[1],function($query,$search){
            return $query->where('countryname','LIKE',"%{$search}%");
        })
        ->when($search[2],function($query,$search){
            return $query->where('countrycode','LIKE',"%{$search}%");
        })
        ->when($search[3],function($query,$search){
            return $query->where('currencycode','LIKE',"%{$search}%");
        })
        ->get();
        return DataTables::of($datas)
                			->addIndexColumn()
                            ->addColumn('countryname', function(Currency $data) {
                                return $data->countryname;
                            })
                            ->addColumn('countrycode', function(Currency $data) {
                                return $data->countrycode;
                            })
                            ->addColumn('currencycode', function(Currency $data) {
                                return $data->currencycode;
                            })
                            ->addColumn('symbol', function(Currency $data) {
                                return $data->symbol;
                            })
                            ->addColumn('price',function(Currency $data){
                                return $data->price;
                            })
                            // ->addColumn('action', function(Currency $data) {
                            //     return '<div class="action-list"><a href="' . route('admin-vendor-edit',$data->id) . '"><i class="fas fa-edit"></i>Edit</a><a href="' . route('admin-vendor-delete',$data->id) . '"  class="delete"><i class="fas fa-trash-alt"></i>Delete</a></div>';
                            // })
                            ->rawColumns(['countryname','countrycode','currencycode','symbol','price'])
                            ->toJson();
    }
    // public function datatables(Request $request)
    // {
    //     $search=[];
    //     $columns=$request->columns;
    //     foreach($columns as $colum){
    //         $search[] = $colum['search']['value'];
    //     }

    //     $data = State::orderBy('id','desc')->with('country')->when($search[1],function($query,$search){
    //         return $query->whereHas('country', function($q) use($search) { $q->where('country_name', 'like' ,"%{$search}%"); });
    //     })
    //     ->when($search[2],function($query,$search){
    //         return $query->where('state_name','LIKE',"%{$search}%");
    //     })
    //     ->orderBy('id','desc')->skip($request->start)->take($request->length)->get();
    //     $recordsFiltered = count($data);
    //     $recordsTotal = State::count();
    //     $rangeRow = (new Collection($data))->skip($request->start)->take($request->length);

    //     return response()->json(['data'=>$rangeRow,'recordsFiltered'=>$recordsFiltered,'recordsTotal'=>$recordsTotal]);

    // }
    public function destroy($id, Currency $Currency)
    {
        return $Currency->find($id)->delete();
    }
}
