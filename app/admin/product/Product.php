<?php

namespace App\admin\product;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'product_name', 'cat_id','product_des','product_long_des','prepare_time',
        'delivery_time','product_price','product_image','product_status',
    ];
}
