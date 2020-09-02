<!doctype html>
<html  lang="{{ str_replace('_', '-', app()->getLocale()) }}">


<head>
	<meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

     <!-- CSRF Token -->
     <meta name="csrf-token" content="{{ csrf_token() }}">

	<title>{{ config('app.name', 'Laravel') }}</title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Favicons -->
	<link rel="shortcut icon" href="images/favicon.ico">
	<link rel="apple-touch-icon" href="images/icon.png">
	<!-- Google font (font-family: 'Dosis', Roboto;) -->
	<link href="https://fonts.googleapis.com/css?family=Dosis:400,500,600,700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,500,700" rel="stylesheet">


	<!-- Stylesheets -->
	<link rel="stylesheet" href="{{ asset('junior/css/bootstrap.min.css') }}">
	<link rel="stylesheet" href="{{ asset('junior/css/plugins.css') }}">
	<link rel="stylesheet" href="{{ asset('junior/css/style.css') }}">

	<!-- Cusom css -->
   <link rel="stylesheet" href="{{ asset('junior/css/custom.css') }}">

	<!-- Modernizer js -->
	<script src="{{ asset('junior/js/vendor/modernizr-3.5.0.min.js') }}"></script>
</head>
<body>
	<!--[if lte IE 9]>
		<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
	<![endif]-->

	<!-- Add your site or application content here -->

	<!-- <div class="fakeloader"></div> -->

	<!-- Main wrapper -->
	<div class="wrapper" id="wrapper">

        <!-- Header -->
		<header id="header" class="jnr__header header--one clearfix">
			<!-- Start Header Top Area -->
			<div class="junior__header__top">
				<div class="container">
					<div class="row">
						<div class="col-md-7 col-lg-6 col-sm-12">
							<div class="jun__header__top__left">
								<ul class="top__address d-flex justify-content-start align-items-center flex-wrap flex-lg-nowrap flex-md-nowrap">
									<li><i class="fa fa-envelope"></i><a href="mailto:asuarb@icloud.com">asuarb@icloud.com</a></li>
								</ul>
							</div>
						</div>
						<div class="col-md-5 col-lg-6 col-sm-12">
							<div class="jun__header__top__right">
								<ul class="accounting d-flex justify-content-lg-end justify-content-md-end justify-content-start align-items-center">
                                    @guest
									<li><a class="login-trigger" href="#">Login</a></li>
                                    <li><a class="accountbox-trigger" href="#">Register</a></li>
                                    @else
                                    <li><a href="{{ route('home') }}">{{ Auth::user()->name }}</a></li>
                                    <li><a href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                      document.getElementById('logout-form').submit();">
                                         {{ __('Logout') }}
                                     </a></li>
                                     <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                    @endguest
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- End Header Top Area -->
			<!-- Start Mainmenu Area -->
			<div class="mainmenu__wrapper bg__cat--1 poss-relative header_top_line sticky__header">
				<div class="container">
					<div class="row d-none d-lg-flex">
						<div class="col-sm-4 col-md-6 col-lg-2 order-1 order-lg-1">
							<div class="logo">
                            <a href="{{route('index')}}">
									<img src="{{ asset('junior/images/logo/2.png') }}" alt="logo images">
								</a>
							</div>
						</div>
						<div class="col-sm-4 col-md-2 col-lg-9 order-3 order-lg-2">
							<div class="mainmenu__wrap">
								<nav class="mainmenu__nav">
                                    <ul class="mainmenu">
                                        <li><a href="{{route('index')}}">Home</a></li>
                                        {{-- <li class="drop"><a>Pages</a>
                                            <ul class="dropdown__menu">
                                                <li><a href="{{route('terms')}}">Our Terms and Conditions</a></li>
                                                <li><a href="{{route('privacy')}}">Our Privacy Policy</a></li>
                                            </ul>
                                        </li> --}}
                                        <li><a href="{{route('contact.index')}}">Contact</a></li>
                                        {{-- <li><a href="{{route('faq')}}">FAQ</a></li> --}}
                                    </ul>
                                </nav>
							</div>
						</div>
						<div class="col-lg-1 col-sm-4 col-md-4 order-2 order-lg-3">
							<div class="shopbox d-flex justify-content-end align-items-center">
								<a href="{{route('cart.index')}}">
									<i class="fa fa-shopping-basket"></i>
								</a>
								<span>
                                    @auth
                                        {{ Cart::session(auth()->id())->getContent()->count() }}
                                    @else
                                        {{ Cart::getContent()->count() }}
                                    @endauth

                                </span>
							</div>
						</div>
					</div>
					<!-- Mobile Menu -->
                    <div class="mobile-menu d-block d-lg-none">
                    	<div class="logo">
                    		<a href="{{route('index')}}"><img src="{{asset('junior/images/logo/junior.png')}}" alt="logo"></a>
                    	</div>
                    	<a class="minicart-trigger" href="{{route('cart.index')}}">
                    		<i class="fa fa-shopping-basket"></i>
                    	</a>
                    </div>
                    <!-- Mobile Menu -->
				</div>
			</div>
			<!-- End Mainmenu Area -->
		</header>



        @yield('content')


        <!-- Start Subscribe Area -->
		<section class="bcare__subscribe bg-image--7 subscrive--2">
			<div class="container">
				<div class="row">
					<div class="col-lg-12 col-sm-12 col-lg-12">
						<div class="subscribe__inner">
							<h2>Subscribe To Our Newsletter</h2>
                            <div class="newsletter__form">
                                <div class="input__box">
                                    <div id="mc_embed_signup">
                                        <form action="{{route('subscribe.store')}}" method="post" id="subscribe-form" class="validate">
                                            @csrf
                                            <div id="mc_embed_signup_scroll" class="htc__news__inner">
                                                <div class="news__input">
                                                    <input type="email" value="" name="email" class="email" placeholder="Enter Your E-mail" required>
                                                </div>
                                                <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
                                                <div style="position: absolute; left: -5000px;" aria-hidden="true"></div>
                                                <div class="clearfix subscribe__btn"><input type="submit" value="Send Now" class="bst__btn btn--white__color" form="subscribe-form">
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
						</div>
					</div>
				</div>
			</div>
		</section>
        <!-- End Subscribe Area -->

		<!-- Footer Area -->
		<footer id="footer" class="footer-area">

			<div class="copyright">
				<div class="container">
					<div class="row align-items-center copyright__wrapper">
						<div class="col-lg-6 col-md-6 col-sm-12">
							<div class="coppy__right__inner">
								<p><i class="fa fa-copyright"></i>{{ date('Y')}} <a href="{{route('index')}}">{{ __("Asuar's Star Books") }}</a> | <a href="{{route('terms')}}">Our Terms and Conditions</a> | <a href="{{route('privacy')}}">Our Privacy Policy</a> | <a href="{{route('faq')}}">FAQ</a></p>
							</div>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-12">
							<div class="ftr__social__icon">
								<ul class="dacre__social__link d-flex justify-content-center justify-content-md-end justify-content-lg-end">
									<li class="facebook"><a href="https://m.facebook.com/Asuarsstarbookcompany/" target="_blank"><i class="fa fa-facebook"></i></a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</footer>
		<!-- //Footer Area -->


        <!-- Register Form -->
        <div class="accountbox-wrapper">
            <div class="accountbox">
                <div class="accountbox__inner">
                	<h4>continue to register</h4>
                    <div class="accountbox__login">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="single-input">
                                <input  type="text" placeholder="Full Name" name="name">
                            </div>
                            <div class="single-input">
                                <input type="email" placeholder="E-mail" name="email">
                            </div>
                            <div class="single-input">
                                <input type="password" placeholder="{{ __('Password') }}" name="password">
                            </div>
                            <div class="single-input">
                                <input type="password" placeholder="{{ __('Confirm Password') }}" name="password_confirmation">
                            </div>
                            <div class="single-input text-center">
                                <button type="submit" class="sign__btn">Sign Up Now</button>
                            </div>
                            {{-- <div class="accountbox-login__others text-center">
                                <h6>or register with</h6>
                                <ul class="dacre__social__link d-flex justify-content-center">
                                    <li class="facebook"><a target="_blank" href="https://www.facebook.com/"><span class="ti-facebook"></span></a></li>
                                    <li class="twitter"><a target="_blank" href="https://twitter.com/"><span class="ti-twitter"></span></a></li>
                                    <li class="pinterest"><a target="_blank" href="#"><span class="ti-google"></span></a></li>
                                </ul>
                            </div> --}}
                        </form>
                    </div>
                    <span class="accountbox-close-button"><i class="zmdi zmdi-close"></i></span>
                </div>
                <h3>Already have an account ? Login</h3>
            </div>
        </div><!-- //Register Form -->

        <!-- Login Form -->
        <div class="login-wrapper">
            <div class="accountbox">
                <div class="accountbox__inner">
                	<h4>{{ __('Login') }} to Continue</h4>
                    <div class="accountbox__login">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="single-input">
                                <input type="email" placeholder="{{ __('E-Mail Address') }}" name="email">
                            </div>
                            <div class="single-input">
                                <input type="password" placeholder="{{ __('Password') }}" name="password">
                            </div>
                            <div class="single-input text-center">
                                <button type="submit" class="sign__btn">LOGIN</button>
                            </div>
                            {{-- <div class="accountbox-login__others text-center">
                                <ul class="dacre__social__link d-flex justify-content-center">
                                    <li class="facebook"><a target="_blank" href="https://www.facebook.com/"><span class="ti-facebook"></span></a></li>
                                    <li class="twitter"><a target="_blank" href="https://twitter.com/"><span class="ti-twitter"></span></a></li>
                                    <li class="pinterest"><a target="_blank" href="#"><span class="ti-google"></span></a></li>
                                </ul>
                            </div> --}}
                        </form>
                    </div>
                    <span class="accountbox-close-button"><i class="zmdi zmdi-close"></i></span>
                </div>
                <h3>Don't have an account ? registration is Quick and easy</h3>
            </div>
        </div><!-- //Login Form -->

	</div><!-- //Main wrapper -->

	<!-- JS Files -->
	<script src="{{ asset('junior/js/vendor/jquery-3.2.1.min.js') }}"></script>
	<script src="{{ asset('junior/js/popper.min.js') }}"></script>
	<script src="{{ asset('junior/js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('junior/js/plugins.js') }}"></script>
	<script src="{{ asset('junior/js/active.js') }}"></script>
</body>
</html>
