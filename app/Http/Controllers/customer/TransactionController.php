<?php

namespace App\Http\Controllers\customer;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Transaction;
use App\Models\TransactionItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    public function store(Request $request)
    {
        $carts = $request->carts;
        $quantities = $request->quantities;
        $total = $request->total;

        if(!$carts || !$total) {
            return back()->withErrors(['fail' => 'Please add item to cart first.']);
        }

        $transaction = Transaction::create([
            'total' => $request->total,
            'user_id' => Auth::user()->id
        ]);

        foreach($carts as $index => $cart) {
            TransactionItem::create([
                'transaction_id' => $transaction->id,
                'quantity' => $quantities[$index],
                'product_id' => $cart
            ]);

            Cart::where('user_id', Auth::user()->id)->where('product_id', $cart)->delete();
        }

        return back()->with('success', 'Transaction success.');
    }
}
