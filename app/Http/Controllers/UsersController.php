<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Country;
use Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use DataTables;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $config = theme()->getOption('page');
		return view('user.index');
        return User::all();
    }

    public function datatable(Request $request){
        $search=[];
        $columns=$request->columns;
        foreach($columns as $colum){
            $search[] = $colum['search']['value'];
        }

        $datas = User::orderBy('id','desc')
        ->when($search[1],function($query,$search){
            return $query->where('first_name','LIKE',"%{$search}%")->orwhere('last_name','LIKE',"%{$search}%");
        })
        ->when($search[2],function($query,$search){
            return $query->where('email','LIKE',"%{$search}%");
        })
        ->when($search[3],function($query,$search){
            return $query->where('phone','LIKE',"%{$search}%");
        })
        ->when($search[4],function($query,$search){
            return $query->where('permission','LIKE',"%{$search}%");
        })
        ->get();
        return DataTables::of($datas)
                			->addIndexColumn()
                            ->addColumn('name', function(User $data) {
                                return $data->first_name.' '.$data->last_name;
                            })
                            ->addColumn('email', function(User $data) {
                                return $data->email;
                            })
                            ->addColumn('phone', function(User $data) {
                                return $data->phone;
                            })
                            ->addColumn('permission', function(User $data) {
                                return "hi";
                            })
                            ->addColumn('action', function(User $data) {
                                return '<div class="action-list"><a href=""><i class="fas fa-edit"></i>Edit</a></div>';
                            })
                            ->rawColumns(['name','email','phone','permission','action'])
                            ->toJson();
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countrys = Country::where('status',1)->get();
        return \view('user.create',['countrys'=>$countrys]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $Request)
    {

        // $rules=[
		// 	'email ' => 'required|unique:users,email,'.$Request->email,
		// ];

		// $customs=[
		// 	'email.required'  => 'Email should be filled',
		// 	'email.unique'  => 'Email already taken',
		// ];

        // $validator = Validator::make($Request->all(), $rules,$customs);

        // if ($validator->fails()) {
        //   return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
        // }
        $user = new User;
        $user->email = $Request->email;
        $user->first_name = $Request->first_name;
        $user->last_name = $Request->last_name;
        $user->password = Hash::make('1234');
        $user->api_token = Str::random(60);
        $user->remember_token = Str::random(60);
        $user->phone = $Request->phone;
        $user->permission = ($Request->permession == null)?'':\implode(',',$Request->permession);
        $user->save();

        return response()->json(['msg'=>'user Addes']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $config = theme()->getOption('page');

        return User::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $config = theme()->getOption('page', 'edit');

        return User::find($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
