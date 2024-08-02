<nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0">
    <a class="navbar-brand col-md-3 col-lg-2 mr-0 px-3" href="#">PPS DEPATI AGUNG</a>
    <button class="navbar-toggler position-absolute d-md-none collapsed border-0" type="button" data-toggle="collapse"
        data-target="#sidebarMenu">
        <span class="navbar-toggler-icon text-light"></span>
    </button>
    {{-- <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
    --}}
    <ul class="navbar-nav px-3 mx-md-4">
        <li class="nav-item text-nowrap">
            <form action="{{ route('logout') }}" method="post">
                @csrf
                <button class="btn btn-link nav-link" type="submit"><i class="fa-solid fa-sign-out"></i>
                    Logout</button>
            </form>
        </li>
    </ul>
    <ul class="navbar-nav px-3 d-md-none d-flex">
        <li class="nav-item text-nowrap">
            <a href="{{ route('user.profile') }}">
                @if (Auth::user()->image)
                <img src="{{ asset('storage/' . Auth::user()->image) }}" width="35px" height="35px" class="rounded-circle"
                    alt="User Profile Image">
                @else
                <img src="{{ asset('frontend/img/man-user.svg') }}" width="35px" height="35px" class="rounded-circle"
                    alt="Default Profile Image">
                @endif
            </a>
        </li>
    </ul>
</nav>