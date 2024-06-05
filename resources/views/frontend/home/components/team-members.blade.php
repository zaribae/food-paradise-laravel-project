<!--=============================
    TEAM START
==============================-->
<section class="fp__team pt_95 xs_pt_65 pb_50">
    <div class="container">

        <div class="row wow fadeInUp" data-wow-duration="1s">
            <div class="col-md-8 col-lg-7 col-xl-6 m-auto text-center">
                <div class="fp__section_heading mb_25">
                    <h4>{!! @$sectionTitles['chef_top_title'] !!}</h4>
                    <h2>{!! @$sectionTitles['chef_main_title'] !!}</h2>
                    <span>
                        <img src="images/heading_shapes.png" alt="shapes" class="img-fluid w-100">
                    </span>
                    <p>{!! @$sectionTitles['chef_sub_title'] !!}</p>
                </div>
            </div>
        </div>

        <div class="row team_slider">
            @foreach ($chef as $chef)
                <div class="col-xl-3 wow fadeInUp" data-wow-duration="1s">
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
    </div>
</section>
<!--=============================
    TEAM END
==============================-->
