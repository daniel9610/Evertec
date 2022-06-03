<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Repositories\OrderRepository;
use App\Repositories\ItemRepository;
use App\Repositories\OrderItemRepository;
use Illuminate\Support\Facades\Auth;
use App\Services\PlaceToPayService;

class OrderController extends Controller
{
    protected $orders;
    protected $items;
    protected $order_items;

    public function __construct(OrderRepository $orders, ItemRepository $items, OrderItemRepository $order_items)
    {
        $this->orders = $orders;
        $this->items = $items;
        $this->order_items = $order_items;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($item_id)
    {
        if(Auth::user()){
            $user = Auth::user();
        }else{
            return view('auth.login')->with('error', 'Primero debes iniciar sesión o registrarte para comprar productos');
        }
        $item = $this->items->show($item_id);
        return view('order.create', compact('user', 'item'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($data)
    {
        $order = $this->orders->create($data);
        $order_id = $order->id;
        $item_id = $data->item_id;
        $order_items = $this->order_items->create($order_id, $item_id);
        return $order;
        // return view('welcome', compact('order'))->with('success', 'Order '.$order->id.' created successfuly!');
    }

    public function redirectToPay(Request $request)
    {
        $request->status_id = 1;
        $order_created = $this->store($request);
        $session = PlaceToPayService::createSession($request);
        return response()->json($session);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
