@extends('frontend.layouts.master')

@section('content')
    <section class="fp__breadcrumb" style="background: url({{ asset('frontend/images/counter_bg.jpg') }});">
        <div class="fp__breadcrumb_overlay">
            <div class="container">
                <div class="fp__breadcrumb_text">
                    <h1>Order</h1>
                    <ul>
                        {{-- <li><a href="{{ route('home') }}">home</a></li>
                        <li><a href="javascript:;">payment</a></li> --}}
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <section class="fp__payment_page mt_100 xs_mt_70 mb_100 xs_mb_70">
        <div class="container">
            <div class="row">
                <div class="text-center">
                    <div>
                        <i
                            class="fa fa-times font text-white display-1 bg-danger bg-gradient px-4 py-2 mb-4 rounded-circle"></i>
                    </div>
                    <h4>Transactions Failed!</h4>
                    <p><b class="mx-5">{{ session()->has('errors') ? session('errors')->first('error') : '' }}</b></p>
                    <a class="common_btn mt-4" href="{{ route('home') }}">Back to Home Page</a>
                </div>
            </div>
        </div>
    </section>
@endsection
