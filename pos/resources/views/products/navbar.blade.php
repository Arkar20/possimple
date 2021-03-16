  
    <div class="site-branding-area">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="logo">
                        <h1><a href="./"><img src="{{asset('customer/img/logo.png')}}"></a></h1>
                    </div>
                </div>
                
                <div class="col-sm-6">
                    <div class="shopping-item">
                        <a href="{{route("cart.view")}}">Cart - <span class="cart-amunt">
                        {{session()->get('cart')->totalAmount??'0'}}    
                        </span> <i class="fa fa-shopping-cart"></i> <span class="product-count">{{session()->get('cart')->totalQty??'0'}} </span></a>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End site branding area -->
 <div class="mainmenu-area">
        <div class="container">
            <div class="row">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div> 
                <div class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="/">Home</a></li>
                        <li><a href="{{route("shop")}}">Shop page</a></li>
                        <li><a href="{{route("cart.view")}}">Cart</a></li>
                        <li><a href="{{route('cart.checkout')}}">Checkout</a></li>
                        <li><a href="{{route('history.show')}}">History</a></li>
                        <li><a href="#">Contact</a></li>
                    </ul>
                </div>  
            </div>
        </div>
    </div> <!-- End mainmenu area -->
    