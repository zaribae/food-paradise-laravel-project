<footer>
    @php
        $footerInfo = \App\Models\FooterInfo::first();
    @endphp
    <div class="footer_overlay pt_100 xs_pt_70 pb_100 xs_pb_70">
        <div class="container wow fadeInUp" data-wow-duration="1s">
            <div class="row justify-content-between">
                <div class="col-lg-4 col-sm-8 col-md-6">
                    <div class="fp__footer_content">
                        <a class="footer_logo" href="index.html">
                            <img src="{{ asset('frontend/images/footer_logo.png') }}" alt="FoodPark"
                                class="img-fluid w-100">
                        </a>
                        @if (@$footerInfo->short_description)
                            <span>{{ @$footerInfo->short_description }}</span>
                        @endif
                        @if (@$footerInfo->address)
                            <p class="info"><i class="far fa-map-marker-alt"></i>{{ @$footerInfo->address }}</p>
                        @endif
                        @if (@$footerInfo->phone)
                            <a class="info" href="callto:1234567890123"><i
                                    class="fas fa-phone-alt"></i>{{ @$footerInfo->phone }}</a>
                        @endif
                        @if (@$footerInfo->email)
                            <a class="info" href="mailto:{{ @$footerInfo->email }}"><i class="fas fa-envelope"></i>
                                {{ @$footerInfo->email }}</a>
                        @endif
                    </div>
                </div>
                <div class="col-lg-2 col-sm-4 col-md-6">
                    <div class="fp__footer_content">
                        <h3>Short Link</h3>
                        <ul>
                            <li><a href="#">Home</a></li>
                            <li><a href="#">About Us</a></li>
                            <li><a href="#">Contact Us</a></li>
                            <li><a href="#">Our Service</a></li>
                            <li><a href="#">gallery</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2 col-sm-4 col-md-6 order-sm-4 order-lg-3">
                    <div class="fp__footer_content">
                        <h3>Help Link</h3>
                        <ul>
                            <li><a href="#">Terms And Conditions</a></li>
                            <li><a href="#">Privacy Policy</a></li>
                            <li><a href="#">Refund Policy</a></li>
                            <li><a href="#">FAQ</a></li>
                            <li><a href="#">contact</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-8 col-md-6 order-lg-4">
                    <div class="fp__footer_content">
                        <h3>subscribe</h3>
                        <form class="subscribe-form" method="post">
                            @csrf
                            <input type="text" placeholder="Subscribe" name="email">
                            <button type="submit" class="subscribe-btn">Subscribe</button>
                        </form>
                        @php
                            @$socials = \App\Models\SocialLink::where('status', 1)->get();
                        @endphp
                        <div class="fp__footer_social_link">
                            <h5>follow us:</h5>
                            <ul class="d-flex flex-wrap">
                                @foreach (@$socials as $social)
                                    <li><a href="{{ @$social->link }}"><i class="{{ @$social->icon }}"></i></a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="fp__footer_bottom d-flex flex-wrap">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="fp__footer_bottom_text d-flex flex-wrap justify-content-between">
                        <p>Copyright 2022 <b>FoodPark</b> All Rights Reserved.</p>
                        <ul class="d-flex flex-wrap">
                            <li><a href="#">FAQs</a></li>
                            <li><a href="#">payment</a></li>
                            <li><a href="#">settings</a></li>
                            <li><a href="#">privacy policy</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>

@push('scripts')
    <script>
        $(document).ready(function() {
            $('.subscribe-form').on('submit', function(e) {
                e.preventDefault();
                let formData = $(this).serialize();

                $.ajax({
                    method: 'POST',
                    url: "{{ route('subscribe-newsletter.store') }}",
                    data: formData,
                    beforeSend: function() {
                        $('.subscribe-btn').html(
                            "<span class='spinner-border spinner-border-sm' role='status' aria-hidden='true'></span>"
                        );
                    },
                    success: function(response) {
                        $('.subscribe-form').trigger('reset');
                        toastr.success(response.message);
                    },
                    error: function(jqXHR, textStatus, error) {
                        let errors = jqXHR.responseJSON.message;
                        toastr.error(errors);
                    },
                    complete: function() {
                        $('.subscribe-btn').html("Subscribe");
                        $('.subscribe-btn').attr('disabled', false);
                    }
                })
            })
        })
    </script>
@endpush
