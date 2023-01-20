<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'User Roles and Permissions') }}</title>
    <!-- Scripts -->
    <!-- <script src="{{ asset('js/app.js') }}" defer></script> -->
    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Styles -->
    <!-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> -->
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel" style="background-color: #212529;">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/login') }}" style="color: white;margin-left: -35px;font-weight: bold;">
                    Roles and Permissions
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent" style="flex-grow: 0;">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto"></ul>


                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                        <li><a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a></li>
                        <li><a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a></li>
                        @else

                        <!-- @canany(['user-edit', 'user-list', 'user-delete', 'user-create'])

                        <li><a class="nav-link" href="{{ route('users.index') }}"><i class="fa fa-bars"></i>Manage
                                Users</a></li>
                        @endcanany
                        @canany(['role-edit', 'role-list', 'role-delete', 'role-create'])
                        <li><a class="nav-link" href="{{ route('roles.index') }}">Manage Role</a></li>
                        @endcanany
                        @canany(['product-edit', 'product-list', 'product-delete', 'product-create'])
                        <li><a class="nav-link" href="{{ route('products.index') }}">Manage Product</a></li>
                        @endcanany -->
                        <div class="dropdown">
                            <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                                <img src="https://github.com/mdo.png" alt="hugenerd" width="30" height="30" class="rounded-circle">
                                <span class="d-none d-sm-inline mx-1">{{ Auth::user()->name }}</span>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1" style="margin-top: 10px;">
                                <!-- <li><a class="dropdown-item" href="#">New project...</a></li>
                                <li><a class="dropdown-item" href="#">Settings</a></li>
                                <li><a class="dropdown-item" href="#">Profile</a></li> -->
                                <!-- <li>
                                    <hr class="dropdown-divider">
                                </li> -->
                                <li><a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </li>
                            </ul>
                        </div>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        <!-- <main class="py-4">
            <div class="container">
                @yield('content')
            </div>
        </main> -->
        <div class="container-fluid">
            <div class="row flex-nowrap">
                @guest
                @else
                <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-dark">
                    <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
                        <a href="" class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                            <span class="fs-5 d-none d-sm-inline">Menu</span>
                        </a>
                        <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
                            <!-- @canany(['user-edit', 'user-list', 'user-delete', 'user-create'])

                            <li><a class="nav-link" href="{{ route('users.index') }}">Manage Users</a></li>
                            @endcanany
                            @canany(['role-edit', 'role-list', 'role-delete', 'role-create'])
                            <li><a class="nav-link" href="{{ route('roles.index') }}">Manage Role</a></li>
                            @endcanany
                            @canany(['product-edit', 'product-list', 'product-delete', 'product-create'])
                            <li><a class="nav-link" href="{{ route('products.index') }}">Manage Product</a></li>
                            @endcanany -->
                            @php
                            $role_id = auth()->user()->roles->pluck("id")->first();
                            $role_has_navigation = role_has_navigation($role_id);
                            $role_has_sub_navigation = role_has_sub_navigation($role_id);
                            $navbar = navbar();
                            $i=1;
                            @endphp
                            @foreach($role_has_navigation as $nav_id)
                                @foreach($navbar as $nav)
                                    @if($nav->id === $nav_id->navigation_id)
                                        @if($nav->sub_nav === 0)
                                            @if($nav->is_show === 1)
                                            <li>
                                                <a href="{{ url(''.$nav->route) }}" class="nav-link px-0"> <span class="d-none d-sm-inline" style="color:white ;"><i class="{{ $nav->icon }}" style="margin-right: 10px; color:white;"></i>{{ $nav->name }}</span></a>
                                            </li>
                                            @endif
                                        @else
                                            @if($nav->is_show === 1)
                                            <li>
                                                <a href="#submenu{{ $i }}" data-bs-toggle="collapse" class="nav-link px-0 align-middle">
                                                    <i class="fs-4 bi-grid"></i> <span class="ms-0 d-none d-sm-inline" style="color:white ;"><i class="{{ $nav->icon }}" style="margin-right: 10px; color:white"></i>{{ $nav->name}}<i class="fa fa-caret-down" aria-hidden="true" style="margin-left: 10px;"></i></span>
                                                </a>
                                                <ul class="collapse nav flex-column ms-0" id="submenu{{$i}}" data-bs-parent="#menu" style="background-color: #363434; width: 185px; padding-left: 23px;">
                                                    @php
                                                    $subnav = subnav($nav->id);
                                                    @endphp
                                                    @foreach($role_has_sub_navigation as $sub_nav)
                                                        @foreach($subnav as $sub)
                                                            @if($sub->id === $sub_nav->sub_navigation_id)
                                                                @if($sub->is_show === 1)
                                                                <li class="w-100">
                                                                    <a href="{{ url(''.$sub->route) }}" class="nav-link px-0"> <span class="d-none d-sm-inline" style="color:white ;">{{ $sub->name }}</span></a>
                                                                </li>
                                                                @endif
                                                                <!-- <li>
                                                                    <a href="#" class="nav-link px-0"> <span class="d-none d-sm-inline" style="color:white ;">View Navigation</span></a>
                                                                </li> -->
                                                            @endif
                                                        @endforeach
                                                    @endforeach
                                                </ul>
                                            </li>
                                            @endif
                                        @endif
                                        @php
                                        $i++;
                                        @endphp
                                    @endif
                                @endforeach
                            @endforeach
                        </ul>
                        <hr>
                        <!-- <div class="dropdown pb-4">
                            <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                                <img src="https://github.com/mdo.png" alt="hugenerd" width="30" height="30" class="rounded-circle">
                                <span class="d-none d-sm-inline mx-1">loser</span>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
                                <li><a class="dropdown-item" href="#">New project...</a></li>
                                <li><a class="dropdown-item" href="#">Settings</a></li>
                                <li><a class="dropdown-item" href="#">Profile</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="#">Sign out</a></li>
                            </ul>
                        </div> -->
                    </div>
                </div>
                @endguest
                <div class="col py-3">
                    <div class="container" style="margin-top: 50px;">
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>