
<meta name="csrf-token" content="{{ csrf_token() }}">
<script src="{{asset('src/user/js/jquery.min.js')}}"></script>
<script src="{{asset('src/user/js/jquery-migrate-3.0.1.min.js')}}"></script>
<script src="{{asset('src/user/js/popper.min.js')}}"></script>
<script src="{{asset('src/user/js/bootstrap.min.js')}}"></script>
<script src="{{asset('src/user/js/jquery.easing.1.3.js')}}"></script>
<script src="{{asset('src/user/js/jquery.waypoints.min.js')}}"></script>
<script src="{{asset('src/user/js/jquery.stellar.min.js')}}"></script>
<script src="{{asset('src/user/js/owl.carousel.min.js')}}"></script>
<script src="{{asset('src/user/js/jquery.magnific-popup.min.js')}}"></script>
<script src="{{asset('src/user/js/aos.js')}}"></script>
<script src="{{asset('src/user/js/jquery.animateNumber.min.js')}}"></script>
<script src="{{asset('src/user/js/scrollax.min.js')}}"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
<script src="{{asset('src/user/js/google-map.js')}}"></script>
<script src="{{asset('src/user/js/main.js')}}"></script>



<script type="text/javascript">
	var path = "{{asset('/')}}"
</script>

<script type="text/javascript">
	$(document).ready(function(){
		$('#search').on('keyup',function(){
			$.ajax({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				},
				type: 'post',
				url: path + 'search',
				data: {id:1},
				success : function(data){
					//alert(data)
					var names = []
					data.forEach(item => names.push(item))
					//console.log(names)
					$('#select').autocomplete({
						source: names
					})
				},
				error : function(data){
					alert(data)
				}
			})
		})
	})
</script>
 <!-- var availableTutorials  =  [
               "ActionScript",
               "Bootstrap",
               "C",
               "C++",
            ];
            $( "#automplete-1" ).autocomplete({
               source: availableTutorials
            }); -->

