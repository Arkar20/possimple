@include('products.header')
  <body>
   @include('products.headerlink')
     @include('products.navbar')
     <div id="app">
         <div class="product-big-title-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-bit-title text-center">
                        <h2>CheckOut</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="woocommerce container ">
                                <table cellspacing="0" class="shop_table cart m-2">
                                    <thead>
                                        <tr>
                                            <th class="product-remove">&nbsp;</th>
                                            <th class="product-name">Product</th>
                                            <th class="product-price">Price</th>
                                            <th class="product-quantity">Quantity</th>
                                            <th class="product-subtotal">Total</th>
                                            <th class="product-subtotal">Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      
                                           <tr class="cart_item">
                                          
                                             <td class="product-remove">
                                                {{-- <img  class="recent-thumb" src="{{asset('/storage/items/img/'.$cart['image'])}}" alt=""> --}}
                                            </td> 
                                             <td class="product-remove">
                                                <p class="remove" href="#">Name</p> 
                                            </td> 
                                             <td class="product-remove">
                                                <p class="remove" href="#">$Price</p> 
                                            </td> 
                                              <td class="product-quantity">
                                                <div class="quantity buttons_added">
                                               
                                                   
                                                </div>
                                            </td>
                                             <td class="product-remove">
                                                {{-- <p class="remove" href="#">${{$cart['price']*$cart['qty']}}</p>  --}}
                                            </td> 
                                            <td colspan="6">There is no items in the cart</td>
                                      

                                     
                                    </tbody>
                                </table>

                            <div class="cart-collaterals">


                            

                            



                            


                            </div>
                        </div>      
   @include('products.footer')