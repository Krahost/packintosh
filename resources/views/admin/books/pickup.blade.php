@extends('layouts.master')

@section("title", "Admin Dashboard  | PackinTosh")

@section("content")

{{-- <div class="row">
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <p class="card-title">Advanced Table</p>
        <div class="row">
          <div class="col-12">
            <div class="table-responsive">
              <table id="" class="display expandable-table" style="width:100%">
                <thead>
                  <tr>
                    <th>Booking ID</th>
                    <th>Intituition</th>
                    <th>Hostel</th>
                    <th>Pickup date</th>
                    <th>Payment</th>
                    <th>Status</th>
                    <th>Updated at</th>
                    <th></th>
                  </tr>
                  
                </thead>
                <tbody>
                  @foreach($books as $book)
                <tr>
                    <th>{{$book->id}}</th>
                    <th>{{$book->institution}}</th>
                    <th>{{$book->hostel}}</th>
                    <th>{{$book->pickup}}</th>
                    <th>{{$book->payment}}</th>
                    <th>{{$book->Status}}</th>
                    <th>Updated at</th>
                    <th></th>
                </tr>
                @endforeach
                </tbody>
            </table>
            </div>
          </div>
        </div>
        </div>
      </div>

      
    </div>
  </div>
</div> --}}


<style>
  .status-bar {
      height: 20px; /* Adjust the height according to your design */
      width: 100px; /* Adjust the width according to your design */
  }
  
  .bg-success {
      background-color: green;
      color: whitesmoke;
      font-weight: bold;
      border-radius: 10px;
      display: flex;
      align-items: center;
      padding-left: 20px;
      
  }
  
  .bg-danger {
      background-color: red;
      color: whitesmoke;
      font-weight: bold;
      border-radius: 10px;
      display: flex;
      align-items: center;
      padding-left: 20px;
  }

  .ins{
    color:green;
    font-weight: bold;
  }
    </style>
    <style>
      /* Styles for the blurred background */
      body {
       
      }
  
      /* Styles for the pop-up */
      .popup-container {
          display: none;
          position: fixed;
          top: 50%;
          left: 50%;
          transform: translate(-50%, -50%);
          background-color: rgba(255, 255, 255, 0.9);
          padding: 20px;
          border-radius: 10px;
          box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
          z-index: 9999;
          /* background-image: url('background.jpg'); Replace 'background.jpg' with your background image 
          background-size: cover;
          background-position: center;
          filter: blur(5px);
          overflow: hidden;*/
      }
  
      .popup-content {
          text-align: center;
      }
  
      /* Close button style */
      .close-btn {
          position: absolute;
          top: 10px;
          right: 10px;
          background: none;
          border: none;
          cursor: pointer;
          font-size: 20px;
      }
  </style>
     
      <div class="table-responsive"><br><br><br><br>
        <div> <h3>Upcoming Booking Pickups</h3>
        <table class="table table-striped">
          <thead>
            <tr>
            <th>
             Booking Id
            </th> 
            <th>
               Pickup Date
              </th>
              <th>
                Location
              </th> <th>
                Action
              </th>
            </tr>
          </thead>
          <tbody>
            @foreach($books as $book)
            <tr>
              <td>
                {{$book->id}}
              </td>
              <td class="py-1">
                 <h5 class="ins">{{$book->pickup}}</h5>
                  {{-- <p>{{$book->pickup}} </p> --}}  
                {{-- <img src="/uploads/user/pack_profile.jpg" alt="image"> --}}  
              </td> 
              <td> 
                <h4>{{$book->institution}}<h4>
           <p>   Hostel:   {{$book->hostel}}</p>
              </td>
               
              <td>
                <button type="button" class="btn btn-outline-success dropdown-toggle btn-sm" id="dropdownMenuIconButton9" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="ti-menu"></i>
                </button>
                <div class="dropdown-menu">
                  <a class="dropdown-item moreLink" href="{{ route('books.view', ['bookId' => $book->id]) }}" >View</a>
                  {{-- <a class="dropdown-item moreLink" href="#" >Edit</a>
                  <a class="dropdown-item moreLink" href="#" >Delete</a> --}}
                  
                </div>
              </td>
            </tr>
            
          </tbody>
          @endforeach
        </table>
        {{ $books->links() }}
      </div>
    </div>
  </div>
  {{-- <div id="popupContainer" class="popup-container">
    <button id="closePopup" class="close-btn">&times;</button>
    <div class="popup-content">
        <h2>Name: {{ $book->user->name }}</h2>
        <p>Date of Pick Up: {{$book->pickup}}</p>
        <p>Date of Return: {{$book->return}}</p>
        <p>Address: {{$book->address}}</p>
        <p>Address: {{$book->location_address}}</p>
        <p>Payment: {{$book->payment}}</p>
        <p>Status: {{$book->Status}}</p>
    </div>
</div> --}}
  <script>
document.querySelectorAll('.moreLink').forEach(item => {
  item.addEventListener('click', event => {
    document.getElementById('popupContainer').style.display = 'block';
  });
});

document.getElementById('closePopup').addEventListener('click', function() {
  document.getElementById('popupContainer').style.display = 'none';
});


</script>
@endsection