<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ getSetting('sitename') }} | @yield('title')</title>

    {{-- {!! Html::style('website/css/bootstrap.min.css') !!}
    {!! Html::style('website/css/flexslider.css') !!}
    {!! Html::style('website/css/style.css') !!}
    {!! Html::style('website/css/font-awesome.min.css') !!} --}}

    {!! Html::style('css/main.css') !!}

    {!! Html::script('website/js/jquery.min.js') !!}

    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>

    <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900' rel='stylesheet' type='text/css'>

    <!-- Styles -->
    {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}

<!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>

    @yield('header')
</head>
<body>
<div id="app" style="direction: rtl">

    <div class="header">
        <div class="container"> <a class="navbar-brand" href="{{ url('/') }}"><i class="fa fa-paper-plane"></i> {{ getSetting() }}</a>
            <div class="menu pull-right"> <a class="toggleMenu" href="#"><img src="{{ url('/images/nav_icon.png') }}" alt="" /> </a>
                <ul class="nav" id="nav">
                    <li class="current"><a href="{{ url('/home') }}">الرئيسية</a></li>
                    <li><a href="{{ url('/buildings') }}">كل العقارات</a></li>
                    <li><a href="about.html">من نحن</a></li>
                    <li><a href="services.html">خدماتنا</a></li>
                    <li><a href="contact.html">اتصل بنا</a></li>
                    @if (Auth::guest())
                        <li><a href="{{ route('login') }}">تسجيل الدخول</a></li>
                        <li><a href="{{ route('register') }}">عضوية جديدة</a></li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    <a href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                        تسجيل الخروج
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @endif
                    <div class="clear"></div>
                </ul>
            </div>
        </div>
    </div>


    @yield('content')

    <div class="footer">
        <div class="footer_bottom">
            <div class="follow-us">
                <a class="fa fa-facebook social-icon" href="{{ getSetting('facebook') }}"></a>
                <a class="fa fa-twitter social-icon" href="{{ getSetting('twitter') }}"></a>
                <a class="fa fa-youtube social-icon" href="{{ getSetting('youtube') }}"></a>
                <div class="copy">
                    <p>Copyright &copy; 2015 Company Name. Design by <a href="http://www.templategarden.com" rel="nofollow">TemplateGarden</a></p>
                </div>
            </div>
        </div>

    </div>

{!! Html::script('website/js/responsive-nav.js') !!}
{!! Html::script('website/js/bootstrap.min.js') !!}
{!! Html::script('website/js/jquery.flexslider.js') !!}

@yield('footer')
<!-- Scripts -->
{{-- <script src="{{ asset('js/app.js') }}"></script> --}}
</body>
</html>
