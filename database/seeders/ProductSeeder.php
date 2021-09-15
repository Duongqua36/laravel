<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $products = new Product();
       $products->id = 1;
       $products->title='iphone 6';
       $products->description ='iphone';
       $products->price= 200000;
       $products->brand_id= 1;
       $products->save();
    }
}
