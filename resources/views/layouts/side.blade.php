		<!-- 
		=============================================
				Dashboard Aside Menu
		============================================== 
		-->
		<aside class="dash-aside-navbar">
			<div class="position-relative">
				<div class="logo text-md-center d-md-block d-flex align-items-center justify-content-between">
					<a href=" {{route("user.index")}}">
						<img src="/assets/images/logo/logo_02.svg" alt="">
					</a>
					<button class="close-btn d-block d-md-none"><i class="bi bi-x-lg"></i></button>
				</div>
				<div class="user-data">
					<div class="user-avatar online position-relative rounded-circle">
						@if(Auth::user()->image)	 
											<img src="{{URL::to('/uploads/user/' .Auth::user()->image)}} " alt="Profile Picture" class="lazy-img user-img">  
											@else
											<img src="{{URL::to('/uploads/user/pack_profile.jpg')}}" alt="Profile Picture" class="lazy-img user-img"> 
										@endif
					
					</div>
					<!-- /.user-avatar -->
					<div class="user-name-data">
						<button class="user-name dropdown-toggle" type="button" id="profile-dropdown" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">
							@auth {{Auth::user()->name}}
                                
                            @endauth
						</button>
						<ul class="dropdown-menu" aria-labelledby="profile-dropdown">
						    {{-- <li>
                                <a class="dropdown-item d-flex align-items-center" href="candidate-dashboard-profile.html"><img src="/userfiles/img/icon/icon_23.svg" alt="" class="lazy-img"><span class="ms-2 ps-1">Profile</span></a>
                            </li> --}}
                            <li>
                                <a class="dropdown-item d-flex align-items-center" href="{{route("user.settings")}}"><img src="/userfiles/img/icon/icon_24.svg" alt="" class="lazy-img"><span class="ms-2 ps-1">Account Settings</span></a>
                            </li>
                            {{-- <li>
                                <a class="dropdown-item d-flex align-items-center" href="#"><img src="/userfiles/img/icon/icon_25.svg" alt="" class="lazy-img"><span class="ms-2 ps-1">Notification</span></a>
                            </li> --}}
														@auth
														@if(Auth::user()->is_admin)
														<li>
																<a class="dropdown-item d-flex align-items-center" href="{{ route("admin.dashboard") }}"><img src="/userfiles/img/icon/icon_admin.svg" alt="" class="lazy-img"><span class="ms-2 ps-1">Admin Dashboard</span></a>
														</li>
														@endif
														@endauth
						</ul>
					</div>
				</div>
				<!-- /.user-data -->
				<nav class="dasboard-main-nav">
					<ul class="style-none">
						<li><a href="{{route("user.index")}}" class="d-flex w-100 align-items-center active">
							<img src="/userfiles/img/icon/icon_1_active.svg" alt="" class="lazy-img">
							<span>Dashboard</span>
						</a></li>
						<li><a href="{{route("user.profile")}}" class="d-flex w-100 align-items-center">
							<img src="/userfiles/img/icon/icon_2.svg" alt="" class="lazy-img">
							<span>My Profile</span>
						</a></li>
						<li><a href="{{route("books.index")}}" class="d-flex w-100 align-items-center">
							<img src="/userfiles/img/icon/icon_3.svg" alt="" class="lazy-img">
							<span>Bookings</span>
						</a></li>
						{{-- <li><a href="candidate-dashboard-message.html" class="d-flex w-100 align-items-center">
							<img src="/userfiles/img/icon/icon_4.svg" alt="" class="lazy-img">
							<span>Messages</span>
						</a></li> --}}
					<li><a href="{{route("wallet.index")}}" class="d-flex w-100 align-items-center">
						<img src="/userfiles/img/icon/icon_7.svg" alt="" class="lazy-img">
						<span>Wallet</span>
					</a></li>
						{{-- <li><a href="candidate-dashboard-saved-jobs.html" class="d-flex w-100 align-items-center">
							<img src="/userfiles/img/icon/icon_6.svg" alt="" class="lazy-img">
							<span>Saved Job</span>
						</a></li>
						<li><a href="candidate-dashboard-settings.html" class="d-flex w-100 align-items-center">
							<img src="/userfiles/img/icon/icon_7.svg" alt="" class="lazy-img">
							<span>Account Settings</span>
						</a></li> --}}
						{{-- <li><a href="#" class="d-flex w-100 align-items-center" data-bs-toggle="modal" data-bs-target="#deleteModal">
							<img src="/userfiles/img/icon/icon_8.svg" alt="" class="lazy-img">
							<span>Delete Account</span>
						</a></li> --}}
					</ul>
				</nav>
				<!-- /.dasboard-main-nav -->
				{{-- <div class="profile-complete-status">
					<div class="progress-value fw-500">87%</div>
					<div class="progress-line position-relative">
						<div class="inner-line" style="width:80%;"></div>
					</div>
					<p>Profile Complete</p>
				</div> --}}
				<!-- /.profile-complete-status -->
<br />
<br /><br /><br /><br /><br />
				<a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('frmlogout').submit();" class="d-flex w-100 align-items-center logout-btn">
                    <form id="frmlogout" method="post" action="{{ route('logout') }}">
                        @csrf
                       </form>
					<img src="/assets/images/icon/icon_16.svg" alt="" class="lazy-img">
					<span>Logout</span>
				</a>
			</div>
                             
		</aside>
		<!-- /.dash-aside-navbar -->
