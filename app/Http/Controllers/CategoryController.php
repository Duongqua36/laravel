<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function showCategory()
    {
        $categories = Category::with('childrens')->orderBy('sort','DESC')->get();
        return view('backend.category.list', compact('categories'));
    }

    public function addCategory()
    {
        $categories = Category::with('childrens')->get();
        return view('backend.category.addCategory', compact('categories'));
    }

    public function store(Request $request)
    {
        Category::create($request->all());
        return redirect()->route('category.list');
    }

    public function destroyCate($id)
    {
        Category::destroy($id);
        return redirect()->route('category.list');
    }

    public function editCate($id)
    {
        $categories = Category::all();
//        $categories = Category::find($id);
        return view('backend.category.edit',compact('categories'));
    }

    public function saveList(Request $list){
        $this->recursive($list->all()['list']);
    }

}
