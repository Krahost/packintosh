@extends('layouts.layout')

@section("title", "PackinTosh | User")

@section("content")

{{-- 
<link rel="icon" type="image/png" sizes="56x56" href="..//userfiles/images/fav-icon/icon.png">
<!-- Bootstrap CSS -->
<link rel="stylesheet" type="text/css" href="..//userfiles/css/bootstrap.min.css" media="all">
<!-- Main style sheet -->
<link rel="stylesheet" type="text/css" href="..//userfiles/css/style.min.css" media="all">
<!-- responsive style sheet -->
<link rel="stylesheet" type="text/css" href="..//userfiles/css/responsive.css" media="all"> --}}

{{-- <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script> --}}

<link rel="stylesheet" href="https://api.mapbox.com/mapbox-gl-js/v2.3.1/mapbox-gl.css" />
<link rel="stylesheet" href="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v4.7.0/mapbox-gl-geocoder.css" type="text/css" />
<script src="https://api.mapbox.com/mapbox-gl-js/v2.3.1/mapbox-gl.js"></script>
<script src="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v4.7.0/mapbox-gl-geocoder.min.js"></script>
<link href="https://api.mapbox.com/mapbox-gl-js/v2.3.1/mapbox-gl.css" rel="stylesheet">
<script src="https://api.mapbox.com/mapbox-gl-js/v2.3.1/mapbox-gl.js"></script>


<script src='https://api.mapbox.com/mapbox-gl-js/v3.1.2/mapbox-gl.js'></script>
<link href='https://api.mapbox.com/mapbox-gl-js/v3.1.2/mapbox-gl.css' rel='stylesheet' />


{{-- <script>
    mapboxgl.accessToken = 'pk.eyJ1Ijoia3JhaG9zdCIsImEiOiJjbHNmMDExY2cxN21oMmlwY29yd3ludDIyIn0.RAVFAcLplzEenSKYlaSiBQ';
</script> --}}

{{-- sk.eyJ1Ijoia3JhaG9zdCIsImEiOiJjbHNmMDJ2c3EwOW1oMmtvdXZ3bWp2bHJ1In0.oqEok7Uu5T_BW3B8jk3xMg --}}

<style>
    .image-container {
        display: inline-block;
        margin-right: 10px; /* Adjust the margin as needed */
    }

    .image-container img {
        max-width: 100px;
        max-height: 100px;
    }

    .image-container button {
        margin-top: 5px; /* Adjust the margin as needed */
    }
</style>
<style>
    #map { height: 400px; border-radius: 5px;margin-top: 4px; margin-bottom: 5px;}
    .geocoder { margin-bottom: 10px; }
    .btt{  font-size:6px; width: 10px}
</style>
    <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&callback=initMap&libraries=places&v=weekly" async defer></script>
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

             
				<h2 class="main-title">Reserve a place</h2>

				<div class="bg-white card-box border-20">
                    <div>
                        @if ($errors ->any() )
                          
                      <ul> 
                        @foreach ($errors -> all() as $error)
                    
                        <li>{{$error}} </li>
                            
                        @endforeach
                      </ul>
                        @endif
                        </div>
                    <h5 class="dash-title-three">add your booking info</h5>
                    <form   action="{{ route('book.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('post')
                    <div class="dash-input-wrapper mb-30">
                        <label for="">Instituition</label>
                        <input type="text" name="institution" placeholder="Ex: school"  value="">
                    </div>
                    <div class="dash-input-wrapper mb-30">
                        <label for="">Hostel</label>
                        <input type="text" name="hostel" placeholder="Ex: Your Hostel"  value="">
                    </div>
                    <!-- /.dash-input-wrapper -->
                   
                   
                    <!-- /.dash-input-wrapper -->
                  <div class="row align-items-end">
                        <div class="col-md-4">
                            <div class="dash-input-wrapper mb-30">
                                <label for="juteBoxes">Jute Boxes</label>
                                <img src="{{asset("/image/jute.jpeg")}}" alt="Jute Box Image" style="width: 100px; height: auto; display: block; margin-bottom: 10px;">
                                <select class="nice-select" id="jute_boxes" name="jute_boxes" onchange="calculateTotal()">
                                    <option value="0">Select Boxes</option>
                                    <option value="50">1</option>
                                    <option value="100">2</option>
                                    <option value="150">3</option>
                                    <option value="200">4</option>
                                    <option value="250">5</option>
                                </select>
                            </div>
                            <!-- /.dash-input-wrapper -->
                        </div>
                        <div class="col-md-4">
                            <div class="dash-input-wrapper mb-30">
                                <label for="months">Month</label>
                                <select class="nice-select" id="months" name="months" onchange="calculateTotal()">
                                    <option value="0">Select Duration</option>
                                    <option value="1">1 Month</option>
                                    <option value="2">2 Months</option>
                                    <option value="3">3 Months</option>
                                    <option value="4">4 Months</option>
                                    <option value="5">5 Months</option>
                                    <option value="6">6 Months</option>
                                </select>
                            </div>
                            <!-- /.dash-input-wrapper -->
                        </div>

                        <div class="col-md-4">
                            <div class="dash-input-wrapper mb-30">
                                <label>Total Amount:</label>
                                <input type="hidden" name="total_amount" id="hiddentotal_amount" value="0">
                               <div>GHC <small id="total_amount"></small></div> 
                            </div>
                        </div>
                        {{-- <div class="col-md-6">
                            <div class="dash-input-wrapper mb-30">
                                <label for="">Duration</label>
                                <select class="nice-select">
									<option>Monthly</option>
									<option>Weekly</option>
								</select>
                            </div>
                            <!-- /.dash-input-wrapper -->
                        </div> --}}
                         <div class="col-md-4">
                            <div class="dash-input-wrapper mb-30">
                                <label for="">Pickup Date</label>
                                <input type="datetime-local" name="pickup" placeholder="Pickup Date">
                            </div>
                            <!-- /.dash-input-wrapper -->
                        </div>
                        <div class="col-md-4">
                            <div class="dash-input-wrapper mb-30">
                                <label for="">return</label>
                                <input type="date" name="return" placeholder="Return Date">
                            </div>
                            <!-- /.dash-input-wrapper -->
                        </div>
                    </div> 

                   
                    <!-- /.dash-input-wrapper -->
                    
                    
                    <div class="dash-input-wrapper mb-20">
                        <label for="">Upload images of item(s)*</label>
                        
                        <div class="attached-file d-flex align-items-center justify-content-between mb-15">
                            <span id="image-preview-container"  > </span>
                            
                        </div>
                    </div>
                    <!-- /.dash-input-wrapper -->
                    <div class="dash-btn-one d-inline-block position-relative me-1">
                        <i class="bi bi-plus"></i>
                        Upload File
                        <input type="file" id="images" name="image[]" multiple >
                    </div>
                    <small>Upload file .png, .jpeg, .jpg</small>
               
                    <h4 class="dash-title-three pt-50 lg-pt-30">Address & Location</h4>
					<div class="row">
						<div class="col-12">
							<div class="dash-input-wrapper mb-25">
								<label for="">Address*</label>
								<input type="text" name="address" address="address" placeholder="Legon Campus, legon">
							</div>
							<!-- /.dash-input-wrapper -->
						</div>
						
					</div> 
                    
					<div class="row">
						<div class="col-12">
							<div class="dash-input-wrapper mb-25">
								<label for="">Map Location</label>
                                <div id="geocoder" class="geocoder">
                                    
                                </div>
                                <button type="button" id="currentLocationBtn" class="dash-btn-two tran3s me-3 btt">Use My Location</button>
<div id="map"></div>
<input type="hidden" id="latitude" name="latitude">
<input type="hidden" id="longitude" name="longitude">
<input type="text" id="location_address" name="location_address" placeholder="Map Address">

							<!-- /.dash-input-wrapper -->
						</div>
						
					
                         
                     
                         <!-- Input for the location address -->
                         
                        </div>
                    <div class="dash-input-wrapper mb-30">
                        
                        <textarea name="description" class="size-lg" placeholder="List all items and separate with a coma ','"  value=""></textarea>
                    </div>
                    <div></d>
                    <div class="button-group d-inline-flex align-items-center mt-30">
					<button type="submit" class="dash-btn-two tran3s me-3">Submit</button>
					<a href="#" class="dash-cancel-btn tran3s">Cancel</a>
				</div>	
            </form>
                </div>
				<!-- /.card-box -->

							
			</div>
		</div>
		<!-- /.dashboard-body -->


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
{{-- google map---- <script>
    function initMap() {
        const initialPosition = { lat: -34.397, lng: 150.644 };

        const map = new google.maps.Map(document.getElementById('map'), {
            zoom: 15,
            center: initialPosition
        });

        const marker = new google.maps.Marker({
            position: initialPosition,
            map: map,
            draggable: true
        });

        const geocoder = new google.maps.Geocoder();

        google.maps.event.addListener(map, 'click', function(event) {
            marker.setPosition(event.latLng);
            geocodeLatLng(geocoder, event.latLng);
        });

        google.maps.event.addListener(marker, 'dragend', function() {
            geocodeLatLng(geocoder, marker.getPosition());
        });

        function geocodeLatLng(geocoder, latLng) {
            geocoder.geocode({ 'location': latLng }, function(results, status) {
                if (status === 'OK') {
                    if (results[0]) {
                        updateLocationInputs(latLng.lat(), latLng.lng(), results[0].formatted_address);
                    } else {
                        window.alert('No results found');
                    }
                } else {
                    window.alert('Geocoder failed due to: ' + status);
                }
            });
        }

        function updateLocationInputs(lat, lng, address) {
            document.getElementById('latitude').value = lat;
            document.getElementById('longitude').value = lng;
            document.getElementById('location_address').value = address;
        }
    }
</script> --}}

{{-- leaft map--- <script>
    var map = L.map('map').setView([51.505, -0.09], 13); // Set to your desired location and zoom level

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        attribution: '© OpenStreetMap contributors'
    }).addTo(map);

    var marker;

    function onMapClick(e) {
        if (marker) {
            map.removeLayer(marker);
        }
        marker = L.marker(e.latlng, {draggable: true}).addTo(map);
        marker.on('dragend', function(event) {
            var position = marker.getLatLng();
            updateLocationInputs(position.lat, position.lng);
        });
        updateLocationInputs(e.latlng.lat, e.latlng.lng);
    }

    map.on('click', onMapClick);

    function updateLocationInputs(lat, lng) {
        document.getElementById('latitude').value = lat;
        document.getElementById('longitude').value = lng;
        // Optionally, you can add an AJAX call here to get the address using a geocoding service
    }
</script> --}}
{{-- first MAPBOX <script>
    var map = new mapboxgl.Map({
        container: 'map',
        style: 'mapbox://styles/mapbox/streets-v11', // or any other style
        center: [-0.18776,5.56985], // Set to your default location
        zoom: 7
    });

    var marker;

    map.on('click', function (e) {
        if (marker) {
            marker.remove(); // Remove the existing marker if there is one
        }

        marker = new mapboxgl.Marker()
            .setLngLat(e.lngLat)
            .addTo(map);

        updateLocationInputs(e.lngLat.lat, e.lngLat.lng);

        // Reverse Geocoding to get the address
        fetch(`https://api.mapbox.com/geocoding/v5/mapbox.places/${e.lngLat.lng},${e.lngLat.lat}.json?access_token=${mapboxgl.accessToken}`)
        .then(response => response.json())
        .then(data => {
            if (data.features.length > 0) {
                document.getElementById('location_address').value = data.features[0].place_name;
            } else {
                document.getElementById('location_address').value = 'Address not found';
            }
        })
        .catch(error => console.log('Error during reverse geocoding:', error));
    });

    function updateLocationInputs(lat, lng) {
        document.getElementById('latitude').value = lat;
        document.getElementById('longitude').value = lng;
    }
</script> --}}
{{-- second mapbox<script>
    mapboxgl.accessToken = 'pk.eyJ1Ijoia3JhaG9zdCIsImEiOiJjbHNmMDExY2cxN21oMmlwY29yd3ludDIyIn0.RAVFAcLplzEenSKYlaSiBQ';

    document.getElementById('currentLocationBtn').addEventListener('click', function() {
    if ('geolocation' in navigator) {
        navigator.geolocation.getCurrentPosition(function(position) {
            const userLocation = [position.coords.longitude, position.coords.latitude];

            // Move the map to the user's location
            map.flyTo({
                center: userLocation,
                zoom: 13
            });})}});

    var map = new mapboxgl.Map({
        container: 'map',
        style: 'mapbox://styles/mapbox/streets-v11',
        center: [0.1870, 5.6037], // Accra, Ghana
        zoom: 13
    });

    var geocoder = new MapboxGeocoder({
        accessToken: mapboxgl.accessToken,
        mapboxgl: mapboxgl,
        marker: false,
        placeholder: 'Search for places in Accra',
    });

    document.getElementById('geocoder').appendChild(geocoder.onAdd(map));

    var marker;

    geocoder.on('result', function(e) {
        placeMarkerAndUpdateInputs(e.result.geometry.coordinates, e.result.place_name);
    });

    map.on('click', function(e) {
        placeMarkerAndUpdateInputs(e.lngLat, null);
    });

    function placeMarkerAndUpdateInputs(lngLat, placeName) {
        if (marker) marker.remove();
        marker = new mapboxgl.Marker()
            .setLngLat(lngLat)
            .addTo(map);

        document.getElementById('latitude').value = lngLat.lat;
        document.getElementById('longitude').value = lngLat.lng;

        if (placeName) {
            document.getElementById('location_address').value = placeName;
        } else {
            // Reverse Geocoding when placeName is not provided
            fetch(`https://api.mapbox.com/geocoding/v5/mapbox.places/${lngLat.lng},${lngLat.lat}.json?access_token=${mapboxgl.accessToken}`)
            .then(response => response.json())
            .then(data => {
                var address = 'Address not found';
                if (data.features.length > 0) {
                    address = data.features[0].place_name;
                }
                document.getElementById('location_address').value = address;
            })
            .catch(error => console.error('Error during reverse geocoding:', error));
        }
    }
</script> --}}
{{-- last <script>
    mapboxgl.accessToken = 'pk.eyJ1Ijoia3JhaG9zdCIsImEiOiJjbHNmMDExY2cxN21oMmlwY29yd3ludDIyIn0.RAVFAcLplzEenSKYlaSiBQ';

    var map = new mapboxgl.Map({
        container: 'map',
        style: 'mapbox://styles/mapbox/streets-v12',
        center: [5.6037,0.1870], // Accra, Ghana
        zoom: 13
    });

    var geocoder = new MapboxGeocoder({
        accessToken: mapboxgl.accessToken,
        mapboxgl: mapboxgl,
        marker: false,
        placeholder: 'Search for places in Accra',
    });

    document.getElementById('geocoder').appendChild(geocoder.onAdd(map));

    var marker;

    geocoder.on('result', function(e) {
        placeMarkerAndUpdateInputs(e.result.geometry.coordinates, e.result.place_name);
    });

    map.on('click', function(e) {
        placeMarkerAndUpdateInputs(e.lngLat, null);
    });

    function placeMarkerAndUpdateInputs(lngLat, placeName) {
        if (marker) marker.remove();
        marker = new mapboxgl.Marker()
            .setLngLat(lngLat)
            .addTo(map);

        document.getElementById('latitude').value = lngLat.lat;
        document.getElementById('longitude').value = lngLat.lng;

        if (placeName) {
            document.getElementById('location_address').value = placeName;
        } else {
            // Reverse Geocoding when placeName is not provided
            fetch(`https://api.mapbox.com/geocoding/v5/mapbox.places/${lngLat.lng},${lngLat.lat}.json?access_token=${mapboxgl.accessToken}`)
            .then(response => response.json())
            .then(data => {
                var address = 'Address not found';
                if (data.features.length > 0) {
                    address = data.features[0].place_name;
                }
                document.getElementById('location_address').value = address;
            })
            .catch(error => console.error('Error during reverse geocoding:', error));
        }
    }

    // Add the event listener for the "Use My Location" button after the map has been initialized
    document.getElementById('currentLocationBtn').addEventListener('click', function() {
        if ('geolocation' in navigator) {
            navigator.geolocation.getCurrentPosition(function(position) {
                const userLocation = [position.coords.longitude, position.coords.latitude];

                // Move the map to the user's location
                map.flyTo({
                    center: userLocation,
                    zoom: 13
                });

                // Place a marker at the user's location
                if (marker) marker.remove(); // Remove existing marker if any
                marker = new mapboxgl.Marker()
                    .setLngLat(userLocation)
                    .addTo(map);

                // Update the latitude and longitude input fields
                document.getElementById('latitude').value = position.coords.latitude;
                document.getElementById('longitude').value = position.coords.longitude;

                // Optionally, perform reverse geocoding to update the address input field
            }, function(error) {
                console.error('Error occurred while fetching geolocation:', error);
                alert('Unable to fetch your current location. Please ensure location services are enabled.');
            });
        } else {
            alert('Geolocation is not supported by your browser.');
        }
    });
</script> --}}


<script>
    //code for the multiplication of the amount and month
    // function calculateTotal() {
    //     var jute_boxes = document.getElementById('jute_boxes').value;
    //     var months = document.getElementById('months').value;
    //     var total_amount = parseInt(jute_boxes, 10) * parseInt(months, 10);
    //     document.getElementById('total_amount').innerText = total_amount || 0;
    // }

    // document.getElementById('jute_boxes').addEventListener('change', calculateTotal);
    // document.getElementById('months').addEventListener('change', calculateTotal);

    function calculateTotal() {
    var juteBoxes = document.getElementById("jute_boxes").value;
    var months = document.getElementById("months").value;
    var totalAmount = juteBoxes * months; // Example calculation

    document.getElementById("hiddentotal_amount").value = totalAmount;
    document.getElementById("total_amount").textContent = totalAmount;
}
</script>



<script>
    mapboxgl.accessToken = 'pk.eyJ1Ijoia3JhaG9zdCIsImEiOiJjbHNmMDExY2cxN21oMmlwY29yd3ludDIyIn0.RAVFAcLplzEenSKYlaSiBQ';


//     const map = new mapboxgl.Map({
// // Choose from Mapbox's core styles, or make your own style with Mapbox Studio
// style: 'mapbox://styles/mapbox/light-v11',
// center: [-74.0066, 40.7135],
// zoom: 15.5,
// pitch: 45,
// bearing: -17.6,
// container: 'map',
// antialias: true
// });
 
// map.on('style.load', () => {
// // Insert the layer beneath any symbol layer.
// const layers = map.getStyle().layers;
// const labelLayerId = layers.find(
// (layer) => layer.type === 'symbol' && layer.layout['text-field']
// ).id;
 
// // The 'building' layer in the Mapbox Streets
// // vector tileset contains building height data
// // from OpenStreetMap.
// map.addLayer(
// {
// 'id': 'add-3d-buildings',
// 'source': 'composite',
// 'source-layer': 'building',
// 'filter': ['==', 'extrude', 'true'],
// 'type': 'fill-extrusion',
// 'minzoom': 15,
// 'paint': {
// 'fill-extrusion-color': '#aaa',
 
// // Use an 'interpolate' expression to
// // add a smooth transition effect to
// // the buildings as the user zooms in.
// 'fill-extrusion-height': [
// 'interpolate',
// ['linear'],
// ['zoom'],
// 15,
// 0,
// 15.05,
// ['get', 'height']
// ],
// 'fill-extrusion-base': [
// 'interpolate',
// ['linear'],
// ['zoom'],
// 15,
// 0,
// 15.05,
// ['get', 'min_height']
// ],
// 'fill-extrusion-opacity': 0.6
// }
// },
// labelLayerId
// );
// });

//     var map = new mapboxgl.Map({
//         container: 'map',
//         // A style that supports 3D terrain
//         center: [-0.070376, 5.643235], // Accra, Ghana
//         zoom: 13,
//         pitch: 45,
//         antialias: true
//     });

//     map.on('style.load', () => {
//     map.setConfigProperty('basemap', 'lightPreset', 'day');

//     map.addLayer({
//     id: 'points-of-interest',
//     slot: 'middle',
//     source: {
//         type: 'vector',
//         url: 'mapbox://mapbox.mapbox-streets-v8'
//     },
//     'source-layer': 'poi_label',
//     type: 'circle'
// });

// });
//     map.on('load', function () {
//         // Add the DEM source for terrain data
//         map.addSource('mapbox-dem', {
//             type: 'raster-dem',
//             url: 'mapbox://mapbox.mapbox-terrain-v2',
//             tileSize: 512,
//             maxzoom: 14
//         });
//         // Enable the terrain layer with exaggerated height to enhance the 3D effect
//         map.setTerrain({ 'source': 'mapbox-dem', 'exaggeration': 1.5 });

//         // Adjust the light settings to complement the 3D terrain
//         map.setLight({
//             'anchor': 'viewport',
//             'color': 'white',
//             'intensity': 0.5,
//             'position': [1.5, 90, 80]
//         });

//         // Continue with your existing functionalities...
//     });

const map = new mapboxgl.Map({
container: 'map', // container ID
center: [-0.070376, 5.643235], // starting position [lng, lat]
zoom: 15.5, // starting zoom
pitch: 62, // starting pitch

});
 
map.on('style.load', () => {
    map.setConfigProperty('basemap', 'lightPreset', 'dawn','showPointOfInterestLabels', true);
map.addSource('line', {
type: 'geojson',
lineMetrics: true,
data: {
type: 'LineString',
coordinates: [
[-0.070376, 5.643235],
[-0.070376, 5.643235]
]
}
});
map.addLayer({
id: 'line',
source: 'line',
type: 'line',
paint: {
'line-width': 12,
// The `*-emissive-strength` properties control the intensity of light emitted on the source features.
// To enhance the visibility of a line in darker light presets, increase the value of `line-emissive-strength`.
'line-emissive-strength': 0.8,
'line-gradient': [
'interpolate',
['linear'],
['line-progress'],
0,
'red',
1,
'blue'
]
}
});
});
// document
// .getElementById('lightPreset')
// .addEventListener('change', function () {
// map.setConfigProperty('basemap', 'lightPreset', this.value);
// });
 
// document
// .querySelectorAll('.map-overlay-inner input[type="checkbox"]')
// .forEach((checkbox) => {
// checkbox.addEventListener('change', function () {
// map.setConfigProperty('basemap', this.id, );
// });
// });

    var geocoder = new MapboxGeocoder({
        accessToken: mapboxgl.accessToken,
        mapboxgl: mapboxgl,
        marker: false,
        placeholder: 'Search for places in Accra',
    });

    document.getElementById('geocoder').appendChild(geocoder.onAdd(map));

    var marker;

    geocoder.on('result', function(e) {
        placeMarkerAndUpdateInputs(e.result.geometry.coordinates, e.result.place_name);
    });

    map.on('click', function(e) {
        placeMarkerAndUpdateInputs(e.lngLat, null);
    });

    function placeMarkerAndUpdateInputs(lngLat, placeName) {
        if (marker) marker.remove();
        marker = new mapboxgl.Marker()
            .setLngLat(lngLat)
            .addTo(map);

        document.getElementById('latitude').value = lngLat.lat;
        document.getElementById('longitude').value = lngLat.lng;

        if (placeName) {
            document.getElementById('location_address').value = placeName;
        } else {
            // Reverse Geocoding when placeName is not provided
            fetch(`https://api.mapbox.com/geocoding/v5/mapbox.places/${lngLat.lng},${lngLat.lat}.json?access_token=${mapboxgl.accessToken}`)
            .then(response => response.json())
            .then(data => {
                var address = 'Address not found';
                if (data.features.length > 0) {
                    address = data.features[0].place_name;
                }
                document.getElementById('location_address').value = address;
            })
            .catch(error => console.error('Error during reverse geocoding:', error));
        }
    }

    // "Use My Location" button functionality
    document.getElementById('currentLocationBtn').addEventListener('click', function() {
    if ('geolocation' in navigator) {
        navigator.geolocation.getCurrentPosition(function(position) {
            const userLocation = [position.coords.longitude, position.coords.latitude];

            map.flyTo({
                center: userLocation,
                zoom: 15.5 // Adjusted to match your initial zoom level
            });

            if (marker) marker.remove();
            marker = new mapboxgl.Marker()
                .setLngLat(userLocation)
                .addTo(map);

            document.getElementById('latitude').value = position.coords.latitude;
            document.getElementById('longitude').value = position.coords.longitude;

            // Reverse Geocoding to get the address
            fetch(`https://api.mapbox.com/geocoding/v5/mapbox.places/${userLocation[0]},${userLocation[1]}.json?access_token=${mapboxgl.accessToken}`)
            .then(response => response.json())
            .then(data => {
                var address = 'Address not found';
                if (data.features.length > 0) {
                    address = data.features[0].place_name;
                }
                document.getElementById('location_address').value = address;
            })
            .catch(error => console.error('Error during reverse geocoding:', error));

        }, function(error) {
            console.error('Error occurred while fetching geolocation:', error);
            alert('Unable to fetch your current location. Please ensure location services are enabled.');
        });
    } else {
        alert('Geolocation is not supported by your browser.');
    }
});
</script>

        <script>
            document.getElementById('images').addEventListener('change', function (e) {
                var previewContainer = document.getElementById('image-preview-container');
    
                // Retain existing content
                var existingContent = Array.from(previewContainer.children);
    
                // Clear the container
                previewContainer.innerHTML = '';
    
                // Append existing content back to the container
                existingContent.forEach(function (item) {
                    previewContainer.appendChild(item.cloneNode(true));
                });
    
                var files = e.target.files;
                for (var i = 0; i < files.length; i++) {
                    var file = files[i];
                    var reader = new FileReader();
    
                    reader.onload = function (e) {
                        var imgContainer = document.createElement('div');
                        imgContainer.className = 'image-container';
    
                        var img = document.createElement('img');
                        img.src = e.target.result;
                        img.className = 'img-thumbnail';  // Apply Bootstrap's img-thumbnail class
                        img.style.maxWidth = '60px';      // Set max width
                        img.style.maxHeight = '40px';     // Set max height
                        imgContainer.appendChild(img);
    
                        var removeBtn = document.createElement('button');
                        removeBtn.innerHTML = 'X';
                        removeBtn.className = 'btn btn-sm btn-danger ms-2';
                        removeBtn.addEventListener('click', function () {
                            imgContainer.remove();
                        });
    
                        imgContainer.appendChild(removeBtn);
    
                        previewContainer.appendChild(imgContainer);
                    };
    
                    reader.readAsDataURL(file);
                }
            });
        </script>
        @endsection