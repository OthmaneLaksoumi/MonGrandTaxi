<x-master title="Profile">

    <aside
        class="mt-5 sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark"
        id="sidenav-main">
        <hr class="horizontal light mt-0 mb-2">
        <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link text-white " href="{{ route('driver.profile', $driver) }}">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">person</i>
                        </div>
                        <span class="nav-link-text ms-1">Profile</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white " href="{{ route('my_route') }}">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">route</i>
                        </div>
                        <span class="nav-link-text ms-1">My Route</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{ route('horaires.show') }}">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">route</i>
                        </div>
                        <span class="nav-link-text ms-1">My Horaire</span>
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
                                        {{-- <div class="col-md-4 text-end">
                                            <a href="javascript:;">
                                                <i class="fas fa-user-edit text-secondary text-sm"
                                                    data-bs-toggle="tooltip" data-bs-placement="top"
                                                    title="Edit Profile"></i>
                                            </a>
                                        </div> --}}
                                    </div>
                                </div>
                                <div class="card-body p-3">
                                    <p class="text-sm">
                                        {{ $driver->description }}
                                    </p>
                                    <hr class="horizontal gray-light my-4">
                                    <ul class="list-group">
                                        <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong
                                                class="text-dark">Full Name:</strong> &nbsp; {{ $user->name }}</li>
                                        <li class="list-group-item border-0 ps-0 text-sm"><strong
                                                class="text-dark">Mobile:</strong> &nbsp; {{ $user->phone }}</li>
                                        <li class="list-group-item border-0 ps-0 text-sm"><strong
                                                class="text-dark">Email:</strong> &nbsp; {{ $user->email }}</li>
                                        <li class="list-group-item border-0 ps-0 text-sm"><strong
                                                class="text-dark">Route:</strong> &nbsp;
                                            @if ($route === null)
                                                Undefined
                                            @else
                                                {{ $route->start_city }} -
                                                {{ $route->end_city }}
                                            @endif
                                        </li>
                                        <li class="list-group-item border-0 ps-0 text-sm">
                                            <form method="POST" action="{{ route('change_status', $driver) }}">
                                                @csrf
                                                <strong class="text-dark">Status:</strong> &nbsp;
                                                <select style="display: inline" class="form-select w-50" name="status">

                                                    <option value="Available"
                                                        @if ($driver->status === 'Available') selected @endif>Available
                                                    </option>
                                                    <option value="En route"
                                                        @if ($driver->status === 'En route') selected @endif>En route
                                                    </option>
                                                    <option value="Not available"
                                                        @if ($driver->status === 'Not available') selected @endif>Not available
                                                    </option>
                                                </select>
                                                <input class="bg-dark text-white border-0"
                                                    @if ($route === null) type="button" onclick="alert('Please choose a route');" @else type="submit" @endif
                                                    value="Edit">
                                            </form>

                                        </li>
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
