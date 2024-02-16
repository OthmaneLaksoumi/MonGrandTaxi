<x-master :title="$user->name">

    <aside
        class="mt-5 sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark"
        id="sidenav-main">

        <hr class="horizontal light mt-0 mb-2">
        <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link text-white " href="{{ route('passenger.show', $user) }}">
                        {{-- <a class="nav-link text-white " href="{{ $driver->horaire_id('driver.profile', $driver) }}"> --}}
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">person</i>
                        </div>
                        <span class="nav-link-text ms-1">Profile</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white " href="{{ route('reservations.index') }}">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">route</i>
                        </div>
                        <span class="nav-link-text ms-1">My Reservations</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link text-white " href="{{ route('search') }}">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">route</i>
                        </div>
                        <span class="nav-link-text ms-1">Search For Travel</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link text-white" href="{{ route('horaires.show') }}">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">route</i>
                        </div>
                        <span class="nav-link-text ms-1">My Frequent Route</span>
                    </a>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link text-white " href="{{ route('logout') }}">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">logout</i>
                        </div>
                        <span class="nav-link-text ms-1">Logout</span>
                    </a>
                </li>
            </ul>
        </div>

    </aside>

    <div class="main-content position-relative max-height-vh-100 h-100">

        <div class="container-fluid px-2 px-md-4">
            <div class="page-header min-height-300 border-radius-xl mt-4"
                style="background-image: url('https://images.unsplash.com/photo-1531512073830-ba890ca4eba2?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1920&q=80');">
                <span class="mask  bg-gradient-primary  opacity-6"></span>
            </div>
            <div class="card card-body mx-3 mx-md-4 mt-n6">
                <div class="row gx-4 mb-2">
                    <div class="col-auto">
                        <div class="avatar avatar-xl position-relative">
                            <img src="{{ asset('storage/' . $user->image) }}" alt="profile_image"
                                class="w-100 border-radius-lg shadow-sm">
                        </div>
                    </div>
                    <div class="col-auto my-auto">
                        <div class="h-100">
                            <h5 class="mb-1 cap">
                                {{ $user->name }}
                            </h5>
                            <p class="mb-0 font-weight-normal text-sm">
                                Driver
                            </p>
                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="row">

                        <div class="col-12 col-xl-4">
                            <div class="card card-plain h-100">
                                <div class="card-header pb-0 p-3">
                                    <div class="row">
                                        <div class="col-md-8 d-flex align-items-center">
                                            <h6 class="mb-0">Profile Information</h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <ul class="list-group">
                                        <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong
                                                class="text-dark">Full Name:</strong> &nbsp; {{ $user->name }}</li>
                                        <li class="list-group-item border-0 ps-0 text-sm"><strong
                                                class="text-dark">Mobile:</strong> &nbsp; {{ $user->phone }}</li>
                                        <li class="list-group-item border-0 ps-0 text-sm"><strong
                                                class="text-dark">Email:</strong> &nbsp; {{ $user->email }}</li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>


</x-master>
