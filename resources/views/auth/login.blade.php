@extends('layouts.root')

@section('content')
    <div class="auth-wrapper d-flex no-block justify-content-center align-items-center"
        style="background:url({{ asset('dash/assets/images/big/auth-bg.jpg') }}) no-repeat center center;">
        <div class="auth-box">
            <div id="loginform">
                <div class="logo">
                    <span class="db"><img src="{{ asset('dash/assets/images/logo-icon.png') }}" alt="logo" /></span>
                    <h5 class="font-medium m-b-20">Sign In to Admin</h5>
                </div>
                <!-- Form -->
                <div class="row">
                    <div class="col-12">
                        <form class="form-horizontal m-t-20" method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="form-group">
                                <label for="">Email</label>
                                <input type="text" class="form-control form-control-lg" name="email"
                                    placeholder="Email" aria-label="Username" aria-describedby="basic-addon1">
                                <x-jet-input-error for="email"></x-jet-input-error>
                            </div>
                            <div class="form-group">
                                <label for="">Password</label>
                                <input type="password" class="form-control form-control-lg" name="password"
                                    placeholder="Password" aria-label="Password" aria-describedby="basic-addon1">
                                <x-jet-input-error for="password"></x-jet-input-error>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" name="remember"
                                            id="customCheck1">
                                        <label class="custom-control-label" for="customCheck1">Remember me</label>
                                        @if (Route::has('password.request'))
                                            <a href="{{ route('password.request') }}"  class="text-dark float-right"><i
                                                    class="fa fa-lock m-r-5"></i> Forgot pwd?</a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group text-center">
                                <div class="col-xs-12 p-b-20">
                                    <button class="btn btn-block btn-lg btn-info" type="submit">Log In</button>
                                </div>
                            </div>


                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>




   
@endsection
