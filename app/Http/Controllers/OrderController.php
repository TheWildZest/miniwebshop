<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function placeOrderForm(){
        $cartItems = session()->get('cart');

        $total = 0;
        if($cartItems != null){
            foreach($cartItems as $cartItem){
                $product = Product::find($cartItem['id']);
                $price = $product->price * $cartItem['quantity'];
                $total += $price;
            }
        }

        return view('placeOrderForm', ['cartItems' => $cartItems, 'total' => $total]);
    }

    public function placeOrder(Request $request){
        $order = Order::create([
            'user_id' => Auth::id()
        ]);

        return redirect('/');
    }
}
