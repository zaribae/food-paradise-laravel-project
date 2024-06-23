<!--=============================
    COUNTER START
==============================-->
<section class="fp__counter" style="background: url({{ @$counter->background }});">
    <div class="fp__counter_overlay pt_100 xs_pt_70 pb_100 xs_pb_70">
        <div class="container">
            <div class="row">
                <div class="col-xl-3 col-sm-6 col-lg-3 wow fadeInUp" data-wow-duration="1s">
                    <div class="fp__single_counter">
                        <i class="{{ @$counter->icon_one }}"></i>
                        <div class="text">
                            <h2 class="counter">{{ @$counter->count_one }}</h2>
                            <p>{{ @$counter->name_one }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 col-lg-3 wow fadeInUp" data-wow-duration="1s">
                    <div class="fp__single_counter">
                        <i class="{{ @$counter->icon_two }}"></i>
                        <div class="text">
                            <h2 class="counter">{{ @$counter->count_two }}</h2>
                            <p>{{ @$counter->name_two }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 col-lg-3 wow fadeInUp" data-wow-duration="1s">
                    <div class="fp__single_counter">
                        <i class="{{ @$counter->icon_three }}"></i>
                        <div class="text">
                            <h2 class="counter">{{ @$counter->count_three }}</h2>
                            <p>{{ @$counter->name_three }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 col-lg-3 wow fadeInUp" data-wow-duration="1s">
                    <div class="fp__single_counter">
                        <i class="{{ @$counter->icon_four }}"></i>
                        <div class="text">
                            <h2 class="counter">{{ @$counter->count_four }}</h2>
                            <p>{{ @$counter->name_four }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--=============================
     COUNTER END
==============================-->
