<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Review;
use Auth;

class Appointment extends Model
{
    use HasFactory;

    protected $fillable = [];
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
    // 
    public function transaction(){
        return $this->belongsTo(Payment::class,'id','appointment_id');
    }
    
    
}
