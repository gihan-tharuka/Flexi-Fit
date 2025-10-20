<?php

namespace App\Http\Controllers;

use App\Models\product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class Cartcontroller extends Controller
{
    public function store(Request $request)
    {

        $product = product::findorfail($request->product_id);
        Cart::add($product->id, $product->name, 1, $product->price);

        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }
}
