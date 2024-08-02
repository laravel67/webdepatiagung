<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block sidebar collapse" style="background-color: rgb(0, 0, 0); height: 100vh;">
    <div class="sidebar-sticky">
        <ul class="nav flex-md-column">
            <li class="nav-item d-none d-md-block">
                <div class="nav-link text-light d-flex align-items-center">
                    <a href="{{ route('user.profile') }}">
                        @if (Auth::user()->image)
                        <img src="{{ asset('storage/' . Auth::user()->image) }}" width="50px" height="50px" class="rounded-circle"
                            alt="User Profile Image">
                        @else
                        <img src="{{ asset('frontend/img/man-user.svg') }}" width="50px" height="50px" class="rounded-circle"
                            alt="Default Profile Image">
                        @endif
                    </a>
                    <div class="ml-2">
                        <strong>
                            {{ Auth::user()->name }}
                        </strong>
                        <br>
                        <small>
                            {{ Auth::user()->role }}
                        </small>
                    </div>
                </div>
            </li>
            {{ $slot }}
        </ul>
    </div>
</nav>