<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Country;
use App\Models\State;
use App\Models\City;
use App\Models\Schedule;
use App\Models\Firm;
use App\Models\Insurance;
use App\Models\Offer;
use App\Models\OfferPurchase;
use App\Models\Appointment;
use App\Models\Payment;
use App\Models\Wallet;
use Carbon\Carbon;
use App\Models\Review;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Consultant extends Authenticatable
{
    use HasFactory;

    // protected $fillable = ['phone_no','name','email'];
    protected $appends = ['subtext'];

    public function country(){
        return $this->belongsTo(Country::class);
    }
    public function currency(){
        return $this->belongsTo(Country::class,'country_code');
    }
    public function state(){
        return $this->belongsTo(State::class);
    }
    public function city(){
        return $this->belongsTo(City::class);
    }
    public function firm(){
        return $this->belongsTo(Firm::class,'firm_choose');
    }
    public function Schedule(){
        
        return $this->hasMany(Schedule::class)->where('to_date','>=',date('m/d/Y'));
    }
    
    public function offer()
    {
        $date = today()->format('m/d/Y');
        return $this->hasMany(Offer::class)->where('consultant_id',$this->id)->where('status',1)->where('has_validity','!=',1)->orWhere('has_validity',1)->where('from_date','<',$date)->where('to_date','>',$date);
    }
    
    public function getSubtextAttribute()
    {
        if($this->firm){
            return $this->firm->comapany_name;
        }
        return '';
    }
public function getInsuranceAttribute(){
        $arr = \explode(',',$this->insurance_id);
        return Insurance::where('status',1)->whereIn('id',$arr)->get();
    }

    public function getScheduleformateAttribute(){
        return $this->Schedule;
    }
    /**
     * Get all of the comments for the Appointment
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function Review()
    {
        return $this->hasMany(Review::class);
    }
    
    // 
    public function appointment(){
        return $this->hasMany(Appointment::class,'consultant_id','id');
    }
     public function reviewForView(){
        return $this->hasMany(Review::class,'consultant_id','id');
    }
    
    public function appointment_completed(){
        return $this->hasMany(Appointment::class,'consultant_id','id')->where('status','completed');
    }

    public function offer_historys(){
        return $this->hasMany(OfferPurchase::class,'consultant_id');
    }
    public function wallet_trans(){
        return $this->hasMany(Payment::class,'consultant_id','id');
    }
    
     public function wallet(){
        return $this->belongsTo(Wallet::class,'id','consultant_id');
    }

}
