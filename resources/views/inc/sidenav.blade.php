<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-info sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ url('/dashboard') }}">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-leaf"></i>
        </div>
        <div class="sidebar-brand-text mx-3">SMSRL Portal</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Admin Functionalities -->
    @if(Auth::user()->roles_id == 1)
    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="{{ url('dashboard') }}">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span></a>
    </li>

    <!-- Seasons -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('seasons.index') }}">
        <i class="fas fa-sun"></i>
        <span>Seasons</span></a>
    </li>

    <!-- Statuses -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('season_statuses.index') }}">
        <i class="fas fa-check-circle"></i>
        <span>Season Statuses</span></a>
    </li>

    <!-- Products -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('product_lists.index') }}">
        <i class="fas fa-box"></i>
        <span>Products</span></a>
    </li>

    <!-- Orders -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('orders.index') }}">
        <i class="fas fa-clipboard-list"></i>
        <span>Orders</span></a>
    </li>

    <!-- Nav Item - Users Management Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-users"></i>
            <span>User Management</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Components:</h6>
                <a class="collapse-item" href="{{ route('users.index') }}">Users</a>
                <a class="collapse-item" href="{{ route('rice_farmers.index') }}">Rice Farmers</a>
                <a class="collapse-item" href="{{ route('customers.index') }}">Customers</a>
                <a class="collapse-item" href="{{ route('roles.index') }}">Roles</a>
            </div>
        </div>
    </li>

    <!-- Reports -->
    {{-- <li class="nav-item">
        <a class="nav-link" href="#">
        <i class="fas fa-chart-line"></i>
        <span>Reports</span></a>
    </li> --}}
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
            <i class="fas fa-chart-line"></i>
            <span>Reports</span>
        </a>
        <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Components:</h6>
                <a class="collapse-item" href="{{ route('sales_reports.index') }}">Sales Report</a>
                <a class="collapse-item" href="#">Season Reports</a>
                <a class="collapse-item" href="{{ route('plant_reports.index') }}">Plant Reports</a>
                <a class="collapse-item" href="{{ route('damage_reports.index') }}">Damage Report</a>
            </div>
        </div>
    </li>






    <!-- Rice Farmer Functionalities -->
    @elseif(Auth::user()->roles_id == 2)
    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="{{ url('dashboard') }}">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span></a>
    </li>

    <!-- Seasons -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('seasons.index') }}">
        <i class="fas fa-sun"></i>
        <span>Seasons</span></a>
    </li>

    <!-- Products -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('product_lists.index') }}">
        <i class="fas fa-box"></i>
        <span>Products</span></a>
    </li>

    <!-- Orders -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('orders.index') }}">
        <i class="fas fa-clipboard-list"></i>
        <span>Orders</span></a>
    </li>

    <!-- Reports -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
            <i class="fas fa-chart-line"></i>
            <span>Reports</span>
        </a>
        <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Components:</h6>
                <a class="collapse-item" href="{{ route('reports.index') }}">Sales Report</a>
                <a class="collapse-item" href="#">Season Reports</a>
                <a class="collapse-item" href="{{ route('plant_reports.index') }}">Plant Reports</a>
                <a class="collapse-item" href="{{ route('damage_reports.index') }}">Damage Report</a>
            </div>
        </div>
    </li>

    @endif













    {{-- <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        User Management
    </div>

    <!-- Nav Item - Users Management Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
        <i class="fas fa-users"></i>
        <span>User Management</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Components:</h6>
            <a class="collapse-item" href="{{ route('users.index') }}">Users</a>
            <a class="collapse-item" href="{{ route('roles.index') }}">Roles</a>
        </div>
        </div>
    </li>

    <!-- Nav Item - Utilities Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
        <i class="fas fa-fw fa-wrench"></i>
        <span>Utilities</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Custom Utilities:</h6>
            <a class="collapse-item" href="utilities-color.html">Colors</a>
            <a class="collapse-item" href="utilities-border.html">Borders</a>
            <a class="collapse-item" href="utilities-animation.html">Animations</a>
            <a class="collapse-item" href="utilities-other.html">Other</a>
        </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Addons
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
        <i class="fas fa-fw fa-folder"></i>
        <span>Pages</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Login Screens:</h6>
            <a class="collapse-item" href="login.html">Login</a>
            <a class="collapse-item" href="register.html">Register</a>
            <a class="collapse-item" href="forgot-password.html">Forgot Password</a>
            <div class="collapse-divider"></div>
            <h6 class="collapse-header">Other Pages:</h6>
            <a class="collapse-item" href="404.html">404 Page</a>
            <a class="collapse-item" href="blank.html">Blank Page</a>
        </div>
        </div>
    </li>

    <!-- Nav Item - Charts -->
    <li class="nav-item">
        <a class="nav-link" href="charts.html">
        <i class="fas fa-fw fa-chart-area"></i>
        <span>Charts</span></a>
    </li>

    <!-- Nav Item - Tables -->
    <li class="nav-item">
        <a class="nav-link" href="tables.html">
        <i class="fas fa-fw fa-table"></i>
        <span>Tables</span></a>
    </li> --}}

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->