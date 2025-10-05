@extends('layouts.backend.guest')
@section('title', 'Login')

@section('content')

    <div class="row flex-center position-relative py-5">
        <div class="col-xl-12 mx-auto">
            {{-- Validation Errors --}}
            @if ($errors->any())
                <div class="alert alert-danger alert-dismissible fade show d-flex align-items-center" role="alert">
                    <span class="fas fa-times-circle text-light fs-5 mr-3"></span>
                    <div class="flex-fill">
                        @foreach ($errors->all() as $message)
                            <p class="mb-0"><strong>{{ $message }}</strong></p>
                        @endforeach
                    </div>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            {{-- Session Success --}}
            @if (session()->has('success'))
                <div class="alert alert-warning alert-dismissible fade show d-flex align-items-center"
                    role="alert">
                    <span class="fas fa-check-circle text-success fs-5 mr-3"></span>
                    <p class="mb-0 flex-fill"><b>{{ session('success') }}</b></p>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

        </div>
    </div>
    <div class="login-box">

        <div class="login-logo">
            <a href="{{ url('/admin') }}"><b>Admin</b></a>
        </div>
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
                <div class="text-center">
                    <img src="{{ asset('backend/assets/img/logoh.png') }}" alt="NexCodeForge Logo"
                        class="brand-image img-circle elevation-3" style="opacity: .8; width: 100px;">
                </div>
                <p class="login-box-msg">Sign in to start your session</p>

                <form action="{{ route('login.submit') }}" method="POST">
                    @csrf

                    <div class="input-group mb-3">
                        <input type="email" name="email" class="form-control" placeholder="Email" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>

                    <div class="input-group mb-3">
                        <input type="password" id="password" name="password" class="form-control" placeholder="Password"
                            required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-eye" id="togglePassword" style="cursor: pointer;"></span>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-8">
                            <div class="icheck-primary">
                                <input type="checkbox" name="remember" id="remember">
                                <label for="remember">Remember Me</label>
                            </div>
                        </div>
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                        </div>
                    </div>
                </form>

                {{-- <div class="social-auth-links text-center mb-3">
                    <p>- OR -</p>
                    <a href="#" class="btn btn-block btn-primary">
                        <i class="fab fa-facebook mr-2"></i> Sign in using Facebook
                    </a>
                    <a href="#" class="btn btn-block btn-danger">
                        <i class="fab fa-google-plus mr-2"></i> Sign in using Google+
                    </a>
                </div> --}}
                <!-- /.social-auth-links -->

                {{-- <p class="mb-1">
                    <a href="forgot-password.html">I forgot my password</a>
                </p>
                <p class="mb-0">
                    <a href="register.html" class="text-center">Register a new membership</a>
                </p> --}}
            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
@endsection
