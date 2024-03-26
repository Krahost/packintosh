<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<!-- Mirrored from html.creativegigstf.com/babun/babun/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 27 Nov 2023 11:08:04 GMT -->
<head>
	<meta charset="UTF-8">
	<meta name="keywords" content="storage of goods, temporal storage">
	<meta name="description" content="PackinTosh is a temporal storages facility for goods">
    <meta property="og:site_name" content="Babun">
    <meta property="og:url" content="https://creativegigstf.com/">
    <meta property="og:type" content="website">
    <meta property="og:title" content="PackinTosh">
	<meta name='og:image' content='assets/images/assets/ogg.png'>
	<!-- For IE -->
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<!-- For Resposive Device -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- For Window Tab Color -->
	<!-- Chrome, Firefox OS and Opera -->
	<meta name="theme-color" content="#1A4137">
	<!-- Windows Phone -->
	<meta name="msapplication-navbutton-color" content="#1A4137">
	<!-- iOS Safari -->
	<meta name="apple-mobile-web-app-status-bar-style" content="#1A4137">
	<title>PackinTosh</title>
	<!-- Favicon -->
	<link rel="icon" type="image/png" sizes="56x56" href="assets/images/fav-icon/icon.png">
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css" media="all">
	<!-- Main style sheet -->
	<link rel="stylesheet" type="text/css" href="assets/css/style.min.css" media="all">
	<!-- responsive style sheet -->
	<link rel="stylesheet" type="text/css" href="assets/css/responsive.css" media="all">

	<!-- Fix Internet Explorer ______________________________________-->
	<!--[if lt IE 9]>
			<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
			<script src="vendor/html5shiv.js"></script>
			<script src="vendor/respond.js"></script>
		<![endif]-->
</head>

<body>
	<div class="main-page-wrapper">
		<!-- ===================================================
				Loading Transition
			==================================================== -->
		<div id="preloader">
			<div id="ctn-preloader" class="ctn-preloader">
				<div class="icon"><img src="assets/images/loader.svg" alt="" class="m-auto d-block" width="60"></div>
				<div class="txt-loading">
					<span data-text-preloader="P" class="letters-loading">
						P
					</span>
					<span data-text-preloader="a" class="letters-loading">
						a
					</span>
					<span data-text-preloader="c" class="letters-loading">
						c
					</span>
					<span data-text-preloader="k" class="letters-loading">
						k
					</span>
					<span data-text-preloader="i" class="letters-loading">
						i
					</span>
                    <span data-text-preloader="n" class="letters-loading">
						n
					</span>
                    <span data-text-preloader="T" class="letters-loading">
						T
					</span>
                    <span data-text-preloader="o" class="letters-loading">
						o
					</span>
                    <span data-text-preloader="s" class="letters-loading">
						s
					</span>
                    <span data-text-preloader="h" class="letters-loading">
						h
					</span>
				</div>
			</div>
		</div>


		
		<!-- 
		=============================================
				Theme Main Menu
		============================================== 
		-->
		<header class="theme-main-menu menu-overlay menu-style-two sticky-menu">
            <div class="gap-fix info-row">
                <div class="d-md-flex justify-content-between">
                    <div class="greetings text-center"><span class="opacity-50">Hello!!</span> <span class="fw-500">Welcome to PackinTosh.</span></div>
                    <ul class="style-none d-none d-md-flex contact-info">
                        <li class="d-flex align-items-center"><img src="assets/images/lazy.svg" data-src="assets/images/icon/icon_14.svg" alt="" class="lazy-img icon me-2"> <a href="mailto:info@packintosh.com" class="fw-500">info@packintosh.com</a></li>
                        <li class="d-flex align-items-center"><img src="assets/images/lazy.svg" data-src="assets/images/icon/icon_15.svg" alt="" class="lazy-img icon me-2"> <a href="tel:+233 240 000 0000" class="fw-500">+233 240 000 0000</a></li>
                    </ul>
                </div>
            </div>
			<div class="inner-content gap-fix">
				<div class="top-header position-relative">
					<div class="d-flex align-items-center">
						<div class="logo order-lg-0">
							<a href="index.html" class="d-flex align-items-center">
								<img src="assets/images/logo/logo_02.svg" alt="">
							</a>
						</div>
						<!-- logo -->
						<div class="right-widget order-lg-3 ms-auto">
							<ul class="d-flex align-items-center style-none">
                             @auth
                                @if(Auth::user()->is_admin === 1)
                                <li class="d-flex align-items-center login-btn-one me-3 me-md-0">
                                    <a href="{{ route('admin.dashboard') }}"   class="fw-500">Admin</a>
                                </li>
                                 @else
                                 <li class="d-flex align-items-center login-btn-one me-3 me-md-0">
                                    <a href="{{ route('user.index') }}"    class="fw-500">Dashboard</a>
                                </li>
                                @endif
                                <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('frmlogout').submit();" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Logout</a>
                                <form id="frmlogout" method="post" action="{{ route('logout') }}">
                                  @csrf
                                 </form>
                             @else

								<li class="d-flex align-items-center login-btn-one me-3 me-md-0">
                                    <img src="images/lazy.svg" data-src="assets/images/icon/icon_16.svg" alt="" class="lazy-img icon me-2"> 
                                    <a href="#" data-bs-toggle="modal" data-bs-target="#loginModal" class="fw-500">Login</a>
                                </li>
								<li class="d-none d-md-inline-block ms-3 ms-lg-5 me-3 me-lg-0">
                                    <a href="{{route('register')}}"  class="signup-btn-one icon-link">
                                        <span>Signup</span>
                                        <div class="icon rounded-circle d-flex align-items-center justify-content-center"><i class="bi bi-arrow-right"></i></div>
                                    </a>
                                </li>
                                
                            @endauth
                                
							</ul>
						</div> <!--/.right-widget-->
						<nav class="navbar navbar-expand-lg p0 ms-lg-5 order-lg-2">
							<button class="navbar-toggler d-block d-lg-none" type="button" data-bs-toggle="collapse"
								data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
								aria-label="Toggle navigation">
								<span></span>
							</button>
							<div class="collapse navbar-collapse" id="navbarNav">
								<ul class="navbar-nav align-items-lg-center">
									<li class="d-block d-lg-none"><div class="logo"><a href="index.html" class="d-block"><img src="images/logo/logo_02.svg" alt=""></a></div></li>
									<li class="nav-item dropdown">
										<a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
											data-bs-auto-close="outside" aria-expanded="false">Home
										</a>
										{{-- <ul class="dropdown-menu">
											<li><a href="index.html" class="dropdown-item"><span>Finance</span></a></li>
											<li><a href="index-2.html" class="dropdown-item"><span>Business Consultancy</span></a></li>
											<li><a href="index-3.html" class="dropdown-item"><span>Banking</span></a></li>
											<li><a href="index-4.html" class="dropdown-item"><span>Payment Solution</span></a></li>
											<li><a href="index-5.html" class="dropdown-item"><span>Digital Agency</span></a></li>
											<li><a href="index-6.html" class="dropdown-item"><span>Marketing</span></a></li>
										</ul> --}}
									</li>
									<li class="nav-item dropdown mega-dropdown-sm">
                                        <li><a href="#" class="dropdown-item"><span>About Us</span></a></li>
										</a>
						                <ul class="dropdown-menu">
							                <li class="row gx-1">
												{{-- <div class="col-lg-4">
													<div class="menu-column">
														<ul class="style-none mega-dropdown-list">
															<li><a href="#" class="dropdown-item"><span>Service v-1</span></a></li>
															<li><a href="#" class="dropdown-item"><span>Service v-2</span></a></li>
															<li><a href="#" class="dropdown-item"><span>Service Details</span></a></li>
															<li><a href="team-v1.html" class="dropdown-item"><span>Team V-1</span></a></li>
															<li><a href="team-v2.html" class="dropdown-item"><span>Team V-2</span></a></li>
															<li><a href="team-details.html" class="dropdown-item"><span>Team Details</span></a></li>
														</ul>
													</div> <!--/.menu-column -->
												</div> --}}
												{{-- <div class="col-lg-4">
													<div class="menu-column">
														<ul class="style-none mega-dropdown-list">
															<li><a href="#" class="dropdown-item"><span>About Us V-1</span></a></li>
															<li><a href="#" class="dropdown-item"><span>About Us V-2</span></a></li>
															<li><a href="testimonial.html" class="dropdown-item"><span>Testimonial</span></a></li>
															<li><a href="#" class="dropdown-item"><span>Pricing</span></a></li>
															<li><a href="#" class="dropdown-item"><span>FAQ’s</span></a></li>
															<li><a href="404.html" class="dropdown-item"><span>404 Error</span></a></li>
														</ul>
													</div> <!--/.menu-column -->
												</div> --}}
												{{-- <div class="col-lg-4">
													<div class="menu-column">
														<ul class="style-none mega-dropdown-list">
															<li><a href="#" class="dropdown-item"><span>Project V-1</span></a></li>
															<li><a href="project-v2.html" class="dropdown-item"><span>Project V-2</span></a></li>
															<li><a href="project-v3.html" class="dropdown-item"><span>Project V-3</span></a></li>
															<li><a href="#" class="dropdown-item"><span>Project Details V-1</span></a></li>
															<li><a href="project-details-v2.html" class="dropdown-item"><span>Project Details V-2</span></a></li>
														</ul>
													</div> <!--/.menu-column -->
												</div> --}}
											</li>
						                </ul>
						            </li>
									{{-- <li class="nav-item dropdown">
										<a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
											data-bs-auto-close="outside" aria-expanded="false">Shop
										</a>
										<ul class="dropdown-menu">
											<li><a href="shop-grid.html" class="dropdown-item"><span>Shop</span></a></li>
											<li><a href="shop-details.html" class="dropdown-item"><span>Shop Details</span></a></li>
											<li><a href="cart.html" class="dropdown-item"><span>Cart</span></a></li>
											<li><a href="checkout.html" class="dropdown-item"><span>Checkout</span></a></li>
										</ul>
									</li> --}}
									{{-- <li class="nav-item dropdown">
										<a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
											data-bs-auto-close="outside" aria-expanded="false">Blog
										</a>
										<ul class="dropdown-menu">
											<li><a href="#" class="dropdown-item"><span>Blog List</span></a></li>
											<li><a href="#" class="dropdown-item"><span>Blog Grid</span></a></li>
											<li><a href="#" class="dropdown-item"><span>Blog Details</span></a></li>
										</ul>
									</li> --}}
									<li class="nav-item">
										<a class="nav-link" href="#" role="button">Contact Us</a>
									</li>
									<li class="d-md-none ps-2 pe-2">
										<a href="#" data-bs-toggle="modal" data-bs-target="#loginModal" class="signup-btn-one icon-link w-100 mt-20">
											<span class="flex-fill text-center">Signup</span>
											<div class="icon rounded-circle d-flex align-items-center justify-content-center"><i class="bi bi-arrow-right"></i></div>
										</a>
										<ul class="style-none contact-info m0 pt-30">
											<li class="d-flex align-items-center p0 mt-15"><img src="images/lazy.svg" data-src="images/icon/icon_14.svg" alt="" class="lazy-img icon me-2"> <a href="mailto:babuninc@company.com" class="fw-500">info@packintosh.com</a></li>
                        					<li class="d-flex align-items-center p0 mt-15"><img src="images/lazy.svg" data-src="images/icon/icon_15.svg" alt="" class="lazy-img icon me-2"> <a href="tel:++233 0244-777 7777" class="fw-500">+233 0244-777 7777</a></li>
										</ul>
									</li>
								</ul>
							</div>
						</nav>
					</div>
				</div> <!--/.top-header-->
			</div> <!-- /.inner-content -->
		</header> 
		<!-- /.theme-main-menu -->



		<!-- 
		=============================================
			Hero Banner
		============================================== 
		-->
		<div class="hero-banner-two light-bg pt-200 pb-85 position-relative">
			<div class="container position-relative">
				<div class="row">
					<div class="col-lg-10 m-auto">
						<h1 class="hero-heading text-center fw-bold wow fadeInUp mt-10">Storage and Moving<span class="d-inline-block position-relative">PackinTosh <img src="images/lazy.svg" data-src="images/shape/shape_04.svg" alt="" class="lazy-img"></span></h1>
						<p class="text-xl text-center pt-35 pb-35 wow fadeInUp" data-wow-delay="0.1s"> is the ideal solution if you need storage or moving, Even if you're not a student</p>
						<form action="{{ route('register') }}" class="m-auto position-relative wow fadeInUp" data-wow-delay="0.2s">
							@csrf
							@method('post')
                            <input type="email" name="email" placeholder="Your email address...">
                            <button class="btn-four">Sign up</button>
                        </form>
					</div>
				</div>
                <div class="row">
                    <div class="col-xl-10 m-auto">
                        <div class="partner-logo-one pt-80 md-p-70">
                            <p class="fw-500 text-dark text-center mb-40"><span class="text-decoration-underline">Join 27,000+</span> students who’ve reached </p>
                            <div class="partner-slider-one">
                                <div class="item">
                                    <div class="logo d-flex align-items-center justify-content-center"><img src="assets/images/logo/media_03.png" alt=""></div>
                                </div>
                                <div class="item">
                                    <div class="logo d-flex align-items-center justify-content-center"><img src="assets/images/logo/media_04.png" alt=""></div>
                                </div>
                                <div class="item">
                                    <div class="logo d-flex align-items-center justify-content-center"><img src="assets/images/logo/media_05.png" alt=""></div>
                                </div>
                                <div class="item">
                                    <div class="logo d-flex align-items-center justify-content-center"><img src="assets/images/logo/media_01.png" alt=""></div>
                                </div>
                                <div class="item">
                                    <div class="logo d-flex align-items-center justify-content-center"><img src="assets/images/logo/media_02.png" alt=""></div>
                                </div>
                                <div class="item">
                                    <div class="logo d-flex align-items-center justify-content-center"><img src="assets/images/logo/media_04.png" alt=""></div>
                                </div>
                                <div class="item">
                                    <div class="logo d-flex align-items-center justify-content-center"><img src="assets/images/logo/media_05.png" alt=""></div>
                                </div>
                            </div>
                        </div>
                        <!-- /.partner-logo-one -->
                    </div>
                </div>
			</div>
			<img src="images/lazy.svg" data-src="assets/images/shape/shape_05.svg" alt="" class="lazy-img shapes shape_01">
			<img src="images/lazy.svg" data-src="assets/images/shape/shape_06.svg" alt="" class="lazy-img shapes shape_02">
			<img src="images/lazy.svg" data-src="assets/images/assets/screen_02.png" alt="" class="lazy-img shapes shape_03">
			<img src="images/lazy.svg" data-src="assets/images/assets/screen_03.png" alt="" class="lazy-img shapes shape_04">
		</div>
		<!-- /.hero-banner-two -->


		<!-- 
		=============================================
			Text Feature Two
		============================================== 
		-->
		<div class="text-feature-two position-relative pt-110 lg-pt-80 pb-110 lg-pb-80">
			<div class="container">
				<div class="row align-items-center">
					<div class="col-xl-6 col-lg-7">
						<div class="title-one">
							<h2 class="text-white">The Numbers Reflect Our Reputation.</h2>
						</div>
						<!-- /.title-one -->
					</div>
					<div class="col-lg-5 ms-auto">
						<p class="m0 text-md text-white md-pt-10">One of our biggest services, storage-by-the-box allows you to choose how many boxes you want to store and for how long.</p>
					</div>
				</div>

				<div class="row gx-0 mt-50 lg-mt-20 md-mt-10">
					<div class="col-lg-4">
						<div class="card-style-five text-center mt-60">
							<div class="icon d-flex align-content-center justify-content-center"><img src="assets/images/lazy.svg" data-src="assets/images/icon/icon_17.svg" alt="" class="lazy-img"></div>
							<div class="main-count fw-500"><span class="counter">120</span>mil+</div>
							<p class="ps-xxl-5 ps-xl-3 pe-xxl-5 pe-xl-3">We’ve experience more than 10+ years with success.</p>
						</div>
						<!-- /.card-style-five -->
					</div>
					<div class="col-lg-4">
						<div class="card-style-five text-center mt-60">
							<div class="icon d-flex align-content-center justify-content-center"><img src="assets/images/lazy.svg" data-src="assets/images/icon/icon_18.svg" alt="" class="lazy-img"></div>
							<div class="main-count fw-500">$<span class="counter">1.3</span>b+</div>
							<p class="ps-xxl-5 ps-xl-3 pe-xxl-5 pe-xl-3">We achieve lot for our work from top certified agency.</p>
						</div>
						<!-- /.card-style-five -->
					</div>
					<div class="col-lg-4">
						<div class="card-style-five text-center mt-60">
							<div class="icon d-flex align-content-center justify-content-center"><img src="images/lazy.svg" data-src="images/icon/icon_19.svg" alt="" class="lazy-img"></div>
							<div class="main-count fw-500"><span class="counter">730</span>k+</div>
							<p class="ps-xxl-5 ps-xl-3 pe-xxl-5 pe-xl-3">We’ve more than happy 3000+ client all over the world.</p>
						</div>
						<!-- /.card-style-five -->
					</div>
				</div>
			</div>
			<img src="images/lazy.svg" data-src="images/shape/shape_07.svg" alt="" class="lazy-img shapes shape_01">
			<img src="images/lazy.svg" data-src="images/shape/shape_08.svg" alt="" class="lazy-img shapes shape_02">
		</div>
		<!-- /.text-feature-two -->
		


		<!--
		=====================================================
			BLock Feature Four
		=====================================================
		-->

		{{-- <div class="block-feature-four position-relative mt-150 lg-mt-80 pb-150 lg-pb-80">
			<div class="container">
				<div class="row align-items-center">
					<div class="col-xl-8 col-lg-9 m-auto wow fadeInUp">
						<div class="title-one text-center mb-50 lg-mb-20">
							<h2>We're here to help you build,  & protect your wealth.</h2>
						</div>
						<!-- /.title-one -->
					</div>
				</div>
				<div class="row gx-xxl-5">
					<div class="col-lg-4 d-flex wow fadeInUp">
						<div class="card-style-six text-center vstack tran3s w-100 mt-30">
							<div class="icon rounded-circle d-flex align-items-center justify-content-center m-auto"><img src="assets/images/lazy.svg" data-src="assets/images/icon/icon_20.svg" alt="" class="lazy-img"></div>
							<h4 class="fw-bold mt-40 md-mt-30 mb-25">Expert Advisor</h4>
							<p class="mb-20">Elit esse cillum dolore eu fugiat nulla pariatur</p>
							<a href="#" class="arrow-btn tran3s m-auto stretched-link"><img src="assets/images/lazy.svg" data-src="assets/images/icon/icon_09.svg" alt="" class="lazy-img"></a>
						</div>
						<!-- /.card-style-six -->
					</div>
					<div class="col-lg-4 d-flex wow fadeInUp" data-wow-delay="0.1s">
						<div class="card-style-six text-center vstack tran3s w-100 mt-30 active">
							<div class="icon rounded-circle d-flex align-items-center justify-content-center m-auto"><img src="images/lazy.svg" data-src="assets/images/icon/icon_21.svg" alt="" class="lazy-img"></div>
							<h4 class="fw-bold mt-40 md-mt-30 mb-25">Highly Secured</h4>
							<p class="mb-20">Elit esse cillum dolore eu fugiat nulla pariatur</p>
							<a href="#" class="arrow-btn tran3s m-auto stretched-link"><img src="assets/images/lazy.svg" data-src="images/icon/icon_09.svg" alt="" class="lazy-img"></a>
						</div>
						<!-- /.card-style-six -->
					</div>
					<div class="col-lg-4 d-flex wow fadeInUp" data-wow-delay="0.2s">
						<div class="card-style-six text-center vstack tran3s w-100 mt-30">
							<div class="icon rounded-circle d-flex align-items-center justify-content-center m-auto"><img src="images/lazy.svg" data-src="assets/images/icon/icon_22.svg" alt="" class="lazy-img"></div>
							<h4 class="fw-bold mt-40 md-mt-30 mb-25">Management</h4>
							<p class="mb-20">Elit esse cillum dolore eu fugiat nulla pariatur</p>
							<a href="#" class="arrow-btn tran3s m-auto stretched-link"><img src="assets/images/lazy.svg" data-src="images/icon/icon_09.svg" alt="" class="lazy-img"></a>
						</div>
						<!-- /.card-style-six -->
					</div>
				</div>
			</div>
			<img src="images/lazy.svg" data-src="assets/images/shape/shape_05.svg" alt="" class="lazy-img shapes shape_01">
			<img src="images/lazy.svg" data-src="assets/images/shape/shape_06.svg" alt="" class="lazy-img shapes shape_02">
		</div> --}}
		<!-- /.block-feature-four -->


		<!--
		=====================================================
			Text Feature Three
		=====================================================
		-->
		{{-- <div class="text-feature-three position-relative mt-30 pb-150 lg-pb-80">
			<div class="container">
				<div class="row">
					<div class="col-xxl-5 col-lg-6 ms-auto d-flex flex-column order-lg-last wow fadeInRight">
						<div class="title-one">
							<div class="upper-title">About us</div>
							<h2>Guideline for your financial grow.</h2>
						</div>
						<!-- /.title-one -->
						<p class="text-lg mt-45 lg-mt-30 mb-35 lg-mb-30">Your success is our mission. As business advisors, we offer expert guidance, unlocking your potential for growth and profitability</p>
						<div><a href="#" class="btn-four mt-15">More About us</a></div>
						<div class="counter-wrapper mt-60 lg-mt-40 pt-25 lg-pt-10">
							<div class="row">
								<div class="col-xl-6 col-sm-5">
									<div class="counter-block-one mt-20">
										<div class="main-count fw-bold"><span class="counter">1.2</span>x</div>
										<p class="m0">Rapid wealth grow</p>
									</div>
									<!-- /.counter-block-one -->
								</div>
								<div class="col-xl-6 col-sm-7">
									<div class="counter-block-one mt-20">
										<div class="main-count fw-bold">$<span class="counter">1.3</span>b+</div>
										<p class="m0">Cumulative trading volume</p>
									</div>
									<!-- /.counter-block-one -->
								</div>
							</div>
						</div>
						<!-- /.counter-wrapper -->
					</div>
					<div class="col-xxl-6 col-lg-5 d-flex order-lg-first wow fadeInLeft">
						<div class="media-wrapper w-100 position-relative">
							<img src="assets/images/lazy.svg" data-src="assets/images/assets/screen_04.svg" alt="" class="lazy-img shapes screen_01">
							<img src="assets/images/lazy.svg" data-src="assets/images/assets/screen_05.svg" alt="" class="lazy-img shapes screen_02">
						</div>
					</div>
				</div>
			</div>
			<img src="assets/images/lazy.svg" data-src="assets/images/shape/shape_06.svg" alt="" class="lazy-img shapes shape_01">
		</div> --}}
		<!-- /.text-feature-three -->
		


		<!--
		=====================================================
			BLock Feature Five
		=====================================================
		-->
		{{-- <div class="block-feature-five light-bg position-relative mt-80 md-mt-50 pt-120 lg-pt-80 pb-150 lg-pb-80">
			<div class="container">
				<div class="position-relative">
					<div class="row">
						<div class="col-lg-8 wow fadeInLeft">
							<div class="title-one mb-50 lg-mb-30 md-mb-10">
								<h2>Confidently secure assets with expert guidance.</h2>
							</div>
							<!-- /.title-one -->
						</div>
					</div>

					<div class="row">
						<div class="col-xl-3 col-md-6 d-flex wow fadeInUp">
							<div class="card-style-seven text-center vstack tran3s w-100 mt-30">
								<div class="icon tran3s rounded-circle d-flex align-items-center justify-content-center m-auto"><img src="assets/images/lazy.svg" data-src="assets/images/icon/icon_23.svg" alt="" class="lazy-img"></div>
								<h4 class="fw-bold mt-40 md-mt-20 mb-20">Banking</h4>
								<p class="mb-60 md-mb-40">Effortless payments and transfers with our streamlined banking process.</p>
								<a href="#" class="arrow-btn tran3s m-auto stretched-link"><img src="assets/images/lazy.svg" data-src="assets/images/icon/icon_09.svg" alt="" class="lazy-img"></a>
							</div>
							<!-- /.card-style-seven -->
						</div>
						<div class="col-xl-3 col-md-6 d-flex wow fadeInUp" data-wow-delay="0.1s">
							<div class="card-style-seven text-center vstack tran3s w-100 mt-30">
								<div class="icon tran3s rounded-circle d-flex align-items-center justify-content-center m-auto"><img src="assets/images/lazy.svg" data-src="assets/images/icon/icon_24.svg" alt="" class="lazy-img"></div>
								<h4 class="fw-bold mt-40 md-mt-20 mb-20">Earning</h4>
								<p class="mb-60 md-mb-40">Earning potential grows with dedication, innovation, and continuous improvement.</p>
								<a href="#" class="arrow-btn tran3s m-auto stretched-link"><img src="assets/images/lazy.svg" data-src="assets/images/icon/icon_09.svg" alt="" class="lazy-img"></a>
							</div>
							<!-- /.card-style-seven -->
						</div>
						<div class="col-xl-3 col-md-6 d-flex wow fadeInUp" data-wow-delay="0.2s">
							<div class="card-style-seven text-center vstack tran3s w-100 mt-30">
								<div class="icon tran3s rounded-circle d-flex align-items-center justify-content-center m-auto"><img src="assets/images/lazy.svg" data-src="assets/images/icon/icon_25.svg" alt="" class="lazy-img"></div>
								<h4 class="fw-bold mt-40 md-mt-20 mb-20">Expense Track</h4>
								<p class="mb-60 md-mb-40">Empower your budgeting with accurate and intuitive expense tracking</p>
								<a href="#" class="arrow-btn tran3s m-auto stretched-link"><img src="assets/images/lazy.svg" data-src="assets/images/icon/icon_09.svg" alt="" class="lazy-img"></a>
							</div>
							<!-- /.card-style-seven -->
						</div>
						<div class="col-xl-3 col-md-6 d-flex wow fadeInUp" data-wow-delay="0.3s">
							<div class="card-style-seven text-center vstack tran3s w-100 mt-30">
								<div class="icon tran3s rounded-circle d-flex align-items-center justify-content-center m-auto"><img src="assets/images/lazy.svg" data-src="assets/images/icon/icon_26.svg" alt="" class="lazy-img"></div>
								<h4 class="fw-bold mt-40 md-mt-20 mb-20">Savings</h4>
								<p class="mb-60 md-mb-40">Secure your dreams through disciplined savings & prudent investments.</p>
								<a href="#" class="arrow-btn tran3s m-auto stretched-link"><img src="assets/images/lazy.svg" data-src="assets/images/icon/icon_09.svg" alt="" class="lazy-img"></a>
							</div>
							<!-- /.card-style-seven -->
						</div>
					</div>

					<div class="section-btn md-mt-40">
						<a href="#" class="btn-seven d-inline-flex align-items-center">
							<span class="text">All Services</span>
							<div class="icon tran3s rounded-circle d-flex align-items-center"><img src="assets/assets/images/lazy.svg" data-src="assets/images/icon/icon_27.svg" alt="" class="lazy-img"></i></div>
						</a>
					</div>
				</div>
			</div>
			<img src="images/lazy.svg" data-src="assets/assets/images/shape/shape_06.svg" alt="" class="lazy-img shapes shape_01">
		</div> --}}
		<!-- /.block-feature-five -->



		<!-- 
		=============================================
			Feedback Section Two
		============================================== 
		-->
		{{-- <div class="feedback-section-two position-relative mt-150 lg-mt-80">
			<div class="container">
				<div class="position-relative">
					<div class="row">
						<div class="col-lg-8 m-auto">
							<div class="title-one text-center mb-80 lg-mb-40 wow fadeInUp">
								<h2>We help 10k+ Customers to full fill their dream.</h2>
							</div>
							<!-- /.title-one -->
						</div>
					</div>
				</div>
			</div>

			<div class="slider-wrapper">
				<div class="feedback-slider-two">
					<div class="item">
						<div class="feedback-block-two tran3s">
							<div class="d-flex align-items-center">
								<img src="assets/images/media/img_08.jpg" alt="" class="avatar rounded-circle">
								<div class="ps-3">
									<div class="name fw-bold">James Bond.</div>
									<p class="m0">Thailad</p>
								</div>
							</div>
							<blockquote class="text-lg">We are absolutely thrilled with the services provided by Babun! Their team went above and beyond to transform our outdated website into a stunning, user-friendly masterpiece.</blockquote>
							<div class="bottom-line d-flex align-items-center justify-content-between">
								<ul class="style-none d-flex rating">
									<li><i class="bi bi-star-fill"></i></li>
									<li><i class="bi bi-star-fill"></i></li>
									<li><i class=assets/"bi bi-star-fill"></i></li>
									<li><i class="bi bi-star-fill"></i></li>
									<li><i class="bi bi-star-fill"></i></li>
								</ul>
								<img src="assets/images/icon/icon_28.svg" alt="" class="icon">
							</div>
						</div>
						<!-- /.feedback-block-two -->
					</div>
					<div class="item">
						<div class="feedback-block-two tran3s">
							<div class="d-flex align-items-center">
								<img src="assets/images/media/img_09.jpg" alt="" class="avatar rounded-circle">
								<div class="ps-3">
									<div class="name fw-bold">James Bond.</div>
									<p class="m0">Thailad</p>
								</div>
							</div>
							<blockquote class="text-lg">It's been an absolute pleasure working with Babun on our brand identity overhaul. Their ability to capture the essence of our culinary vision and translate it into a visual identity has been commendable. </blockquote>
							<div class="bottom-line d-flex align-items-center justify-content-between">
								<ul class="style-none d-flex rating">
									<li><i class="bi bi-star-fill"></i></li>
									<li><i class="bi bi-star-fill"></i></li>
									<li><i class="bi bi-star-fill"></i></li>
									<li><i class="bi bi-star-fill"></i></li>
									<li><i class="bi bi-star-fill"></i></li>
								</ul>
								<img src="assets/images/icon/icon_28.svg" alt="" class="icon">
							</div>
						</div>
						<!-- /.feedback-block-two -->
					</div>
					<div class="item">
						<div class="feedback-block-two tran3s">
							<div class="d-flex align-items-center">
								<img src="assets/images/media/img_08.jpg" alt="" class="avatar rounded-circle">
								<div class="ps-3">
									<div class="name fw-bold">Zubayer Al Hasan</div>
									<p class="m0">Dhaka</p>
								</div>
							</div>
							<blockquote class="text-lg">Babun Solutions has truly been a game changer for our business. Their expertise in developing our mobile app has streamlined our operations and enhanced the user experience remarkably.</blockquote>
							<div class="bottom-line d-flex align-items-center justify-content-between">
								<ul class="style-none d-flex rating">
									<li><i class="bi bi-star-fill"></i></li>
									<li><i class="bi bi-star-fill"></i></li>
									<li><i class="bi bi-star-fill"></i></li>
									<li><i class="bi bi-star-fill"></i></li>
									<li><i class="bi bi-star-fill"></i></li>
								</ul>
								<img src="assets/images/icon/icon_28.svg" alt="" class="icon">
							</div>
						</div>
						<!-- /.feedback-block-two -->
					</div>
					<div class="item">
						<div class="feedback-block-two tran3s">
							<div class="d-flex align-items-center">
								<img src="assets/images/media/img_09.jpg" alt="" class="avatar rounded-circle">
								<div class="ps-3">
									<div class="name fw-bold">James Bond.</div>
									<p class="m0">Thailad</p>
								</div>
							</div>
							<blockquote class="text-lg">Babun thumbs up to the team! Their personalized approach to fitness training has been a breath of fresh air. The trainers are not only knowledgeable but also genuinely invested in their clients' well-being</blockquote>
							<div class="bottom-line d-flex align-items-center justify-content-between">
								<ul class="style-none d-flex rating">
									<li><i class="bi bi-star-fill"></i></li>
									<li><i class="bi bi-star-fill"></i></li>
									<li><i class="bi bi-star-fill"></i></li>
									<li><i class="bi bi-star-fill"></i></li>
									<li><i class="bi bi-star-fill"></i></li>
								</ul>
								<img src="assets/images/icon/icon_28.svg" alt="" class="icon">
							</div>
						</div>
						<!-- /.feedback-block-two -->
					</div>
				</div>
			</div>
			<!-- /.slider-wrapper -->
			<img src="assets/images/lazy.svg" data-src="assets/images/shape/shape_06.svg" alt="" class="lazy-img shapes shape_01">
		</div> --}}
		<!-- /.feedback-section-two -->


		

		<!--
		=====================================================
			FAQ Section Two
		=====================================================
		-->
		{{-- <div class="faq-section-two position-relative mt-180 lg-mt-100 pb-150 lg-pb-80">
			<div class="container">
				<div class="position-relative">
					<div class="title-one mb-40">
						<h2>Our Successful Projects.</h2>
						<p class="text-lg pt-15 lg-pt-10">See some of our client success story in details.</p>
					</div>
					<!-- /.title-one -->
					<div class="row">
						<div class="col-12">
							<div class="accordion accordion-style-two mt-15" id="accordionOne">
								<div class="accordion-item">
									<h2 class="accordion-header">
										<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
											1. The Criminal Mind Analysis & Results
										</button>
									  </h2>
									  <div id="collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionOne">
										<div class="accordion-body">
											<div class="row">
												<div class="col-lg-6">
													<h6>Aproach</h6>
													<p class="mb-50">Consultants specializing in strategy support organizations in achieving competitive excellence through deliberate.</p>
													<h6>FINAL results</h6>
													<ul class="style-none pt-20 pb-30">
														<li>Expanded investment via Innovative Solutions.</li>
														<li>Improving risk management with advanced analytics.</li>
														<li>Grow profit, enhanced clients satisfaction.</li>
													</ul>
													<a href="#" class="btn-eight icon-link">
														<span class="text">Full Case Study</span>
														<div class="icon tran3s rounded-circle d-flex align-items-center justify-content-center"><i class="bi bi-arrow-right"></i></div>
													</a>
												</div>
												<div class="col-lg-6 d-flex">
													<div class="media-wrapper ms-auto me-auto w-100 d-flex align-items-center justify-content-center position-relative" style="background-image: url(images/media/img_01.jpg);">
														<a class="fancybox rounded-circle video-icon tran3s text-center d-flex align-items-center justify-content-center" data-fancybox="" href="https://www.youtube.com/embed/aXFSJTjVjw0">
															<img src="assets/images/icon/icon_29.svg" alt="">
														</a>
													</div>
												</div>
											</div>
										</div>
									  </div>
								</div>
								<div class="accordion-item">
									<h2 class="accordion-header">
										<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
											2. Invest the saving fund in proper way to get healthy return.
										</button>
									</h2>
									<div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionOne">
										<div class="accordion-body">
											<div class="row">
												<div class="col-lg-6">
													<h6>Aproach</h6>
													<p class="mb-50">Consultants specializing in strategy support organizations in achieving competitive excellence through deliberate.</p>
													<h6>FINAL results</h6>
													<ul class="style-none pt-20 pb-30">
														<li>Expanded investment via Innovative Solutions.</li>
														<li>Improving risk management with advanced analytics.</li>
														<li>Grow profit, enhanced clients satisfaction.</li>
													</ul>
													<a href="#" class="btn-eight icon-link">
														<span class="text">Full Case Study</span>
														<div class="icon tran3s rounded-circle d-flex align-items-center justify-content-center"><i class="bi bi-arrow-right"></i></div>
													</a>
												</div>
												<div class="col-lg-6 d-flex">
													<div class="media-wrapper ms-auto me-auto w-100 d-flex align-items-center justify-content-center position-relative" style="background-image: url(images/media/img_02.jpg);">
														<a class="fancybox rounded-circle video-icon tran3s text-center d-flex align-items-center justify-content-center" data-fancybox="" href="https://www.youtube.com/embed/aXFSJTjVjw0">
															<img src="assets/images/icon/icon_29.svg" alt="">
														</a>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="accordion-item">
									<h2 class="accordion-header">
										<button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
											3. Digital Transformation Roadmap
										</button>
									</h2>
									<div id="collapseThree" class="accordion-collapse collapse show" data-bs-parent="#accordionOne">
										<div class="accordion-body">
											<div class="row">
												<div class="col-lg-6">
													<h6>Aproach</h6>
													<p class="mb-50">Consultants specializing in strategy support organizations in achieving competitive excellence through deliberate.</p>
													<h6>FINAL results</h6>
													<ul class="style-none pt-20 pb-30">
														<li>Expanded investment via Innovative Solutions.</li>
														<li>Improving risk management with advanced analytics.</li>
														<li>Grow profit, enhanced clients satisfaction.</li>
													</ul>
													<a href="#" class="btn-eight icon-link">
														<span class="text">Full Case Study</span>
														<div class="icon tran3s rounded-circle d-flex align-items-center justify-content-center"><i class="bi bi-arrow-right"></i></div>
													</a>
												</div>
												<div class="col-lg-6 d-flex">
													<div class="media-wrapper ms-auto me-auto w-100 d-flex align-items-center justify-content-center position-relative" style="background-image: url(images/media/img_16.jpg);">
														<a class="fancybox rounded-circle video-icon tran3s text-center d-flex align-items-center justify-content-center" data-fancybox="" href="https://www.youtube.com/embed/aXFSJTjVjw0">
															<img src="assets/images/icon/icon_29.svg" alt="">
														</a>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<!-- /.accordion-style-two -->
						</div>
					</div>

					<div class="section-btn sm-mt-40">
						<a href="project-v2.html" class="btn-nine rounded-circle d-inline-flex align-items-center justify-content-center tran3s"><i class="bi bi-arrow-up-right"></i></a>
					</div>
				</div>
			</div>
			<img src="assets/images/lazy.svg" data-src="assets/images/shape/shape_06.svg" alt="" class="lazy-img shapes shape_01">
			<img src="assets/images/lazy.svg" data-src="assets/images/shape/shape_06.svg" alt="" class="lazy-img shapes shape_02">
		</div> --}}
		<!-- /.faq-section-two -->


		<!--
		=====================================================
			Blog Section Two
		=====================================================
		-->
		{{-- <div class="blog-section-two position-relative mt-20 pb-150 lg-pb-80">
			<div class="container">
				<div class="position-relative">
					<div class="title-one mb-30 lg-mb-10">
						<h2>Insights News.</h2>
					</div>
					<!-- /.title-one -->

					<div class="row gx-xl-5">
						<div class="col-md-6">
							<article class="blog-meta-two mt-35 wow fadeInUp">
								<figure class="post-img position-relative d-flex align-items-end m0" style="background-image: url(assets/images/blog/blog_img_03.jpg);">
									<a href="#" class="stretched-link date tran3s">09 FEB</a>
								</figure>
								<div class="post-data">
									<div class="d-flex justify-content-between align-items-sm-center flex-wrap">
										<a href="#" class="blog-title"><h4>Spending Habits, 13 Tips for grow Your Money.</h4></a>
										<a href="#" class="round-btn rounded-circle d-flex align-items-center justify-content-center tran3s"><i class="bi bi-arrow-up-right"></i></a>
									</div>
									<div class="post-info">Rashed Ka . 6 min . Finance </div>
								</div>
							</article>
							<!-- /.blog-meta-two -->
						</div>
						<div class="col-md-6">
							<article class="blog-meta-two mt-35 wow fadeInUp" data-wow-delay="0.1s">
								<figure class="post-img position-relative d-flex align-items-end m0" style="background-image: url(assets/images/blog/blog_img_04.jpg);">
									<a href="#" class="stretched-link date tran3s">12 aug</a>
								</figure>
								<div class="post-data">
									<div class="d-flex justify-content-between align-items-sm-center flex-wrap">
										<a href="#" class="blog-title"><h4>Our Travel Card Makes you Happy.</h4></a>
										<a href="#" class="round-btn rounded-circle d-flex align-items-center justify-content-center tran3s"><i class="bi bi-arrow-up-right"></i></a>
									</div>
									<div class="post-info">Jubayer Hasan . 7 min read . Travelling</div>
								</div>
							</article>
							<!-- /.blog-meta-two -->
						</div>
					</div>

					<div class="section-btn sm-mt-60">
						<a href="#" class="btn-seven d-inline-flex align-items-center">
							<span class="text">See all blogs</span>
							<div class="icon tran3s rounded-circle d-flex align-items-center"><img src="assets/images/lazy.svg" data-src="assets/images/icon/icon_27.svg" alt="" class="lazy-img"></i></div>
						</a>
					</div>
				</div>
			</div>
			<img src="images/lazy.svg" data-src="assets/images/shape/shape_06.svg" alt="" class="assets/lazy-img shapes shape_01">
		</div> --}}
		<!-- /.blog-section-two -->


		<!--
		=====================================================
			Fancy Banner Three
		=====================================================
		-->
		{{-- <div class="fancy-banner-three position-relative wow fadeInUp">
			<div class="container">
				<div class="row align-content-center">
					<div class="col-lg-8 col-md-9">
						<div class="title-one mb-20 lg-mb-10">
							<h2 class="text-white">Want to Chat? Feel free to Contact our Team.</h2>
						</div>
						<!-- /.title-one -->
						<p class="text-lg m0 text-white opacity-75">If you have anything in mind just contact us with our expert.</p>
					</div>
					<div class="col-lg-4 col-md-3">
						<a href="#" class="quote-btn tran5s rounded-circle d-flex align-items-center justify-content-center ms-auto">
							<img src="assets/images/lazy.svg" data-src="assets/images/icon/icon_30.svg" alt="" class="lazy-img">
						</a>
					</div>
				</div>
			</div>
		</div> --}}
		<!-- /.fancy-banner-three -->




		<!--
		=====================================================
			Footer Two
		=====================================================
		-->
		<div class="footer-two">
			<div class="container">
				<div class="bg-wrapper position-relative">
					<div class="container">
						<div class="row justify-content-between">
							<div class="col-xl-3 col-lg-4 footer-intro mb-30">
								<div class="logo mb-35 md-mb-20">
									<a href="index.html">
										<img src="assets/images/logo/logo_02.svg" alt="">
									</a>
								</div> 
								<!-- logo -->
								<p class="lh-sm mb-40 md-mb-20">Accra-Ghana</p>
								<ul class="style-none d-flex align-items-center social-icon">
									<li><a href="#"><i class="bi bi-facebook"></i></a></li>
									<li><a href="#"><i class="bi bi-dribbble"></i></a></li>
									<li><a href="#"><i class="bi bi-instagram"></i></a></li>
								</ul>
							</div>
							<div class="col-lg-2 col-sm-4 mb-20">
								<h5 class="footer-title">Links</h5>
								<ul class="footer-nav-link style-none">
									<li><a href="">Home</a></li>
									<li><a href="#">Pricing Plan</a></li>
									<li><a href="#">About us</a></li>
									{{-- <li><a href="#">Our services</a></li>
									<li><a href="#">Portfolio</a></li>
									<li><a href="#">Careers</a></li>
									<li><a href="#">Features</a></li> --}}
								</ul>
							</div>
							<div class="col-lg-2 col-sm-4 mb-20">
								<h5 class="footer-title">Company</h5>
								<ul class="footer-nav-link style-none">
									<li><a href="#">About us</a></li>
									<li><a href="#">Blogs</a></li>
									<li><a href="#">Contact</a></li>
								</ul>
							</div>
							<div class="col-xxl-2 col-lg-3 col-sm-4 mb-20">
								<h5 class="footer-title">Support</h5>
								<ul class="footer-nav-link style-none">
									<li><a href="#">Terms of use</a></li>
									<li><a href="#">Terms & conditions</a></li>
									<li><a href="#">Privacy</a></li>
									{{-- <li><a href="#">Cookie policy</a></li>
									<li><a href="#">Self-service</a></li> --}}
								</ul>
							</div>
						</div>
						<br /><br /><br /><br />
						<div class="copyright text-center">Copyright @2023 PackinTosh.</div>
					</div>
					<img src="images/lazy.svg" data-src="assets/images/shape/shape_06.svg" alt="" class="assets/lazy-img shapes shape_01">
					<img src="images/lazy.svg" data-src="assets/images/shape/shape_06.svg" alt="" class="assets/lazy-img shapes shape_02">
				</div>
				<!-- /.bg-wrapper -->
			</div>
		</div> <!-- /.footer-two -->


		<!-- Modal -->
        <div class="modal fade" id="loginModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-fullscreen modal-dialog-centered">
                <div class="container">
                    <div class="user-data-form modal-content">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						<div class="form-wrapper m-auto">
							<ul class="nav nav-tabs border-0 w-100" role="tablist">
								<li class="nav-item" role="presentation">
									<button class="nav-link active" data-bs-toggle="tab" data-bs-target="#fc1" role="tab">Login</button>
								</li>
								<li class="nav-item" role="presentation">
									<button class="nav-link" data-bs-toggle="tab" data-bs-target="#fc2" role="tab">Signup</button>
								</li>
							</ul>
							<div class="tab-content mt-30">
								<div class="tab-pane show active" role="tabpanel" id="fc1">
									<div class="text-center mb-20">
										<h2>Hi, Welcome Back!</h2>
										<p>Still don't have an account? <a href="#">Sign up</a></p>
									</div>
                                    <x-auth-session-status class="mb-4" :status="session('status')" />
									<form method="POST" action="{{ route('login') }}">
                                        @csrf
										<div class="row">
											<div class="col-12">
												<div class="input-group-meta position-relative mb-25">
													<label  for="email" :value="__('Email')">Email </label>
													<input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" >
											        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                                </div>
											</div>
											<div class="col-12">
												<div class="input-group-meta position-relative mb-20">
													<label for="password" :value="__('Password')" >Password*</label>
													<input id="password" class="block mt-1 w-full"
                                                    type="password"
                                                    name="password"
                                                    required autocomplete="current-password">
													<span class="placeholder_icon"><span class="passVicon"><img src="assets/images/icon/icon_13.svg" alt=""></span></span>
                                                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
												</div>
											</div>
											
											<div class="col-12">
												<div class="agreement-checkbox d-flex justify-content-between align-items-center">
													<div>
														<input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
														<label for="remember">{{ __('Remember me') }}</label>
													</div>
                                                    @if (Route::has('password.request'))
													<a href="{{ route('password.request') }}">Forget Password?</a>
                                                    @endif
												</div> <!-- /.agreement-checkbox -->
											</div>
											<div class="col-12">
												<button class="btn-four w-100 tran3s d-block mt-20">{{ __('Log in') }}</button>
											</div>
										</div>
									</form>
								</div>
								<!-- /.tab-pane -->
								<div class="tab-pane" role="tabpanel" id="fc2">
									<div class="text-center mb-20">
										<h2>Register</h2>
										<p>Already have an account? <a href="{{ __('Already registered?') }}">Login</a></p>
									</div>
									<form method="post" action="{{ route('register') }}">
										@csrf
										<div class="row">
											<div class="col-12">
												<div class="input-group-meta position-relative mb-25">
													<label for="name" :value="__('Name')">Name*</label>
													<input id="text" placeholder="John Doe"  type="text" name="name" :value="old('name')" required autofocus autocomplete="name" >
													<x-input-error :messages="$errors->get('name')" class="mt-2" />
												</div>
											</div>
											<div class="col-12">
												<div class="input-group-meta position-relative mb-25">
													<label for="email" :value="__('Email')">Email*</label>
													<input id="email" type="email" name="email" :value="old('email')" required placeholder="john@gmail.com">
												</div>
											</div>
											<div class="col-12">
												<div class="input-group-meta position-relative mb-20">
													<label for="password" :value="__('Password')">Password*</label>
													<input type="password" id="password"
													name="password"
													required autocomplete="new-password" placeholder="Enter Password" class="pass_log_id">
													<span class="placeholder_icon"><span class="passVicon"><img src="images/icon/icon_13.svg" alt=""></span></span>
													<x-input-error :messages="$errors->get('password')" class="mt-2" />
												</div>
											</div>
											<div class="col-12">
												<div class="input-group-meta position-relative mb-20">
													<label for="password_confirmation" :value="__('Confirm Password')" >Password*</label>
													<input  id="password_confirmation" class="block mt-1 w-full"
													type="password"
													name="password_confirmation" required autocomplete="new-password" placeholder="Enter Password" class="pass_log_id">
													<span class="placeholder_icon"><span class="passVicon"><img src="images/icon/icon_13.svg" alt=""></span></span>
											    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
												</div>
											</div>
											<div class="col-12">
												<div class="agreement-checkbox d-flex justify-content-between align-items-center">
													<div>
														<input type="checkbox" id="remember2">
														<label for="remember2">By hitting the "Register" button, you agree to the <a href="#">Terms conditions</a> & <a href="#">Privacy Policy</a></label>
													</div>
												</div> <!-- /.agreement-checkbox -->
											</div>
											
											<div class="col-12">
												<button class="btn-four w-100 tran3s d-block mt-20">{{ __('Register') }}</button>
											</div>
										</div>
									</form>
								</div>
								<!-- /.tab-pane -->
							</div>
							
							<div class="d-flex align-items-center mt-30 mb-10">
								<div class="line"></div>
								<span class="pe-3 ps-3 fs-6">OR</span>
								<div class="line"></div>
							</div>
							<div class="row">
								<div class="col-sm-6">
									<a href="#" class="social-use-btn d-flex align-items-center justify-content-center tran3s w-100 mt-10">
										<img src="assets/images/icon/google.png" alt="">
										<span class="ps-3">Signup with Google</span>
									</a>
								</div>
								<div class="col-sm-6">
									<a href="#" class="social-use-btn d-flex align-items-center justify-content-center tran3s w-100 mt-10">
										<img src="assets/images/icon/facebook.png" alt="">
										<span class="ps-3">Signup with Facebook</span>
									</a>
								</div>
							</div>
						</div>
						<!-- /.form-wrapper -->
                    </div>
                    <!-- /.user-data-form -->
                </div>
            </div>
        </div>


		<button class="scroll-top">
			<i class="bi bi-arrow-up-short"></i>
		</button>




		<!-- Optional JavaScript _____________________________  -->

		<!-- jQuery first, then Bootstrap JS -->
		<!-- jQuery -->
		<script src="assets/vendor/jquery.min.js"></script>
		<!-- Bootstrap JS -->
		<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
		<!-- WOW js -->
		<script src="assets/vendor/wow/wow.min.js"></script>
		<!-- Slick Slider -->
		<script src="assets/vendor/slick/slick.min.js"></script>
		<!-- Fancybox -->
		<script src="assets/vendor/fancybox/dist/jquery.fancybox.min.js"></script>
		<!-- Lazy -->
		<script src="assets/vendor/jquery.lazy.min.js"></script>
		<!-- js Counter -->
		<script src="assets/vendor/jquery.counterup.min.js"></script>
		<script src="assets/vendor/jquery.waypoints.min.js"></script>
		
		<!-- validator js -->
		<script src="assets/vendor/validator.js"></script>

		<!-- Theme js -->
		<script src="assets/js/theme.js"></script>
	</div> <!-- /.main-page-wrapper -->
</body>


<!-- Mirrored from html.creativegigstf.com/babun/babun/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 27 Nov 2023 11:08:17 GMT -->
</html>