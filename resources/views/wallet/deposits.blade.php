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
		<style>
.ww{
    width:200px
}
            </style>
				<!-- ************************ Header **************************** -->
								<!-- End Header -->
                @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        
    <form method="POST" action="{{ route('wallet.deposit') }}">
      @csrf        
                <div class="dash-input-wrapper mb-30 ww">
                  <label for="">Deposit Amount</label>
                 <input type="number" name="amount" placeholder="GH 10"  value="">
              </div>
              <div class="dash-input-wrapper mb-30 ww">
              <input type="email" name="email" value="{{Auth::user()->email}}" readonly>
            </div>
              <div class="dash-input-wrapper mb-30">
                <button type="submit" class="dash-btn-two tran3s me-3">Deposit</button>
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