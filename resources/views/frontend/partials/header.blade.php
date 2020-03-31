@php
ini_set('memory_limit', '-1');
if(!empty($data->title)){
    $title = $data->title;
} else {
    $title = "OnlineKhabarHub | Latest Online Khabar | Taja Online Khabar";
}

if(!empty($data->excerpt)){
    $excerpt = $data->excerpt;
} else {
    $excerpt = "Online Khabar Hub - Nepal's Largest News Portal";
}

if(!empty(!empty($data->slug))){
    $slug = route('single', $data->slug);
} else {
    $slug = 'https://onlinekhabarhub.com/';
}

if(!empty($data->image)){
    $image = $data->image;
} else {
    $image = $website_data->logo;
}
@endphp
<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Online Khabar Hub | {{$title}}</title>
    <meta name="author" content="Incognitech">
    <meta name="keywords" content="onlinekhabar, online khabar hub, news portal, news site, largest news portal, best news portals in nepal">
    <meta property="og:title" content="{{$title}}" />
    <meta property="og:url" content="{{$slug}}" />
    <meta property="og:image" content="{{$image}}" />
    <meta property="og:description" content="{{$excerpt}}" />
    <meta property="og:site_name" content="OnlineKhabarHub" />
    <meta name="msvalidate.01" content="F6E0C40B61F80CAA21553F0F39F5300B" />
    <link rel="icon" href="{{asset('/admin/img/favicons/favicon-16x16.png')}}" type="image/x-icon">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,600,700">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('/frontend/css/fontawesome-stars-o.min.css')}}">
    <link rel="stylesheet" href="{{asset('/frontend/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('/frontend/css/responsive-style.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.css">
    <link rel="stylesheet" href="{{asset('/frontend/css/custom.css')}}">
    <link rel="stylesheet" href="{{asset('/frontend/css/online.css')}}">
    <script>
        function resizeIframe(obj) {
            obj.style.height = obj.contentWindow.document.documentElement.scrollHeight + 'px';
        }
    </script>
    <script data-ad-client="ca-pub-2100563470763059" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-158808814-3"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());
        gtag('config', 'UA-158808814-3');
    </script>
</head>

<body>
    <div id="preloader">
        <div class="preloader bg--color-1--b" data-preloader="1">
            <div class="preloader--inner"></div>
        </div>
    </div>
    <div class="wrapper">
        <div id="site-cookie"> @include('cookieConsent::index') </div>{{-- @php $jsonurl="http://api.openweathermap.org/data/2.5/weather?q=Kathmandu,nepal"; $json=file_get_contents($jsonurl); $weather=json_decode($json); $kelvin=$weather->main->temp; $celcius=$kelvin - 273.15; @endphp --}}
        <header class="header--section header--style-1">
            <div class="header--topbar bg--color-2">
                <div class="container">
                    <div class="float--left float--xs-none text-xs-center">
                        <ul class="header--topbar-info nav">
                            <li><i class="fa fm fa-map-marker"></i>Kathmandu</li>
                            <li><i class="fa fm fa-mixcloud"></i>24<sup>0</sup> C</li>
                            <li><i class="fa fm fa-calendar"></i>Today ({{date('l d F Y')}})</li>
                        </ul>
                    </div>
                    <div class="float--right float--xs-none text-xs-center">
                        <ul class="header--topbar-lang nav">
                            <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fm fa-language"></i>English<i class="fa flm fa-angle-down"></i></a>
                                <ul class="dropdown-menu">
                                    <li><a href="#">English</a></li>
                                    <li><a href="#">Nepali</a></li>
                                </ul>
                            </li>
                        </ul>
                        <ul class="header--topbar-social nav hidden-sm hidden-xxs">
                            <li><a href="{{@$social_info->facebook}}" target="_blank"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="{{@$social_info->twitter}}" target="_blank"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="{{@$social_info->instagram}}" target="_blank"><i class="fa fa-instagram"></i></a></li>
                            <li><a href="{{@$social_info->linkedin}}" target="_blank"><i class="fa fa-linkedin"></i></a></li>
                            <li><a href="{{@$social_info->youtube}}" target="_blank"><i class="fa fa-youtube-play"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="header--mainbar">
                <div class="container">
                    <div class="header--logo float--left float--sm-none text-sm-center">
                        <h1 class="h1">
                        <a href="{{url('/')}}" class="btn-link"> <img src="" alt="Online Khabar Hub">
                        <span class="hidden">Online Khabar Hub</span> </a>
                        </h1> </div>
                    <div class="header--ad float--right float--sm-none hidden-xs">
                        <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script> <ins class="adsbygoogle" style="display:inline-block;width:728px;height:90px" data-ad-client="ca-pub-2100563470763059" data-ad-slot="7199912872"></ins>
                        <script>
                            (adsbygoogle = window.adsbygoogle || []).push({});
                        </script>
                    </div>
                </div>
            </div>
            <div class="header--navbar style--1 navbar bd--color-1 bg--color-1" data-trigger="sticky">
                <div class="container">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#headerNav" aria-expanded="false" aria-controls="headerNav"> <span class="sr-only">Toggle Navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
                    </div>
                    <div id="headerNav" class="navbar-collapse collapse float--left">
                        <ul class="header--menu-links nav navbar-nav" data-trigger="hoverIntent">
                            <li><a href="{{url('/')}}">Home</a></li>
                            <li class="dropdown megamenu posts"> <a href="travel.html" class="dropdown-toggle" data-toggle="dropdown">World News<i class="fa flm fa-angle-down"></i></a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <div class="megamenu--posts" data-ajax-content="outer">
                                            <ul class="row" data-ajax-content="inner"> @if(!empty($world)) @foreach($world->posts as $key=> $value) dd($value); @include('frontend.layouts.navbar') @endforeach @endif </ul>
                                        </div>
                                        <div class="megamenu--pagination" data-ajax="tab">
                                            <a class="all" title="View All" data-toggle="tooltip"></a>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                            <li class="dropdown megamenu posts"> <a href="travel.html" class="dropdown-toggle" data-toggle="dropdown">Technology<i class="fa flm fa-angle-down"></i></a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <div class="megamenu--posts" data-ajax-content="outer">
                                            <ul class="row" data-ajax-content="inner"> @if(!empty($technology)) @foreach($technology->posts as $key=> $value) @include('frontend.layouts.navbar') @endforeach @endif </ul>
                                        </div>
                                        <div class="megamenu--pagination" data-ajax="tab">
                                            <a class="all" title="View All" data-toggle="tooltip"></a>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                            <li class="dropdown megamenu posts"> <a href="travel.html" class="dropdown-toggle" data-toggle="dropdown">Lifestyle<i class="fa flm fa-angle-down"></i></a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <div class="megamenu--posts" data-ajax-content="outer">
                                            <ul class="row" data-ajax-content="inner"> @if(!empty($lifestyle)) @foreach($lifestyle->posts as $key=> $value) @include('frontend.layouts.navbar') @endforeach @endif </ul>
                                        </div>
                                        <div class="megamenu--pagination" data-ajax="tab">
                                            <a class="all" title="View All" data-toggle="tooltip"></a>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                            <li class="dropdown megamenu posts"> <a href="travel.html" class="dropdown-toggle" data-toggle="dropdown">Politics<i class="fa flm fa-angle-down"></i></a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <div class="megamenu--posts" data-ajax-content="outer">
                                            <ul class="row" data-ajax-content="inner"> @if(!empty($politics)) @foreach($politics->posts as $key=> $value) @include('frontend.layouts.navbar') @endforeach @endif </ul>
                                        </div>
                                        <div class="megamenu--pagination" data-ajax="tab">
                                            <a class="all" title="View All" data-toggle="tooltip"></a>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                            <li class="dropdown megamenu posts"> <a href="travel.html" class="dropdown-toggle" data-toggle="dropdown">Sports<i class="fa flm fa-angle-down"></i></a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <div class="megamenu--posts" data-ajax-content="outer">
                                            <ul class="row" data-ajax-content="inner"> @if(!empty($sports)) @foreach($sports->posts as $key=> $value) @include('frontend.layouts.navbar') @endforeach @endif </ul>
                                        </div>
                                        <div class="megamenu--pagination" data-ajax="tab">
                                            <a class="all" title="View All" data-toggle="tooltip"></a>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                            <li class="dropdown megamenu posts"> <a href="travel.html" class="dropdown-toggle" data-toggle="dropdown">Health & Fitness<i class="fa flm fa-angle-down"></i></a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <div class="megamenu--posts" data-ajax-content="outer">
                                            <ul class="row" data-ajax-content="inner"> @if(!empty($health)) @foreach($health->posts as $key=> $value) @include('frontend.layouts.navbar') @endforeach @endif </ul>
                                        </div>
                                        <div class="megamenu--pagination" data-ajax="tab">
                                            <a class="all" title="View All" data-toggle="tooltip"> </a>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                            <li><a href="{{url('/contact')}}">Contact</a></li>
                        </ul>
                    </div>
                    <form action="{{route('search')}}" class="header--search-form float--right" data-form="validate">
                        <input type="search" name="keyword" placeholder="Search..." class="header--search-control form-control" required>
                        <button type="submit" class="header--search-btn btn"><i class="header--search-icon fa fa-search"></i></button>
                    </form>
                </div>
            </div>
        </header>
