@include('products.header')
  <body>
   @include('products.headerlink')
     @include('products.navbar')

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
    
    
    <div class="single-product-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    
                    <div id="order_review" style="position: relative;">
                                    <table class="shop_table">
                                        <thead>
                                            <tr>
                                                <th class="product-name">Product</th>
                                                <th class="product-total">Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                              @if(isset($cartdata->items))
                                                @foreach($cartdata->items as $item)
                                                                                            <tr class="cart_item">

                                                     <td class="product-name">
                                                    {{$item['name']}} <strong class="product-quantity"> x{{$item['qty']}} </strong> </td>
                                                    <td class="product-total">
                                                    <span class="amount"> ${{$item['price']}} </span>
                                                   </td>
                                                                                               </tr>

                                                @endforeach
                                               @endif
                                        </tbody>
                                        <tfoot>

                                            <tr class="cart-subtotal">
                                                <th>Cart Subtotal</th>
                                                <td><span class="amount">${{$cart->totalAmount??''}}</span>
                                                </td>
                                            </tr>

                                            <tr class="shipping">
                                                <th>Shipping and Handling</th>
                                                <td>

                                                    Free Shipping
                                                    <input type="hidden" class="shipping_method" value="free_shipping" id="shipping_method_0" data-index="0" name="shipping_method[0]">
                                                </td>
                                            </tr>


                                            <tr class="order-total">
                                                <th>Order Total</th>
                                                <td><strong><span class="amount">${{$cartdata->totalAmount??""}}</span></strong> </td>
                                            </tr>

                                        </tfoot>
                                    </table>


                                    
                                </div>
                   
                    
                    
                </div>
               
                
                <div class="col-md-6 ">
                    <div class="container">
                        <div class="woocommerce">
                           

                           
                            <form enctype="multipart/form-data" action="{{route('order.store')}}" class="checkout" method="post" >
                                @csrf
                                <div id="customer_details" class="col2-set">
                                    <div class="card">
                                        <div class="woocommerce-billing-fields">
                                            <h3>Billing Details</h3>
                                            

                                         

                                            <p id="billing_last_name_field" class="form-row form-row-last validate-required">
                                                <label class="" for="billing_last_name"> Name <abbr title="required" class="required">*</abbr>
                                                </label>
                                                <input type="text" value="" placeholder="" id="billing_last_name" name="name" class="input-text ">
                                            </p>
                                            <div class="clear"></div>

                                            <p id="billing_company_field" class="form-row form-row-wide">
                                                <label class="" for="billing_company">City</label>
                                                <input type="text" value="" placeholder="" id="billing_company" name="city" class="input-text ">
                                            </p>

                                            <p id="billing_address_1_field" class="form-row form-row-wide address-field validate-required">
                                                <label class="" for="billing_address_1">Address <abbr title="required" class="required">*</abbr>
                                                </label>
                                                <input type="text" value="" placeholder="Street address" id="billing_address_1" name="address" class="input-text ">
                                            </p>

                                            <p id="billing_address_2_field" class="form-row form-row-wide address-field">
                                                <label class="" for="billing_address_1">Postal Code <abbr title="required" class="required">*</abbr>
                                                </label>
                                                <input type="text" value="" placeholder="Apartment, suite, unit etc. (optional)" id="billing_address_2" name="postcode" class="input-text ">
                                            </p>

                                            <p id="billing_city_field" class="form-row form-row-wide address-field validate-required" data-o_class="form-row form-row-wide address-field validate-required">
                                                <label class="" for="billing_city">State <abbr title="required" class="required">*</abbr>
                                                </label>
                                                <input type="text" value="" placeholder="State" id="billing_city" name="state" class="input-text ">
                                            </p>
                                            
                                        <div id="card-element"><!--Stripe.js injects the Card Element--></div>

                                            <button id="submit">

                                                <div class="spinner hidden" id="spinner"></div>

                                                <span id="button-text">Pay now</span>

                                            </button>
                                    </div>

                                    

                                    </div>

                                </div>


                                
                            </form>

                        </div>                       
                    </div>                    
                </div>
            </div>
        </div>
    </div>
    <script>
      
    </script>
   @include('products.footer')