<x-guest-layout>
  @section('content')
  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

        <div class="col-xl-10 col-lg-12 col-md-9">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg-6 d-none d-lg-block">
                            <img class="img-fluid text-center" src="{{asset('Template/img/OCC_LOGO.png')}}" alt="">
                        </div>
                        <div class="col-lg-6">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Grade Evaluation System !</h1>
                                </div>
                                <form method="POST" class="user" action="{{ route('login') }}">
                                    @csrf
                                    <div class="form-group">
                                        <input type="email" name="email"  class="form-control form-control-user @error('email') is-invalid @enderror"
                                            id="exampleInputEmail" value="{{ old('email') }}" aria-describedby="emailHelp"
                                            placeholder="Enter Email Address...">
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control form-control-user  @error('password') is-invalid @enderror"
                                            id="exampleInputPassword" name="password"  placeholder="Password">
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                    </div>

                                    <button  class="btn btn-primary btn-user btn-block">
                                        Login
                                    </button>



                                </form>
                                <hr>


                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>
  @endsection

</x-guest-layout>
