<!DOCTYPE html>
<html lang="en">
  @include('user.layouts.head')
  <body>
  <!-- Load Facebook SDK for JavaScript -->
  <div id="fb-root"></div>
      <script>
        window.fbAsyncInit = function() {
          FB.init({
            xfbml            : true,
            version          : 'v7.0'
          });
        };

        (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = 'https://connect.facebook.net/vi_VN/sdk/xfbml.customerchat.js';
        fjs.parentNode.insertBefore(js, fjs);
      }(document, 'script', 'facebook-jssdk'));</script>

      <!-- Your Chat Plugin code -->
      <div class="fb-customerchat"
        attribution=setup_tool
        page_id="2141755022743174"
  logged_in_greeting="Xin chào Thuê xe Cần Thơ có thể giúp gì cho bạn?"
  logged_out_greeting="Xin chào Thuê xe Cần Thơ có thể giúp gì cho bạn?">
      </div>
	<div id="colorlib-page">
    
		<a href="#" class="js-colorlib-nav-toggle colorlib-nav-toggle"><i></i></a>
		<div style="display: flex; width: 100%">
      <div style="flex-direction: column; width: 25%;">
        @include('user.layouts.left')
      </div>
      <div style="width: 75%;">
        @yield('banner')
      </div>
    </div>
    @yield('main')
	</div><!-- END COLORLIB-PAGE -->

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


  @include('user.layouts.js')
    
  </body>
</html>