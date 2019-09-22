<?php

namespace App\Http\Controllers;

use App\Model\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function Index()
    {
        $categories = Category::where('parent_id',0)->get();
        $allcategories = Category::get();
        return view('category.index')->withAllcategories($allcategories)
                                    ->withCategories($categories);
    }

    public function Create(Request $request)
    {
        $category = new Category();
        $category->title = $request->title;
        $category->parent_id = $request->parent_id;
        $category->save();
        return redirect()->back()->withSuccess('New Category added successfully.');
    }
}
