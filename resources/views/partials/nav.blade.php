@php
    use Illuminate\Support\Facades\Auth;
@endphp

<div class="container position-sticky z-index-sticky top-0">
    <div class="row">
        <div class="col-12">
            <!-- Navbar -->
            <nav
                class="navbar navbar-expand-lg blur border-radius-xl top-0 z-index-3 shadow position-absolute my-3 py-2 start-0 end-0 mx-4">
                <div class="container-fluid ps-2 pe-0">
                    <a class="navbar-brand font-weight-bolder ms-lg-0 ms-3 " href="{{ route('search') }}">
                        Mon Grand Taxi
                    </a>
                    <button class="navbar-toggler shadow-none ms-2" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navigation" aria-controls="navigation" aria-expanded="false"
                        aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon mt-2">
                            <span class="navbar-toggler-bar bar1"></span>
                            <span class="navbar-toggler-bar bar2"></span>
                            <span class="navbar-toggler-bar bar3"></span>
                        </span>
                    </button>
                    <div class="collapse navbar-collapse" id="navigation">
                        <ul class="navbar-nav mx-auto">
                            @guest
                                <li class="nav-item">
                                    <a class="nav-link me-2" href="{{ route('sign_up') }}">
                                        <i class="fas fa-user-circle opacity-6 text-dark me-1"></i>
                                        Sign Up
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link me-2" href="{{ route('login') }}">
                                        <i class="fas fa-key opacity-6 text-dark me-1"></i>
                                        Sign In
                                    </a>
                                </li>
                            @endguest

                            @auth

                                @if (auth::user()->role === 'passenger')
                                    <li class="nav-item">
                                        <a class="nav-link me-2" href="{{ route('passenger.show', auth::user()) }}">
                                            <i class="fas fa-user-circle opacity-6 text-dark me-1"></i>
                                            Profile
                                        </a>
                                    </li>
                                @endif

                                @if (auth::user()->role === 'driver')
                                    <li class="nav-item">
                                        <a class="nav-link me-2" href="{{ route('my_route') }}">
                                            <i class="fas fa-user-circle opacity-6 text-dark me-1"></i>
                                            Dashboard
                                        </a>
                                    </li>
                                @endif

                                @if (auth::user()->role === 'admin')
                                    <li class="nav-item">
                                        <a class="nav-link me-2" href="{{ route('dashboard_admin') }}">
                                            <i class="fas fa-user-circle opacity-6 text-dark me-1"></i>
                                            Dashboard
                                        </a>
                                    </li>
                                @endif
                                <li class="nav-item">
                                    <a class="nav-link me-2" href="{{ route('logout') }}">
                                        <i class="fas fa-user-circle opacity-6 text-dark me-1"></i>
                                        Sign out
                                    </a>
                                </li>
                            @endauth


                        </ul>
                        {{-- <ul class="navbar-nav d-lg-flex d-none">
                <li class="nav-item d-flex align-items-center">
                  <a class="btn btn-outline-primary btn-sm mb-0 me-2" target="_blank" href="https://www.creative-tim.com/builder?ref=navbar-material-dashboard">Sign Up</a>
                </li>
                <li class="nav-item">
                  <a href="https://www.creative-tim.com/product/material-dashboard" class="btn btn-sm mb-0 me-1 bg-gradient-dark">Sign Up</a>
                </li>
              </ul> --}}
                    </div>
                </div>
            </nav>
            <!-- End Navbar -->
        </div>
    </div>
</div>
