<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')-Japanese Used Cars for Sale - Get The Best Deals Now.</title>
    <meta content="" name="description" />
    <meta content="" name="keywords" />
    <meta content="telephone=no" name="format-detection" />
    <meta name="HandheldFriendly" content="true" />
    <link rel="stylesheet" href="{{ asset('assets/css/master.css') }}" />
    <link href="{{ asset('/assets/plugins/switcher/css/switcher.css') }}" rel="stylesheet" id="switcher-css" />
    <link href="{{ asset('assets/plugins/switcher/css/color1.css') }}" rel="alternate stylesheet" title="color1" />
    <link href="{{ asset('assets/plugins/switcher/css/color2.css') }}" rel="alternate stylesheet" title="color2" />
    <link href="{{ asset('assets/plugins/switcher/css/color3.css') }}" rel="alternate stylesheet" title="color3" />
    <link href="{{ asset('assets/plugins/switcher/css/color4.css') }}" rel="alternate stylesheet" title="color4" />

    <link rel="icon" type="image/x-icon" href="{{asset('favicon.ico')}}" />
    @stack('css')
</head>

<body>
    <!-- Loader-->
    <div id="page-preloader"><span class="spinner border-t_second_b border-t_prim_a"></span>
    </div>
    <!-- Loader end-->
    <!-- ==========================-->
    <!-- MOBILE MENU-->
    <!-- ==========================-->
    <div data-off-canvas="mobile-slidebar left overlay">
        <ul class="nav navbar-nav">
           
            <li><a href="{{ url('/') }}" tabindex="-1">Home</a>
                   <li><a href="{{ route('car-list') }}">STOCK LIST</a></i>
                <li><a href="{{ route('review') }}">Review</a>
                </li>
                <li><a href="{{ route('about-us') }}">About Us</a></li>
                <li><a href="{{ route('frontend.contact-us') }}">Contact Us</a></li>
                <li class="dropdown"><a class="dropdown-toggle" href="#"
                    data-toggle="dropdown">Help<b class="caret"></b></a>
                <ul class="dropdown-menu" role="menu">
                    <li><a href="{{ route('faq') }}" tabindex="-1">FAQ</a>
                    </li>
                    <li><a href="{{ route('how-to-buy') }}" tabindex="-1">How to buy</a>
                    </li>                              
                </ul>
            </li>
            @auth
                <li class="dropdown">
                    <a class="dropdown-toggle" style="border: 1px solid" href="#" data-toggle="dropdown">
                        {{ Auth::user()->name }}

                    </a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="#" tabindex="-1">My Account</a>
                        </li>
                        <li><a href="{{ url('/user/order-list') }}" tabindex="-1">My Orders</a></li>
                        <li><a href="{{ url('/user/payment-list') }}" tabindex="-1">My Payments</a></li>
                        <li><a href="{{ route('logout') }}" tabindex="-1">Sign Out</a></li>

                    </ul>
                </li>
            @else
                <li><a href="{{ route('frontend.login') }}">Sign In</a>
                </li>
            @endauth
        </ul>
        <li>
            <div class="header-cart"><a href="{{ route('cart') }}"><i
                        class="icon fa fa-shopping-basket" aria-hidden="true"></i><span
                        class="header-cart-count bg-primary cartItemCount"
                        id="">{{ count((array) session('cart')) }}</span></a>
            </div>
        </li>
    </div>
    <div class="l-theme animated-css" data-header="sticky" data-header-top="200" data-canvas="container">
        <!-- start header-->
        @include('frontend.home.header');
        <!-- end header-->
        <!-- Main content -->
        <section class="content">
            @yield('content')
        </section>
        <!-- /.content -->

        <!-- start footer-->
        @include('frontend.home.footer');
        <!-- end footer-->
    </div>
    <!-- end layout-theme-->


    <!-- ++++++++++++-->
    <!-- MAIN SCRIPTS-->
    <!-- ++++++++++++-->
    <script src="{{ asset('assets/libs/jquery-1.12.4.min.js') }}"></script>
    <script src="{{ asset('assets/libs/jquery-migrate-1.2.1.js') }}"></script>
    <!-- Bootstrap-->
    <script src="{{ asset('assets/libs/bootstrap/bootstrap.min.js') }}"></script>
    <!-- User customization-->
    <script src="{{ asset('assets/js/custom.js') }}"></script>
    <!-- Headers scripts-->
    <script src="{{ asset('assets/plugins/headers/slidebar.js') }}"></script>
    <script src="{{ asset('assets/plugins/headers/header.js') }}"></script>
    <!-- Color scheme-->
    <script src="{{ asset('assets/plugins/switcher/js/dmss.js') }}"></script>
    <!-- Select customization & Color scheme-->
    <script src="{{ asset('assets/plugins/bootstrap-select/js/bootstrap-select.min.js') }}"></script>
    <!-- Slider-->
    <script src="{{ asset('assets/plugins/owl-carousel/owl.carousel.min.js') }}"></script>
    <!-- Pop-up window-->
    <script src="{{ asset('assets/plugins/magnific-popup/jquery.magnific-popup.min.js') }}"></script>
   
    <!-- Filter and sorting images-->
    <script src="{{ asset('assets/plugins/isotope/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/isotope/imagesLoaded.js') }}"></script>
    <!-- Progress numbers-->
    <script src="{{ asset('assets/plugins/rendro-easy-pie-chart/jquery.easypiechart.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/rendro-easy-pie-chart/waypoints.min.js') }}"></script>
    <!-- NoUiSlider-->
    <script src="{{ asset('assets/plugins/noUiSlider/nouislider.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/noUiSlider/wNumb.js') }}"></script>
    <!-- Animations-->
    <script src="{{ asset('assets/plugins/scrollreveal/scrollreveal.min.js') }}"></script>
    <!-- Main slider-->
    <script src="{{ asset('assets/plugins/slider-pro/jquery.sliderPro.min.js') }}"></script>
   
    @stack('js')

</body>

</html>
