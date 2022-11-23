<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Review;
use Auth;
use App\Models\Customer;
use App\Models\Consultant;
use App\Http\Controllers\Api\Booking;
use App\Models\Payment;
use App\Models\Insurance;

class Appointment extends Model
{
    use HasFactory;

    protected $fillable = [];
    public $Booking=null;
    
    public function customer(){
        return $this->belongsTo(Customer::class, 'customer_id');
    }
    public function consultant(){
        return $this->belongsTo(Consultant::class, 'consultant_id');
    }
    public function Review()
    {
        return $this->hasOne(Review::class)->where('customer_id',Auth::guard('customer')->user()->id);
    }
    public function consultantsingleAppreview()
    {
        return $this->belongsTo(Review::class,'id','appointment_id');
    }
    // 
    public function transaction(){
        return $this->belongsTo(Payment::class,'id','appointment_id');
    }
     public function insurance(){
        return $this->belongsTo(Insurance::class,'insurance_id','id');
    }
    
     public function pay_approvals(){
        return $this->belongsTo(PayApproval::class,'id','appointment_id');
    }
    
    public function unse(){
        $Booking = unserialize(bzdecompress(utf8_decode($this->rawdata)));
        return $Booking;
    }
    
    public function getBookingAttribute(){
        try {
            return unserialize(bzdecompress(utf8_decode($this->rawdata)));
        } catch (\Throwable $th) {
            return null;
        }
    }
    
    public function getAppointmentAttribute()
    {
        try {
            //code...
            $this->Booking = unserialize(bzdecompress(utf8_decode($this->rawdata)));        

        } catch (\Throwable $th) {
            //throw $th;
            $this->Booking = null;  

        }
        
    }
    
}
