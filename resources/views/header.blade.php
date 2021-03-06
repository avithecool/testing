
    <!-- Header Area Start -->

    <header class="header-area clearfix">
            <!-- Close Icon -->
            <div class="nav-close">
                <i class="fa fa-close" aria-hidden="true"></i>
            </div>
            <!-- Logo -->
            <div class="logo">
            <a href=""><img src="{{asset('img/logo.png')}}" alt=""></a>
             </div>
            <!-- Amado Nav -->
            @include('nav')
            <!-- Button Group -->
            <div class="amado-btn-group mt-30 mb-100">
                <a href="{{Route('account')}}" class="btn amado-btn mb-15">{{_('Account')}}</a>
            @if(Auth::User())
            <form method="POST" name="logout" action="{{ route('logout') }}">
                        @csrf
            </form>
                <a href="#" class="btn amado-btn active" onclick="document.logout.submit();">Logout</a>
            @endif
            </div>
            <!-- Cart Menu -->
            <div class="cart-fav-search mb-100">
                <a href="cart.html" class="cart-nav"><img src="img/core-img/cart.png" alt=""> Cart <span>(0)</span></a>
                <a href="#" class="fav-nav"><img src="img/core-img/favorites.png" alt=""> Favourite</a>
                <a href="#" class="search-nav"><img src="img/core-img/search.png" alt=""> Search</a>
            </div>
            <!-- Social Button -->
            <div class="social-info d-flex justify-content-between">
                <a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a>
                <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
            </div>
        </header>
        <!-- Header Area End -->
