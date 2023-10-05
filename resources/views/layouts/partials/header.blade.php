<nav class="navbar navbar-expand-sm navbar-light navbar-bg" style="background-color: rgb(141, 235, 157);">
    <a class="sidebar-toggle js-sidebar-toggle">

        <i class="hamburger align-self-center"></i>
    </a>

    <img class="img-fluid" src="{{asset('icon/kimia.png')}}" style="height: 35px">
    <img class="img-fluid" src="{{asset('icon/reaction.png')}}" style="height: 35px">
    <img class="img-fluid" src="{{asset('icon/chemistryys.png')}}" style="height: 35px">
    <img class="img-fluid" src="{{asset('icon/flasks.png')}}" style="height: 35px">

    <img class="img-fluid" src="{{asset('icon/kimia.png')}}" style="height: 35px ; transform: scaleX(-1);">
    <img class="img-fluid" src="{{asset('icon/reaction.png')}}" style="height: 35px ; transform: scaleX(-1);">
    <img class="img-fluid" src="{{asset('icon/chemistryys.png')}}" style="height: 35px ; transform: scaleX(-1);">
    <img class="img-fluid" src="{{asset('icon/flasks.png')}}" style="height: 35px ; transform: scaleX(-1);">

    <img class="img-fluid" src="{{asset('icon/kimia.png')}}" style="height: 35px">
    <img class="img-fluid" src="{{asset('icon/reaction.png')}}" style="height: 35px">
    <img class="img-fluid" src="{{asset('icon/chemistryys.png')}}" style="height: 35px">
    <img class="img-fluid" src="{{asset('icon/flasks.png')}}" style="height: 35px">

    <img class="img-fluid" src="{{asset('icon/kimia.png')}}" style="height: 35px ; transform: scaleX(-1);">
    <img class="img-fluid" src="{{asset('icon/reaction.png')}}" style="height: 35px ; transform: scaleX(-1);">
    <img class="img-fluid" src="{{asset('icon/chemistryys.png')}}" style="height: 35px ; transform: scaleX(-1);">
    <img class="img-fluid" src="{{asset('icon/flasks.png')}}" style="height: 35px ; transform: scaleX(-1);">

    <img class="img-fluid" src="{{asset('icon/kimia.png')}}" style="height: 35px">
    <img class="img-fluid" src="{{asset('icon/reaction.png')}}" style="height: 35px">
    <img class="img-fluid" src="{{asset('icon/chemistryys.png')}}" style="height: 35px">
    <img class="img-fluid" src="{{asset('icon/flasks.png')}}" style="height: 35px">

    <img class="img-fluid" src="{{asset('icon/kimia.png')}}" style="height: 35px ; transform: scaleX(-1);">
    <img class="img-fluid" src="{{asset('icon/reaction.png')}}" style="height: 35px ; transform: scaleX(-1);">
    <img class="img-fluid" src="{{asset('icon/flask.png')}}" style="height: 35px">
    <img class="img-fluid" src="{{asset('icon/kimias.png')}}" style="height: 35px">
   

    <div class="navbar-nav navbar-align" >
        @yield('header')
    </div>
    <div class="navbar-collapse collapse" >
        <ul class="navbar-nav navbar-align">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#" data-toggle="dropdown"
                    data-bs-toggle="dropdown">
                    <span class="text-dark">{{ auth()->user()->name }}</span>
                </a>
                <div class="dropdown-menu dropdown-menu-end">
                    <a class="dropdown-item" href="/profile"><i class="align-middle me-1" data-feather="user"></i>
                        Profile</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item"
                        href="/profile"><i class="align-middle me-1" data-feather="github"></i> {{auth()->user()->leveluser== 1 ? 'User' : (auth()->user()->leveluser== 2 ? 'Staff' : (auth()->user()->leveluser== 3 ? 'SuperVisor' : (auth()->user()->leveluser== 4 ? 'Manager' :(auth()->user()->leveluser== 5 ? 'Administrator' : '') ))) }}</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="/logout"><i class="align-middle me-1" data-feather="log-out"></i> Sign Out</a>
                </div>
            </li>
        </ul>
    </div>
</nav>
