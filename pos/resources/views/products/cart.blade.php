@include('products.header')
  <body>
   @include('products.headerlink')
     @include('products.navbar')
     <div id="app">
    <div class="woocommerce container ">
                                <table cellspacing="0" class="shop_table cart m-2">
                                    <thead>
                                        <tr>
                                            <th class="product-remove">&nbsp;</th>
                                            <th class="product-thumbnail">&nbsp;</th>
                                            <th class="product-name">Product</th>
                                            <th class="product-price">Price</th>
                                            <th class="product-quantity">Quantity</th>
                                            <th class="product-subtotal">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                       @if($cart)
                                        @forelse ($cart->items as $index=>$item)
                                           <tr class="cart_item">
                                            <td class="product-remove">
                                                <form action="{{route('cart.remove',$item['id'])}}" method="POST">
                                                    @csrf
                                                    <button type="submit" class="btn" href="#">×</button> 
                                                </form>
                                            </td> 
                                             <td class="product-remove">
                                                <img  class="recent-thumb" src="{{asset('/storage/items/img/'.$item['image'])}}" alt="">
                                            </td> 
                                             <td class="product-remove">
                                                <p class="remove" href="#">{{$item['name']}}</p> 
                                            </td> 
                                             <td class="product-remove">
                                                <p class="remove" href="#">${{$item['price']}}</p> 
                                            </td> 
                                              <td class="product-quantity">
                                                <div class="quantity buttons_added">
                                                <form action="{{route('cart.update',$item['id'])}}" method="POST">
                                                    
                                                    @csrf
                                                    @method('PUT')
                                                    
                                                    <input type="number" size="4" class="input-text qty text" title="Qty" name="qty" value="{{$item['qty']}}" min="0" step="1">
                                                    <input type="submit" class="btn btn-primary" value="update">
                                                </form>
                                                </div>
                                            </td>
                                             <td class="product-remove">
                                                <p class="remove" href="#">${{$item['price']*$item['qty']}}</p> 
                                            </td> 
                                            @empty
                                            <td colspan="6">There is no items in the cart</td>
                                        @endforelse
                                       @endif

                                            
                                        <tr>
                                            <td class="actions" colspan="6">
                                                <div class="coupon">
                                                   
                                                    <input type="submit" value="Apply Coupon" name="apply_coupon" class="btn btn-danger">
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>

                            <div class="cart-collaterals">


                            

                            <div class="cart_totals ">
                                <h2>Cart Totals</h2>

                                <table cellspacing="0">
                                    <tbody>
                                        <tr class="cart-subtotal">
                                            <th>Cart Subtotal</th>
                                            <td><span class="amount">{{$cart->totalQty??''}}</span></td>
                                        </tr>

                                        <tr class="shipping">
                                            <th>Shipping and Handling</th>
                                            <td>Free Shipping</td>
                                        </tr>

                                        <tr class="order-total">
                                            <th>Order Total</th>
                                            <td><strong><span class="amount">{{$cart->totalAmount??''}}</span></strong> </td>
                                        </tr>
                                    </tbody>
                                </table>

                                     <a href="{{route('cart.checkout')}}"  name="proceed" class="btn btn-primary m-4">Check out</a>

                            </div>



                            


                            </div>
                        </div>      
   @include('products.footer')