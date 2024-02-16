<x-master title="Sign up">

    @include('partials.nav')

    <div class="page-header align-items-start min-vh-100"
        style="background-image: url('{{ asset('storage/assets/img/taxi-background.jpg') }}');">
        <span class="mask bg-gradient-dark opacity-6"></span>
        <div class="container my-auto">
            <div class="row">
                <div class="col-lg-4 col-md-8 col-12 mx-auto mt-5">
                    <div class="card z-index-0 fadeIn3 fadeInBottom ">
                        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                            <div class="bg-gradient-warning shadow-warning border-radius-lg py-3 pe-1">
                                <h4 class="text-white font-weight-bolder text-center mt-2 mb-0">Sign up</h4>
                            </div>
                        </div>
                        <div class="card-body">
                            <form role="form" class="text-start" method="POST"
                                action="{{ route('sign_up_action') }}">
                                @csrf

                                <div class="input-group input-group-outline my-3">
                                    <input type="text" name="name" class="form-control" placeholder="Full name">
                                </div>
                                <div class="input-group input-group-outline my-3">
                                    <input type="email" name="email" class="form-control" placeholder="Email">
                                </div>
                                <div class="input-group input-group-outline my-3">
                                    <input type="text" name="phone" class="form-control"
                                        placeholder="Phone Like 0601020304">
                                </div>
                                <div class="input-group input-group-outline my-3">
                                    <input type="password" name="password" class="form-control" placeholder="Password">
                                </div>
                                <div class="input-group input-group-outline mb-3">
                                    <input type="password" name="password_confirmation" class="form-control"
                                        placeholder="Confirm Password">
                                </div>

                                <div class="input-group input-group-outline mb-3">
                                    <select name="role" class="form-control">
                                        <option selected disabled>Account Type</option>
                                        <option value="passenger">passenger</option>
                                        <option value="driver">driver</option>
                                    </select>
                                </div>

                                <div class="text-center">
                                    <button type="submit" class="btn bg-gradient-warning w-100 my-4 mb-2">Sign
                                        up</button>
                                </div>
                                <p class="mt-4 text-sm text-center">
                                    Already have an account?
                                    <a href="{{ route('login') }}"
                                        class="text-warning text-gradient font-weight-bold">Sign in</a>
                                </p>
                            </form>
                            @if ($errors->any())
                                <div>
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>

                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-master>
