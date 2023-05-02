 <header
     class="header header-boxed-width navbar-fixed-top header-background-white header-color-black header-topbar-dark header-logo-black header-topbarbox-1-left header-topbarbox-2-right header-navibox-1-left header-navibox-2-right header-navibox-3-right header-navibox-4-right">
     <div class="container container-boxed-width">
         <div class="top-bar">
             <div class="container">
                 <div class="header-topbarbox-1">
                     <ul>
                         <li><i class="icon fa fa-clock-o"></i> Japan Time

                             <p id="demo"></p>

                             <script>
                                 var options = {
                                     timeZone: "Asia/Tokyo",
                                     year: "numeric",
                                     month: "long",
                                     day: "numeric",
                                     hour: "numeric",
                                     minute: "numeric",
                                     second: "numeric"
                                 };

                                 function displayDateTime() {
                                     var date = new Date();
                                     var dateTime = date.toLocaleDateString("ja-JP", options);
                                     document.getElementById("demo").innerHTML = dateTime;
                                 }

                                 setInterval(displayDateTime, 1000);

                             </script>
                         </li>
                         <li><i class="icon fa fa-whatsapp"></i><a href="https://wa.me/message/7V6S7UP3J6UIC1"
                                 target="_blank">+81-70-8372-9196</a> </li>
                         <li><i class="icon fa fa-envelope-o"></i><a
                                 href="mailto:sales@kmcjapan.co.jp">sales@kmcjapan.co.jp</a>
                         </li>
                     </ul>
                 </div>
                 <div class="header-topbarbox-2">
                     <ul class="social-links">
                         <li><a href="https://www.facebook.com/kmcjapancoltd" target="_blank"><i
                                     class="social_icons fa fa-facebook"></i></a>
                         </li>
                         <li class="li-last"><a href="https://www.instagram.com/kmc.japan/" target="_blank"><i
                                     class="social_icons fa fa-instagram"></i></a>
                         </li>
                         <li><a href="https://www.youtube.com/" target="_blank"><i
                                     class="social_icons fa fa-youtube-play"></i></a>
                         </li>
                     </ul>
                 </div>
             </div>
         </div>
         <nav class="navbar" id="nav">
             <div class="container">
                 <div class="header-navibox-1">
                     <!-- Mobile Trigger Start-->
                     <button class="menu-mobile-button visible-xs-block js-toggle-mobile-slidebar toggle-menu-button"><i
                             class="toggle-menu-button-icon"><span></span><span></span><span></span><span></span><span></span><span></span></i>
                     </button>
                     <!-- Mobile Trigger End-->
                     <a class="navbar-brand scroll" href="{{ url('/') }}">
                         <img class="normal-logo img-responsive" src="{{ url('/') }}/assets/media/general/app_logo.png"
                             alt="logo" style="object-fit: cover;height: 80px;" />
                         <img class="scroll-logo hidden-xs img-responsive"
                             src="{{ url('/') }}/assets/media/general/app_logo.png" alt="logo"
                             style="object-fit: cover;height: 80px;" />
                     </a>
                 </div>
                 <div class="header-navibox-3">
                     <ul class="nav navbar-nav hidden-xs clearfix vcenter">
                         <li>
                             <div class="header-cart"><a href="{{ route('cart') }}"><i
                                         class="icon fa fa-shopping-basket" aria-hidden="true"></i><span
                                         class="header-cart-count bg-primary cartItemCount"
                                         id="">{{ count((array) session('cart')) }}</span></a>
                             </div>
                             <section data-id="notification"></section>
                         </li>

                     </ul>
                 </div>
                 <div class="header-navibox-2">
                     <ul class="yamm main-menu nav navbar-nav">

                         <li><a href="{{ url('/') }}">Home test auto</a>
                         <li><a href="{{ route('car-list') }}">STOCK LIST</a></li>
                         <li><a href="{{ route('review') }}">Review</a>
                         </li>
                         <li><a href="{{ route('about-us') }}">About Us</a></li>
                         <li><a href="{{ route('frontend.contact-us') }}">Contact Us</a></li>
                         <li class="dropdown"><a class="dropdown-toggle" href="#" data-toggle="dropdown">Help<b
                                     class="caret"></b></a>
                             <ul class="dropdown-menu" role="menu">
                                 <li><a href="{{ route('frontend.faq') }}" tabindex="-1">FAQ</a>
                                 </li>
                                 <li><a href="{{ route('how-to-buy') }}" tabindex="-1">How to buy</a>
                                 </li>
                             </ul>
                         </li>
                         @auth

                         <li class="dropdown">
                             <a class="dropdown-toggle" style="border: 1px solid" href="#" data-toggle="dropdown">
                                 {{ Auth::user()->name ." ". Auth::user()->last_name}}

                             </a>
                             <ul class="dropdown-menu" role="menu">
                                 <li><a href="{{ url('/user/profile') }}" tabindex="-1">My Account</a>
                                 </li>
                                 <li><a href="{{ url('/user/order-list') }}" tabindex="-1">My Orders</a></li>
                                 <li><a href="{{ url('/user/payment-list') }}" tabindex="-1">My Payments</a></li>
                                 <li><a href="{{ route('frontend.logout') }}" tabindex="-1">Sign Out</a></li>

                             </ul>
                         </li>
                         @else
                         <li><a href="{{ route('frontend.login') }}">Sign In</a>
                         </li>
                         @endauth

                     </ul>
                 </div>
             </div>
         </nav>
     </div>
 </header>
