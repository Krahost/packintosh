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
		
		<div>
			@if ($errors ->any() )
				
		<ul> 
			@foreach ($errors -> all() as $error)
	
			<li>{{$error}} </li>
					
			@endforeach
		</ul>
			@endif
			</div>

	<!-- Add other form fields as needed -->

	{{-- <div class="form-group">
			<label for="image">Profile Image:</label>
			<input type="file" name="image" id="image" accept="image/*">
			@error('image')
					<div class="text-danger">{{ $message }}</div>
			@enderror
	</div>

	<button type="submit">Update Profile</button>
</form> --}}
				<!-- End Header -->
<form method="post" action="{{ route('profile.update') }}"  enctype="multipart/form-data" class="mt-6 space-y-6">
	@csrf
	@method('patch')
				<h2 class="main-title">My Profile</h2>

				<div class="bg-white card-box border-20">
                    <div class="user-avatar-setting d-flex align-items-center mb-30">
											@if(Auth::user()->image)	 
											<img src="{{URL::to('/uploads/user/' .Auth::user()->image)}} " alt="Profile Picture" class="lazy-img user-img">  
											@else
											<img src="{{URL::to('/uploads/user/pack_profile.jpg')}}" alt="Profile Picture" class="lazy-img user-img"> 
										@endif
					
										<div>
														<label for="">Upload Image</label>
                            <input type="file" name="image"  class="course form-control">
													@error('image')
													<div class="text-danger">{{ $message }}</div>
													@enderror
                        </div>
                   
                    </div>
                    <!-- /.user-avatar-setting -->
					
                    <div class="dash-input-wrapper mb-30">
                        <label for="name" :value="__('Name')">Full Name*</label>
                        <input  id="name" name="name" type="text" value="{{ Auth::user()->name }}">
												<p class="mt-2" :messages="$errors->get('name')"></p>
											</div>
										<div class="dash-input-wrapper mb-30">
											<label for="">Phone*</label>
											<input  id="phone" name="phone" type="phone"type="text" placeholder=" "value="{{ Auth::user()->phone }}">
											<p class="mt-2" :messages="$errors->get('phone')"></p>
									</div>
									<div class="dash-input-wrapper mb-30">
										<label for="">Email*</label>
										<input id="email" name="email" type="email" class="mt-1 block w-full" value="{{ Auth::user()->email }}">
								   <p class="mt-2" :messages="$errors->get('email')"></p>
									</div>
                    <!-- /.dash-input-wrapper -->
                     <div class="dash-input-wrapper">
                        <label for="">Bio*</label>
                        <textarea id="bio" name="bio" type="text" class="size-lg" value="{{ Auth::user()->bio }}">{{ Auth::user()->bio }}</textarea>
												<p class="mt-2" :messages="$errors->get('bio')"></p>
					        	<div class="alert-text">Brief description for your profile. URLs are hyperlinked.</div>

                    </div>
                    <!-- /.dash-input-wrapper -->
                </div>
				  <!-- /.card-box -->

			   	<div class="button-group d-inline-flex align-items-center mt-30">
					<button type="submit" class="dash-btn-two tran3s me-3">Save</button>
					<a href="{{route('user.index')}}" class="dash-cancel-btn tran3s">Cancel</a>
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