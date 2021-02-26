<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\admin\product\Product;
use Cart;
use Session;

class CartController extends Controller
{
    public function add_to_cart(Request $request, $id){
        $qty = $request->qty;
        $product = Product::where('id', $id)->first();

        Cart::add(array(
            'id' => $product->id,
            'name' => $product->product_name,
            'price' => $product->product_price,
            'quantity' => $qty,
            'attributes' => array(
                'image' => $product->product_image,
            )
        ));
        return redirect('/home/show-cart');
    }

    public function show_cart()
    {
        return view('user.cart_page');
    }

    public function remove_item($id)
    {
        Cart::remove($id);

        if (Cart::isEmpty()) {
            return redirect('/');
        }
        Session::flash('message','Item removed from cart successfully!');
        return redirect()->back();
    }

    public function empty_cart()
    {
        Session::flash('message','Sorry Cart Is Empty!');
        return redirect()->back();
    }
}
