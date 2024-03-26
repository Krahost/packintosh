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
		
				<!-- ************************ Header **************************** -->
				
				<!-- End Header -->

				<h2 class="main-title">Account Settings</h2>
				
			 
				<div class="bg-white card-box border-20">
                    <h4 class="dash-title-three">Change password</h4>
										<form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
											@csrf
											@method('put')
                        <div class="row">
                         
													<div class="col-12">
														<div class="dash-input-wrapper mb-20">
															<label  for="current_password" :value="__('Current Password')" >Current Password</label>
															<input id="current_password" name="current_password" type="password" class="mt-1 block w-full" autocomplete="current-password">
															<h2 :messages="$errors->updatePassword->get('current_password')" class="mt-2"></h2>

														</div>
														<!-- /.dash-input-wrapper -->
												</div>
                            <div class="col-12">
                                <div class="dash-input-wrapper mb-20">
																	<label  for="current_password" :value="__('Current Password')">Password</label>
																	<input id="password" name="password" type="password" class="mt-1 block w-full" autocomplete="new-password">
																	<h2 :messages="$errors->updatePassword->get('password')" class="mt-2" ></h2>

                                </div>
                                <!-- /.dash-input-wrapper -->
                            </div>
                            <div class="col-12">
                                <div class="dash-input-wrapper mb-20">
                                    <label for="password_confirmation" :value="__('Confirm Password')"> Confirm Password</label>
                                    <input type="password"id="password_confirmation" name="password_confirmation" type="password"   autocomplete="new-password">
                                      <h2 :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" ></h2>
                                   
                                </div>
                                <!-- /.dash-input-wrapper -->
                            </div>
														
                        </div>
												<div class="flex items-center gap-4">
													 
							
													@if (session('status') === 'password-updated')
															<p
																	x-data="{ show: true }"
																	x-show="show"
																	x-transition
																	x-init="setTimeout(() => show = false, 2000)"
																	class="text-sm text-gray-600"
															>{{ __('Saved.') }}</p>
													@endif
											</div>
                        <div class="button-group d-inline-flex align-items-center mt-30">
                            <button href="#" class="dash-btn-two tran3s me-3 rounded-3 my-1">{{ __('Save') }}</button>
                            <a href="{{route("user.index")}}" class="dash-cancel-btn tran3s">Cancel</a>
														 
                        </div>	
                    </form>
										<div class="col-12">
											<div class="dash-input-wrapper mb-20">
												 
												<input  type="hidden">
											</div>
											<!-- /.dash-input-wrapper -->
									</div>
									<div class="col-12">
										<div class="dash-input-wrapper mb-20">
											 
											<input  type="hidden">
										</div>
										<!-- /.dash-input-wrapper -->
								</div>
								<div class="col-12">
									<div class="dash-input-wrapper mb-20">
										 
										<input  type="hidden">
									</div>
									<!-- /.dash-input-wrapper -->
							</div>
										<div class="my-1"> <a href="#" class="d-flex w-100 align-items-center my-1" data-bs-toggle="modal" data-bs-target="#deleteModal">
											<img src="/userfiles/img/icon/icon_8.svg"   alt="" class="lazy-img">
											<span>Delete Account</span>
										</a> </div>

										
                </div>
								
				<!-- /.card-box -->				
			</div>
			
		</div>
		<!-- /.dashboard-body -->


		<!-- Modal -->
        <div class="modal fade" id="deleteModal" tabindex="-1" aria-hidden="true">
					<form method="post" action="{{ route('profile.destroy') }}" class="p-6">
						@csrf
            @method('delete')
            <div class="modal-dialog modal-fullscreen modal-dialog-centered">
                <div class="container">
                    <div class="remove-account-popup text-center modal-content">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						<img src="../images/lazy.svg" data-src="images/icon/icon_22.svg" alt="" class="lazy-img m-auto">
						<h2>Are you sure?</h2>
						<p>Are you sure to delete your account? All data will be lost.</p>

						<div class="mt-6">
							<x-input-label for="password" value="{{ __('Password') }}" class="sr-only" />

							<x-text-input
									id="password"
									name="password"
									type="password"
									class="mt-1 block w-3/4"
									placeholder="{{ __('Password') }}"
							/>

							<x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
					</div>
						<div class="button-group d-inline-flex justify-content-center align-items-center pt-15">
							<button type="submit" class="confirm-btn fw-500 tran3s me-3">  {{ __('Delete Account') }}</button>
							<button type="button" class="btn-close fw-500 ms-3" data-bs-dismiss="modal" aria-label="Close">Cancel</button>
						</div>
                    </div>
                    <!-- /.remove-account-popup -->
                </div>
            </div>
        </div>
		


		<button class="scroll-top">
			<i class="bi bi-arrow-up-short"></i>
		</button>


		@endsection