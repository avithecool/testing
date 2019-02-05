<nav class="amado-nav">
                <ul>

                    <li class="active"><a href="index.html">Home</a></li>
                    @if (Route::has('shop'))
                    <li><a href="shop.html">Shop</a></li>
                    @endif
                    <li><a href="product-details.html">Product</a></li>
                    @if (Route::has('cart'))
                    <li><a href="cart.html">Cart</a></li>
                    @endif
                    @if (Route::has('Checkout'))
                    <li><a href="checkout.html">Checkout</a></li>
                    @endif

                    @if (Route::has('about'))
                    <li><a href="{{Route('about')}}">About Us</a></li>
                    @endif

                    @if (Route::has('contact'))
                    <li><a href="{{Route('contact')}}">Contact Us</a></li>
                    @endif
                </ul>
</nav>

