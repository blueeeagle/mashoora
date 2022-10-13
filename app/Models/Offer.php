<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\Consultantcategory;
use App\Models\Consultant;
use App\Models\Firm;
class Offer extends Model
{
    use HasFactory;
    // protected  $table ='offers';
    protected $fillable = ['firm_consultant','firm_id','consultant_id','offer_title','image',
                            'description','amount','from_date','to_date','category_id','has_validity',
                            'sub_category_id','status'];

    public function consultant(){
        return $this->belongsTo(Consultant::class);
    }
    public function firm(){
        return $this->belongsTo(Firm::class,'firm_id');
    }
    public function category(){
        return $this->belongsTo(Category::class,'category_id');
    }
    public function sub_category(){
        return $this->belongsTo(Category::class,'sub_category_id');
    }
                        
}
