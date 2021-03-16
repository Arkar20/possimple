<?php

namespace App\Http\Controllers;

use App\Item;
use Illuminate\Http\Request;

class ClientSiteController extends Controller
{
    public function index()
    {
        return view('products.index',[
            'items' => Item::latest()->get()
        ]);
    }
}
