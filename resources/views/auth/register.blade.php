@extends('layouts.app')
@section('content')

<!-- Section: Design Block -->
<section class="text-start">
    <!-- Background image -->
    <div class="p-5 bg-image" style="
        background-image: url('https://mdbootstrap.com/img/new/textures/full/171.jpg');
        height: 300px;
        "></div>
    <!-- Background image -->

    <div class="card mx-4 mx-md-5 shadow-5-strong bg-body-tertiary" style="
        margin-top: -100px;
        backdrop-filter: blur(30px);
        ">
        <div class="card-body py-5 px-md-5">

            <div class="row d-flex justify-content-center">
                <div class="col-lg-8">
                    <h2 class="fw-bold mb-3">Sign up now</h2>
                    <hr>
                    <form action="{{ route('register') }}" method="POST">
                        @csrf
                        <div class="row g-3 py-4">
                            <div class="col-md-6">
                                <!-- Fullname input -->
                                <div data-mdb-input-init class="form-outline mb-4">
                                    <label class="form-label" for="form3Example1">Full name</label>
                                    <input type="text" id="form3Example1" name="full_name" class="form-control w-75" autofocus />
                                    <span @if ($errors->has('full_name')) class="text-danger mt-2" @endif>{{ $errors->first('full_name') }}</span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <!-- Email input -->
                                <div data-mdb-input-init class="form-outline mb-4">
                                    <label class="form-label" for="form3Example3">Email address</label>
                                    <input type="email" id="form3Example3" name="email" class="form-control w-75" />
                                    <span @if ($errors->has('email')) class="text-danger mt-2" @endif>{{ $errors->first('email') }}</span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <!-- Password input -->
                                <div data-mdb-input-init class="form-outline mb-4">
                                    <label class="form-label" for="form3Example4">Password</label>
                                    <input type="password" id="form3Example4" name="password" class="form-control w-75" />
                                    <span @if ($errors->has('password')) class="text-danger mt-2" @endif>{{ $errors->first('password') }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <!-- Confirm Password input -->
                            <div data-mdb-input-init class="form-outline mb-4">
                                <label class="form-label" for="password_confirmation">Confirm Password</label>
                                <input type="password" id="password_confirmation" name="password_confirmation" class="form-control w-75" />
                            </div>
                        </div>

                        <!-- Submit button -->
                        <button type="submit" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-block mb-4">
                            Sign up
                        </button>
                    </form>
                    <br>
                    <p>Already a member?</p>
                    <a href="{{ route('show.login') }}" class="link-danger ">Login</a>
                    <hr>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection