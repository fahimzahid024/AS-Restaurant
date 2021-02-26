<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\user\customer\Customer;
use Yajra\DataTables\DataTables;

class ManageCustomerController extends Controller
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
        return view('admin.ManageCustomer.customer');
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
        // $order = DB::table('order')->where('customer_id',$customer_id)->get();
        // foreach($order as $v_o){}
        // $shopping_id = DB::table('shopping_cart')->where('order_id',$v_o->order_id)->get();
        return view('admin.order.view_customer_order_list');
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
    public function all_customer(Request $request){
        $post=Customer::all();
        return Datatables::of($post)
               ->addColumn('action', function($post){
            return '<a onclick="showData('.$post->customer_id.')" class="btn btn-sm btn-success"><i class="fas fa-eye"></i></a>'.' '. 
                    '<a onclick="deleteData('.$post->customer_id.')" class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i></a>';
               })->make(true);
    }
}
