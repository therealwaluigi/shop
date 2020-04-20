<?php


namespace App\Http\Controllers;


use App\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function add(Request $request){
        $cart = new Cart();
        $cart->product_id = $request->input('product_id');
        $cart->save();
    }

    public function list(){
        return DB::table('carts')
            ->join('products', 'carts.product_id', '=', 'products.id')
            ->select(DB::raw('carts.id as id, products.name as name, products.price as price, products.image as image, count(*) as amount, ceiling(count(*)*products.price*20)/20 as priceTotal'))
            ->groupBy(['products.id'])
            ->get();
    }
}