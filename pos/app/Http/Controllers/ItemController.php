<?php

namespace App\Http\Controllers;

use App\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ItemController extends Controller
{
    public function index()
    {

            return view('admin.items.table',[
                'items'=>Item::latest()->get()
            ]);
    }
    public function create()
    {
        return view('admin.items.register');
    }
    public function store(Request $request)
    {
       
       $data=$this->validationItem($request);
       $image=$request->file('img');
       $image_name=uniqid().".".$image->getClientOriginalName();
         $request->file('img')->storeAs('public/items/img',$image_name);
       Item::create([
            'name'=>$data['name'],
            'image'=>$image_name,
            'desc'=>$data['textdesc'],
            'price'=>$data['price'],
            'additional_info'=>$data['add_info'],
            'brand_id'=>$data['brand_id'],
            'category_id'=>$data['category_id'],
       ]);

       notify()->success('New Item Added Successfully!');
        return back();
       
    }
    public function validationItem(Request $request)
    {
        return $this->validate($request,[
            'name'=>['required','min:2','max:40'],
            'img'=>['required','mimes:png,jpg,jpeg'],
            'textdesc'=>['required','min:2','max:255'],
            'add_info'=>['required','min:2','max:255'],
            'textdesc'=>['required','min:2','max:255'],
            'price'=>['required','numeric'],
            'brand_id'=>['required'],
            'category_id'=>['required'],
        ]);
    }
    public function edit(Request $request,Item $item)
    {
        return view('admin.items.edit',compact('item'));
    }
    public function destroy(Item $item)
    {
        $item->delete();
        Storage::delete($item->img);
        notify()->success("Item Deleted Successfully");

        return back();
    }
    public function update(Request $request,Item $item)
    {
        $data = $this->validationItem($request);

        $img=$request->file('img');
        $img_name=uniqid().'.'.$img->getClientOriginalName();
        if($request->file('img')){
            \Storage::delete($item->img);
            $img->storeAs('public/items/img',$img_name);

            $item->update([
                'name' => $data['name'],
                'image' => $img_name,
                'desc' => $data['textdesc'],
                'price' => $data['price'],
                'additional_info' => $data['add_info'],
                'brand_id' => $data['brand_id'],
                'category_id' => $data['category_id'],
            ]);
        }
        else{
            $item->update([
                'name' => $data['name'],
                
                'desc' => $data['textdesc'],
                'price' => $data['price'],
                'additional_info' => $data['add_info'],
                'brand_id' => $data['brand_id'],
                'category_id' => $data['category_id'],
            ]); 

        }
        notify()->success('Item Update Successfull!');

        return back();
    }
}
