@extends('frontend.layouts.master')

@section('meta_tag_section')
    <meta property="og:title" content="{{ $blogs->title }}">
    <meta property="og:description" content="{!! $blogs->seo_description !!}">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:image" content="{{ asset($blogs->image) }}">
    <meta property="og:site_name" content="{{ config('settings.site_name') }}">
    <meta property="og:type" content="website">
@endsection

@section('content')
    <section class="fp__breadcrumb" style="background: url({{ asset('frontend/images/counter_bg.jpg') }});">
        <div class="fp__breadcrumb_overlay">
            <div class="container">
                <div class="fp__breadcrumb_text">
                    <h1>blog details</h1>
                    <ul>
                        <li><a href="{{ route('home') }}">home</a></li>
                        <li><a href="javascript:;">blog details</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <section class="fp__blog_details mt_120 xs_mt_90 mb_100 xs_mb_70">
        <div class="container">
            <div class="row">
                <div class="col-xl-8 col-lg-8">
                    <div class="fp__blog_det_area">
                        <div class="fp__blog_details_img wow fadeInUp" data-wow-duration="1s">
                            <img src="{{ $blogs->image }}" alt="blog details" class="imf-fluid w-100">
                        </div>
                        <div class="fp__blog_details_text wow fadeInUp" data-wow-duration="1s">
                            <ul class="details_bloger d-flex flex-wrap">
                                <li><i class="far fa-user"></i> {{ $blogs->user->name }}</li>
                                <li><i class="far fa-comment-alt-lines"></i> 12 Comments</li>
                                <li><i class="far fa-calendar-alt"></i> {{ date('d M Y', strtotime($blogs->created_at)) }}
                                </li>
                            </ul>
                            <h2>{{ $blogs->title }}</h2>
                            {!! $blogs->description !!}
                            <div class="blog_tags_share d-flex flex-wrap justify-content-between align-items-center">
                                <div class="tags d-flex flex-wrap align-items-center">
                                    <span>tags:</span>
                                    <ul class="d-flex flex-wrap">
                                        <li><a href="#">Cleaning</a></li>
                                        <li><a href="#">AC Repair</a></li>
                                        <li><a href="#">Home Move</a></li>
                                    </ul>
                                </div>
                                <div class="share d-flex flex-wrap align-items-center">
                                    <span>share:</span>
                                    <ul class="d-flex flex-wrap">
                                        <li><a href="https://www.facebook.com/sharer/sharer.php?u={{ url()->current() }}"><i
                                                    class="fab fa-facebook-f"></i></a></li>
                                        <li><a
                                                href="https://www.linkedin.com/shareArticle?mini=true&url={{ url()->current() }}&title={{ $blogs->title }}"><i
                                                    class="fab fa-linkedin-in"></i></a></li>
                                        <li><a
                                                href="http://twitter.com/share?text={{ $blogs->title }}&url={{ url()->current() }}"><i
                                                    class="fab fa-twitter"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <ul class="blog_det_button mt_100 xs_mt_70 wow fadeInUp" data-wow-duration="1s">
                        @if (@$prevBlog !== null)
                            <li>
                                <a href="{{ route('blogs.view', @$prevBlog->slug) }}">
                                    <img src="{{ @$prevBlog->image }}" alt="button img" class="img-fluid w-100">
                                    <p>{{ truncateString(@$prevBlog->title) }}
                                        <span> <i class="far fa-long-arrow-left"></i> Previous</span>
                                    </p>
                                </a>
                            </li>
                        @endif
                        @if (@$nextBlog !== null)
                            <li>
                                <a href="{{ route('blogs.view', @$nextBlog->slug) }}">
                                    <p>{{ truncateString(@$nextBlog->title) }}
                                        <span>next <i class="far fa-long-arrow-right"></i></span>
                                    </p>
                                    <img src="{{ @$nextBlog->image }}" alt="button img" class="img-fluid w-100">
                                </a>
                            </li>
                        @endif
                    </ul>

                    <div class="fp__comment mt_100 xs_mt_70 wow fadeInUp" data-wow-duration="1s">
                        <h4>03 Comments</h4>
                        @foreach ($comments as $comment)
                            <div class="fp__single_comment m-0 border-0">
                                <img src="{{ asset($comment->user->image) }}" alt="review" class="img-fluid">
                                <div class="fp__single_comm_text">
                                    <h3>{{ $comment->user->name }}
                                        <span>{{ date('d M Y', strtotime($comment->created_at)) }}</span>
                                    </h3>
                                    <p>{{ $comment->comment }}</p>
                                    <a href="#">Reply <i class="fas fa-reply-all"></i></a>
                                </div>
                            </div>
                        @endforeach
                        @if ($comments->hasPages())
                            <div class="fp__pagination mt_60">
                                <div class="row">
                                    <div class="col-12">
                                        {{ $comments->links() }}
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>

                    <div class="comment_input mt_100 xs_mt_70 wow fadeInUp" data-wow-duration="1s">
                        <h4>Leave A Comment</h4>
                        {{-- <p>Required fields are marked *</p> --}}
                        <form action="{{ route('blogs.comment', $blogs->id) }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-xl-12">
                                    <label>comment</label>
                                    <div class="fp__contact_form_input textarea">
                                        <span><i class="fal fa-user-alt"></i></span>
                                        <textarea rows="5" placeholder="Your Comment" name="comment"></textarea>
                                    </div>
                                    <button type="submit" class="common_btn mt_20">Submit comment</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4">
                    <div id="sticky_sidebar">
                        <div class="fp__blog_search blog_sidebar m-0 wow fadeInUp" data-wow-duration="1s">
                            <h3>Search</h3>
                            <form action="{{ route('blogs') }}" method="get">
                                <input type="text" placeholder="Search" name="search">
                                <button type="submit"><i class="fas fa-search"></i></button>
                            </form>
                        </div>
                        <div class="fp__related_blog blog_sidebar wow fadeInUp" data-wow-duration="1s">
                            <h3>Latest Post</h3>
                            <ul>
                                @foreach (@$latestBlog as $blog)
                                    <li>
                                        <img src="{{ asset(@$blog->image) }}" alt="blog" class="img-fluid w-100">
                                        <div class="text">
                                            <a
                                                href="{{ route('blogs.view', @$blog->slug) }}">{{ truncateString(@$blog->title, 30) }}</a>
                                            <p><i class="far fa-calendar-alt"></i>
                                                {{ date('d M Y', strtotime($blog->created_at)) }}</p>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="fp__blog_categori blog_sidebar wow fadeInUp" data-wow-duration="1s">
                            <h3>Categories</h3>
                            <ul>
                                @foreach ($blogCategory as $category)
                                    <li><a
                                            href="{{ route('blogs', ['blog_category' => $category->slug]) }}">{{ $category->name }}<span>{{ $category->blogs_count }}</span></a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="fp__blog_tags blog_sidebar wow fadeInUp" data-wow-duration="1s">
                            <h3>Popular Tags</h3>
                            <ul>
                                <li><a href="#">Cleaning </a></li>
                                <li><a href="#">Car Repair</a></li>
                                <li><a href="#">Plumbing</a></li>
                                <li><a href="#">Painting</a></li>
                                <li><a href="#">Past Control</a></li>
                                <li><a href="#">AC Repair</a></li>
                                <li><a href="#">Home Move</a></li>
                                <li><a href="#">Disinfection</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
