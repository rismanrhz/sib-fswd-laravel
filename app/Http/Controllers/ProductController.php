<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
       $products = Product::with('category')->get();

       if(Auth::user()->role->name == 'User') {
        return view('product.card',['products' => $products]);
       } else {

       return view('product.index',['products' => $products]);
        }
}

    public function create()
    {
        $brands = Brand::all();
        $categories = Category::all();
        
        return view('product.create', compact('brands', 'categories'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
           'category' => 'required',
            'name' => 'required|string|min:3',
            'price' => 'required|integer',
            'sale_price' => 'required|integer',
            'brand' => 'required|string',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors());
        }

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
        $validator = Validator::make($request->all(),[
           'category' => 'required',
            'name' => 'required|string|min:3',
            'price' => 'required|integer',
            'sale_price' => 'required|integer',
            'brand' => 'required|string',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors());
        }
        
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
