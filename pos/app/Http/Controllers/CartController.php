<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Item;
use Illuminate\Http\Request;
use Illuminate\Contracts\Session\Session;

class CartController extends Controller
{
    public function addtocart($item_id)
    {
        // dd($cart);
        // dd(session()->get('cart'));
        $item = Item::find($item_id);
        if (session()->has('cart')) {
            $cart = new Cart(session()->get('cart'));
        } else {
            $cart = new Cart();
        }
        // dd($item);
        $cart->add($item);

        session()->put('cart', $cart);
        notify()->success('An item added to the shopping cart');
        return back();
    }
    public function showCart()
    {
        if (session()->get('cart')) {
            $cart = session()->get('cart');
        } else {
            $cart = null;
        }
        //   dd($cart->totalQty);
        return view('products.cart', compact('cart'));
    }
    public function updateCart(Request $request, $item_id)
    {
        // return "hello";
        $item = Item::find($item_id);
        $qty = request('qty');
        $cart = new Cart(session()->get('cart'));
        $cart->updateQty($qty, $item->id);
        session()->put('cart', $cart);

        notify()->success('Cart Updated!');
        return back();
    }
    public function removeCart($id)
    {
        $item = Item::find($id);
        $cart = new Cart(session()->get('cart'));

        $cart->remove($item->id);
        session()->put('cart', $cart);
        notify()->success('An Item is removed!');
        return back();
    }

    public function showCheckout()
    {
        $cartdata = session()->get('cart');

        return view('products.checkout', compact('cartdata'));
    }
}
