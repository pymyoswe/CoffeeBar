<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    //
    public function order(){
        $date=date('Y-m-d');
        $orders=Order::Where('created_at','like',"%$date%")->get();

        $orders->transform(function ($order,$key){
            $order->cart=unserialize($order->cart);
            return $order;
        });
        return view('order')->with(['orders'=>$orders]);
    }

    public function printOrder($id){
        $order=Order::find($id);
        $order->cart=unserialize($order->cart);
        return view('printOrder')->with(['orders'=>$order]);
    }


}
