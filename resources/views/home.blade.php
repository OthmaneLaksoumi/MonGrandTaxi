<x-master title="Search For Travel">


    @include('partials.nav')

    <div class="page-header align-items-start min-vh-100"
        style="background-image: url('{{ asset('storage/assets/img/taxi-background.jpg') }}');">
        <span class="mask bg-gradient-dark opacity-6"></span>
        <div class="container my-auto">
            <div class="row">
                <div class="col-lg-4 col-md-8 col-12 mx-auto w-100">
                    <div class="card z-index-0 fadeIn3 fadeInBottom">
                        <div class="card-body">
                            <form role="form" class="text-start d-flex" method="get" action="{{ route('search_result') }}">
                                <div class="input-group input-group-outline m-3">
                                    <select class="form-control" required name="start_city" id="">
                                        <option selected disabled>Start City</option>
                                        @foreach ($cities as $city)
                                            <option>{{ $city }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="input-group input-group-outline m-3">
                                    <select class="form-control" required name="end_city" id="">
                                        <option selected disabled>Destination City</option>
                                        @foreach ($cities as $city)
                                            <option>{{ $city }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="input-group input-group-outline m-3">
                                    <input class="form-control" required type="date" name="date">
                                </div>
                                <div class="mx-5">
                                    <button type="submit"
                                        class="btn bg-gradient-primary w-100 my-4 mb-2">Search</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>

</x-master>
