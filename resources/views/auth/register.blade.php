@extends('layouts.auth')

@section('login-box')
<div class="register-box">
    <div class="register-logo">
        <a href="#"><b>Admin</b>{{ config('app.name', 'Laravel') }}</a>
    </div>

    <div class="card">
        <div class="card-body register-card-body">
            <p class="login-box-msg">{{__('Register a new membership')}}</p>

            <form method="POST" enctype="multipart/form-data" action="{{ route('register') }}">
                @csrf
                <div class="input-group mb-3">
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                        value="{{ old('name') }}" required autocomplete="name" autofocus>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-user"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                        name="email" value="{{ old('email') }}" required autocomplete="email">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                        name="password" required autocomplete="new-password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                        required autocomplete="new-password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input id="avatar" type="file" class="form-control" name="avatar" required>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-image"></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        @error('avatar')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <!-- /.col -->
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary btn-block">{{__('Register')}}</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>



            <a href="login.html" class="text-center">{{__('I already have a membership')}}</a>
        </div>
        <!-- /.form-box -->
    </div><!-- /.card -->
    @endsection
