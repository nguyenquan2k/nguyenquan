<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    //
    public function index()
    {
        // $page = $request->input('page', 1);
        $products = Product::select([
            'id',
            'title',
            'slug',
            'price',
            'quantity',
            'photo',
            'category_id',
            'sale_off',
        ])->with('category')->paginate();

        // $lastPage = $products->lastPage();
        // if ($page > $lastPage)
        // {
        //     return redirect()->route('products.index', ['page' => $lastPage]);
        // }

        return $products;
    }
}
