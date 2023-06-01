<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
       $products = Product::with('category')->get();

        return view('product.index',compact('products'));
    }


    public function create()
    {
        $brands = Brand::all();
        $categories = Category::all();
        
        return view('product.create', compact('brands', 'categories'));
    }

    public function store(Request $request)
    {
        $products = Product::create([
            'name' => $request->name,
            'price' => $request->price,
            'sale_price' => $request->sale_price,
            'category_id' => $request->category,
            'brands' => $request->brand
        ]);

        return redirect()->route('product.index');

    }

    public function edit($id)
    {
        $products = Product::where('id', $id)->with('category')->first();
        $brands = Brand::all();
        $categories = Category::all();

        return view('product.edit', compact('products', 'brands', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        $product->update([
            'name' => $request->name,
            'category_id' => $request->category,
            'price' => $request->price,
            'sale_price' => $request->sale_price,
            'brands' => $request->brand,
        ]);

        return redirect()->route('product.index');
    }

    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();

        return redirect()->route('product.index');
    }
}
