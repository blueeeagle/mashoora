<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OfferPurchase extends Model
{
    use HasFactory;
    
    // protected $fillable = ['from_user','consultant_id','firm_id','admin_id','title','image','describtion','status'];
    protected $table = 'offerpurchases';
    public function offer(){
        return $this->belongsTo(Offer::class,'offer_id');
    }
    public function customer(){
        return $this->belongsTo(Customer::class, 'customer_id');
    }
    public function consultant(){
        return $this->belongsTo(Consultant::class, 'consultant_id');
    }
    // public function user(){
    //     return $this->belongsTo(User::class, 'admin_id');
    // }
}
