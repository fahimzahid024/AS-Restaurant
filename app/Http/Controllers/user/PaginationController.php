<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\admin\category\Category;
use Illuminate\Http\Request;

class PaginationController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            if ($request->id) {
                $data = Category::where('id', '<', $request->id)->limit(3)->get();
            } else {
                $data = Category::limit(3)->get();
            }
        }
        return view('includes.category', compact('data'));
    }
}
