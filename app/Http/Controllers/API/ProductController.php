<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('category')->get();

        return response()->json([
            'success' => true,
            'message' => "Daftar data Produk",
            'data' => $products
        ], 200);
    }

    public function show($id)
    {
        $products = Product::where('id', $id)->with('category')->first();

        if ($products) {
            return response()->json([
                'success' => true,
                'message' => "Daftar data Produk",
                'data' => $products
            ], 200);
        }else{
            return response()->json([
                'success' => false,
                'message' => "data tidak ditemukan",
                'data' => ''
            ], 404);
        }
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'category' => 'required',
            'name' => 'required|string|min:3',
            'price' => 'required|integer',
            'sale_price' => 'required|integer',
            'brand' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'data tidak valid',
                'data' => $validator->errors()
            ], 422);
        }

        $products = Product::create([
            'name' => $request->name,
            'price' => $request->price,
            'sale_price' => $request->sale_price,
            'category_id' => $request->category,
            'brands' => $request->brand
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Produk berhasil ditambahkan',
            'data' => $products
        ], 201);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'category' => 'required',
            'name' => 'required|string|min:3',
            'price' => 'required|integer',
            'sale_price' => 'required|integer',
            'brand' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'data tidak valid',
                'data' => $validator->errors()
            ], 422);
        }

        $product = Product::find($id);

        if ($product) {
            $product->update([
                'name' => $request->name,
                'price' => $request->price,
                'sale_price' => $request->sale_price,
                'category_id' => $request->category,
                'brands' => $request->brand
            ]);

            return response()->json([
                'success' => true,
                'message' => 'data berhasil diupdate',
                'data' => $product
            ], 200);
        }else{
            return response()->json([
                'success' => false,
                'message' => 'data tidak di ditemukan',
                'data' => ''
            ], 404);
        }
    }

    public function destroy($id)
    {
        $product = Product::find($id);

        if ($product) {
            $product->delete();
            return response()->json([
                'success' => true,
                'message' => 'data berhasil dihapus',
                'data' => ''
            ], 200);
        }else {
            return response()->json([
                'success' => false,
                'message' => 'data tidak ditemukan',
                'data' => ''
            ], 404);
        }
    }
}


