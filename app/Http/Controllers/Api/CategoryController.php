<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //
    public function index(Request $request)
    {
        $withProduct = $request->input('with_product', false);
        if ('true' == $withProduct) {
            // $categories = Category::whereNull('parent_id')->with('childs')->get();
            // $categories = Category::with('categories')->where('parent_id')->get();
            // $categories = Category::with('childrenRecursive')->whereNull('parent_id')->get();
            // $categories = Category::whereNull('parent_id')->with('childCategories')->get();
            // $categories = Category::with('id')->get();
            // $categories = Category::with('children:id,name,parent_id')->get('id', 'name', 'parent_id');
            $categories = Category::whereNull('parent_id')->with('childrenCategories')->get();

        } else {
            $categories = Category::all();
        }

        return $categories;
    }
}
