<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Companysetting extends Model
{
    use HasFactory;

    protected $fillable = ['comapany_name','legal_name','have_tax','taxation_number','register_on','about_us','register_address','country_id','state_id',
    'city_id','zipcode','currencie_id','time_zone','date_format','reschedule_cut_off_time','discard_cut_off_time','cname','ctitle','cemail','cmobile','logo_login_page','logo_header',
'cphone'];

}
