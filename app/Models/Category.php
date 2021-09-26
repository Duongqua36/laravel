<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable =[
       'name','parent_id'
    ];
    use HasFactory;
    function products() {
        return   $this->hasMany(Product::class,'category_id','id');
    }

    function childrens(){
        return $this->hasMany(Category::class,'parent_id','id')->orderBy('sort','ASC');
    }


}
