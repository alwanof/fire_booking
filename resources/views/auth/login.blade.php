@extends('layouts.auth')

@section('login-box')
<div class="login-box">
    <div class="login-logo">
        <a href="#"><b>Admin</b>{{ config('app.name', 'Laravel') }}</a>
    </div>

    <div class="card">
        <div class="card-body login-card-body">
            <p class="login-box-msg">{{__('Sign in to start your session')}}</p>

            <form form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="input-group mb-3">
                    <input type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                        id="email" placeholder="Email" value="{{ old('email') }}" required autocomplete="email"
                        autofocus>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="input-group mb-3">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                        name="password" required autocomplete="current-password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="row">
                    <div class="col-8">
                        <div class="icheck-primary">
                            <input type="checkbox" id="remember" name="remember">
                            <label for="remember">
                                {{__('Remember Me')}}
                            </label>
                        </div>
                    </div>

                    <div class="col-4">
                        <button type="submit" class="btn btn-primary btn-block">{{__('Sign In')}}</button>
                    </div>

                </div>
            </form>

            <p class="mb-0">
                <a href="{{ route('register') }}" class="text-center">{{__('Register a new membership')}}</a>
            </p>
        </div>
    </div>
</div>
@endsection
