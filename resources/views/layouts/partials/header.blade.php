
<nav class="navbar navbar-expand-sm navbar-light navbar-bg">
        <a class="sidebar-toggle js-sidebar-toggle">
        <i class="hamburger align-self-center"></i>
        </a>
        <div class="navbar-nav navbar-align">
            @yield('header')
        </div>
        <div class="navbar-collapse collapse">
            <ul class="navbar-nav navbar-align">
                <li class="nav-item dropdown">      
                    <a class="nav-link dropdown-toggle d-none d-sm-inline-block" data-toggle="dropdown" data-bs-toggle="dropdown" aria-expanded="false">
                        <span class="text-dark">{{auth()->user()->name}}</span>
                    </a>              
                    <div class="dropdown-menu dropdown-menu-end">
                        <a class="dropdown-item" href="/profile"><i class="align-middle me-1" data-feather="user"></i> Profile</a>
                        {{-- <a class="dropdown-item" href="#"><i class="align-middle me-1" data-feather="pie-chart"></i> Analytics</a> --}}
                        <div class="dropdown-divider"></div>
                        <p class="dropdown-item text-sm">Lumens <sup>as</sup> {{auth()->user()->level==1?'User':(auth()->user()->level==2?'Administrator':'Not Define')}}</p>
                        <p class="dropdown-item text-sm">Sparta <sup>as</sup> {{auth()->user()->level_sparta==1?'User':(auth()->user()->level_sparta==2?'Administrator':(auth()->user()->level_sparta==3?'Super User':'Not Define'))}}</p>
                        <p class="dropdown-item text-sm">WOMS <sup>as</sup> {{auth()->user()->level_woms==1?'Creator':(auth()->user()->level_woms==2?'Approver':(auth()->user()->level_woms==3?'Maintenance':(auth()->user()->level_woms==4?'Super User':'Not Define')))}}</p>
                        <p class="dropdown-item text-sm">SAM <sup>as</sup> {{auth()->user()->level_sam==1?'User':(auth()->user()->level_sam==2?'Administrator':'Not Define')}}</p>
                        {{-- <a class="dropdown-item" href="index.html"><i class="align-middle me-1" data-feather="settings"></i> Settings & Privacy</a>
                        <a class="dropdown-item" href="#"><i class="align-middle me-1" data-feather="help-circle"></i> Help Center</a> --}}
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="/logout">Sign out</a>
                    </div>
                </li>
            </ul>
        </div>
</nav>