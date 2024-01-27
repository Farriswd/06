<?php

namespace App\Http\Controllers\Admin\Shop;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Shop\Product\StoreRequest;
use App\Http\Requests\Admin\Shop\Product\UpdateRequest;
use App\Models\News;
use App\Models\NewsCategory;
use App\Models\Order;
use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class OrderController extends Controller
{
    public function index() {
        $orders = Order::paginate(10);
        return view('admin.shop.orders.index', compact('orders'));
    }

    public function show(Order $order)
    {
        return view('admin.shop.orders.show', compact('order'));
    }

}
