<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $fillable = ['consultant_id','customer_id','comments','rating'];
    
    public function customer(){
        return $this->belongsTo(Customer::class,'customer_id');
    }
    public function consultant(){
        return $this->belongsTo(Consultant::class,'consultant_id');
    }

}
