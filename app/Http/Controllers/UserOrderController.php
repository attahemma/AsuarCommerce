<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;

class UserOrderController extends Controller
{
    public function index($userId){
        $myOrders = Order::where('user_id', $userId)->get();
        return view('orders.index', ['myOrders'=>$myOrders]);
    }
}
