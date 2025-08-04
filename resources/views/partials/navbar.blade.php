{{-- <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm mb-5 mt-3"
    style="max-width: 90%; margin: 0 auto; border-radius:20px;  ">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            <img src="{{ asset('logo.png') }}" width="40" alt="">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mx-auto">
                <li class="nav-item">
                    <a href="{{ route('home.page') }}" class="nav-link {{ request()->is('/') ? 'active' : '' }}">
                        Home
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('about.page') }}" class="nav-link {{ request()->is('about') ? 'active' : '' }}">
                        About
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('categories.page') }}"
                        class="nav-link {{ request()->is('categories') ? 'active' : '' }}">
                        Categories
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('library.page') }}"
                        class="nav-link {{ request()->is('library') ? 'active' : '' }}">
                        Library
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('contact.page') }}"
                        class="nav-link {{ request()->is('contact') ? 'active' : '' }}">
                        Contact
                    </a>
                </li>
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ms-auto">
                <!-- Authentication Links -->
                @guest
                    @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                    @endif

                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">

                            @if (Auth::user()->role == 'admin')
                                <a href="{{ route('categories.index') }}" class="dropdown-item">Category</a>
                                <a href="{{ route('books.create') }}" class="dropdown-item">
                                    Upload book
                                </a>
                            @endif
                            
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>

            <form action="{{ route('search.page') }}" method="GET">
                <div class="input-group">
                    <input type="text" placeholder="Search" name="search" class="form-control">
                    <button class="btn btn-warning" style="padding: 5px 10px; color: #000000;">
                        <i class="fa-solid fa-search"></i>
                    </button>
                </div>
            </form>
        </div>
    </div>
</nav> --}}

<header class="sticky-top">
    <nav class="navbar navbar-expand-lg bg-white shadow">
        <div class="nav container ">
            <a class="navbar-brand me-auto ps-4 ps-md-0" href="#">
                <img src="{{ asset('logo.png') }}" width="40" alt="">
                <h3 class=" d-inline-block text-warning">E-lib<span class="text-success">rary   </span></h3>
            </a>
            <button class="navbar-toggler d-lg-none" type="button" data-bs-toggle="collapse"
                data-bs-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="collapsibleNavId">
                <ul class="navbar-nav me-auto mt-2 mt-lg-0">
                    <li class="nav-item ps-2 ps-md-5">
                        <a class="nav-link {{ request()->is('/') ? 'active' : '' }}" href="{{ route('home.page') }}"
                            aria-current="page">Home
                            <span class="visually-hidden">(current)</span></a>
                    </li>
                    <li class="nav-item ps-2">
                        <a class="nav-link {{ request()->is('about') ? 'active' : '' }}"
                            href="{{ route('about.page') }}">About</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('categories.page') }}" class="nav-link  {{ request()->is('categories') ? 'active' : '' }}">
                            Categories
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('library.page') }}" class="nav-link {{ request()->is('library') ? 'active' : '' }}">
                            Library
                        </a>
                    </li>
                    <li class="nav-item ps-2">
                        <a class="nav-link {{ request()->is('contact') ? 'active' : '' }}"
                            href="{{ route('contact.page') }}">Contact</a>
                    </li>
                </ul>
                <form action="{{ route('search.page') }}" method="GET">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="search" name="search">
                    {{-- <button class="btn btn-warnin" style="padding: 5px 10px; color:black">
                        <i class="fa-solid fa-search"></i>
                    </button> --}}
                </div>
            </form>
                @guest
                <div class="nav-items d-flex justify-content-center  align-items-center ms-5 me-0 gap-4">
                    <a href="{{ route('login') }}" class="login btn btn-success py-2 ">LOGIN</a>
                    <a href="{{ route('register') }}" class=" nav-link text-success p-0  pri">SIGN UP</a>
                </div>
                @else
                    <div class="dropdown bg-w">
                        <button class="nav-link dropdown-toggle text-success" type="button" id="triggerId"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{ Auth::user()->name }}
                        </button>
                        <div class="dropdown-menu" aria-labelledby="triggerId">
                            @if (Auth::user()->role == 'admin')
                            <a href="{{ route('categories.index') }}" class="dropdown-item">Categories</a>                                
                            <a href="{{ route('books.create') }}" class="dropdown-item">Upload book</a>                                
                            <a href="{{ route('advert.page') }}" class="dropdown-item">Advert</a>                                
                            @endif
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button class="dropdown-item text-danger    "> Logout </button>
                            </form>
                        </div>
                    </div>
                @endguest
            </div>
        </div>
    </nav>
</header>