{{-- Extend master guest layout --}}
@extends('layouts.guest')

@use('App\Models\Actor', 'Actor')

{{-- Define page title --}}
@section('title', $series->title)

{{-- Page content --}}
@section('content')
    <section class="single-post-section">
        <div class="container">
            <div class="d-md-flex">
                <div class="flex-shrink-0 me-md-4 text-center text-md-start">
                    <img src="{{ get_poster($series->poster, '295x380') }}" width="380" class="rounded-3"
                        alt="Single Post Poster">
                </div>
                <div class="flex-grow-1 text-start mt-4 mt-md-0">
                    <h1 class="mb-3 fs-2">{{ $series->title }}</h1>
                    <div class="row">
                        <div class="col-md-6">
                            <span>
                                <i class="bx bx-hash"></i>
                                رقم الفيلم:
                                M000{{ $series->id }}
                            </span>
                        </div>
                        <div class="col-md-6">
                            <span>
                                <i class="bx bx-category"></i>
                                القسم:
                                {{ $series->category->name }}
                            </span>
                        </div>
                        <div class="col-md-6">
                            <span>
                                <i class="bx bx-calendar"></i>
                                سنة الإنتاج:
                                {{ $series->year }}
                            </span>
                        </div>
                        <div class="col-md-6">
                            <span>
                                <i class="bx bx-play-circle"></i>
                                لغة الفيلم:
                                {{ $series->language }}
                            </span>
                        </div>
                        <div class="col-md-6">
                            <span>
                                <i class="bx bx-play-circle"></i>
                                الترحمة:
                                {{ DataArray::DUBBED_STATUS[$series->dubbed_status] }}
                            </span>
                        </div>
                        <div class="col-md-6">
                            <span>
                                <i class="bx bx-download"></i>
                                مرات التحميل:
                                135
                            </span>
                        </div>
                        <div class="col-md-12">
                            <span>
                                <i class="bx bx-tag"></i>
                                الوسوم:
                                @foreach ($series->types as $key => $value)
                                    <span class="movie-tag">{{ DataArray::TYPES[$key] }}</span>
                                @endforeach
                            </span>
                        </div>
                    </div>

                    <p>{{ $series->story }}</p>

                    <div class="my-5 d-flex align-items-center">
                        <a href="#" class="btn btn-like"><i class="bx bx-like"></i> اعجبني</a>
                        <a href="#" class="btn btn-dislike"><i class="bx bx-dislike"></i> لم يعجبني</a>

                        <div class="votes">
                            <i class="bx bxs-star text-warning"></i>
                            <i class="bx bxs-star text-warning"></i>
                            <i class="bx bxs-star text-warning"></i>
                            <i class="bx bxs-star text-warning"></i>
                            <i class="bx bx-star text-warning"></i>

                            <span>(إجمالي 11.805 صوت)</span>
                        </div>
                    </div>

                    <div class="single-section-card actors-card my-5">
                        <h6 class="sub-section-title">
                            <i class="bx bx-group me-2"></i>
                            فريق العمل
                        </h6>
                        <div class="row">
                            @foreach ($series->actors as $actor)
                                <div class="col-md-4">
                                    <div class="d-flex align-items-center mb-3">
                                        <div class="flex-shrink-0">
                                            <img src="{{ get_poster($actor->avatar, '64') }}" width="64" height="64" class="rounded-circle me-3" alt="Actor image">
                                        </div>
                                        <div class="flex-grow-1 ms-2">
                                            <a href="{{ route('web.actor.works', $actor->slug) }}">{{ $actor->name }}</a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="single-section-card actors-card my-5">
                        <h6 class="sub-section-title">
                            <i class="bx bx-layer me-2"></i>
                            الحلقات
                        </h6>
                        <div class="row">
                            @foreach ($series->episodes as $episode)
                                <div class="col-md-4">
                                    <a href="{{ route('web.series.episode', [$series->slug, $episode->id]) }}" class="episode-item">
                                        الحلقة رقم {{ $episode->episode }}
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="single-section-card socials-card my-5">
                        <h6>تابعنا علي مواقع التواصل الإجتماعي</h6>
                        <div class="mt-4 text-center">
                            <a href="https://facebook.com/ahmedelsewailky" class="social-item" target="_blank"><i class="bx bxl-facebook"></i></a>
                            <a href="https://twitter.com/elsewailky" class="social-item" target="_blank"><i class="bx bxl-twitter"></i></a>
                            <a href="https://instagram.com/elsewailky" class="social-item" target="_blank"><i class="bx bxl-instagram"></i></a>
                            <a href="https://youtube.com" class="social-item" target="_blank"><i class="bx bxl-youtube"></i></a>
                            <a href="https://telegram.com" class="social-item" target="_blank"><i class="bx bxl-telegram"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="single-post-related">
        <div class="container">
            <section class="section latest-series my-5 py-4">
                <div class="container">
                    <div class="section-header ">
                        <span><i class="bx bx-video-recording"></i></span>
                        <h3>قد يعجبك أيضا</h3>
                        <a href="#" class="load-more">
                            عرض المزيد
                            <i class="bx bx-left-arrow-alt"></i>
                        </a>
                    </div>
                    <div class="section-body">
                        <div class="owl-carousel">
                            @forelse (\App\Models\Series::where('category_id', '!=', $series->category_id)->take(10)->get() as $series)
                                <div class="post">
                                    <div class="post-thumbnail"
                                        style="background-image: url('{{ get_poster($series->poster, '280x370') }}')">
                                    </div>
                                    <span class="play-overlay"><i class="bx bx-play-circle"></i></span>
                                    <div class="post-content">
                                        <div class="top-post-content">
                                            <span class="meta meta-category">{{ $series->category->name }}</span>
                                        </div>
                                        <div class="bottom-post-content">
                                            <h6 class="post-title"><a href="{{ route('web.series.show', $series->slug) }}"> {{ $series->title }}</a>
                                            </h6>
                                            <span class="meta meta-durations ">
                                                <i class="bx bx-time-five"></i>
                                                1 hr 25 mins
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <p class="text-center">لا توجد بيانات</p>
                            @endforelse
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </section>
@endsection

{{-- Owlcarousel Css --}}
@section('css')
    <link rel="stylesheet" href="{{ asset('assets/libs/owlcarousel/assets/owl.carousel.min.css') }}">
@endsection

{{-- Required Owl Carousel For This Page --}}
@section('js')
    <script src="{{ asset('assets/libs/owlcarousel/owl.carousel.min.js') }}"></script>
    <script>
        $(function() {
            $('.owl-carousel').owlCarousel({
                loop: true,
                margin: 10,
                rtl: true,
                responsiveClass: true,
                responsive: {
                    0: {
                        items: 1,
                        nav: true
                    },
                    600: {
                        items: 3,
                        nav: false
                    },
                    1000: {
                        items: 5,
                        nav: true,
                        loop: false
                    }
                }
            })
        });
    </script>
@endsection
