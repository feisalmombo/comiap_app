@extends('layouts.guest-minimal')

@section("bg")
    bg-primary
@endsection

@section('content')
    <div class="container">
        <div class="row align-items-center" style="height: 100vh">
            <div class="col-md-5 mr-auto text-light">
                <h1 style="font-weight: 300; font-size: 48px; line-height: 56px;">Welcome to</h1>
                <h2 style="font-weight:normal; font-size: 24px; line-height: 170.69%;">COMIAP</h2>
                <p class="lead">For Public health purpose, it is important that you register before using this service. While you are required to register, your confidentiality and privacy is paramount to our service.</p>
                <p>Don't have an account | <strong><a href="/register" class="text-light">Sign Up Now</a></strong></p>
            </div>
            <div class="col-md-5">
                <div class="card ">
                    <div class="card-body text-dark">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        
                        <form action="{{ route('password.email') }}" method="post">
                            @csrf

                            <h2>{{ __('Reset Password') }}</h2>
                            <div class="form-group">
                                <label for="email" class="label-control">Enter your Username</label>
                                <input type="text" name="email" class="form-control rounded-pill @error('email') is-invalid @enderror" placeholder="me@example.com" value="{{ old('email') }}">
                                @error("email")
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary px-5">{{ __('Send Password Reset Link') }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection