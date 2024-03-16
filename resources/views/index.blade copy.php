{{-- Extend master guest layout --}}
@extends('layouts.guest')

{{-- Page content --}}
@section('content')
    <div class="container my-5">
        <section id="sliderCarousel" class="carousel slide carousel-fade" data-bs-ride="true">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#sliderCarousel" data-bs-slide-to="0" class="active" aria-current="true"
                    aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#sliderCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#sliderCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="d-flex p-4">
                        <div class="flex-grow-1">
                            <h3 class="mt-4">
                                <a href="">تحميل ومشاهدة فيلم فارس بجودة عالية و روابط تحميل مباشرة</a>
                            </h3>
                            <div class="my-3">
                                <span class="meta meta-category me-3"><a href="">افلام عربية</a></span>
                                <span class="meta meta-date me-3"><i class="bx bx-calendar"></i> 07/03/2024</span>
                                <span class="meta meta-quality">
                                    <span>الجودة</span>
                                    WEB-DL720
                                </span>
                            </div>
                            <p>هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز
                                على الشكل
                                الخارجي للنص أو شكل توضع الفقرات في الصفحة التي يقرأها. ولذلك يتم استخدام طريقة
                                لوريم إيبسوم
                                لأنها تعطي توزيعاَ طبيعياَ -إلى حد ما- للأحرف عوضاً عن استخدام "هنا يوجد محتوى نصي
                            </p>

                            <a href="" class="btn btn-lg btn-success mt-4">
                                <i class="bx bx-play-circle me-1"></i>
                                شاهد الآن
                            </a>
                        </div>
                        <div class="flex-shrink-0 ms-4">
                            <div class="poster-thumbnail">
                                <img src="https://via.placeholder.com/250x340" width="250" height="340"
                                    class="rounded-3" alt="Movie Title Here">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="d-flex p-4">
                        <div class="flex-grow-1">
                            <h3 class="mt-4">
                                <a href="">تحميل ومشاهدة فيلم فارس بجودة عالية و روابط تحميل مباشرة</a>
                            </h3>
                            <div class="my-3">
                                <span class="meta meta-category me-3"><a href="">افلام عربية</a></span>
                                <span class="meta meta-date me-3"><i class="bx bx-calendar"></i> 07/03/2024</span>
                                <span class="meta meta-quality">
                                    <span>الجودة</span>
                                    WEB-DL720
                                </span>
                            </div>
                            <p>هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز
                                على الشكل
                                الخارجي للنص أو شكل توضع الفقرات في الصفحة التي يقرأها. ولذلك يتم استخدام طريقة
                                لوريم إيبسوم
                                لأنها تعطي توزيعاَ طبيعياَ -إلى حد ما- للأحرف عوضاً عن استخدام "هنا يوجد محتوى نصي
                            </p>

                            <a href="" class="btn btn-lg btn-success mt-4">
                                <i class="bx bx-play-circle me-1"></i>
                                شاهد الآن
                            </a>
                        </div>
                        <div class="flex-shrink-0 ms-4">
                            <div class="poster-thumbnail">
                                <img src="https://via.placeholder.com/250x340" alt="Movie Title Here">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="d-flex p-4">
                        <div class="flex-grow-1">
                            <h3 class="mt-4">
                                <a href="">تحميل ومشاهدة فيلم فارس بجودة عالية و روابط تحميل مباشرة</a>
                            </h3>
                            <div class="my-3">
                                <span class="meta meta-category me-3"><a href="">افلام عربية</a></span>
                                <span class="meta meta-date me-3"><i class="bx bx-calendar"></i> 07/03/2024</span>
                                <span class="meta meta-quality">
                                    <span>الجودة</span>
                                    WEB-DL720
                                </span>
                            </div>
                            <p>هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز
                                على الشكل
                                الخارجي للنص أو شكل توضع الفقرات في الصفحة التي يقرأها. ولذلك يتم استخدام طريقة
                                لوريم إيبسوم
                                لأنها تعطي توزيعاَ طبيعياَ -إلى حد ما- للأحرف عوضاً عن استخدام "هنا يوجد محتوى نصي
                            </p>

                            <a href="" class="btn btn-lg btn-success mt-4">
                                <i class="bx bx-play-circle me-1"></i>
                                شاهد الآن
                            </a>
                        </div>
                        <div class="flex-shrink-0 ms-4">
                            <div class="poster-thumbnail">
                                <img src="https://via.placeholder.com/250x340" alt="Movie Title Here">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <div class="body-shape"></div>

    <div class="container my-5">
        <div class="row">
            <div class="col-md-4">
                <section class="section">
                    <div class="section-title">
                        <h6>أجدد البرامج التلفزيونية</h6>
                        <a href="" class="watch-more-button">شاهد المزيد</a>
                    </div>

                    <div class="section-body">
                        @forelse ($tvshows as $tvshow_episode)
                            <div class="d-flex mb-4">
                                @php
                                   $url = preg_replace('/[A-Z]/', ' $0', class_basename($tvshow_episode));
                                   $url = explode(" ", trim($url));
                                @endphp
                                <div class="flex-shrink-0 me-3">
                                    <img src="{{ get_poster($tvshow_episode->tvshow->poster, '120x80') }}" class="rounded-2"
                                        alt="">
                                </div>
                                <div class="flex-grow-1">
                                    <h6 class="fs-6">
                                        <a href="/{{ strtolower($url[0]) }}/{{ strtolower($url[1]) }}/{{ $tvshow_episode->episode }}">الحلقة رقم {{ $tvshow_episode->episode }} من برنامج
                                            {{ str($tvshow_episode->tvshow->title)->words(5) }}</a>
                                    </h6>
                                    <div class="d-flex align-items-center mt-2 justify-content-between">
                                        <span>منذ 3 اسبوع</span>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <p class="text-center">لا توجد حلقات</p>
                        @endforelse
                    </div>
                </section>
            </div>

            <div class="col-md-8">
                <section class="section">
                    <div class="section-title">
                        <h6>جديد الأفلام</h6>

                        <a href="" class="watch-more-button">شاهد المزيد</a>
                    </div>

                    <div class="section-body">
                        <div class="row">
                            @foreach ($movies as $movie)
                                <div class="col-md-3">
                                    <div class="post post-thumbnail"
                                        style="background-image: url('{{ get_poster($movie->poster, '230x310') }}')">
                                        <a href="/{{ strtolower(class_basename($movie)) }}/{{ $movie->slug }}">
                                            <div class="post-meta">
                                                <span
                                                    class="meta meta-quality d-block">{{ DataArray::QUALITIES[$movie->quality] }}</span>
                                                <span class="meta meta-views"><i
                                                        class="bx bx-bar-chart-alt-2 me-1"></i>{{ $movie->views }}</span>
                                                <span
                                                    class="meta meta-dubbed">{{ DataArray::DUBBED_STATUS[$movie->dubbed_status] }}</span>
                                            </div>
                                            <div class="post-title">
                                                {{ str($movie->title)->words(5) }}
                                                <span class="meta meta-category d-flex align-items-center small fw-normal">
                                                    <i class="bx bxs-folder-open text-warning me-1"></i>
                                                    {{ $movie->category->name }}
                                                </span>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>

    <div class="container my-5">
        <section class="section">
            <div class="section-title">
                <h6>جديد المسلسلات</h6>

                <a href="" class="watch-more-button">شاهد المزيد</a>
            </div>

            <div class="section-body">
                <div class="row">
                    <div class="owl-carousel">
                        @foreach ($series as $series_episode)
                            @php
                                $url = preg_replace('/(?=[A-Z])/', '/', class_basename($series_episode));
                            @endphp
                            <div class="post post-thumbnail"
                                style="background-image: url('{{ get_poster($series_episode->series->poster, '230x410') }}')">
                                <a href="{{ strtolower($url) }}/{{ $series_episode->episode }}">
                                    <div class="post-meta">
                                        <span
                                            class="meta meta-quality d-block">{{ DataArray::QUALITIES[$series_episode->quality] }}</span>
                                        <span class="meta meta-views"><i
                                                class="bx bx-bar-chart-alt-2 me-1"></i>{{ $series_episode->views }}</span>
                                    </div>
                                    <div class="post-title">
                                        <h6>تحميل ومشاهدة فيلم كذا كذا 2018</h6>
                                        <span>{{ $series_episode->series->category->name }}</span>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection


{{-- Custom Files for This Page --}}
@section('js')
    <!-- jQuery -->
    <script src="{{ asset('assets/libs/jquery/jquery-3.7.1.min.js') }}"></script>
    <!-- Owl Carousel -->
    <script src="{{ asset('assets/libs/owlcarousel/owl.carousel.min.js') }}"></script>
    <script>
        $(function() {
            $(".owl-carousel").owlCarousel({
                loop: true,
                margin: 10,
                rtl: true,
                dots: false,
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
                        items: 4,
                        nav: true,
                        loop: false
                    }
                }
            });
        });
    </script>
@endsection

@section('css')
    <!-- Owl Carousel -->
    <link rel="stylesheet" href="{{ asset('assets/libs/owlcarousel/assets/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/libs/owlcarousel/assets/owl.theme.default.min.css') }}">
@endsection