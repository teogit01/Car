<style type="text/css">
	.back-next { width: 100%;height: 400px;display: flex; justify-content: space-between; }
	.back img, .next img { width: 50px;height: 50px; opacity: 0.5;margin-top: 160px;}
	.back { background-color: ; height: 100%; }
	.next { background-color: ; height: 100%; }
</style>
<div class="banner-bg" style="width: 100%;height: 400px; background-image: url('https://via.placeholder.com/')">
	<div class="showBg"></div>
	
	<img src="{{asset('img/banner/audi.png')}}" style="position: absolute;" class="showBg" > 
	

	<!-- <img src="https://via.placeholder.com/980x300" style="position: absolute; display: none" >
	<img src="https://via.placeholder.com/980x200" style="position: absolute; display: none" class="showBg" id=2 > -->
	<div class="banner-content">
		<div class="back-next">
			<div class='back' onclick="back()">
				<img src="{{asset('img/back.png')}}">
			</div>
			<div class='next' onclick="next()">
				<img src="{{asset('img/next.png')}}">
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	var i = -1;
	var images = ["{{asset('img/banner/vios.png')}}","{{asset('img/banner/mercedes.jpeg')}}", "{{asset('img/banner/audi.png')}}"]
	function back(){

		i--;
		if (i < 0)
			i = 2
		$('.showBg').attr('src',images[i])
		
	}
	function next(){

		i++;
		if (i > 2)
			i = 0
		$('.showBg').attr('src',images[i])
		
	}
	$(document).ready(function(){
		setInterval(function(){			
			i++
			if (i==3)
				i=0
			$('.showBg').attr('src',images[i])
		},3000)
	})
</script>