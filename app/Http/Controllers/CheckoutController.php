<?php

namespace App\Http\Controllers;

use App\Order;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{

    //Get the view of inserting address to ship to
    public function shipping()
    {
        return view('front.shipping-info');
    }


    //Create order then redirect it to thanks view
    public function storePayment(Request $request)
    {

       Order::createOrder();

        //redirect user to some page
        return view('front.thanks');

    }


}
