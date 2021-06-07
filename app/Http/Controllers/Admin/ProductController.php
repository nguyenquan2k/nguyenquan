<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UpdateProductRequest;
use App\Http\Requests\Admin\CreateProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::select(['id','slug','title', 'price', 'quantity', 'sale_off', 'description'])
        ->orderBy('id', 'desc')
        ->paginate(config('constants.admin_perpage'));

        return view('admin.products.index', compact('products'));
    }
    public function create()
    {
        return view('admin.products.create');
    }

    public function edit($id)
    {
        $pro = Product::find($id);
        return view('admin.products.edit',compact('pro'));
    }
    public function update(UpdateProductRequest $request, $id)
    {
        $product = Product::find($id);
        $product->title = $request->title;
        $product->slug = Str::slug($request->title);
        $product->price = $request->price;
        $product->quantity = $request->quantity;
        $product->sale_off = $request->sale_off;
        $product->description = $request->description;
        $product->save();
        return redirect(route('admin.products.list'));
    }
        //  'title' => $this->faker->text(100),
        // 'slug' => Str::slug($this->faker->unique()->text(100)),
        // 'price' => $this->faker->numerify(),
        // 'quantity' => $this->faker->numberBetween(1, 1000),
        // 'sale_off' => $this->faker->numerify(),
        // 'user_id' => 1,
        // 'category_id' => rand(1, 7),
    public function store(CreateProductRequest $request){
        $data = $request->all();
        $data['slug'] = Str::slug($request->title);
        $data['user_id'] = 1;
        Product::create($data);
        return redirect(route('admin.products.list'));
    }

    // public function destroy(Request $request, $id){
    //     $product = Product::find($id);
        
    //     return redirect(route('admin.products.create'));
    // }

    public function delete($id){
        DB::table('products')->where('id', $id)->delete();     
        return redirect(route('admin.products.list'));
    }

    // DB::table('users')->where('votes', '>', 100)->delete();
}
