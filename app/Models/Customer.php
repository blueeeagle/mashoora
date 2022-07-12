<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = ['phone_no','name','dob','gender','email','register_address','country_id','state_id','city_id','zipcode'];

}
