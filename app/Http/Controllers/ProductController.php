<?php


namespace App\Http\Controllers;


use App\Product;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Retrieve the user for the given ID.
     *
     * @param  int  $id
     * @return string
     */
    public function detail($id)
    {
        return DB::table('products')->where('id', '=', $id)->get();
    }

    public function list(){
        return Product::all();

    }
}