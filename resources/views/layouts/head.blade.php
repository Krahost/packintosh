<div class="dashboard-body">
  <div class="position-relative">
<header class="dashboard-header">
  <div class="d-flex align-items-center justify-content-end">
    <button class="dash-mobile-nav-toggler d-block d-md-none me-auto">
      <span></span>
    </button>
    <form action="#" class="search-form">
      <input type="text" placeholder="Search here..">
      <button><img src="/userfiles/img/icon/icon_10.svg" alt="" class="lazy-img m-auto"></button>
    </form>
    <div class="profile-notification ms-2 ms-md-5 me-4">
      <button class="noti-btn dropdown-toggle" type="button" id="notification-dropdown" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">
        <img src="/userfiles/img/icon/icon_11.svg" alt="" class="lazy-img">
        <div class="badge-pill"></div>
      </button>
     <!-- Notification list dropdown -->
     <ul class="dropdown-menu" aria-labelledby="notification-dropdown">
      <li>
          <h4>Notifications</h4>
          <ul class="style-none notify-list">
            @if (auth()->user()->unreadNotifications->count() > 0)
            @foreach (auth()->user()->unreadNotifications as $notification)
                  <li class="notification-item" data-notification-id="{{ $notification->id }}">
                      <div class="flex-fill ps-2">
                          <h6>{{ $notification->data['message'] }}</h6>
                          <span class="time">{{ $notification->created_at->diffForHumans() }}</span>
                      </div>
                  </li>
                  @endforeach
                  @else
                      <li>No notifications</li>
                  @endif
          </ul>
      </li>
  </ul>
  

 
    </div>
    
    <div><a href="{{route("book.create")}} " class="job-post-btn tran3s">Book</a></div>
     
  </div>
  
</header>
