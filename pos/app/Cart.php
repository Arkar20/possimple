<?php

namespace App;

class Cart{
    public $items= [];
    public $totalQty;
    public $totalAmount;

    public function __construct($cart=null)
    {
        if($cart){
            $this->items=$cart->items;
            $this->totalQty=$cart->totalQty;
            $this->totalAmount=$cart->totalAmount;
        }
        else{
            $this->items = [];
            $this->totalQty = 0;
            $this->totalAmount = 0;
        }
    }
    public function add($product)
    {
        $item=[
            'id'=> $product->id,
            'name'=> $product->name,
            'image'=> $product->image,
            'price'=> $product->price,
            'qty'=>0
        ];
        $itemexist=array_key_exists($product->id,$this->items);
        if(!$itemexist){
            $this->items[$product->id]=$item;
            $this->totalQty+=1;
            $this->totalAmount+=$product->price;
        }
        else{
            $this->totalQty += 1;
            $this->totalAmount += $product->price;

        }
        $this->items[$product->id]['qty'] += 1;

    }
public function deleteAll()
{
    return session()->flash('cart');
}
public function updateQty($qty,$item_id)
{
    $this->totalQty-=$this->items[$item_id]['qty'];
    $this->totalAmount-=$this->items[$item_id]['price']*$this->items[$item_id]['qty'];
    //adding new qty
     $this->items[$item_id]['qty']=$qty;
        $this->totalQty+=$qty;
        $this->totalAmount+=$this->items[$item_id]['price']*$qty;
}
public function remove($id)
{
    if(array_key_exists($id,$this->items)){
        $this->totalQty-=$this->items[$id]['qty'];
        $this->totalAmount-=$this->items[$id]['price']* $this->items[$id]['qty'];

        unset($this->items[$id]);
    }
}
//mutators



}