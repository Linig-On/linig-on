@extends('layouts.app')

@section('content')
<div class="container">
    <nav style="--bs-breadcrumb-divider: url('{{ asset('svg/icon/breadcrumb-divider.svg') }}');" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/login" class="fw-bolder">Login</a></li>
            <li class="breadcrumb-item active" aria-current="page">As User</li>
        </ol>
    </nav>
</div>
<div class="container fade-in">
    <div class="card shadow border border-1 rounded-5 p-5">
        <div class="card-body px-5 py-4">
            <div class="row px-5 py-4 gx-5">
                <div class="col-md-6">
                    <h1 class="text-uppercase fw-bolder">Login as a user</h1>
                    <p>Don't have an account yet? 
                        <a href="/register/user" class="text-decoration-underline fw-bold">Sign Up</a>
                    </p>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="row mb-3">
                            <label for="email" class="small fw-bold">Email Address</label>
                            <div class="col-md-12">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong class="small text-danger">{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="password" class="small fw-bold">Password</label>

                            <div class="col-md-12">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong class="small text-danger>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="d-flex mb-3 justify-content-between">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                <label class="small" for="remember">
                                    {{ __('Remember Me') }}
                                </label>
                            </div>
                            <div>
                                @if (Route::has('password.request'))
                                <a class="small fw-bold text-decoration-underline" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                                @endif
                            </div>
                        </div>
                        <div class="d-flex justify-content-center">
                            <div></div>
                            <button type="submit" class="btn btn-primary ms-auto text-uppercase fw-bold">Login <i class="fa-solid fa-arrow-right-long text-white"></i></button>
                        </div>
                    </form>
                </div>
                <div class="col-md-6 d-flex justify-content-center flex-column gap-3">
                    <div class="text-center">
                        <img src="{{ asset('svg/illust/undraw-login.svg') }}" alt="" width="500">
                    </div>
                    <h5 class="text-uppercase fw-bolder">LINIG-ON, YOUR TRUSTED HOME SERVICE APPLICATION</h5>
                    <p>Our team provides janitorial services that is easily available within your fingertips, forget the hassle of doing everything by yourself. Sign up now! </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
