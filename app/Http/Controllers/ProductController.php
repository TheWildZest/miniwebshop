<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;
use App\http\Requests\SearchProductsRequest;

class ProductController extends Controller
{
    public function getAll(){
        $products = Product::paginate(50);

        return view('home', ['products' => $products]);
    }

    public function getByKeyword(SearchProductsRequest $request){
        $products = Product::filterByKeyWord($request->keyword);

        return view('searchProducts', ['products' => $products, 'keyword' => $request->keyword]);
    }
}
