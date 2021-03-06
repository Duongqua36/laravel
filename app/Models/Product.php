<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    function brand(){
        return $this->belongsTo(Brand::class,'brand_id','id');
    }

    function categories(){
        return $this->belongsTo(Category::class,'category_id','id');
    }

    protected $fillable =[
        'title','description','price','brand_id','category_id','image'
    ];
}
