<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        //
        $products = Product::all();
        return view('admin.products.create',compact('products'));
    }

    public function create(){
        return view('admin.products.create');
    }

        //  'title' => $this->faker->text(100),
        // 'slug' => Str::slug($this->faker->unique()->text(100)),
        // 'price' => $this->faker->numerify(),
        // 'quantity' => $this->faker->numberBetween(1, 1000),
        // 'sale_off' => $this->faker->numerify(),
        // 'user_id' => 1,
        // 'category_id' => rand(1, 7),
    public function store(Request $request){
        $product = new Product();
        $product -> title = $request->title;
        $product -> slug = $request->slug;
        $product -> price = $request->price;
        $product -> quantity = $request->quantity;
        $product -> sale_off = $request->sale_off;
        $product -> user_id = $request->user_id;
        $product -> category_id = $request->category_id;
        $product -> save();
        return view('admin.products.create');
    }

    public function destroy(Request $request, $id){
        $product = Product::find($id);
        
        return redirect(route('home'));
    }
}
