<?php

namespace App\Http\Controllers\user\customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\user\customer\Customer;
use Illuminate\Support\Facades\Mail;
use App\Mail\AdminMail;
// use Nexmo\Laravel\Facade\Nexmo;
use Session;
use Redirect;
use DB;

class CustomerController extends Controller
{
    public function buyer_info(Request $request)
    {
        $request->validate([
            'customerName' => 'required|',
            'CustomerEmail' => 'required|email',
            'CustomerPhoneNumber' => 'required|regex:/^(07)[0-9]{9}$/',
        ]);
        // Customer Add
        $data = array();
        $data['customerName'] = $request->customerName;
        $data['CustomerPhoneNumber'] = $request->CustomerPhoneNumber;
        $data['CustomerEmail'] = $request->CustomerEmail;
        
        $customer_save = DB::table('customers')->insertGetId($data);

        // Order Add
        $order = array();
        $order['customer_id'] = $customer_save;;
        $order_id = DB::table('order')->insertGetId($order);


        $shopping_cart = array();
        $cartProduct = \Cart::getContent();

        foreach ($cartProduct as $item) {
            $shopping_cart_detailes['order_id'] = $order_id;
            $shopping_cart_detailes['pdt_id'] = $item->id;
            $shopping_cart_detailes['pdt_name'] = $item->name;
            $shopping_cart_detailes['pdt_price'] = $item->price;
            $shopping_cart_detailes['pdt_subtotal'] = \Cart::get($item->id)->getPriceSum();
            $shopping_cart_detailes['pdt_total'] = \Cart::getTotal();
            $shopping_cart_detailes['pdt_image'] = $item->attributes->image;
            $shopping_cart_detailes['pdt_quantity'] = $item->quantity;
            $save_cart = DB::table('shopping_cart')->insert($shopping_cart_detailes);
        }

        
        try{
            if ($order_id) {
                \Cart::clear();
                // Nexmo::message()->send([
                //     'to' => '8801778874502',
                //     'from' => 'Ashiana-Spice',
                //     'text' => 'A new order has arrived on your dashboard! Please Check it.'
                // ]);
                Mail::to('ashianaspice99@gmail.com')->send(new AdminMail());
                Session::flash('message', 'Your Product Ordered Successfully');
                return Redirect::to('/');
            }
        }catch (\Exception $e) {
            Session::flash('message', $e->getMessage());
            return redirect()->back();
        }
    }
}
