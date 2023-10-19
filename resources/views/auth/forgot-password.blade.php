@extends('layouts.root')


@section('content')


<div class="auth-wrapper d-flex no-block justify-content-center align-items-center"
style="background:url({{ asset('dash/assets/images/big/auth-bg.jpg') }}) no-repeat center center;">
<div class="auth-box">
    <div id="loginform">
        <div class="logo">
            <span class="db"><img src="{{ asset('dash/assets/images/logo-icon.png') }}" alt="logo" /></span>
             
        </div>
        <!-- Form -->
        <div class="row">
            <div class="col-12">
                <div class="mb-3">
                    {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
                </div>
    
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
    
                <x-jet-validation-errors class="mb-3" />
    
                <form method="POST" action="/forgot-password">
                    @csrf
    
                    <div class="mb-3">
                        <x-jet-label value="Email" />
                        <x-jet-input type="email" name="email" :value="old('email')" required autofocus />
                    </div>
    
                    <div class="d-flex justify-content-end mt-4">
                        <x-jet-button>
                            {{ __('Email Password Reset Link') }}
                        </x-jet-button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>
</div>


@endsection