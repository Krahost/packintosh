@extends('layouts.layout')

@section("title", "PackinTosh | User")

@section("content")


<link rel="icon" type="image/png" sizes="56x56" href="..//userfiles/images/fav-icon/icon.png">
<!-- Bootstrap CSS -->
<link rel="stylesheet" type="text/css" href="..//userfiles/css/bootstrap.min.css" media="all">
<!-- Main style sheet -->
<link rel="stylesheet" type="text/css" href="..//userfiles/css/style.min.css" media="all">
<!-- responsive style sheet -->
<link rel="stylesheet" type="text/css" href="..//userfiles/css/responsive.css" media="all">
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

				<h2 class="main-title">Reverse a storage</h2>

				
				<!-- /.card-box -->

				<div class="button-group d-inline-flex align-items-center mt-30">
					<a href="{{route("books.index")}}" class="dash-btn-two tran3s me-3">Reserve a place</a>
			
				</div>				
			</div>
		</div>
		<!-- /.dashboard-body -->


		<!-- Modal -->
        {{-- <div class="modal fade" id="deleteModal" tabindex="-1" aria-hidden="true">
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
        </div> --}}
		
@endsection