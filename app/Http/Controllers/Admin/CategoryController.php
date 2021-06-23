<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class CategoryController extends Controller
{
    //
    public function index()
    {
        $categories = Category::paginate();

        return view('admin.category.index', compact('categories'));
    }

    public function destroy(Request $request)
    {
        $category = Category::find($request->item);
        
        if ($category)
        {
            DB::beginTransaction();
            try{
                DB::table('products')->where('category_id', $request->item)->delete(); 
                DB::table('categories')->where('id', $request->item)->delete(); 
                DB::commit();
                return redirect()->route('admin.category.index')->with('success', 'Delete success');
            }catch (\Throwable $e)
            {
                DB::rollBack();
                // Log::debug($e->getMessage() . $e->__toString());
                abort(404);
            }

        }

        return redirect()->route('admin.category.index')->withErrors(['error', 'Error! An error occurred. Please try again later']);
    }
}
