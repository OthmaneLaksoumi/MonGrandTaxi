<x-master title="Sign in">


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
                                <h4 class="text-white font-weight-bolder text-center mt-2 mb-0">Sign in</h4>
                            </div>
                        </div>
                        <div class="card-body">
                            <form role="form" class="text-start" method="POST" action="{{ route('login_action') }}">
                                @csrf
                                <div class="input-group input-group-outline my-3">
                                    <input type="email" name="email" class="form-control w-100" value="{{ old('email') }}" placeholder="Email">
                                    @if (session()->has('email_not_found'))
                                        <div class="text-danger ">{{ session('email_not_found') }}</div>
                                    @endif
                                </div>
                               
                                <div class="input-group input-group-outline my-3">
                                    <input type="password" name="password" class="form-control w-100" placeholder="Password">
                                    @if (session()->has('password_not_correct'))
                                        <div class="text-danger ">{{ session('password_not_correct') }}</div>
                                    @endif
                                </div>

                                <div class="text-center">
                                    <button type="submit" class="btn bg-gradient-warning w-100 my-4 mb-2">Sign
                                        in</button>
                                </div>
                                <p class="mt-4 text-sm text-center">
                                    Don't have an account?
                                    <a href="{{ route('sign_up') }}"
                                        class="text-warning text-gradient font-weight-bold">Sign up</a>
                                </p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-master>
