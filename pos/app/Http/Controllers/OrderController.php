<?php

namespace App\Http\Controllers;

use App\Order;
use App\Mail\Sendmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class OrderController extends Controller
{
    public function store(Request $request)
    {
        $userid= auth()->user()->id;
        $cart=serialize(session()->get('cart'));

        Order::create([
            'user_id' =>$userid,
            'cart' =>$cart
        ]);
        
        // return auth()->user()->email;
Mail::to('arkar20011@gmail.com')->send(new Sendmail());

        session()->forget('cart');
        notify()->success("Payment Successful!");
        return redirect('/');

    }
    public function showOrder()
    {
        $orders=auth()->user()->orders;
        
        $cart= $orders->transform(function($item,$key){
            return unserialize($item->cart);
        });
        // $orderdetails= auth()->user()->orders;
        // return $orders;

        return view('products.history',compact('cart'));
    }
}
