<?php

namespace App\Repositories;

use App\Models\OrderItem;
use Illuminate\Support\Facades\DB;

class OrderItemRepository
{
    // public function index()
    // {
    //     $orders = OrderItem::all();
    //     return $orders;
    // }

    public function show($order_id)
    {
        $order_item = OrderItem::where('order_id', $order_id)->get();
        return $order_item;
    }

    public function create($order_id, $item_id)
    {
        $order_item = new OrderItem;
        $order_item->order_id = $order_id;
        $order_item->item_id = $item_id;
        $order_item->save();
        return $order_item;
    }

    public function delete($order_item_id)
    {
        $order_item = OrderItem::findOrFail($order_item_id)->delete();
    }

}