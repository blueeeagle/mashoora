<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

use App\Models\Country;
use App\Models\State;
use App\Models\City;

class Customer extends Authenticatable
{
    use HasFactory;


    protected $fillable = ['phone_no','name','dob','gender','email','register_address','country_id','state_id','city_id','zipcode','status'];

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
