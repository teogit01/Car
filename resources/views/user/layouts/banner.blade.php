<style type="text/css">
	.back-next { width: 100%;height: 400px;display: flex; justify-content: space-between; }
	.back img, .next img { width: 50px;height: 50px; opacity: 0.5;margin-top: 160px;}
	.back { background-color: ; height: 100%; }
	.next { background-color: ; height: 100%; }
</style>
<div class="banner-bg" style="width: 100%;height: 400px; background-image: url('https://via.placeholder.com/')">
	

	
<!-- 	<div style="width: 100%">
		<img src="https://via.placeholder.com/780x300" style="position: absolute;width: 70%" class="showBg" > 
	</div> -->
	

	<!-- <img src="https://via.placeholder.com/980x300" style="position: absolute; display: none" >
	<img src="https://via.placeholder.com/980x200" style="position: absolute; display: none" class="showBg" id=2 > -->
	<!-- <div class="banner-content">
		<div class="back-next">
			<div class='back' onclick="back()">
				<img src="{{asset('img/back.png')}}">
			</div>
			<div class='next' onclick="next()">
				<img src="{{asset('img/next.png')}}">
			</div>
		</div>
	</div> -->

	<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" data-interval="2000"> 
		<ol class="carousel-indicators">
			<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
			<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
			<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
		</ol>
		<div class="carousel-inner">
			<div class="carousel-item active">
				<img class="d-block w-100" src="https://via.placeholder.com/980x400" alt="First slide">
			</div>
			<div class="carousel-item">
				<img class="d-block w-100" src="https://via.placeholder.com/980x400" alt="Second slide">
			</div>
			<div class="carousel-item">
				<img class="d-block w-100" src="https://via.placeholder.com/980x400" alt="Third slide">
			</div>
		</div>
		<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
			<span class="carousel-control-prev-icon" aria-hidden="true"></span>
			<span class="sr-only">Previous</span>
		</a>
		<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
			<span class="carousel-control-next-icon" aria-hidden="true"></span>
			<span class="sr-only">Next</span>
		</a>
	</div>
</div>

<script type="text/javascript">
	var i = -1;
	var images = ['https://via.placeholder.com/980x400','https://via.placeholder.com/980x400','https://via.placeholder.com/980x400']
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