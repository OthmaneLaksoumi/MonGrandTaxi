<x-master title="Search results">
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

    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">

        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-12">
                    <div class="card my-4">
                        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                            <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                                <h6 class="text-white text-capitalize ps-3">My Reservations</h6>
                            </div>
                        </div>
                        <div class="card-body px-0 pb-2">
                            <div class="table-responsive p-0">
                                <table class="table align-items-center mb-0">
                                    <thead>
                                        <tr>
                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Driver</th>
                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                Start City</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                End City</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Date Of Reservation</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Cancel</th>


                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($all_data as $data)
                                            <tr>
                                                <td>
                                                    <div class="d-flex px-2 py-1">
                                                        <div>
                                                            <img src="{{ asset('storage/' . $data->image) }}"
                                                                class="avatar avatar-sm me-3 border-radius-lg"
                                                                alt="user1">
                                                        </div>
                                                        <div class="d-flex flex-column justify-content-center">
                                                            <h6 class="mb-0 text-sm">{{ $data->name }}</h6>
                                                        </div>
                                                    </div>
                                                </td>



                                                <td class="align-middle text-start">
                                                    <span
                                                        class="text-secondary text-xs font-weight-bold">{{ $data->start_city }}</span>
                                                </td>

                                                <td class="align-middle text-center">
                                                    <span
                                                        class="text-secondary text-xs font-weight-bold">{{ $data->end_city }}</span>
                                                </td>

                                                <td class="align-middle text-center">
                                                    <span
                                                        class="text-secondary text-xs font-weight-bold">{{ $data->created_at }}</span>
                                                </td>

                                                @if ($data->status === 'Available')
                                                    <td class="align-middle text-center">
                                                        <form action="{{ route('reservations.destroy', $data->id) }}" method="post">
                                                            @method('delete')
                                                            @csrf
                                                            {{-- <input type="hidden" name="user_id" value="{{ $user->id }}">
                                                    <input type="hidden" name="driver_id" value="{{ $driver->id }}">
                                                    <input type="hidden" name="route_id" value="{{ $route->id }}">
                                                    <input type="hidden" name="horaire_id" value="{{ $driver->horaire_id }}"> --}}
                                                            <input class="btn btn-dark" type="submit" value="Cancel">
                                                        </form>
                                                    </td>
                                                @elseif($data->status === 'En route')
                                                    <span class="text-secondary text-xs font-weight-bold">You are in the
                                                        route</span>
                                                @endif

                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>


</x-master>
