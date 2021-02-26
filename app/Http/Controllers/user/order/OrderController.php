<?php

namespace App\Http\Controllers\user\order;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function order_now(){
        return view('user.user_info');
    }
}
