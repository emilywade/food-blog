<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Postcode Finder</title>
  </head>
  <body>
    <div class="container">
	
		<h1>Postcode Finder</h1>

		<p>Enter a partial address to get the postcode.</p>
		
		<div id="message"></div>
	
		<form>
		  <fieldset class="form-group">
			<label for="address">Address</label>
			<input type="text" class="form-control" id="address" placeholder="Enter partial address">
		  </fieldset>
		  <button class="btn btn-primary" id="find-postcode">Submit</button>
		</form>
	
	</div>

    <!-- jQuery first, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	
	<script type="text/javascript">
	
		$("#find-postcode").click(function(e) {

			e.preventDefault();
			
			$.ajax({
				
				url:"https://maps.googleapis.com/maps/api/geocode/json?address=" + encodeURIComponent($("#address").val()) + "&key=AIzaSyATI1CctWV3ZejdFEm8B5L5bGbV2GooSKQ",
				type: "GET",
				success: function (data) {
					
					if (data["status"] != "OK") {
						
						$("#message").html('<div class="alert alert-warning" role="alert">Postcode could not be found - please try another.</div>');						
						
					} else {
					
						$.each(data["results"][0]["address_components"], function(key, value) {
							
							if (value["types"][0] == "postal_code") {
								
								$("#message").html('<div class="alert alert-success" role="alert"><strong>Postcode found!</strong> The postcode is: ' + value["long_name"] + '.</div>');
								
							}
							
						})
					
					}
				}
				
			})
		
		})
	
		
	</script>
  </body>
</html>