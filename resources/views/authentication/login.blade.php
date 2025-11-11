@extends('authentication.layouts.master')

@section('content')
    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-8 offset-2">
                                <div class="text-center">
                                    <img src="{{ asset('logoImages/Mentora Logo main.png') }}" alt="Fav Icon"
                                        class="w-50 h-50">
                                </div>
                                <div class="pt-2 pb-5 px-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Login as Mentora Admin!</h1>
                                    </div>
                                    <form class="user" method="POST" action="{{ url('login') }}">
                                        @csrf

                                        <div class="form-group">
                                            <input type="email"
                                                class="form-control form-control-user
                                            @error('email')
                                                is-invalid
                                            @enderror"
                                                id="exampleInputEmail" aria-describedby="emailHelp"
                                                placeholder="Enter Email Address..." name="email"
                                                value="{{ old('email') }}">
                                            @error('email')
                                                <small class="invalid-feedback">{{ $message }}</small>
                                            @enderror

                                        </div>
                                        <div class="form-group">
                                            <input type="password"
                                                class="form-control form-control-user
                                            @error('password')
                                                is-invalid
                                            @enderror"
                                                id="exampleInputPassword" placeholder="Password" name="password"
                                                value="">
                                            @error('password')
                                                <small class="invalid-feedback">{{ $message }}</small>
                                            @enderror

                                        </div>

                                        <button type="submit" class="btn btn-primary btn-user btn-block">
                                            Login
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>
@endsection
