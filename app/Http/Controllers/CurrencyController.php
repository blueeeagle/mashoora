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
        ->when($search[5],function($query,$search){
            return $query->where('price','<',$search);
        })
        ->get();
        return DataTables::of($datas)
                			->addIndexColumn()
                            ->toJson();
    }

    public function destroy($id, Currency $Currency)
    {
        return $Currency->find($id)->delete();
    }
}
