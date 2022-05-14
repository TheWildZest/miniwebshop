<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public static function filterByKeyWord($keyWord){
        //Search sensitivity on miss-typed keyWord
        $sensitivity = 0.2;

        $products = Product::where(function ($query) use($keyWord, $sensitivity) {
                $query->whereRaw("unaccent(name) ilike '%".$keyWord."%'")
                ->orWhereRaw("SIMILARITY(unaccent(name),'". $keyWord . "') > " . $sensitivity)

                ->orWhereRaw("unaccent(description) ilike '%".$keyWord."%'")
                ->orWhereRaw("SIMILARITY(unaccent(description),'". $keyWord . "') > " . $sensitivity);
            })
            ->paginate(50);

        return $products;
    }
}
