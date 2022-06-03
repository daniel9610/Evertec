<?php

namespace App\Repositories;

use App\Models\Order;
use Illuminate\Support\Facades\DB;

class OrderRepository
{
    public function index()
    {
        $orders = Order::all();
        return $orders;
    }

    public function show($id)
    {
        $order = Order::findOrFail($id);
        return $order;
    }

    public function create($data)
    {
        $order = new Order;
        $order->customer_id = $data->customer_id;
        $order->status_id = $data->status_id;
        $order->total_price = $data->total_price;
        $order->save();
        return $order;
    }

    public function update($id, $data)
    {
        $order = Order::findOrFail($id);
        $order->customer_id = $data->customer_id;
        $order->status_id = $data->status_id;
        $order->total_price = $data->total_price;
        $order->save();
    }

}