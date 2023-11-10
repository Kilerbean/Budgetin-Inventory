<nav id="sidebar" class="sidebar js-sidebar {{-- collapsed --}}">
    <div class="sidebar-content js-simplebar">
        <a class="sidebar-brand" href="/">
            <img class="img-fluid" src="{{asset('icon/laboratorys.png')}}" alt="{{ config('app.name') }}"
                style="height: 35px">
            <span class="align-middle"> Q-LIS</span>
        </a>

        <ul class="sidebar-nav">
            <li class="sidebar-header mt-0">
                EXPENSE
            </li>

            <li class="sidebar-item {{ str_contains($pages, 'Dashboard') ? 'active' : '' }}">
                <a class="sidebar-link" href="{{ route('Dashboards') }}">
                    <i class="align-middle" data-feather="sliders" style="width: 18px;"></i> <span class="align-middle">Dashboard</span>
                </a>
            </li>
            <li class="sidebar-item {{ str_contains($pages, 'List Of Material') || 
                str_contains($pages, 'List of All Material') ||
                str_contains($pages, 'Edit Material') ||
                str_contains($pages, 'Detail of Material') ||
                str_contains($pages, 'Create New Material') 
                // str_contains($pages, 'Callibration Dashboard') ||
                // str_contains($pages, 'List Instrument') 
                
             ? 'active' : '' }}">
                <a class="sidebar-link" href="{{ route('Barang.index') }}">
                    <i class="fa-solid fa-boxes-stacked" style="width: 18px;"></i>
                    <span class="align-middle">List Of Material</span>
                </a>
            </li>
            <li class="sidebar-item {{ str_contains($pages, 'Purchas') ? 'active' : '' }}">
                <a class="sidebar-link" href="{{ route('income.create') }}">
                    <i class="fa-solid fa-cart-shopping" style="width: 18px;"></i>
                    <span class="align-middle">Purchasing Material</span>
                </a>
            </li>
            <li class="sidebar-item {{ str_contains($pages, 'Usage') ? 'active' : '' }}">
                <a class="sidebar-link" href="{{ route('usage.create') }}">
                    <i class="fa-solid fa-bag-shopping" style="width: 18px;"></i>
                    <span class="align-middle">Material Usage</span>
                </a>
            </li>






            <li class="sidebar-header mt-0">
                Callibration
            </li>
            <li class="sidebar-item {{ str_contains($pages, 'Karyawan') ? 'active' : '' }}">
                <a class="sidebar-link" href="{{ route('dashboard.kalibrasi') }}">
                    <i class="align-middle" data-feather="sliders" style="width: 18px;"></i>
                    <span class="align-middle">Dashboard</span>
                </a>
            </li>
            <li class="sidebar-item {{ str_contains($pages, 'Usage') ? 'active' : '' }}">
                <a class="sidebar-link" href="{{ route('listKalibrasi') }}">
                    <i class="fa-solid fa-bag-shopping" style="width: 18px;"></i>
                    <span class="align-middle">List Instrument</span>
                </a>
            </li>
            <li class="sidebar-item {{ str_contains($pages, 'Purchas') ? 'active' : '' }}">
                <a class="sidebar-link" href="{{ route('index.workorderlist') }}">
                    <i class="fa-solid fa-cart-shopping" style="width: 18px;"></i>
                    <span class="align-middle">Work Order List</span>
                </a>
            </li>




            <li class="sidebar-header">
                Others Apps
            </li>

            {{-- other apps sensitive link --}}
            <li class="sidebar-item">
                <a class="sidebar-link" href="https://lims.sohoglobalhealth.com"><i data-feather="grid"></i>
                    <span class="align-middle">LIMS</span></a>
            </li>
           
            <li class="sidebar-item">
                <a class="sidebar-link" href="https://iccs.sohoglobalhealth.com">
                    <i class="align-middle" data-feather="grid"></i> <span class="align-middle">ICCS</span>
                </a>
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link" href="http://190.191.1.151/smd/login.php">
                    <i class="align-middle" data-feather="grid"></i> <span class="align-middle">SMD</span>
                </a>
            </li>

            
           
            <li class="sidebar-item">
                <a class="sidebar-link" href="http://172.19.19.39:82/login"><i
                        data-feather="grid"></i>
                    <span class="align-middle">Lumens</span></a>
            </li>

            <li class="sidebar-header">
                Setting
            </li>

            <li class="sidebar-item {{ str_contains($pages, 'Karyawan') ? 'active' : '' }}">
                <a class="sidebar-link" href="{{ route('karyawan') }}">
                    <i class="fa-solid fa-users" style="width: 18px;"></i>
                    <span class="align-middle">List Employees</span>
                </a>
            </li>
            
            <li class="sidebar-item {{ $pages == 'Profile' ? 'active' : '' }}">
                <a class="sidebar-link" href="/profile">
                    <i class="align-middle" data-feather="user"></i> <span class="align-middle">Profile</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a class="sidebar-link" href="/logout" onclick="return confirm('Sign Out, Lanjut ?');">
                    <i class="align-middle" data-feather="log-out"></i> <span class="align-middle">Sign Out</span>
                </a>
            </li>

        </ul>
        {{-- <div class="sidebar-cta">
            <div class="sidebar-cta-content">
                <strong class="d-inline-block mb-2">Upgrade to Pro</strong>
                <div class="mb-3 text-sm">
                    Are you looking for more components? Check out our premium version.
                </div>
                <div class="d-grid">
                    <a href="upgrade-to-pro.html" class="btn btn-primary">Upgrade to Pro</a>
                </div>
            </div>
        </div> --}}
    </div>
</nav>
