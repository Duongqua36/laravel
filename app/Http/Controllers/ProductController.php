<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{


    public function index($paginate = 6)
    {
        $brands = Brand::all();
        $categories = Category::all();
        $products = Product::paginate($paginate);
        return view('backend.list', compact('products', 'brands', 'categories'));
    }

    public function create()
    {
        $brands = Brand::all();
        $categories = Category::all();
        return view('backend.add', compact('brands', 'categories'));
    }

    public function store(Request $request)
    {
        $imageName = time() . '.' . $request->image->getClientOriginalExtension();
        $request->image->move(public_path('/image'), $imageName);
        $data = $request->all();
        $data['image'] = $imageName;
        Product::create($data);
        return redirect()->route('product.list');
    }

    public function destroy($id)
    {
        Product::destroy($id);
        return redirect()->route('product.list');
    }

    public function edit($id)
    {
        $brands = Brand::all();
        $categories = Category::all();
        $product = Product::find($id);
        return view('backend.edit', compact('product', 'brands', 'categories'));
    }

    public function update($id, Request $request)
    {
        $product = Product::findOrFail($id);
        $product->update($request->all());
        return redirect()->route('product.list');
    }

    public function showHome()
    {
        $products = Product::all();
        return view('fontend.home', compact('products'));
    }


    public function search()
    {
        $search = $_GET['search'];
        $products = Product::where('title', 'LIKE', '%' . $search . '%')->get();
        return view('backend.list', compact('products'));
    }

    public function deleteAll(Request $request, $paginate = 6)
    {
        $ids = $request->ids;
        DB::table("products")->whereIn('id', explode(",", $ids))->delete();
    }

    public function filter(Request $request, $paginate = 6)
    {

        $brands = Brand::all();
        $p = Product::query();
        if ($request->id) {
            $p->where('id', $request->id);
        }
        if ($request->title) {
            $p->where('title', 'LIKE', '%' . $request->title . '%');
        }
        if ($request->brand_id && is_numeric($request->brand_id)) {
            $p->where('brand_id', $request->brand_id);
        }
        if ($request->price_from && is_numeric($request->price_from)) {
            $p->where('price', '>=', $request->price_from);
            if ($request->price_to && is_numeric($request->price_to) && $request->price_from <= $request->price_to) {
                $p->where('price', '<=', $request->price_to);
            }
        }
        $products = $p->paginate($paginate);
        $old_data = $request->all();
        return view('backend.list', compact('products', 'brands', 'old_data', 'paginate'));
    }


    public function searchProduct(Request $request)
    {
        $search = $request->all()['keyword'];
        $products = Product::where('title', 'LIKE', '%' . $search . '%')->get();
        return view('fontend.home', compact('products'));
    }

    public function productDetail($id)
    {
        $products = Product::find($id);
        return view('fontend.detail', compact('products'));
    }
}
