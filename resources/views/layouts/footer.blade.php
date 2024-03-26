
<button class="scroll-top">
  <i class="bi bi-arrow-up-short"></i>
</button>

<script>
  $(document).ready(function() {
      // Show notification pop-up/modal when notification item is clicked
      $('.notification-item').click(function() {
          var notificationId = $(this).data('notification-id');
          
          // Fetch notification details from the server using AJAX
          $.ajax({
              url: '/notifications/' + notificationId, // Endpoint to fetch notification details
              type: 'GET',
              success: function(response) {
                  // Display notification pop-up/modal with details
                  $('.notification-content').html(response);
                  $('.notification-popup').show();
              }
          });
      });
      
      // Mark as read button click event
      $('.mark-as-read-btn').click(function() {
          var notificationId = $('.notification-item.active').data('notification-id');
          
          // Send AJAX request to mark notification as read
          $.ajax({
              url: '/notifications/' + notificationId + '/mark-as-read', // Endpoint to mark notification as read
              type: 'POST',
              success: function(response) {
                  // Handle success (e.g., update UI)
                  $('.notification-item.active').removeClass('unread');
              }
          });
      });
      
      // Close button click event
      $('.close-btn').click(function() {
          // Hide notification pop-up/modal
          $('.notification-popup').hide();
      });
  });
  </script>


<!-- Optional JavaScript _____________________________  -->

<!-- jQuery first, then Bootstrap JS -->
<!-- jQuery -->
<script src="/userfiles/vendor/jquery.min.js"></script>
<!-- Bootstrap JS -->
<script src="/userfiles/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- WOW js -->
<script src="/userfiles/vendor/wow/wow.min.js"></script>
<!-- Slick Slider -->
<script src="/userfiles/vendor/slick/slick.min.js"></script>
<!-- Fancybox -->
<script src="/userfiles/vendor/fancybox/dist/jquery.fancybox.min.js"></script>
<!-- Lazy -->
<script src="/userfiles/vendor/jquery.lazy.min.js"></script>
<!-- js Counter -->
<script src="/userfiles/vendor/jquery.counterup.min.js"></script>
<script src="/userfiles/vendor/jquery.waypoints.min.js"></script>
<!-- Nice Select -->
<script src="/userfiles/vendor/nice-select/jquery.nice-select.min.js"></script>
<!-- validator js -->
<script src="/userfiles/vendor/validator.js"></script>

<!-- Theme js -->
<script src="/userfiles/js/theme.js"></script>
</div> <!-- /.main-page-wrapper -->
</body>


<!-- Mirrored from html.creativegigstf.com/jobi/jobi/dashboard/candidate-dashboard-index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 27 Nov 2023 11:38:08 GMT -->
</html>