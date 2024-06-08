@extends('frontend.layouts.master')

@section('content')
    <section class="fp__breadcrumb" style="background: url({{ asset('frontend/images/counter_bg.jpg') }});">
        <div class="fp__breadcrumb_overlay">
            <div class="container">
                <div class="fp__breadcrumb_text">
                    <h1>Meet Our Expert Chefs</h1>
                    <ul>
                        <li><a href="{{ route('home') }}">home</a></li>
                        <li><a href="javascript:;">chefs</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <section class="fp__team_page pt_95 xs_pt_65 pb_100 xs_pb_70">
        <div class="container">
            <div class="row">
                @foreach ($chefs as $chef)
                    <div class="col-xl-3 col-sm-6 col-lg-4 wow fadeInUp" data-wow-duration="1s">
                        <div class="fp__single_team">
                            <div class="fp__single_team_img">
                                <img src="{{ asset($chef->image) }}" alt="team" class="img-fluid w-100">
                            </div>
                            <div class="fp__single_team_text">
                                <h4>{{ $chef->name }}</h4>
                                <p>{{ $chef->title }}</p>
                                <ul class="d-flex flex-wrap justify-content-center">
                                    @if ($chef->fb !== null)
                                        <li><a href="{{ $chef->fb }}"><i class="fab fa-facebook-f"></i></a></li>
                                    @endif
                                    @if ($chef->in !== null)
                                        <li><a href="{{ $chef->in }}"><i class="fab fa-linkedin-in"></i></a></li>
                                    @endif
                                    @if ($chef->x !== null)
                                        <li><a href="{{ $chef->x }}"><i class="fab fa-twitter"></i></a></li>
                                    @endif
                                    @if ($chef->in !== null)
                                        <li><a href="{{ $chef->ig }}"><i class="fab fa-instagram"></i></a></li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            @if ($chefs->hasPages())
                <div class="fp__pagination mt_60">
                    <div class="row">
                        <div class="col-12">
                            {{ $chefs->links() }}
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </section>
@endsection
