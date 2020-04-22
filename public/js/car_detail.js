	$(document).ready(function() {
		
		$.ajax({
			headers: {
          		'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          	},
			//_token: "{{csrf_token()}}",
			type: 'post',
			url:  'http://127.0.0.1:8000/admin/cartype/getData',
			dataType:'json',
			data:{},
			contentType: false,
          	processData: false,

			success: function(data) {
				//console.log(data)
				data.forEach( (item,index)  => {
						$('#select_car').append('<option class="arr_select_car" value='+item.id+'>'+item.name+'</option>')
						//console.log(item)
					}
				)
			},
			 error: function(data) {
			 	//alert(JSON.stringify(data));
			 	alert('error');
			 }
		})

		$('#select_car').on('change',function(){
			//console.log($('#select_car')[0].value)
			const idTypeCar = $('#select_car')[0].value
			$.ajax({
				headers: {
          			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          		},
				type: 'post',
				url: 'http://127.0.0.1:8000/admin/cardetail/getDataFromTypeCar',
				data:{idTypeCar: idTypeCar},
				success: function(data){
					$('.showContent').html(data)
				},
				error: function(data) {
			 	//alert(JSON.stringify(data));
			 		alert('error');
			 }
			})
			
		})
	})

	
