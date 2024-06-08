@extends('frontend.layouts.master')

@section('content')
    <section class="fp__breadcrumb" style="background: url({{ asset('frontend/images/counter_bg.jpg') }});">
        <div class="fp__breadcrumb_overlay">
            <div class="container">
                <div class="fp__breadcrumb_text">
                    <h1>Our Latest Food Blogs</h1>
                    <ul>
                        <li><a href="{{ route('home') }}">home</a></li>
                        <li><a href="javascript:;">blogs</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <section class="fp__search_menu mt_120 xs_mt_90 mb_100 xs_mb_70">
        <div class="container">
            <form class="fp__search_menu_form" action="{{ route('blogs') }}" method="get">
                <div class="row">
                    <div class="col-xl-6 col-md-5">
                        <input type="text" placeholder="Search..." name="search" value="{{ @request()->search }}">
                    </div>
                    <div class="col-xl-4 col-md-4">
                        <select class="nice-select" name="blog_category">
                            <option value="">select blog category</option>
                            <option value="">all</option>
                            @foreach (@$blogCategory as $category)
                                <option @selected(@request()->blog_category === $category->slug) value="{{ $category->slug }}">{{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-xl-2 col-md-3">
                        <button type="submit" class="common_btn">search</button>
                    </div>
                </div>
            </form>

            <div class="row">
                @foreach ($blogs as $blog)
                    <div class="col-xl-4 col-sm-6 col-lg-4 wow fadeInUp" data-wow-duration="1s">
                        <div class="fp__single_blog">
                            <a href="#" class="fp__single_blog_img">
                                <img src="{{ @$blog->image }}" alt="blog" class="img-fluid w-100">
                            </a>
                            <div class="fp__single_blog_text">
                                <a class="category"
                                    href="{{ route('blogs.view', $blog->slug) }}">{{ @$blog->category->name }}</a>
                                <ul class="d-flex flex-wrap mt_15">
                                    <li><i class="fas fa-user"></i>{{ @$blog->user->name }}</li>
                                    <li><i
                                            class="fas fa-calendar-alt"></i>{{ date('d M Y', strtotime($blog->created_at)) }}
                                    </li>
                                    <li><i class="fas fa-comments"></i>
                                        {{ $blog->comments_count }} comment</li>
                                </ul>
                                <a class="title"
                                    href="{{ route('blogs.view', $blog->slug) }}">{{ truncateString(@$blog->title) }}</a>
                            </div>
                        </div>
                    </div>
                @endforeach

                @if ($blogs->isEmpty())
                    <h5 class="mt-5 text-center">No Blogs Found.</h5>
                @endif
            </div>
            @if ($blogs->hasPages())
                <div class="fp__pagination mt_60">
                    <div class="row">
                        <div class="col-12">
                            {{ $blogs->links() }}
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </section>
@endsection
