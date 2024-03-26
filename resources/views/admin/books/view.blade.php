@extends('layouts.master')

@section("title", "Admin Dashboard  | PackinTosh")

@section("content")
<link rel="stylesheet" href="https://api.mapbox.com/mapbox-gl-js/v2.3.1/mapbox-gl.css" />
<link rel="stylesheet" href="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v4.7.0/mapbox-gl-geocoder.css" type="text/css" />
<script src="https://api.mapbox.com/mapbox-gl-js/v2.3.1/mapbox-gl.js"></script>
<script src="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v4.7.0/mapbox-gl-geocoder.min.js"></script>
<link href="https://api.mapbox.com/mapbox-gl-js/v2.3.1/mapbox-gl.css" rel="stylesheet">
<script src="https://api.mapbox.com/mapbox-gl-js/v2.3.1/mapbox-gl.js"></script>
<meta name="csrf-token" content="{{ csrf_token() }}">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


<script src='https://api.mapbox.com/mapbox-gl-js/v3.1.2/mapbox-gl.js'></script>
<link href='https://api.mapbox.com/mapbox-gl-js/v3.1.2/mapbox-gl.css' rel='stylesheet' />

 <style>
    #map { height: 200px; width: 300px; border-radius: 5px;margin-top: 4px; margin-bottom: 5px;}

    .imageid {
      border-radius: 5px;
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(50px,2fr)); /* This will create a flexible number of columns depending on the container's width */
    grid-gap: 10px; /* Space between grid items */
    padding: 10px;
}

.grima {
    overflow: hidden; /* Helps contain the images within the grid items */
}

.grima img {
  border-radius: 2px;
    width: 50px; /* Makes images fully occupy their containers */
    height: auto; /* Maintains aspect ratio */
    transition: transform 0.2s;
    margin: 5px; /* Animation for zoom effect on hover */
}

.grima:hover img {
    transform: scale(1.1); /* Zoom effect on hover */
}


</style>


<div class="main-panel">
  <div class="content-wrapper">
    <div class="row">
      <div class="col-md-12 grid-margin">
        <div class="row">
          <div class="col-12 col-xl-8 mb-4 mb-xl-0">
            <h3>Booking Id: {{$book->id}}</h3>
            <p>Name: {{ $book->user->name }}</p>
            <p>Package: GHC{{$book->total_amount}}</p>
            <p>Date of Pick Up: {{$book->pickup}}</p>
            <p>Date of Return: {{$book->return}}</p>
            <p>Address: {{$book->address}}</p>
            <p>Street Address: {{$book->location_address}}</p>
            <p><div id="map"></div> </p>
         <p class="imageid">   @if ($book->image)
            @php $images = json_decode($book->image); @endphp
            @foreach ($images as $image)
            <div class="grima"><img src="{{ asset( $image) }}" alt="Booking Image" class="booking-image"></div>
            @endforeach
        @endif</p>

            <p data-booking-id="{{$book->id}}">Payment:<div class="dropdown">
              
              <select class="btn btn-primary btn-sm dropdown-toggle payment-status-dropdown" type="button" id="dropdownMenuSizeButton3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-booking-id="{{$book->id}}">
               <h3>{{$book->payment}} </h3>
                <option value="paid" {{$book->payment == 'paid' ? 'selected' : ''}}>Paid</option>
                <option value="pending" {{$book->payment == 'pending' ? 'selected' : ''}}>Pending</option>
            </select>
            </div>
          </p>
          <p>Status: <div class="dropdown">
              <select class=" booking-status-dropdown  btn btn-primary btn-sm dropdown-toggle " type="button" id="dropdownMenuSizeButton3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-booking-id="{{$book->id}}">
                <h3>{{$book->Status}} </h3>
                <option value="pending" {{$book->Status == 'pending' ? 'selected' : ''}}>Pending</option>
                <option value="pickedup" {{$book->Status == 'pickedup' ? 'selected' : ''}}>Picked Up</option>
                <option value="return" {{$book->Status == 'returned' ? 'selected' : ''}}>Returned</option>
                <option value="stored" {{$book->Status == 'stored' ? 'selected' : ''}}>Store</option>
              </select>
            </div>
          </p>
          </div>
          <div class="col-4 col-xl-4">
           <div class="justify-content-end d-flex">
            <div class="dropdown flex-md-grow-1 flex-xl-grow-0">
              <a type="button" class="btn btn-inverse-warning btn-fw mt-1" href="{{ route('books.edit', $book->id) }}" >Edit</a>
              <a  type="button" class="btn btn-inverse-danger btn-fw mt-1" href="{{ route('admin/books.index') }}" class="btn btn-secondary">Back</a>
              </div>
            </div>
           </div>
          </div>
        </div>
      </div>
    </div>
    
    



<script>
  // MAPBOX SCRIPT CODE TO DISPLAY THE MAP
  mapboxgl.accessToken = 'pk.eyJ1Ijoia3JhaG9zdCIsImEiOiJjbHNmMDExY2cxN21oMmlwY29yd3ludDIyIn0.RAVFAcLplzEenSKYlaSiBQ'; // Replace with your Mapbox access token
  var map = new mapboxgl.Map({
    container: 'map', // container ID
    style: 'mapbox://styles/mapbox/streets-v11', // style URL
    center: [{{$book->longitude}}, {{$book->latitude}}], // starting position [lng, lat]
    zoom: 16 // starting zoom
  });

  // Add a marker to the map
  new mapboxgl.Marker()
    .setLngLat([{{$book->longitude}}, {{$book->latitude}}])
    .addTo(map);

  // Optionally, add a popup to the marker
  var popup = new mapboxgl.Popup({ offset: 25 }).setText(
    'Address: {{$book->location_address}}' // Display the address
  );

  // Attach the popup to the marker
  new mapboxgl.Marker()
    .setLngLat([{{$book->longitude}}, {{$book->latitude}}])
    .setPopup(popup) // sets a popup on this marker
    .addTo(map);
</script>
<script>
  // JAVASCRIPT FUNCTION TO UPDATE THE PAYMENT STATUS
  $('.payment-status-dropdown').on('change', function() {
      var bookingId = $(this).data('booking-id');
      var paymentStatus = $(this).val();
  
      $.ajax({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          type: "POST",
          url: "{{ route('bookings.update-payment') }}",
          data: {
              bookingId: bookingId,
              paymentStatus: paymentStatus
          },
          success: function(response) {
              if(response.success) {
                  alert(response.message); // Or any other indication as per your design
              } else {
                  alert('Something went wrong. Please try again.');
              }
          },
          error: function(error) {
              console.log(error);
              alert('Error updating payment status.');
          }
      });
  });
  </script>
  <script>
    // JAVASCRIPT FUNCTION TO CHAGE THE PAYMENT STATUS
    $(document).ready(function() {
        $('.booking-status-dropdown').change(function() {
            var bookingId = $(this).data('booking-id');
            var bookingStatus = $(this).val();
    
            // Update the AJAX URL to match the new route
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: "POST",
                url: "{{ route('bookings.update-status') }}", // Use the updated route name
                data: {
                    id: bookingId,
                    Status: bookingStatus
                },
                success: function(response) {
                    alert('Status updated successfully');
                },
                error: function(error) {
                    console.error('Error updating status:', error);
                    alert('Error updating status.');
                }
            });
        });
    });
    </script>

     
    <script>
      //IMAGE ZOOM FUNCTIONALITY
      document.addEventListener('DOMContentLoaded', function() {
          // Event listener for clicking on an image to zoom
          document.querySelectorAll('.zoomable-image').forEach(function(img) {
              img.addEventListener('click', function() {
                  // Create an overlay div
                  const overlay = document.createElement('div');
                  overlay.classList.add('zoom-overlay');
      
                  // Create a clone of the image to display in the overlay
                  const zoomedImage = img.cloneNode();
                  zoomedImage.style.width = '80%'; // Adjust the size of the zoomed image
      
                  // Add the zoomed image to the overlay
                  overlay.appendChild(zoomedImage);
      
                  // Add the overlay to the body
                  document.body.appendChild(overlay);
      
                  // Event listener for clicking on the overlay to close it
                  overlay.addEventListener('click', function() {
                      document.body.removeChild(overlay);
                  });
              });
          });
      });
      </script>
      
  
  <!-- content-wrapper ends -->
  <!-- partial:partials/_footer.html -->


@endsection