<!-- Sidebar  -->
<nav id="sidebar">
    <div class="sidebar-header">
        <a href="{{ route('home') }}">
        <h3>SMSRL Portal</h3>
        </a>
        <strong>SM</strong>
    </div>


    <ul class="list-unstyled components">
        {{-- ADMIN --}}
        @if(Auth::user()->roles_id == 1)
        {{-- <li><h4>Admin</h4></li> --}}
        {{-- DASHBOARD --}}
        <li class="{{Request:: is('dashboard') ? 'active' : ''}}">
            <a href="{{ url('dashboard') }}">
                <i class="fas fa-tachometer-alt"></i>
                Dashboard
            </a>
        </li>

        {{-- PROFILE --}}
        {{-- <li>
            <a href="#">
                <i class="fas fa-user-alt"></i>
                Profile
            </a>
        </li> --}}
        
        {{-- Season --}}
        <li lass="{{Request:: is('seasons') ? 'active' : ''}}">
            <a href="{{ route('seasons.index') }}">
                <i class="fas fa-sun"></i>
                Seasons
            </a>
        </li>


        {{-- USER MANAGEMENT --}}
        <li class="{{Request:: is('roles', 'users') ? 'active' : ''}}"><!-- Link with dropdown items -->
            <a href="#homeSubmenu1" data-toggle="collapse" aria-expanded="false"><i class="fa fa-users"></i> User Management <i class="fa fa-caret-down"></i></a>
            <ul class="collapse list-unstyled" id="homeSubmenu1">
                <li class="{{Request:: is('roles') ? 'active' : ''}}">
                    <a href="{{ route('roles.index') }}">Roles</a>
                </li>
                <li class="{{Request:: is('users') ? 'active' : ''}}">
                    <a href="{{ route('users.index') }}">Users</a>
                </li>
            </ul>
        </li>
        {{-- RICE FARMERS --}}
        <li class="{{Request:: is('rice_farmers') ? 'active' : ''}}">
            <a href="{{ route('rice_farmers.index') }}">
                <i class="fas fa-leaf"></i>
                Farmers
            </a>
        </li>
        {{-- CUSTOMER MANAGEMENT --}}
        <li class="{{Request:: is('customers') ? 'active' : ''}}">
            <a href="{{ route('customers.index') }}">
                <i class="fas fa-user-alt"></i>
                Customers
            </a>
        </li>
        {{-- Planned Crops --}}
        {{-- <li lass="{{Request:: is('seasons') ? 'active' : ''}}">
            <a href="{{ route('seasons.index') }}">
                <i class="fas fa-sun"></i>
                Season
            </a>
        </li> --}}
        {{-- Reports --}}
        <li>
            <a href="#">
                 <i class="fas fa-chart-line"></i>
                Reports
            </a>
        </li>
        {{-- <li>
            <a href="#homeSubmenu2" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                <i class="fas fa-home"></i>
                Home
            </a>
            <ul class="collapse list-unstyled" id="homeSubmenu2">
                <li>
                    <a href="#">Home 1</a>
                </li>
                <li>
                    <a href="#">Home 2</a>
                </li>
                <li>
                    <a href="#">Home 3</a>
                </li>
            </ul>
        </li> --}}

        <hr>
        {{-- Rice Farmer --}}
        @elseif(Auth::user()->roles_id == 2)
        {{-- <li><h4>Rice Farmer</h4></li> --}}
        {{-- DASHBOARD --}}
        <li class="{{Request:: is('dashboard') ? 'active' : ''}}">
            <a href="{{ url('dashboard') }}">
                <i class="fas fa-tachometer-alt"></i>
                Dashboard
            </a>
        </li>
        {{-- PROFILE --}}
        <li>
            <a href="#">
                <i class="fas fa-user-alt"></i>
                Profile
            </a>
        </li>
         {{-- PRODUCTS --}}
         <li class="nav-item">
            <a href="#">
                <i class="fas fa-box"></i>
                Products
            </a>
        </li>


        <hr>
        {{-- Customers --}}
        @elseif(Auth::user()->roles_id == 3)
        {{-- <li><h4>Customers</h4></li> --}}
        {{-- PROFILE --}}
        <li>
            <a href="#">
                <i class="fas fa-user-alt"></i>
                Profile
            </a>
        </li>
        @endif
    </ul>
</nav>
