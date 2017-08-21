<?php

namespace App\Http\Controllers;

use App\Mail\OrderShipped;
use App\Order;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class OrderController extends Controller
{
    //Display Orders by its type:pending or delivered
    public function Orders($type='')
    {
        if($type =='pending'){
            $orders=Order::where('delivered','0')->get();
        }elseif ($type == 'delivered'){
            $orders=Order::where('delivered','1')->get();
        }else{

            //all orders returned if no type specified
            $orders=Order::all();
        }

        return view('admin.orders',compact('orders'));
    }

    //Change Order type and save it
    public function toggledeliver(Request $request,$orderId)
    {
        $order=Order::find($orderId);

        if($request->has('delivered')){

            $order->delivered=$request->delivered;
        }else{
            $order->delivered="0";
        }
        $order->save();

        return back();
    }
}
