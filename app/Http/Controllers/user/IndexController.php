<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\admin\product\Product;

class IndexController extends Controller
{
    public function index(){
        $product = Product::where('product_status',0)->OrderBy('id','DESC')->limit(6)->get();
        return view('website.home')->with('product',$product);
    }
}
