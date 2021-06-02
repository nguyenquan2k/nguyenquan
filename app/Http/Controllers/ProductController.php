<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

class ProductController extends Controller
{
    public function index(Request $request, $id)
    {
        $perPage = $request->input('p', 8);

        $sortBy = $request->input('sort_by', 'date');
        $sortField = '';
        switch($sortBy)
        {
            case 'date':
                $sortField = 'created_at';
                break;
            case 'newest':
                $sortField = 'updated_at';
                break;
            case 'popular':
                $sortField = 'id';
                break;
        }

        $categories = Category::select(['id', 'name'])->get();
        $products = Product::select([
            'id',
            'slug',
            'title',
            'price',
            'quantity',
            'photo',
            'category_id',
        ]);
        if ($sortField)
        {
            $products->orderBy($sortField, 'DESC');
        }

        $products = $products->paginate($perPage)->withQueryString();
 	$products = Product::select()->where('category_id', $id)->paginate();

        return view('product.index', compact('categories', 'products', 'id'));
    }

    public function show(request $request, $id)
    {
        $product = Product::find($id,
            [
                'id',
                'slug',
                'title',
                'description',
                'price',
                'quantity',
                'photo',
                'category_id',
            ]
        );

        if ($product)
        {
            return view('product.show', compact('product'));
        }

        return abort(404);
    }
}
