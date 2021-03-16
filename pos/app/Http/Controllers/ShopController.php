<?php

namespace App\Http\Controllers;

use App\Item;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('products.shop', [
            'items' => Item::latest()->get(),
        ]);
    }
    public function showdetail(Request $request)
    {
        $item = Item::find(request('id'));
        return view('products.detail', compact('item'));
    }
}
