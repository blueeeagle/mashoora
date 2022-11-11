<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\Consultantcategory;
use App\Models\Consultant;
class Discount extends Model
{
    use HasFactory;
    protected  $table ='discount';
    protected $fillable = ['consultant_id','promo_title','promo_code','no_of_coupons','upload_image',
                            'flat_percentage','amount','from_date','to_date','category_id','specialization_id',
                            'video','voice','direct','text','status'];

    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function specialization(){
        return $this->belongsTo(Consultantcategory::class,'specialization_id');
    }
    public function consultant(){
        return $this->belongsTo(Consultant::class,'consultant_id');
    }
public function parentcat(){
        return Category::whereIn('id',\explode(',',$this->categorie_id))->where('type',0)->where('status',1)->first();
    }
    public function subcat(){
        return Category::whereIn('id',\explode(',',$this->categorie_id))->where('type',1)->where('status',1)->get();
    }  
}
