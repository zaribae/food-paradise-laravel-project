@extends('frontend.layouts.master')

@section('content')
    <section class="fp__breadcrumb" style="background: url({{ asset(config('settings.breadcrumb')) }});">
        <div class="fp__breadcrumb_overlay">
            <div class="container">
                <div class="fp__breadcrumb_text">
                    <h1>Reset Password</h1>
                </div>
            </div>
        </div>
    </section>


    <section class="fp__signin" style="background: url({{ asset('frontend/images/login_bg.jpg') }});">
        <div class="fp__signin_overlay pt_125 xs_pt_95 pb_100 xs_pb_70">
            <div class="container">
                <div class="row wow fadeInUp" data-wow-duration="1s">
                    <div class="col-xxl-5 col-xl-6 col-md-9 col-lg-7 m-auto">
                        <div class="fp__login_area">
                            <h2>Welcome back!</h2>
                            <p>Reset Password</p>
                            <form method="POST" action="{{ route('password.store') }}">
                                @csrf
                                <div class="row">
                                    <input type="hidden" name="token" value="{{ $request->route('token') }}">
                                    <div class="col-xl-12">
                                        <div class="fp__login_imput">
                                            <label>Email</label>
                                            <input type="email" placeholder="Email" name="email"
                                                value="{{ old('email', $request->email) }}" required autofocus>
                                        </div>
                                        <div class="fp__login_imput">
                                            <label>Password</label>
                                            <input type="password" placeholder="Password" name="password" required>
                                        </div>
                                        <div class="fp__login_imput">
                                            <label>Confirm Password</label>
                                            <input type="password" placeholder="Password" name="password_confirmation"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-xl-12">
                                        <div class="fp__login_imput">
                                            <button type="submit" class="common_btn">Reset Password</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
