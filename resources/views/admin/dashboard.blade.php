@extends('layouts.master')

@section("title", "Admin Dashboard  | PackinTosh")

@section("content")


    <!-- partial -->
    <!-- partial:partials/_sidebar.html -->
   
    <style>

@keyframes blinker {
  50% {
    opacity: 0;
  }
}

.blink {
  animation: blinker 1s  infinite;
}

.link {
decoration:none !important;
}

      </style>
    <!-- partial -->
    <div class="main-panel">
      <div class="content-wrapper">
        <div class="row">
          <div class="col-md-12 grid-margin">
            <div class="row">
              <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                <h3 class="font-weight-bold">Welcome! <span class="text-primary"> {{ Auth::user()->name }}</span></h3>
                <h6 class="font-weight-normal mb-0">All systems are running smoothly! You have <a href="{{ route('admin/books.index') }}"><span class="text-danger">{{$todayBooks}}</span></a><span class="text-primary"> Bookings today</span></h6>
              </div>
              <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                <br /> <br />
              <h6 class="font-weight-normal mb-0 ">   <a href="{{ route('admin/books.pickup') }}" class="link"><h4 class="text-danger blink">Due for Pickups</h4><span class="text-primary">  </span></a> </h6>
              </div>
              <div class="col-12 col-xl-4">
               <div class="justify-content-end d-flex">
                <div class="dropdown flex-md-grow-1 flex-xl-grow-0">
                  <button class="btn btn-sm btn-light bg-white dropdown-toggle" type="button" id="dropdownMenuDate2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                   <i class="mdi mdi-calendar"></i> {{$todayDate}}
                  </button>
                   
                </div>
               </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6 grid-margin stretch-card">
            <div class="card tale-bg">
              <div class="card-people mt-auto">
                <img src="adminstyle/images/dashboard/people.svg" alt="people">
                <div class="weather-info">
                  <div class="d-flex">
                    <div>
                      <h2 class="mb-0 font-weight-normal"><i class="icon-sun mr-2"></i>27<sup>C</sup></h2>
                    </div>
                    <div class="ml-2">
                      <h4 class="location font-weight-normal">Accra</h4>
                      <h6 class="font-weight-normal">Ghana</h6>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-6 grid-margin transparent">
            <div class="row">
              <div class="col-md-6 mb-4 stretch-card transparent">
                <div class="card card-tale">
                  <div class="card-body">
                    <p class="mb-4">Today’s Bookings</p>
                    <p class="fs-30 mb-2">{{$todayBooks}}</p>
                     
                  </div>
                </div>
              </div>
              <div class="col-md-6 mb-4 stretch-card transparent">
                <div class="card card-dark-blue">
                  <div class="card-body">
                    <p class="mb-4">Total Bookings</p>
                    <p class="fs-30 mb-2">{{$books}}</p>
                    {{-- <p>{{route("")}}</p> --}}
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6 mb-4 mb-lg-0 stretch-card transparent">
                <div class="card card-light-blue">
                  <div class="card-body">
                    <p class="mb-4">New Users</p>
                    <p class="fs-30 mb-2">{{$todayUsers}}</p>
                     
                  </div>
                </div>
              </div>
              <div class="col-md-6 stretch-card transparent">
                <div class="card card-light-danger">
                  <div class="card-body">
                    <p class="mb-4">Number of Users</p>
                    <p class="fs-30 mb-2">{{$totalusers}}</p>
                    <p> </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-6 grid-margin transparent">
            <div class="row">
              <div class="col-md-6 mb-4 stretch-card transparent">
                <div class="card card-tale">
                  <div class="card-body">
                    <p class="mb-4">Today’s Wallet</p>
                    <p class="fs-25 mb-2">GHC {{number_format($todaysDeposits,2)}}</p>
                     
                  </div>
                </div>
              </div>
              <div class="col-md-6 mb-4 stretch-card transparent">
                <div class="card card-dark-blue">
                  <div class="card-body">
                    <p class="mb-4">Total wallet amount</p>
                    <p class="fs-25 mb-2">GHC {{ number_format($totalDeposits, 2) }}</p>
                    {{-- <p>{{route("")}}</p> --}}
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6 mb-4 mb-lg-0 stretch-card transparent">
                <div class="card card-light-blue">
                  <div class="card-body">
                    <p class="mb-4">Today Booking Payment</p>
                    <p class="fs-25 mb-2 text-sm" >GH {{number_format($todayBookPayments,2)}}</p>
                     
                  </div>
                </div>
              </div>
              <div class="col-md-6 stretch-card transparent">
                <div class="card card-light-danger">
                  <div class="card-body">
                    <p class="mb-4">Total Payment Booking</p>
                    <p class="fs-25 mb-2">GHC {{ number_format($totalBookPayments, 2) }}</p>
                    <p> </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        
      
        
      <!-- content-wrapper ends -->
      <!-- partial:partials/_footer.html -->

      <!-- partial -->
    </div>
    <!-- main-panel ends -->
  </div>   
  <!-- page-body-wrapper ends -->
</div>
<!-- container-scroller -->
   @endsection