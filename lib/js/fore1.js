
$('#submit').click(function() {

	$.ajax({
		url: "lib/php/country.php",
		type: 'POST',
		dataType: 'json',
		data: {
			country: $('#data').val(),
			
		},
		success: function(result2) {

			console.log(result2);
			try{
				if (result2.status.name == "ok") {
				
					$('#name').html("<h2><strong> Name of Country is <strong> "+result2['data'][0]['name']+"</h3>");
					$('#capital').html("<h3><strong>Capital:</strong> "+result2['data'][0]['capital']+" </h3>");
					$('#regio').html("<h3><strong> Region :</strong> "+result2['data'][0]['region']+" </h3>");
					$('#population').html("<h3><strong> Population :</strong> "+result2['data'][0]['population']+" </h3>");
					$('#languages').html("<h3><strong> Languages :</strong> "+result2['data'][0]['languages'][0]['name']+" </h3>");
					$('#currencies').html("<h3><strong> Currencies :</strong> "+result2['data'][0]['currencies'][0]['name']+" </h3>");
					$('#lat').html("<h3><strong> Lat and lng :</strong> "+result2['data'][0]['latlng']+" </h3>");
				
				
					
			}
	
		}	
		
		catch (err) {
			errorHandler();
			
		}
	 },
	 error: function( jqXHR, textStatus, errorThrown) {
		 //if body is empty we end up here
		 errorHandler();  
	   }
	
	 
	}); 
	
	
	});
	function errorHandler(){
		
	$('#country_flag img').attr('src','');
	$('#name').html('')
	$('#capital').html('')
	$('#regio').html('')
	$('#population').html('')
	$('#currencies').html('')
	$('#languages').html('')
	$('#lat').html('')
	$("#error").html("<div class ='alert alert-danger' id='errorCity'> <a href ='#'class='close' data-dismiss='alert' aria-label='Close'>&times;</a>City field can not be empty</div>");
	}                           


