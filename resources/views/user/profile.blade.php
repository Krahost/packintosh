@extends('layouts.layout')

@section("title", "PackinTosh | User")

@section("content")
		<!-- 
		=============================================
				Dashboard Aside Menu
		============================================== 
		-->
		
		<!-- /.dash-aside-navbar -->

		<!-- 
		=============================================
			Dashboard Body
		============================================== 
		-->
		
				<h2 class="main-title">My Profile</h2>

			     	<div class="bg-white card-box border-20">
							<style type="text/css">
								.success-omsg {
									color: #270;
									font-weight: 900;
									 
								}
									</style>
							
									<!-- End Header -->
									<div class="success-omsg">
										<i class="fa fa-check"></i>
								@if(session()->has('success'))
								
								<div> 
								{{ session('success')}}
								</div>
								
								@endif
							
							
                    <div class="user-avatar-setting d-flex align-items-center mb-30">
											@if(Auth::user()->image)	 
											<img src="{{URL::to('/uploads/user/' .Auth::user()->image)}} " alt="Profile Picture" class="lazy-img user-img">  
											@else
											<img src="{{URL::to('/uploads/user/pack_profile.jpg')}}" alt="Profile Picture" class="lazy-img user-img"> 
										@endif
					{{-- <img src="{{ asset('storage/' . $user->thumbnail) }}" alt="Profile Picture" class="lazy-img user-img"> --}}
                    </div>
                    <!-- /.user-avatar-setting -->
					
                    <div class="dash-input-wrapper mb-30">
                        <label for="name" :value="__('Name')">Full Name*</label>
                        <h5>{{ Auth::user()->name }}</h5>
											</div>
										<div class="dash-input-wrapper mb-30 col" stlye="color:#244034;" >
											<label for="" >Phone*</label><h5>{{ Auth::user()->phone }}</h5>
									</div>
									<div class="dash-input-wrapper mb-30">
										<label for="">Email*</label> <h5> {{ Auth::user()->email }}</h5>
									
									</div>
                    <!-- /.dash-input-wrapper -->
                    <div class="dash-input-wrapper">
                        <label for="">Bio*</label>
												<h5>{{ Auth::user()->bio }}</h5>
                        {{-- <textarea class="size-lg" placeholder="Write something interesting about you...."></textarea>
					        	<div class="alert-text">Brief description for your profile. URLs are hyperlinked.</div> --}}
                    </div> 
                    <!-- /.dash-input-wrapper -->
                </div>
				  <!-- /.card-box -->

			   	<div class="button-group d-inline-flex align-items-center mt-30">
					<a href="{{route("user.profiledit")}}" class="dash-btn-two tran3s me-3">Edit</a>
					<a href="#" class="dash-cancel-btn tran3s">Cancel</a>
				</div>			
			
			</div>
		</div>
		<!-- /.dashboard-body -->
</form>	
	
		<!-- Modal -->
        <div class="modal fade" id="deleteModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-fullscreen modal-dialog-centered">
                <div class="container">
                    <div class="remove-account-popup text-center modal-content">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						<img src="../images/lazy.svg" data-src="images/icon/icon_22.svg" alt="" class="lazy-img m-auto">
						<h2>Are you sure?</h2>
						<p>Are you sure to delete your account? All data will be lost.</p>
						<div class="button-group d-inline-flex justify-content-center align-items-center pt-15">
							<a href="#" class="confirm-btn fw-500 tran3s me-3">Yes</a>
							<button type="button" class="btn-close fw-500 ms-3" data-bs-dismiss="modal" aria-label="Close">Cancel</button>
						</div>
                    </div>
                    <!-- /.remove-account-popup -->
                </div>
            </div>
        </div>
		
				@endsection