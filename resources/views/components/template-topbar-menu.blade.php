<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <div class="navbar-brand" style="font-size: 1rem">{{ "PPDB DEPATI AGUNG " . date("Y") }}</div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item {{ request()->routeIs('ppdb.home') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('ppdb.home') }}">Info PPDB</a>
                </li>
                <li class="nav-item {{ request()->routeIs('downloading') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('downloading') }}">Unduhan</a>
                </li>
                @guest
                <li class="nav-item {{ request()->routeIs('ppdb.daftar') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('ppdb.daftar') }}">Pendaftaran</a>
                </li>
                @else
                @can('siswa')
                <li class="nav-item {{ request()->routeIs('ppdb.profile') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('ppdb.profile') }}">Biodata</a>
                </li>
                @endcan
                @endguest
                <li class="nav-item">
                    <a class="nav-link" href="/">Beranda</a>
                </li>
                @guest
                <li class="nav-item mx-md-5">
                    <a class="btn text-light mt-1 col-12 border-0" href="{{ route('login') }}"><i
                            class="fa-solid fa-sign-in"></i> Login</a>
                </li>
                @else
                <li class="nav-item dropdown mx-md-5">
                    <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                        @if (Auth::user()->image)
                        <img src="{{ asset('storage/'.Auth::user()->image) }}" class="rounded-circle" width="30"
                            height="30">
                        @else
                        <img src="{{ asset('frontend/img/man-user.svg') }}" class="rounded-circle" width="30"
                            height="30">
                        @endif
                    </a>
                    <div class="dropdown-menu">
                        @can('admin')
                        <a class="dropdown-item px-2" href="{{ route('user.profile') }}">
                            @if (Auth::user()->image)
                            <img src="{{ asset('storage/'.Auth::user()->image) }}" class="rounded-circle" width="20"
                                height="20">
                            @else
                            <img src="{{ asset('frontend/img/man-user.svg') }}" class="rounded-circle" width="20"
                                height="20">
                            @endif
                            {{ Auth::user()->name }}
                        </a>
                        <a class="dropdown-item px-2" href="{{ route('dashboard') }}">
                            <i class="fa-solid fa-gauge"></i> Dashboard
                        </a>
                        <div class="dropdown-divider"></div>
                        @endcan
                        <form action="{{ route('logout') }}" method="post">
                            @csrf
                            <button type="submit" class="dropdown-item px-2">
                                <i class="fa-solid fa-sign-out"></i> Logout
                            </button>
                        </form>
                    </div>
                </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>