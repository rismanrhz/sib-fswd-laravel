<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
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
       }else{
            return view('product.index',['products' => $products]);
        }
    }

    public function show($id)
    {
        $product = Product::where('id', $id)->with('category')->first();

        $related = Product::where('category_id', $product->category->id)->inRandomOrder()->limit(4)->get();

        if ($product) {
            return view('product.show', compact('product', 'related'));
        } else {
            abort(404);
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
        $validator = Validator::make($request->all(), [
            'category' => 'required',
            'name' => 'required|string|min:3',
            'price' => 'required|integer',
            'sale_price' => 'required|integer',
            'brand' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }

        $imageName = time().'.'.$request->image->extension();
        Storage::putFileAs('public/product', $request->image, $imageName);

        $products = Product::create([
            'name' => $request->name,
            'price' => $request->price,
            'sale_price' => $request->sale_price,
            'category_id' => $request->category,
            'brands' => $request->brand,
            'image' => $imageName,
        ]);

        // dd($products);

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
        if ($request->hasFile('image')) {
            $old_image = Product::find($id)->image;

            Storage::delete('public/product/'.$old_image);

            $imageName = time().'.'.$request->image->extension();
            Storage::putFileAs('public/product', $request->image, $imageName);

            Product::where('id', $id)->update([
                'category_id' => $request->category,
                'name' => $request->name,
                'price' => $request->price,
                'sale_price' => $request->sale_price,
                'brands' => $request->brand,
                'image' => $imageName,
            ]);

        } else {
            Product::where('id', $id)->update([
                'category_id' => $request->category,
                'name' => $request->name,
                'price' => $request->price,
                'sale_price' => $request->sale_price,
                'brands' => $request->brand,
            ]);
        }

        return redirect()->route('product.index');
    }

    public function destroy($id)
    {
        $product = Product::find($id);

        Storage::delete('public/product/'.$product->image);
        $product->delete();

        return redirect()->route('product.index');
    }
}
