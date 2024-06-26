<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="{{ app()->getLocale() == 'en' ? 'ltr' : 'rtl' }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Laravel') }} - @yield('title')</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Kufi+Arabic:wght@100..900&display=swap" rel="stylesheet">

    <!-- Bootstrap Css File -->
    <link rel="stylesheet" href="{{ asset('assets/libs/bootstrap/css/bootstrap.rtl.min.css') }}">

    <!-- Boxicons Css File -->
    <link rel="stylesheet" href="{{ asset('assets/libs/boxicons/css/boxicons.min.css') }}">

    @yield('css')

    <!-- Css File -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
</head>

<body>

    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="{{ route('website') }}">
                <img src="{{ asset('logo.png') }}" alt="">
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="bx bx-menu"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a href="{{ route('website') }}" @class(['nav-link', 'active' => Request::routeIs('website')])>مضاف حديثاً</a>
                    </li>
                    @foreach (\App\Models\Category::whereNull('parent_id')->get() as $parent)
                        <li class="nav-item dropdown">
                            <a class="nav-link" href="javascript:void(0)" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                {{ $parent->name }}
                            </a>
                            <ul class="dropdown-menu">
                                @foreach (\App\Models\Category::whereParentId($parent->id)->get() as $category)
                                    <li><a class="dropdown-item"
                                            href="{{ route('web.category', $category->slug) }}">{{ $category->name }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </li>
                    @endforeach
                </ul>

                <form action="{{ route('web.search') }}" method="get">
                    <input type="text" name="q" class="form-control" placeholder="هل تبحث عن شئ ما" value="{{ request()->get('q') ?? false }}">
                    <button type="submit" class="btn btn-success"><i class="bx bx-search"></i></button>
                </form>

                @guest
                    <a href="{{ route('login') }}" class="btn btn-success text-white">تسجيل الدخول</a>
                @else
                    <a href="{{ route('dashboard') }}" class="btn btn-success text-white">لوحة التحكم</a>
                @endguest
            </div>
        </div>
    </nav>

    @yield('content')

    <footer class="footer">
        <div class="container">
            <div class="logo my-3">
                <a href="">
                    <img src="{{ asset('logo.png') }}" alt="{{ env('APP_NAME') }}">
                </a>
            </div>

            <div class="social-items mb-3">
                <a href="https://facebook.com/ahmedelsewailky" target="_blank" title="facebook"
                    data-bs-toggle="tooltip"><i class="bx bxl-facebook"></i></a>
                <a href="https://twitter.com/elsewailky" target="_blank" title="twitter" data-bs-toggle="tooltip"><i
                        class="bx bxl-twitter"></i></a>
                <a href="https://youtube.com/" target="_blank" title="youtube" data-bs-toggle="tooltip"><i
                        class="bx bxl-youtube"></i></a>
            </div>

            <div class="main-pages mb-3">
                <a href="{{ route('website') }}">الرئيسية</a>
                <a href="#">من نحن</a>
                <a href="#">سياسة الخصوصية</a>
                <a href="#">بنود الخدمة</a>
                <a href="#">اتصل بنا</a>
            </div>

            <div class="rights">
                <p>جميع الحقوق محفوظة لـ {{ env('APP_NAME') }} © {{ date('Y') }}</p>
            </div>
        </div>
    </footer>

    <a class="back-to-top">
        <i class="bx bxs-up-arrow"></i>
    </a>

    <!-- jQuery -->
    <script src="{{ asset('assets/libs/jquery/jquery-3.7.1.min.js') }}"></script>
    <!-- Bootstrap Bundle Js File -->
    <script src="{{ asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- Required Custom Js File -->
    <script src="{{ asset('assets/js/main.js') }}"></script>
    @yield('js')
</body>

</html>
