<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Country;
use App\Models\State;
use App\Models\City;

class Firm extends Model
{
    use HasFactory;

    protected $fillable = ['comapany_name','legal_name','have_tax','taxation_number','register_on','about_us','register_address','country_id','state_id','city_id','zipcode','cname','ctitle','cemail','cmobile','logo','cphone','categorie_id'
                            ,'account_number','account_name','ifsc_code','bank_name','branch','bank_status','email','user_name','role','login_status','gallery','status'
                        ,'sunday','monday','tuesday','wednesday','thursday','friday','saturday'];

                        public function country(){
                            return $this->belongsTo(Country::class);
                       }
                        public function state(){
                            return $this->belongsTo(State::class);
                        }
                        public function city(){
                            return $this->belongsTo(City::class);
                       }

}

