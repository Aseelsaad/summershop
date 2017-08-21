<?php

namespace App;

use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Order extends Model
{
    protected $fillable=['total','delivered'];

    //relation ship between order and user
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    //relation ship between oreder and item
    public function orderItems()
    {
        return $this->belongsToMany(Product::class)->withPivot('qty','total');
    }

    //Create the order after selecting products
    public static function createOrder(){

        //user should be authenticated to place order
        $user=Auth::user();
        $order=$user->orders()->create([
            'total'=>Cart::total(),
            'delivered'=>0
        ]);

        //Order details
        $cartItems=Cart::content();
        foreach ($cartItems as $cartItem){
            $order->orderItems()->attach($cartItem->id,[
                'qty'=>$cartItem->qty,
                'total'=>$cartItem->qty*$cartItem->price
            ]);
        }

  }

}
