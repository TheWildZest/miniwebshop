<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

use App\Http\Requests\DeleteOrderRequest;
use App\Http\Requests\PlaceOrderRequest;
use App\Models\User;

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

    public function placeOrder(PlaceOrderRequest $request){
        $validated = $request->validated();

        $order = Order::create([
            'user_id' => Auth::id(),
            'name' => $validated['name'],
            'email' => User::find(Auth::id())->email,
            'address' => $validated['address'],
            'note' => $validated['note'],
        ]);

        $total = 0;

        //Get products from session and add them to the order
        if(session()->get('cart') != null){
            foreach(session()->get('cart') as $item){
                $product = Product::find($item['id']);

                $orderItem = new OrderItem([
                    'product_id' => $product->id,
                    'product_name' => $product->name,
                    'product_total_price' => $product->price * $item['quantity'],
                    'quantity' => $item['quantity']
                ]);

                $order->orderItems()->save($orderItem);
                $total += $orderItem->product_total_price;
            }
        }

        //Set the total price of the order (so far it's null)
        $order->total = $total;
        $order->save();

        //Empty cart
        session()->forget('cart');

        return redirect('/');
    }

    public function userOrders(){
        $orders = User::find(Auth::id())->orders;

        return view('userOrders', ['orders' => $orders]);
    }

    public function deleteOrder(DeleteOrderRequest $request){
        $validated = $request->validated();
        $id = $validated['id'];

        Order::findOrFail($id)->delete();

        return redirect()->back();
    }
}
