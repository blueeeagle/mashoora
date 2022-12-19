<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\User;
use App\Models\Appointment;
use App\Models\NotificationSetting;
use App\Models\NotificationTemplate;
use Illuminate\Support\Facades\Input;
use DataTables;
use Illuminate\Support\Collection;
use Validator;

class NotificationController extends Controller
{
  
    public function index(){
        $datas = NotificationSetting::get()->pluck('type')->toArray();
        return view('notification.index',compact('datas'));
    }

    public function store(Request $request)
    {
        $requestedData=$request->all();
        
        $rules=[
            'type' => 'required|array',
        ];
        $customs=[
            'type.required'  => 'Type Should be checked',
        ];
		$validator = Validator::make($request->all(), $rules,$customs);
        if ($validator->fails()) {
          return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
        }
       
        NotificationSetting::whereNotNull('id')->delete();

        $test=implode(',', $request->type);
        $test2=explode(',',$test);
        foreach($test2 as $t)
        {
            $data = new NotificationSetting;
            $data->type=$t;
            $data->save();
        }
		$data1['msg'] = 'Created Successfully';
        return response()->json($data1);    
    }

    public function template_store(Request $request)
    {
        $requestedData=$request->all();        
        $rules=[
            'type' => 'required',
            'title' => 'required',
            'description' => 'required',
        ];
        $customs=[
            'title.required'  => 'Title Should be filled',
            'description.required'  => 'Description Should be filled',
        ];
		$validator = Validator::make($request->all(), $rules,$customs);
        if ($validator->fails()) {
          return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
        }

        $notify=NotificationTemplate::where('type','=',$request->type)->first();
        if($notify)
        {
            $notify->title=$request->title;
            $notify->variables=$request->variables;
            $notify->description=$request->description;
            $notify->save();
        }else{
            $data = new NotificationTemplate;
            $data->type=$request->type;
            $data->title=$request->title;
            $data->variables=$request->variables;
            $data->description=$request->description;
            $data->save();
        }

		$data1['msg'] = 'Created Successfully';
        $data1['status'] = true;
        return response()->json($data1); 
    }


    public static function variables($value){
        // 1 done
        if($value==1 || $value==2 || $value==3)
        {
            return array('{customer_name}','{email}','{phone_no}','{created_date}');
        }
        elseif($value==4 || $value==5 || $value==6)
        {
            return array('{consultant_name}','{email}','{phone_no}','{created_date}');
        }elseif($value==7 || $value==8)
        {
            return array('{admin_name}','{email}','{phone_no}','{created_date}');
        }
        //2 done
        elseif($value==9 || $value==10 || $value==11)
        {
            return array('{customer_name}','{amount}','{created_date}');
        }
        elseif($value==12 || $value==13 || $value==14)
        {
            return array('{consultant_name}','{amount}','{created_date}');
        }
        elseif($value==15 || $value==16)
        {
            return array('{admin_name}','{amount}','{{created_date}');
        }

        //3
        elseif($value==17 || $value==18 || $value==19 || $value==20 || $value==21 || $value==22 || $value==23 || $value==24)
        {
            return array('{customer_name}','{consultant_name}','{consultant_type}','{amount}','{booking_date}','booking_time}','slot}','insurance}','status}','created_date}','appointment_status}');
        }

        //4
        elseif($value==25 || $value==26 || $value==27 || $value==28 || $value==29 || $value==30 || $value==31 || $value==32)
        {
            return array('{customer_name}','{booking_id}','{consultant_name}','{consultant_type}','{amount}','{booking_date}','{booking_time}','{slot}','{insurance_name}','{status}','{created_date}','{appointment_status}');
        }
        //5
        elseif($value==33 || $value==34 || $value==35 || $value==36 || $value==37 || $value==38 || $value==39 || $value==40)
        {
            return array('{customer_name}','{booking_id}','{consultant_name}','{consultant_type}','{amount}','{booking_date}','{booking_time}','{slot}','{insurance_name}','{status}','{created_date}','{appointment_status}');
        }
        //6 done
        elseif($value==41 || $value==42 || $value==43 || $value==44 || $value==45 || $value==46 || $value==47 || $value==48)
        {
            return array('{customer_name}','{booking_id}','{consultant_name}','{consultant_type}','{amount}','{booking_date}','{booking_time}','{slot}','{review}','{created_date}','{status}');
        }
        //7 done
        elseif($value==49 || $value==50 || $value==51 || $value==52 || $value==53 || $value==54 || $value==55 || $value==56)
        {
            return array('{customer_name}','{booking_id}','{consultant_name}','{consultant_type}','{amount}','{booking_date}','{booking_time}','{slot}','{created_date}','{status}');
        }
        //8 - pending
        elseif($value==57 || $value==58 || $value==59 || $value==60 || $value==61 || $value==62 || $value==63 || $value==64)
        {
            return array('{customer_name}','{booking_id}','{consultant_name}','{consultant_type}','{amount}','{booking_date}','{booking_time}','{slot}','{insurance_name}','{status}','{created_date}');
        }

        //9 - done
         elseif($value==65 || $value==66 || $value==67 || $value==68 || $value==69 || $value==70 || $value==71 || $value==72)
        {
            return array('{customer_name}','{booking_id}','{consultant_name}','{consultant_type}','{amount}','{booking_date}','{booking_time}','{slot}','{review}','{created_date}','{status}');
        }
        //10 - done
        elseif($value==73 || $value==74 || $value==75 || $value==76 || $value==77 || $value==78 || $value==79 || $value==80)
        {
            return array('{customer_name}','{booking_id}','{consultant_name}','{consultant_type}','{amount}','{booking_date}','{booking_time}','{slot}','{created_date}','{status}','{review}','{rating}');
        }
        //11 - done
        elseif($value==81 || $value==82 || $value==83 || $value==84 || $value==85 || $value==86 || $value==87 || $value==88)
        {
            return array('{customer_name}','{booking_id}','{consultant_name}','{consultant_type}','{amount}','{booking_date}','{booking_time}','{slot}','{created_date}','{status}','{review}','{rating}');
        }
        //12
        elseif($value==89 || $value==90 || $value==91 || $value==92 || $value==93 || $value==94 || $value==95 || $value==96)
        {
            return array('{customer_name}','{booking_id}','{consultant_name}','{consultant_type}','{amount}','{booking_date}','{booking_time}','{slot}','{insurance}','{appointment_status}','{created_date}');
        }
        //13 - done
        elseif($value==97 || $value==98 || $value==99 || $value==100 || $value==101 || $value==102 || $value==103 || $value==104)
        {
            return array('{customer_name}','{booking_id}','{consultant_name}','{consultant_type}','{amount}','{booking_date}','{booking_time}','{slot}','{created_date}');
        }
        //14 - done
        elseif($value==105 || $value==106 || $value==107 || $value==108 || $value==109 || $value==110 || $value==111 || $value==112)
        {
            return array('{customer_name}','{booking_id}','{consultant_name}','{consultant_type}','{amount}','{booking_date}','{booking_time}','{slot}','{created_date}');
        }
        //15 - done
        elseif($value==113 || $value==114 || $value==115 || $value==116 || $value==117 || $value==118 || $value==119 || $value==120)
        {
            return array('{customer_name}','{booking_id}','{consultant_name}','{consultant_type}','{amount}','{booking_date}','{booking_time}','{slot}','{created_date}');
        }
        //16 - done
        elseif($value==121 || $value==122 || $value==123 || $value==124 || $value==125 || $value==126 || $value==127 || $value==128)
        {
            return array('{customer_name}','{booking_id}','{consultant_name}','{consultant_type}','{amount}','{booking_date}','{booking_time}','{slot}','{created_date}');
        }
        //17 - done
        elseif($value==129 || $value==130 || $value==131 || $value==132 || $value==133 || $value==134 || $value==135 || $value==136)
        {
            return array('{customer_name}','{booking_id}','{consultant_name}','{consultant_type}','{amount}','{booking_date}','{booking_time}','{slot}','{created_date}');
        }
        //18 - done
        elseif($value==137 || $value==138 || $value==139 || $value==140 || $value==141 || $value==142 || $value==143 || $value==144)
        {
            return array('{customer_name}','{booking_id}','{consultant_name}','{consultant_type}','{amount}','{booking_date}','{booking_time}','{slot}','{created_date}');
        }
        //19 - pending
        elseif($value==145 || $value==146 || $value==147 || $value==148 || $value==149 || $value==150 || $value==151 || $value==152)
        {
            return array('{customer_name}','{consultant_name}','{consultant_type}','{amount}','{booking_date}','{booking_time}','{slot}','{status}','{created_date}');
        }
        //20 - done
        elseif($value==153 || $value==154 || $value==155 || $value==156 || $value==157 || $value==158 || $value==159 || $value==160)
        {
            return array('{customer_name}','{booking_id}','{consultant_name}','{consultant_type}','{amount}','{booking_date}','{booking_time}','{slot}','{created_date}');
        }
        //21 - done
        elseif($value==161 || $value==162 || $value==163 || $value==164 || $value==165 || $value==166 || $value==167 || $value==168)
        {
            return array('{consultant_name}','{email}','{phone_no}','{created_date}');
        }
        //22 - done
        elseif($value==169 || $value==170 || $value==171 || $value==172 || $value==173 || $value==174 || $value==175 || $value==176)
        {
            return array('{customer_name}','{booking_id}','{consultant_name}','{consultant_type}','{amount}','{booking_date}','{booking_time}','{slot}','{created_date}');
        }
        //23 - done
        elseif($value==177 || $value==178 || $value==179 || $value==180 || $value==181 || $value==182 || $value==183 || $value==184)
        {
            return array('{customer_name}','{booking_id}','{consultant_name}','{consultant_type}','{amount}','{booking_date}','{booking_time}','{slot}','{created_date}');
        }
        //24 - pending
        elseif($value==185 || $value==186 || $value==187 || $value==188 || $value==189 || $value==190 || $value==191 || $value==192)
        {
            return array('{customer_name}','{booking_id}','{consultant_name}','{consultant_type}','{amount}','{booking_date}','{booking_time}','{slot}','{created_date}');
        }
        //25- done
        elseif($value==193 || $value==194 || $value==195 || $value==196 || $value==197 || $value==198 || $value==199 || $value==200)
        {
            return array('{pay_out}','{type}','{pay_date}','{Txid}','{updated_date}','{created_at}','{amount}');
        }
        //26- done
        elseif($value==201 || $value==202 || $value==203 || $value==204 || $value==205 || $value==206 || $value==207 || $value==208)
        {
            return array('{pay_out}','{type}','{pay_date}','{Txid}','{updated_date}','{created_at}','{amount}');
        }


        //doubt 27
        elseif($value==209 || $value==210 || $value==211 || $value==212 || $value==213 || $value==214 || $value==215 || $value==216)
        {
            return array('{customer_name}','{booking_id}','{consultant_name}','{consultant_type}','{amount}','{booking_date}','{booking_time}','{slot}','{status}','{created_date}');
        }


        //28- done
        elseif($value==217 || $value==218 || $value==219 || $value==220 || $value==221 || $value==222 || $value==223 || $value==224)
        {
            return array('{name}','{phone_no}','{email}','{type}','{created_date}');
        }
        //29- done
        elseif($value==225 || $value==226 || $value==227 || $value==228 || $value==229 || $value==230 || $value==231 || $value==232)
        {
            return array('{name}','{phone_no}','{email}','{type}','{created_date}');
        }
        //30
        elseif($value==233 || $value==234 || $value==235|| $value==236 || $value==237 || $value==238 || $value==239 || $value==240)
        {
            return array('{customer_name}','{booking_id}','{consultant_name}','{consultant_type}','{amount}','{booking_date}','{booking_time}','{slot}','{status}','{created_date}');
        }
        // //31
        // elseif($value==241 || $value==242 || $value==243 || $value==244 || $value==245 || $value==246 || $value==247 || $value==248)
        // {
        //     return array('{customer_name}','{booking_id}','{consultant_name}','{consultant_type}','{amount}','{booking_date}','{booking_time}','{slot}','{status}','{created_date}');
        // }
        // //32
        // elseif($value==249 || $value==250 || $value==251 || $value==252 || $value==253 || $value==254 || $value==255 || $value==256)
        // {
        //     return array('{customer_name}','{booking_id}','{consultant_name}','{consultant_type}','{amount}','{booking_date}','{booking_time}','{slot}','{status}','{created_date}');
        // }
    }

    public function template($value)
    {
        $notify=NotificationTemplate::where('type','=',$value)->first();

        if($notify)
        {
            return $notify->title.'--'.$notify->description;
        }
    }
}
