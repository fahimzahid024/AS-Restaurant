<?php

namespace App\Http\Controllers\admin\customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Session;

class CustomerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return 'success';
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function view_customer_order_list($id)
    {
        $order = DB::table('order')->where('customer_id',$id)->get();
        foreach($order as $v_o){}
        $shopping_id = DB::table('shopping_cart')->where('order_id',$v_o->order_id)->get();
        return view('admin.order.view_customer_order_list',compact('shopping_id'));
    }

    public function order_done($id){
        $shopping_cart = DB::table('shopping_cart')
                    ->where('cart_id',$id)
                    ->get();
        foreach($shopping_cart as $item)
        {
            $order_id = $item->order_id;
        }
        $order = DB::table('order')
                    ->where('order_id',$order_id)
                    ->get();
        foreach($order as $item)
        {
            $customer_id = $item->customer_id;
        }
        $order = DB::table('customers')
                 ->where('customer_id',$customer_id)
                 ->update(['status' => 1]);
        
        if($order)
        {
            Session::flash('message','Product Delivered Successfully!');
            return redirect('manage-order');
        }
        else{
            Session::flash('errorM','Sorry Something wrong!');
            return redirect('manage-order');
        }
    }

    public function delete_customer($id)
    {
        $delete_order = DB::table('order')
                        ->where('order_id',$id)
                        ->delete();
        $delete_customer = DB::table('customers')
                        ->where('customer_id',$id)
                        ->delete();
        $delete_cart = DB::table('shopping_cart')
                        ->where('order_id',$id)
                        ->delete();
        
        if($delete_cart)
        {
            Session::flash('message','Order Deleted Successfully!');
            return redirect('manage-order');
        }
        else{
            Session::flash('errorM','Sorry Something wrong!');
            return redirect('manage-order');
        }
    }
}
