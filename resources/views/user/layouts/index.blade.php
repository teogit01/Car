<!DOCTYPE html>
<html lang="en">
  @include('user.layouts.head')
  <body>

	<div id="colorlib-page">
    
		<a href="#" class="js-colorlib-nav-toggle colorlib-nav-toggle"><i></i></a>
		<div style="display: flex; width: 100%">
      <div style="flex-direction: column; width: 25%;">
        @include('user.layouts.left')
      </div>
      <div style="width: 75%;">
        @include('user.layouts.banner')
      </div>
    </div>
    @yield('main')
	</div><!-- END COLORLIB-PAGE -->

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


  @include('user.layouts.js')
    
  </body>
</html>