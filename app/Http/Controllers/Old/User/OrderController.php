<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'سفارشات';
        $orders = Order::where('userId',user('id'))->get();
        return view('website.user.orders',compact('orders','title'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $title = 'سفارشات';
        $order = Order::where('userId',user('id'))->where('id',$id)->first();
        if($order){
            $orderItems = OrderItem::where('orderId',$order->id)->get();
            return view('website.user.orderitems',compact(['orderItems','title']));
        } else {
            return redirect()->route('home');
        }

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $title = 'پیگیری سفارش';
        return view('website.user.track',compact(['title']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
