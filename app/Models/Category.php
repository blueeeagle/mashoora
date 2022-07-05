<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['type','name','categories_id','description','tags','img','sort_no_list','sort_no_home','status','display_in_home'];

    public function getchild($id,$count=true){
        if($count){
            return Category::where('parent',$id)->count();
        }
        return Category::where('parent',$id)->get();
    }
}
