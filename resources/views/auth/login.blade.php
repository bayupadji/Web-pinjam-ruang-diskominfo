@extends('layouts.app')
@section('title', 'Login')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5 p-3">
                <div class="card p-5 shadow-lg p-3 mb-5 bg-body rounded-5">
                    <div class="card-body">
                        <h1 class="text-center pb-3 fw-bold">LOGIN</h1>
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="form-floating mb-3">
                                <input name="email" type="email"
                                    class="form-control @error('email') is-invalid @enderror" id="floatingInput email"
                                    placeholder="Email Address" required autocomplete="email" value="{{ old('email') }}">
                                <label for="floatingInput">Email address</label>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-floating">
                                <input name="password" type="password"
                                    class="form-control  @error('password') is-invalid @enderror"
                                    id="floatingPassword password" placeholder="Password" required
                                    autocomplete="current-password">
                                <label for="floatingPassword">Password</label>

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="row justify-content-center pt-5">
                                <div class="col-auto">
                                    <button type="submit" class="btn btn-1">
                                        {{ __('Login') }}
                                    </button>
                                </div>
                            </div>

                            <div class="row justify-content-center py-2">
                                <div class="col-auto">
                                    <a>Belum punya akun?</a>
                                    <a class="link-register" href="{{ route('register') }}">
                                        {{ __('Daftar') }}</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
