@extends('layouts.layout')

@section("title", "PackinTosh | User")

@section("content")		

<script src='https://api.mapbox.com/mapbox-gl-js/v3.1.2/mapbox-gl.js'></script>
<link href='https://api.mapbox.com/mapbox-gl-js/v3.1.2/mapbox-gl.css' rel='stylesheet' />

<style>
.user-activity-chart {
    max-width: 800px; /* Adjust based on your preference */
    margin: 0 auto; /* Center the div */
    padding: 20px; /* Add some padding inside the div */
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Add a subtle shadow for depth */
    border-radius: 10px; /* Round the corners */
    font-family: 'Arial', sans-serif; /* Use a modern font */
}

.dash-title-two {
    text-align: center; /* Center the title */
    color: #333; /* Dark grey color for the text */
    margin-bottom: 30px; /* Add some space below the title */
}

.book-details p {
    color: #555; /* Slightly lighter grey color for the text */
    line-height: 1.6; /* Add space between lines of text */
    margin-bottom: 10px; /* Add some space between paragraphs */
    border-bottom: 1px solid #eee; /* Add a light border below each paragraph */
    padding-bottom: 10px; /* Add some space above the border */
}


/* Utility classes */
.bg-white {
    background-color: #fff;
}

.border-20 {
    border: 1px solid #ddd;
}

.mt-30 {
    margin-top: 30px;
}



.ps-5 {
    padding-left: 20px;
}

.pe-5 {
    padding-right: 20px;
}

.m-auto {
    margin: auto;
}

.pb-5 {
    padding-bottom: 20px;
}

.mt-50 {
    margin-top: 50px;
}

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

.zoom-overlay {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(0, 0, 0, 0.8);
  display: flex;
  align-items: center;
  justify-content: center;
  cursor: zoom-out;
}

.zoom-overlay img {
  max-width: 90%;
  max-height: 90%;
  transition: transform 0.3s ease;
}

.zoom-overlay img:hover {
  transform: scale(1.1);
}

</style>


<h1></h1>
<div class="user-activity-chart bg-white border-20 mt-30 h-100">
  <h4 class="dash-title-two">Booking ID #{{$book->id}} Details</h4>
  <div class="ps-5 pe-5 mt-50">
      <img src="../images/lazy.svg" data-src="images/main-graph.png" alt="" class="lazy-img m-auto">
  </div>
  <div class="book-details ps-5 pe-5 pb-5">
      {{-- <h5>{{$book->institution}}</h5>
        <p>{{$book->hostel}}</p>
      <p>{{$book->institution}}</p>
      <p>{{$book->institution}}</p>
      <p>{{$book->institution}}</p>
      <p>{{$book->institution}}</p>
      <p>{{$book->institution}}</p>
      <p>{{$book->institution}}</p>
      <p>{{$book->institution}}</p> --}}
      <div class="col-md-12 grid-margin">
        <div class="row">
          <div class="col-12 col-xl-8 mb-4 mb-xl-0">
            <h3>Campus: {{$book->institution}}</h3>
            <p>Hostel: {{$book->hostel}}</p>
            <p>Phone: {{$book->phone_number}}</p>
            <p>Name: {{ $book->user->name }}</p>
            <p>Durtion: {{$book->months}} Month(s)</p>
            <p>Total Payment: GHC{{$book->total_amount}}</p>
            <p>Date of Pick Up: {{$book->pickup}}</p>
            <p>Date of Return: {{$book->return}}</p>
            <p>Address: {{$book->address}}</p>
            <p>Street Address: {{$book->location_address}}</p>
            <p><div id="map"></div> </p>
         <p class="imageid">   @if ($book->image)
            @php $images = json_decode($book->image); @endphp
            @foreach ($images as $image)
            <div class="grima"><img src="{{ asset( $image) }}" alt="Booking Image" class="booking-image zoomable-image"></div>
            @endforeach
        @endif</p>

            <p data-booking-id="{{$book->id}}"> <div class="dropdown">
              
              @if($book->payment == 'pending')
    <!-- Pay Button -->
      <a href="{{ route('books.repay', [$book->id,$book->total_amount ]) }}"  class="dash-btn-two tran3s me-3">Pay Now</a>
    @else
  <span style="color: green;">Paid</span>
@endif
            </div>
          </p>
         
          </div>
          <div class="col-4 col-xl-4">
           <div class="justify-content-end d-flex">
            <div class="dropdown flex-md-grow-1 flex-xl-grow-0">
              {{-- <a type="button" class="btn btn-inverse-warning btn-fw mt-1" href="{{ route('books.edit', $book->id) }}" >Edit</a> --}}
              <a  type="button" class="btn btn-inverse-danger btn-fw mt-1" href="{{ route('books.index') }}" class="dash-btn-two tran3s me-3">Back</a>
              </div>
            </div>
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
  document.addEventListener('DOMContentLoaded', function() {
      document.querySelectorAll('.booking-image').forEach(function(img) {
          img.addEventListener('click', function() {
              // Create an overlay div
              const overlay = document.createElement('div');
              overlay.style.position = 'fixed';
              overlay.style.top = '0';
              overlay.style.left = '0';
              overlay.style.width = '100%';
              overlay.style.height = '100%';
              overlay.style.backgroundColor = 'rgba(0,0,0,0.8)';
              overlay.style.display = 'flex';
              overlay.style.alignItems = 'center';
              overlay.style.justifyContent = 'center';
              overlay.style.zIndex = '1000';
              overlay.style.cursor = 'pointer';
  
              // Create a clone of the image to display in the overlay
              const overlayImage = img.cloneNode();
              overlayImage.style.maxWidth = '90%'; // Prevents the image from being too large
              overlayImage.style.maxHeight = '80%'; // Keeps the image within the viewport
              overlay.appendChild(overlayImage); // Adds the image to the overlay
  
              document.body.appendChild(overlay); // Adds the overlay to the page
  
              // Removes the overlay when clicked
              overlay.addEventListener('click', function() {
                  document.body.removeChild(overlay);
              });
          });
      });
  });
  </script>
@endsection