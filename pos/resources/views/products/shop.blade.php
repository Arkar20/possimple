@extends("products.layout")

@section('content')
   
    <div class="product-big-title-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-bit-title text-center">
                        <h2>Shop</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>

     <div class="single-product-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                @forelse ($items as $item)
                     <div class="col-md-3 col-sm-6">
                    <div class="single-shop-product">
                        <div class="product-upper">
                            <img src="{{asset('storage/items/img/'.$item->image)}}" alt="{{$item->name}}" height="200px">
                        </div>
                        <h2><a href="">{{$item->name}}</a></h2>
                        <div class="product-carousel-price">
                            <ins>${{$item->price}}</ins> 
                        </div>  
                        
                        <div class="product-option-shop">
                            <a class="add_to_cart_button" data-quantity="1" data-product_sku="" data-product_id="70" rel="nofollow" href="{{route('addtocart',$item->id)}}">Add to cart</a>
                            <a class="add_to_cart_button" data-quantity="1" data-product_sku="" data-product_id="70" rel="nofollow" href="{{route('detail',$item->id)}}">View detai</a>
                        </div>                       
                    </div>
                </div>
                @empty
                    <div class="align-center">
                        No items in the database
                    </div>
                @endforelse
               
            </div>
        </div>
     </div>
     
@endsection