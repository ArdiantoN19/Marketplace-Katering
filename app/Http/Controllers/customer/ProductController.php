<?php

namespace App\Http\Controllers\customer;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

        if($product->quantity < $request->quantity) {
            return back()->withErrors(['fail' => 'Cannot add to cart, item is empty']);
        }

        $product->quantity = $product->quantity - $request->quantity;
        $product->save();

        Cart::create([
            'user_id'=> Auth::user()->id,
            'product_id' => $product->id,
            'quantity' => $request->quantity
        ]);

        return back()->with('success', 'Success add item to cart');
    }
}
