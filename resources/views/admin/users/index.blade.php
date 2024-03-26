@extends('layouts.master')

@section("title", "Admin Dashboard  | PackinTosh")

@section("content")

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
  </style>
  <style>
    .pagination {
        display: inline-block;
        padding-left: 0;
        margin: 20px 0;
        border-radius: 4px;
    }
    
    .pagination > li {
        display: inline;
    }
    
    .pagination > li > a,
    .pagination > li > span {
        position: relative;
        float: left;
        padding: 6px 12px;
        margin-left: -1px;
        line-height: 1.42857143;
        color: #337ab7;
        text-decoration: none;
        background-color: #fff;
        border: 1px solid #ddd;
    }
    
    .pagination > li:first-child > a,
    .pagination > li:first-child > span {
        margin-left: 0;
        border-top-left-radius: 4px;
        border-bottom-left-radius: 4px;
    }
    
    .pagination > li:last-child > a,
    .pagination > li:last-child > span {
        border-top-right-radius: 4px;
        border-bottom-right-radius: 4px;
    }
    
    .pagination > li > a:hover,
    .pagination > li > span:hover,
    .pagination > li > a:focus,
    .pagination > li > span:focus {
        z-index: 2;
        color: #23527c;
        background-color: #eee;
        border-color: #ddd;
    }
    
    .pagination > .active > a,
    .pagination > .active > span,
    .pagination > .active > a:hover,
    .pagination > .active > span:hover,
    .pagination > .active > a:focus,
    .pagination > .active > span:focus {
        z-index: 3;
        color: #fff;
        cursor: default;
        background-color: #337ab7;
        border-color: #337ab7;
    }
    
    .pagination > .disabled > span,
    .pagination > .disabled > span:hover,
    .pagination > .disabled > span:focus,
    .pagination > .disabled > a,
    .pagination > .disabled > a:hover,
    .pagination > .disabled > a:focus {
        color: #777;
        cursor: not-allowed;
        background-color: #fff;
        border-color: #ddd;
    }
    </style>
    
   
    <div class="table-responsive"><br><br><br><br>
      <div> <h3>Users</h3>
      <table class="table table-striped">
        <thead>
          <tr>
          <th>
            Id
          </th>
          
            <th>
              Profile
            </th>
            <th>
              Name
            </th>
            <th>
              Status
            </th>
            <th>
              Phone
            </th>
            <th>
              Action
            </th>
          </tr>
        </thead>
        <tbody>
          @foreach($users as $user)
          <tr>
            <td>
              {{$user->id}}
            </td>
            <td class="py-1">
              @if($user->image)	 
              <img src="/uploads/user/{{$user->image}}" alt="image">
              @else
              <img src="/uploads/user/pack_profile.jpg" alt="image">
              @endif
            </td>
            <td>
              {{$user->name}}
            </td>
            <td class="@statusColor($user->Account)" >
              
                <div class="status-bar {{ $user->Account === 'Active' ? 'bg-success' : 'bg-danger' }}">{{ $user->Account }}</div>
             
            </td>
            <td>
              {{$user->phone}}
            </td>
            <td>
              <button type="button" class="btn btn-outline-success dropdown-toggle btn-sm" id="dropdownMenuIconButton9" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="ti-user"></i>
              </button>
              <div class="dropdown-menu">
                <a class="dropdown-item" href="#">View</a>
                <a class="dropdown-item" href="{{ route('users.edit', $user->id) }}">Edit</a>
                {{-- <a class="dropdown-item" href="#">Edit</a>
                <a class="dropdown-item" href="#">Activate</a>
                <a class="dropdown-item" href="#">Delete</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">Separated link</a> --}}
              </div>
            </td>
          </tr>
        </tbody>
        
        @endforeach
      </table>
  
    <div class="d-flex">
      {{ $users->links() }}
    </diV>
    </div>
    
  </div>
</div>

@endsection