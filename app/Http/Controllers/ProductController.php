<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;
use App\Http\Requests\SearchProductsRequest;
use App\Http\Requests\AddToCartRequest;

class ProductController extends Controller
{
    public function getAll(){
        $products = Product::paginate(50);

        //session()->flush();

        return view('home', ['products' => $products]);
    }

    public function getByKeyword(SearchProductsRequest $request){
        $validated = $request->validated();
        $products = Product::filterByKeyWord($validated['keyword']);

        return view('searchProducts', ['products' => $products, 'keyword' => $request->keyword]);
    }

    public function addToCart(AddToCartRequest $request){
        $validated = $request->validated();

        //If the given product is already in the cart, just increment the quantity
        if(session()->get('cart') != null){
            foreach(session()->get('cart') as $key => $cartItem){
                if($validated['id'] == $cartItem['id']){
                    //Get and delete the quantity from session
                    $cartItemQuantity = session()->pull('cart.' .  $key . '.quantity');
                    //Icrease the quantity
                    if($cartItemQuantity + $validated['quantity'] < 101){
                        //if the inscreased quantity would be less than 100, just increase it
                        $cartItemQuantity += $validated['quantity'];
                    }else{
                        //if the inscreased quantity would be larger than 100, set it to 100
                        $cartItemQuantity = 100;
                    }
                    //Put the incresed quantity back to session
                    session()->put('cart.' . $key . '.quantity', $cartItemQuantity);

                    return view('cartSucces');
                }
            }
        }

        $product = Product::findOrFail($validated['id']);

        $cartProduct = [
            'id' => $product->id,
            'name' => $product->name,
            'price' => $product->price,
            'image' => $product->image,
            'quantity' => $validated['quantity']
        ];
        session()->push('cart', $cartProduct);

        return view('cartSucces');
    }

    public function getProductsFromSession(){
        $cart = session()->get('cart');

        return view('cart', ['cart' => $cart]);
    }
}
