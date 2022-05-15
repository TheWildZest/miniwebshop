<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;
use App\http\Requests\SearchProductsRequest;

class ProductController extends Controller
{
    public function getAll(){
        $products = Product::paginate(50);

        //session()->flush();


        return view('home', ['products' => $products]);
    }

    public function getByKeyword(SearchProductsRequest $request){
        $products = Product::filterByKeyWord($request->keyword);

        return view('searchProducts', ['products' => $products, 'keyword' => $request->keyword]);
    }

    public function addToCart(Request $request){
        //If the given product is already in the cart, just increment the quantity and redirect
        if(session()->get('cart') != null){
            foreach(session()->get('cart') as $key => $cartItem){
                if($request->productId == $cartItem['productId']){
                    $cartItemQuantity = session()->pull('cart.' .  $key . '.quantity');

                    $cartItemQuantity += $request->quantity;
                    session()->put('cart.' . $key . '.quantity', $cartItemQuantity);

                    return view('cartSucces');
                }
            }
        }

        $product = [
            'productId' => $request->productId,
            'quantity' => $request->quantity
        ];
        session()->push('cart', $product);

        return view('cartSucces');
    }

    public function getProductsFromSession(){
        $session = session()->get('cart');

        return view('cart', ['session' => $session]);
    }
}
