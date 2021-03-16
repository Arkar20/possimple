@extends('products.layout')

@section('content')
    
    <div class="product-big-title-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-bit-title text-center">
                        <h2>Product detial</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class=" container">
        <div class="row">
            <div class="col-md-6 col-sm-6">
                <div class=" align-items-center justify-content-center">
            <div class="card p-4">
                <div class="card-img">
                    <img src="{{asset('storage/items/img/'.$item->image)}}" class="rounded " >
                </div>
            </div>
            
        </div>
            </div>
            <div class="col-md-6 col-sm-6">
                <div class=" align-items-center justify-content-center">
            <div class="card p-4">
               <h4 class="product-name">{{$item->name}}</h4>
               <div class="product-inner-price">
                                        <ins>${{$item->price}}</ins> 
                </div>
                <a href={{route('addtocart',$item->id)}} class="add_to_cart_button" >Add to cart</a>
            </div>
            <div class="product-inner-category">
                                        <p>Category: <a href="">{{$item->categories->name}}</a>. Brand: <a href="">{{$item->brands->brand}}</a>,</p>
                                    </div>
                                    <div role="tabpanel" class="tab-pane fade in active" id="home">
                                    <h2>Product Description</h2>  
                                                <p>
                                                {!!$item->desc!!}    
                                                </p> </div>
            
        </div>
            </div>
            
        </div>
        
    </div>
                              
                            
@endsection