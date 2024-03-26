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

				<h2 class="main-title">Dashboard</h2>
				<div class="row">
					<div class="col-lg-3 col-6">
						<div class="dash-card-one bg-white border-30 position-relative mb-15">
							<div class="d-sm-flex align-items-center justify-content-between">
								<div class="icon rounded-circle d-flex align-items-center justify-content-center order-sm-1"><img src="/userfiles/img/icon/icon_12.svg" alt="" class="lazy-img"></div>
								<div class="order-sm-0">
									<div class="value fw-500"> </div>
									<span>Total booked</span>
									<h4>{{$books}}</h4>
								</div>
							</div>
						</div>
						<!-- /.dash-card-one -->
					</div>
					

				
		<!-- /.dashboard-body -->



		<!-- Modal -->
        <div class="modal fade" id="deleteModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-fullscreen modal-dialog-centered">
                <div class="container">
                    <div class="remove-account-popup text-center modal-content">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						<img src="/userfiles/img/icon/icon_22.svg" alt="" class="lazy-img m-auto">
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