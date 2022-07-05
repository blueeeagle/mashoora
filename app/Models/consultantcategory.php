<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;


class Consultantcategory extends Model
{
    use HasFactory;

    protected $fillable = ['categorie_id','subcategorie_id','title','status'];

    public function Category(){
        $Category = Category::where('id', $this->categorie_id)->first();
        if($Category){
            return $Category->name;
        }else{
            return 'Not Found';
        }
    }

    public function SubCategory(){
        $Category = Category::where('id', $this->subcategorie_id)->first();
        if($Category){
            return $Category->name;
        }else{
            return 'Not Found';
        }
    }
}
