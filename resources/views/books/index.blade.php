@extends('layouts.layout')

@section("title", "PackinTosh | User")

@section("content")		
<style type="text/css">
.booking-image {
   
    width: 20px;
    height: 15px;
    margin: 5px; /* Adjust as needed */
    border: 1px solid #ccc;
    border-radius: 1px;
}
.image-grid {
    
    /* Creates two columns of equal width */
    /* Adjusts the space between the images */
}


</style>
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
<div class="bg-white card-box border-20">
    <div class="tab-content" id="nav-tabContent">
        <div class="tab-pane fade show active" id="a1" role="tabpanel">
            <div class="table-responsive">
                <table class="table job-alert-table">
                    <thead>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Items</th>
                            <th scope="col">PickUp date</th>
                            {{-- <th scope="col">Return date</th> --}}
                            <th scope="col">Amount</th>
                            <th scope="col">payment</th>
                            <th scope="col">Status</th>
                            {{-- <th scope="col">image</th> --}}
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody class="border-0" > 
                    
                        <tr class="active">
                            @foreach($books as $book)
                               <td>#{{$book->id}}</td>
                                <td>
                                    <div class="job-name fw-500">{{$book->institution}}</div>
                                    <div class="info1">{{$book->hostel}}</div>
                                </td>
                                <td>{{$book->pickup}}</td>
                                {{-- <td>{{$book->return}}</td> --}}
                               
                                <td>GHC {{$book->total_amount}}</td>
                                <td>{{$book->payment}}</td>
                                <td>{{$book->Status}}</td>
                                {{-- <td class="image-grid"> @if ($book->image)
                                    @php $images = json_decode($book->image); @endphp
                                    @foreach ($images as $image)
                                        <div  ><img src="{{ asset( $image) }}" alt="Booking Image" class="booking-image"></div>
                                    @endforeach
                                @endif</td> --}}
                                <td>
                                    <div class="action-dots float-end">
                                        <button class="action-btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            <span></span>
                                        </button>
                                        <ul class="dropdown-menu dropdown-menu-end">
                                        <li><a class="dropdown-item" href="{{route('books.views',  ['book' => $book])}}"><img src="../images/lazy.svg" data-src="images/icon/icon_18.svg" alt="" class="lazy-img"> View</a></li>
                                        {{-- <li><a class="dropdown-item" href="#"><img src="../images/lazy.svg" data-src="images/icon/icon_19.svg" alt="" class="lazy-img"> Share</a></li>
                                        <li><a class="dropdown-item" href="#"><img src="../images/lazy.svg" data-src="images/icon/icon_20.svg" alt="" class="lazy-img"> Edit</a></li>
                                        <li><a class="dropdown-item" href="#"><img src="../images/lazy.svg" data-src="images/icon/icon_21.svg" alt="" class="lazy-img"> Delete</a></li> --}}
                                        </ul>
                                    </div>
                                </td>
                            
                        </tr>   
                        @endforeach  
                    </tbody>
                    
                </table>
                <!-- /.table job-alert-table -->
            </div>
        </div>
    </div>
    
</div>
@endsection