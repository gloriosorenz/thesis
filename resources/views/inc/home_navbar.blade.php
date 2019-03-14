<nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
        <a class="navbar-brand" href="/">SMSRL Portal</a>
            <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav">
                    <!-- {{-- GUEST --}} -->
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="{{Request:: is('product_lists') ? 'active' : ''}}">
                            <a class="nav-link" href="{{ url('product_lists/show_products') }}">Products</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('weather/weather_statistics') }}">Weather Statistics</a>
                        </li>
                    <!-- {{-- CUSTOMER --}} -->
                    @elseif(Auth::user()->roles_id == 3)
                        <li class="nav-item">
                            <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="{{Request:: is('product_lists') ? 'active' : ''}}">
                            <a class="nav-link" href="{{ url('product_lists/show_products') }}">Products</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('weather/weather_statistics') }}">Weather Statistics</a>
                        </li>
                        
                    <!-- {{-- ADMIN --}} -->
                    @elseif(Auth::user()->roles_id == 1)
                        <li class="nav-item">
                            <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="{{Request:: is('product_lists') ? 'active' : ''}}">
                            <a class="nav-link" href="{{ url('product_lists/show_products') }}">Products</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('weather/weather_statistics') }}">Weather Statistics</a>
                        </li>
                    <!-- {{-- FARMER --}} -->
                    @elseif(Auth::user()->roles_id == 2)
                        <li class="nav-item">
                            <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="{{Request:: is('product_lists') ? 'active' : ''}}">
                            <a class="nav-link" href="{{ url('product_lists/show_products') }}">Products</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('weather/weather_statistics') }}">Weather Statistics</a>
                        </li>
                    @endguest
                </ul>
            </div>

    
            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    {{-- @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif  --}}
                <!-- {{-- ADMIN --}} -->
                @elseif(Auth::user()->roles_id == 1)
                    <li class="{{Request:: is('dashboard') ? 'active' : ''}}">
                        <a class="nav-link" href="{{ url('dashboard') }}">Admin Panel</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->first_name }} <i class="fas fa-caret-down"></i>
                        </a>
    
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ url('/orders/my_orders') }}">
                                <i class="fas fa-clipboard-list"></i>
                                Order History
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                <i class="fas fa-sign-out-alt"></i>
                                Logout
                            </a>
                        </div>
                    </li>
                <!-- {{-- FARMER --}} -->
                @elseif(Auth::user()->roles_id == 2)
                <li class="{{Request:: is('dashboard') ? 'active' : ''}}">
                    <a class="nav-link" href="{{ url('dashboard') }}">Farmer Dashboard</a>
                </li>
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->first_name }} <i class="fas fa-caret-down"></i>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ url('/orders/my_orders') }}">
                            <i class="fas fa-clipboard-list"></i>
                            Order History
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                            <i class="fas fa-sign-out-alt"></i>
                            Logout
                        </a>
                    </div>
                </li>
                <!-- {{-- CUSTOMER --}} -->
                @elseif(Auth::user()->roles_id == 3)
                <li class="nav-item">
                    {{-- <a class="nav-link" href="{{ url('cart') }}">Cart ({{ Cart::instance('default')->count(false) }})</a> --}}
                    <a class="nav-link" href="{{ url('cart') }}">Cart ({{ Cart::content()->count() }})</a>
                    {{-- <li class="{{ set_active('cart') }}"><a href="{{ url('/cart') }}">Cart ({{ Cart::instance('default')->count(false) }})</a></li> --}}

                </li>
                <li class="nav-item dropdown">
                
                    <a id="navbarDropdown" class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->first_name }} <i class="fas fa-caret-down"></i>
                    </a>
                    

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ url('/orders/my_orders') }}">
                            <i class="fas fa-clipboard-list"></i>
                            Order History
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                            <i class="fas fa-sign-out-alt"></i>
                            Logout
                        </a>
                    </div>
                </li>
                @endguest
            </ul>
        </div>
    </nav>