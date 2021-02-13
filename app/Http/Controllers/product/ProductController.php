<?php

namespace App\Http\Controllers\product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\admin\product\Product;
use Yajra\DataTables\DataTables;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.product.product');
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
        $validatedData = $request->validate([
            'cat_id' => 'required',
            'product_des' => 'required',
            'product_price' => 'required',
            'product_name' => 'required|max:255',
            'product_image' => 'required|image|file|mimes:jpeg,png,PNG,jpg,gif,svg|max:2048',
        ]);
        try{
            $files = $request->file('product_image');
            $imagePath = public_path('/images/'); // upload path
            // Upload Orginal Image           
            $profileImage = date('YmdHis') . "." . $files->getClientOriginalExtension();
            $files->move($imagePath, $profileImage);
            $data = [
                'product_name' => $request['product_name'],
                'cat_id' => $request['cat_id'],
                'product_price' => $request['product_price'],
                'product_des' => $request['product_des'],
                'product_image' => "$profileImage",
               ];
                return Product::create($data);
        }catch(\Exception $e){
            return Product::create();
        }
    }
    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);
        return $product;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post=Product::find($id);
        // $post = DB::table('products')->get();
        return $post;
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
        try{
            $data=Product::find($id);
            $data = [
                'product_name' => $request['product_name'],
                'cat_id' => $request['cat_id'],
                'product_price' => $request['product_price'],
                'product_des' => $request['product_des'],
               ];

               $Category=Product::find($id);
               $Category->product_name = $request->product_name;
               $Category->cat_id = $request->cat_id;
               $Category->product_price = $request->product_price;
               $Category->product_des = $request->product_des;
               $Category->update();
               return $Category;


                return Product::update($data);
        }catch(\Exception $e){
            return Product::create();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::destroy($id);
    }
    public function all_product()
    {
        $post=Product::all();
        return Datatables::of($post)
               ->addColumn('action', function($post){
            return '<a onclick="showData('.$post->id.')" class="btn btn-sm btn-success">Show</a>'.' '. 
                   '<a onclick="editForm('.$post->id.')" class="btn btn-sm btn-primary">Edit</a>'.' '. 
                   '<a onclick="deleteData('.$post->id.')" class="btn btn-sm btn-danger">Delete</a>';
               })->make(true);
    }
}
