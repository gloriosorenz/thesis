<nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
        <a class="navbar-brand" href="/">SMSRL Portal</a>
            <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav mr-auto">
                    <!-- {{-- GUEST --}} -->
                    @guest
                    <li class="{{Request:: is('product_lists') ? 'active' : ''}}">
                        <a class="nav-link" href="{{ route('product_lists.index') }}">Products</a>
                    </li>
                    <!-- {{-- CUSTOMER --}} -->
                    @elseif(Auth::user()->roles_id == 3)
                        <li class="nav-item active">
                            <a class="nav-link" href="/home">Home <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="{{Request:: is('product_lists') ? 'active' : ''}}">
                            <a class="nav-link" href="{{ url('product_lists/show_products') }}">Products</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('cart') }}">Cart</a>
                        </li>
                    <!-- {{-- ADMIN --}} -->
                    @elseif(Auth::user()->roles_id == 1)
                        <li class="{{Request:: is('product_lists') ? 'active' : ''}}">
                            <a class="nav-link" href="{{ url('product_lists/show_products') }}">Products</a>
                        </li>
                    <!-- {{-- FARMER --}} -->
                    @elseif(Auth::user()->roles_id == 2)
                    <li class="{{Request:: is('product_lists') ? 'active' : ''}}">
                        <a class="nav-link" href="{{ url('product_lists/show_products') }}">Products</a>
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
                    <!-- {{-- @if (Route::has('register')) -->
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif --}}
                <!-- {{-- ADMIN --}} -->
                @elseif(Auth::user()->roles_id == 1)
                    <li class="{{Request:: is('dashboard') ? 'active' : ''}}">
                        <a class="nav-link" href="{{ url('dashboard') }}">View Admin Site</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->first_name }} <i class="fas fa-caret-down"></i>
                        </a>
    
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
    
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                <!-- {{-- FARMER --}} -->
                @elseif(Auth::user()->roles_id == 2)
                <li class="{{Request:: is('users') ? 'active' : ''}}">
                    <a class="nav-link" href="{{ route('users.index') }}">Farmer Dashboard</a>
                </li>
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->first_name }} <i class="fas fa-caret-down"></i>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
                <!-- {{-- CUSTOMER --}} -->
                @elseif(Auth::user()->roles_id == 3)
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->first_name }} <i class="fas fa-caret-down"></i>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
                @endguest
            </ul>
        </div>
    </nav>