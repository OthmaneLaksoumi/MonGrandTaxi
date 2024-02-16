<x-master title="Driver sign up">

    @include('partials.nav')
    
    <div class="page-header align-items-start min-vh-100"
        style="background-image: url('{{ asset('storage/assets/img/taxi-background.jpg') }}');">
        <span class="mask bg-gradient-dark opacity-6"></span>
        <div class="container my-auto">
            <div class="row">
                <div class="col-lg-4 col-md-8 col-12 mx-auto mt-5">
                    <div class="card z-index-0 fadeIn3 fadeInBottom">
                        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                            <div class="bg-gradient-warning shadow-warning border-radius-lg py-3 pe-1">
                                <h4 class="text-white font-weight-bolder text-center mt-2 mb-0">Driver Sign up</h4>
                            </div>
                        </div>
                        <div class="card-body ">
                            <form role="form" class="text-start" method="POST"
                                action="{{ route('driver_sign_up_action') }}">
                                @csrf
                                {{-- <input type="text" name="name" class="form-control" value="{{ $user['name'] }}"
                                    hidden placeholder="Full name">

                                <input type="email" name="email" class="form-control" value="{{ $user['email'] }}"
                                    hidden placeholder="Email">

                                <input type="text" name="phone" class="form-control" value="{{ $user['phone'] }}"
                                    hidden placeholder="Phone Like 0601020304">

                                <input type="password" name="password" class="form-control" value="{{ $user['name'] }}"
                                    hidden placeholder="Password">

                                <input type="text" name="role" class="form-control" value="{{ $user['role'] }}"
                                    hidden > --}}

                                    <input type="text" name="user_id" class="form-control" value="{{ $user_id }}"
                                    hidden placeholder="Full name">


                                <div class="input-group input-group-outline my-3">
                                    <textarea class="form-control border-black border" name="description" cols="15" rows="5" placeholder="Your Description"></textarea>
                                </div>

                                

                                <div class="input-group input-group-outline mb-3">
                                    <select name="payment_method" class="form-control">
                                        <option selected disabled>Payment Method</option>
                                        <option value="cash">Cash</option>
                                        <option value="card">Card</option>
                                    </select>
                                </div>

                                <div class="input-group input-group-outline my-3">
                                    <input type="text" name="plate_number" class="form-control" placeholder="Plate Number">
                                </div>

                                <div class="input-group input-group-outline my-3">
                                    <input type="text" name="vehicle_type" class="form-control" placeholder="Vehicle Type">
                                </div>

                                <div class="text-center">
                                    <button type="submit" class="btn bg-gradient-warning w-100 my-4 mb-2">Sign
                                        up</button>
                                </div>
                                <p class="mt-4 text-sm text-center">
                                    Already have an account?
                                    <a href="../pages/sign-up.html"
                                        class="text-warning text-gradient font-weight-bold">Sign in</a>
                                </p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-master>
