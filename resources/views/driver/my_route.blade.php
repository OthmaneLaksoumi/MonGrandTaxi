<x-master title="My Route">
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
                    {{-- {{ route('my_horarie') }} --}}
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

    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">

        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-12">
                    <div class="card my-4">
                        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                            <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                                <h6 class="text-white text-capitalize ps-3">My Route</h6>
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
                                                Join in</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <div class="d-flex px-2 py-1">
                                                    <div>
                                                        <img src="{{ asset('storage/profile.jpg') }}"
                                                            class="avatar avatar-sm me-3 border-radius-lg"
                                                            alt="user1">
                                                    </div>
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-sm">{{ $user->name }}</h6>
                                                        <p class="text-xs text-secondary mb-0">{{ $user->email }}</p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <p class="text-xs font-weight-bold mb-0">
                                                    @if ($route === null)
                                                        Undefined
                                                    @else
                                                        {{ $route->start_city }}
                                                    @endif
                                                </p>
                                            </td>
                                            <td>
                                                <p class="text-xs font-weight-bold mb-0 text-center">
                                                    @if ($route === null)
                                                        Undefined
                                                    @else
                                                        {{ $route->end_city }}
                                                    @endif
                                                </p>
                                            </td>
                                            {{-- <td class="align-middle text-center text-sm">
                                                <span class="badge badge-sm bg-gradient-success">Online</span>
                                            </td> --}}
                                            <td class="align-middle text-center">
                                                <span
                                                    class="text-secondary text-xs font-weight-bold">{{ explode(' ', $user->created_at)[0] }}</span>
                                            </td>

                                            
                                            {{-- <td class="align-middle">
                                                <a href="javascript:;" class="text-secondary font-weight-bold text-xs"
                                                    data-toggle="tooltip" data-original-title="Edit user">
                                                    Edit
                                                </a>
                                            </td> --}}
                                        </tr>
                                    </tbody>
                                </table>
                                <h5 class="mt-5 text-center">Choose Your Route</h5>
                                <form class="d-flex justify-content-center" method="POST"
                                    action="{{ route('choose_route', $driver) }}">
                                    @csrf
                                    <select name="route" class="form-select w-50 mx-5" id="">
                                        @foreach ($routes as $r)
                                            <option value="{{ $r->id }}"
                                                @if ($route == $r) selected @endif>
                                                {{ $r->start_city }} - {{ $r->end_city }}</option>
                                        @endforeach
                                    </select>
                                    <input class="form-control w-10" id="date" min="{{ date('Y-m-d') }}"
                                        max="{{ date('Y-m-d', strtotime('+1 days', time())) }}" type="date"
                                        name="date" required>

                                    <input class="btn btn-dark" type="submit" value="Choose">
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>


</x-master>
