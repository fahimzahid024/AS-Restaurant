<?php

namespace App\Http\Controllers\user\product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\admin\product\Product;
use Yajra\DataTables\DataTables;

class ProductController extends Controller
{
    public function view_about_product($id)
    {
        $single_product = Product::where('id', $id)->get();
        return view('user.single_product_view', compact('single_product'));
    }

    public function view_product()
    {
        $product = Product::where('product_status', 0)->paginate(9);
        return view('user.all_products')->with('product', $product);
    }

    public function category_wise_product($id)
    {
        // return "success";
        $products = Product::where('cat_id', $id)->paginate(9);
        // dd($products);
        return view('user.category_wise_product', compact('products', $products));
    }
}
