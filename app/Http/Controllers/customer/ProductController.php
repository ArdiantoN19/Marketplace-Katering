<?php

namespace App\Http\Controllers\customer;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('pages.customer.products.index', compact('products'));
    }

    public function show(int $id)
    {
        $product = Product::findOrFail($id);
        return view('pages.customer.products.show', compact('product'));
    }

    public function addToCart(int $id, Request $request){
        $product = Product::findOrFail($id);
        dd($product, $request->all());
    }
}
