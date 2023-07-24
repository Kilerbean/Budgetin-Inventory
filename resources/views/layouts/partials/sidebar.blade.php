<nav id="sidebar" class="sidebar js-sidebar {{-- collapsed --}}">
    <div class="sidebar-content js-simplebar">
        <a class="sidebar-brand" href="/">
            <img class="img-fluid" src="{{ asset('icon/app-icon.png') }}" alt="{{ config('app.name') }}"
                style="height: 35px">
            <span class="align-middle"> {{ config('app.name') }}</span>
        </a>
        {{-- <ul class="sidebar-nav">           
            
            <li class="sidebar-item">
                <a class="sidebar-link" href="/logout" onclick="return confirm('Sign Out, Lanjut ?');">
                    <i class="align-middle" data-feather="log-out"></i> <span class="align-middle">Sign Out</span>
                </a>
            </li>
        </ul> --}}
        <ul class="sidebar-nav">
            
            @includeIf('layouts.sparta.partials.sidebar')
            @includeIf('layouts.woms.partials.sidebar')
            @includeIf('layouts.sam.partials.sidebar')


            <li class="sidebar-header">
                Others Apps
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link" href="http://190.191.1.151/smd/login.php">
                    <i class="align-middle" data-feather="grid"></i> <span class="align-middle">SMD</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a class="sidebar-link" href="https://iccs.sohoglobalhealth.com">
                    <i class="align-middle" data-feather="grid"></i> <span class="align-middle">ICCS</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a class="sidebar-link" href="https://lims.sohoglobalhealth.com"><i data-feather="grid"></i>
                    <span class="align-middle">LIMS</span></a>
            </li>
            <li class="sidebar-item">
                <a class="sidebar-link" href="https://apps6.sohoglobalhealth.com/HRIS/Login.aspx"><i
                        data-feather="grid"></i>
                    <span class="align-middle">Pro-Int</span></a>
            </li>

            <li class="sidebar-header">
                Setting
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
