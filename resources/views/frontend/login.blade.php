@extends('layouts.master')
@section('title', 'DMS')

@section('content')
    <div class="content top-space">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <div class="account-content">
                    <h1 style="text-align:center;">Device Management System</h1>
                    <br>

                        <div class="row align-items-center justify-content-center">
                            <!-- Adjusted for alignment and spacing -->
                            <div class="col-md-6 col-lg-5 login-left text-center">
                                <img src="assets/img/logo1.png" class="img-fluid mb-3" alt="Doccure Login" style="max-width: 100%; height: auto;">
                                
                            </div>

                            <div class="col-md-12 col-lg-7 login-right">
                                <div class="login-header">
                                    <h3>Login <span>Admin</span></h3>
                                </div>
                                <form method="POST" action="{{ route('log_in') }}">
                                    @csrf
                                
                                    <div class="form-group form-focus">
                                        <label class="focus-label">Email</label>
                                        <input id="email" class="form-control floating" type="text" name="email" value="{{ old('name') }}" required autofocus>
                                    </div>
                                
                                    <div class="form-group form-focus">
                                        <label class="focus-label">Password</label>
                                        <input id="password" class="form-control floating" type="password" name="password" required autocomplete="current-password">
                                    </div>
                                
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary" style="background-color: #e8146c; border-color: #e8146c;">
                                            {{ __('Log In') }}
                                        </button>
                                    </div>
                                
                                    @if (Route::has('password.request'))
                                        <div class="text-center mt-3">
                                            <a href="{{ route('password.request') }}">
                                                {{ __('Forgot Your Password?') }}
                                            </a>
                                        </div>
                                    @endif
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
