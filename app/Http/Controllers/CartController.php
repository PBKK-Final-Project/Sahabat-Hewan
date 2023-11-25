<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {   
        $user = auth()->user();
        $userid = auth()->user()->id;
        $carts = Cart::with(['products.categories', 'users', 'products.types'])->where("user_id", $userid)->get();


        return view('shop.cart-page', ['carts' => $carts, 'user'=> $user]);
    }
    public function store(Request $request)
    {
        $user = auth()->user()->id;

        $request->validate([
            'quantity' => 'required|numeric|min:1',
            'product_id' => 'required',
        ]);

        // store product with $id to cart
        $cart = Cart::create([
            'quantity' => $request->quantity,
            'product_id' => $request->product_id,
            'user_id' => $user,
        ]);

        return response()->json(
            [
                'message' => 'Product added to cart',
                'data' => $cart
            ], 200
        );
    }

    public function destroy($id)
    {
        $cart = Cart::findOrFail($id);

        $cart->delete();

        return response()->json(
            [
                'message'=> 'Product deleted from cart',
                'data'=> $cart
                ],200
            );
    }
}
