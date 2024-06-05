<!--=============================
    DOWNLOAD APP START
==============================-->
<section class="fp__download mt_100 xs_mt_70">
    <div class="fp__download_bg" style="background: url({{ asset($appDownloadSection->background) }});">
        <div class="fp__download_overlay">
            <div class="container">
                <div class="row justify-content-between">
                    <div class="col-xl-5 col-md-6 wow fadeInUp" data-wow-duration="1s">
                        <div class="fp__download_img">
                            <img src="{{ asset($appDownloadSection->image) }}" alt="download" class="img-fluid w-100">
                        </div>
                    </div>
                    <div class="col-xl-6 col-md-6 wow fadeInUp" data-wow-duration="1s">
                        <div class="fp__download_text">
                            <div class="fp__section_heading mb_25">
                                <h2>{!! $appDownloadSection->title !!}</h2>
                                <p>{!! $appDownloadSection->short_description !!}</p>
                            </div>
                            <ul class="d-flex flex-wrap">
                                @if (@$appDownloadSection->playstore_link)
                                    <li>
                                        <a href="{{ @$appDownloadSection->playstore_link }}">
                                            <i class="fab fa-google-play"></i>
                                            <p> <span>download from</span> google play </p>
                                        </a>
                                    </li>
                                @endif
                                @if (@$appDownloadSection->appstore_link)
                                    <li>
                                        <a href="{{ @$appDownloadSection->appstore_link }}">
                                            <i class="fab fa-apple"></i>
                                            <p> <span>download from</span> apple store </p>
                                        </a>
                                    </li>
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--=============================
     DOWNLOAD APP END
 ==============================-->
