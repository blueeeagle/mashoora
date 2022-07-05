<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Insurance extends Model
{
    use HasFactory;

    protected $fillable = ['comapany_name','legal_name','have_tax','taxation_number','register_on','logo','consultant_type',
    'register_address','country_id','state_id','city_id','zipcode',
    'cname','ctitle','cemail','cmobile','cphone','status'];

}
