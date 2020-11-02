
<!doctype html>
<html lang="en">
		<head>
		  <title></title>
		  <meta charset="utf-8">
		  <meta name="viewport" content="width=device-width, initial-scale=1">

		    <!-- Load my style -->
      <link rel="stylesheet" href="lib/css/style1.css">
      <link rel="shortcut icon" href="">
      <!-- Load Bootstrap -->
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
		  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- Load Leaflet from CDN -->
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
    integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
    crossorigin=""/>
  <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
    integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
    crossorigin=""></script>
    <!-- Load Esri Leaflet from CDN -->
  <script src="https://unpkg.com/esri-leaflet@2.5.1/dist/esri-leaflet.js"
    integrity="sha512-q7X96AASUF0hol5Ih7AeZpRF6smJS55lcvy+GLWzJfZN+31/BQ8cgNx2FGF+IQSA4z2jHwB20vml+drmooqzzQ=="
    crossorigin=""></script>
  
  

  <!-- Load Esri Leaflet Geocoder from CDN -->
  <link rel="stylesheet" href="https://unpkg.com/esri-leaflet-geocoder@2.3.3/dist/esri-leaflet-geocoder.css"
    integrity="sha512-IM3Hs+feyi40yZhDH6kV8vQMg4Fh20s9OzInIIAc4nx7aMYMfo+IenRUekoYsHZqGkREUgx0VvlEsgm7nCDW9g=="
    crossorigin="">
  <script src="https://unpkg.com/esri-leaflet-geocoder@2.3.3/dist/esri-leaflet-geocoder.js"
    integrity="sha512-HrFUyCEtIpxZloTgEKKMq4RFYhxjJkCiF5sDxuAokklOeZ68U2NPfh4MFtyIVWlsKtVbK5GD2/JzFyAfvT5ejA=="
    crossorigin=""></script>

  
</head>

	
<style>
 body { margin:0; padding:0;  font-family: Arial, Helvetica, sans-serif;}
    #map { position: absolute; top:85px; bottom:0; right:0; left:0; }
 #basemaps-wrapper {
    position: absolute;
    top: 200px;
    right: 10px;
    z-index: 400;
    background: white;
    padding: 10px;
  }
  #basemaps {
    margin-bottom: 5px;
  }
	
</style>
<body>
<nav class="navbar navbar-expand-md navbar-dark bg-dark">
    <div class="navbar-collapse collapse w-100 order-1 order-md-0 dual-collapse2">
        <ul class="navbar-nav mr-auto">
          
<li class="nav-item">
<a class="nav-link" href="#"><div class="select"><select  id="data"> <option selected>select country</option></select></div></a>

</li>
</li>
<li class="nav-item">  
<a class="nav-link" href="#"><button type="button" class="btn btn-info btn-lg" data-toggle="modal" id="submit" data-target="#myModal">Country Data</button></a>
</li>
</ul>
</div>
<div class="navbar-collapse collapse w-100 order-3 dual-collapse2">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
       </li></ul><div>
       <button id="click">Country Border</button>
<p id="demo"></p>
    </nav>




    <div  id="map"  ></div>
    
    <div id="basemaps-wrapper" class="leaflet-bar">
      <select id="basemaps">
        <option value="Topographic">Topographic</option>
        <option value="Streets">Streets</option>
       
        <option value="Oceans">Oceans</option>
        <option value="Gray">Gray</option>
        <option value="Imagery">Imagery</option>
        <option value="ImageryClarity">Imagery (Clarity)</option>
        <option value="ImageryFirefly">Imagery (Firefly)</option>
        <option value="Physical">Physical</option>
      </select>
    
  </div>
  </div>
  <div id ="myModal"  class="modal">
		  <div class="modal-dialog">
		
			<!-- Modal content-->
			<div class="modal-content">
			  <div class="modal-header">
			
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<h4 class="modal-title">Country Information</h4>
			  </div>
			  <div class="modal-body">
				<div class="row">
  <table>
	

<tr><td id="country_flag"><img src="" alt=""  class="center"></td> </tr>
<tr><td id="name"></td></tr>								
<tr><td id="capital"></td></tr>								 
<tr><td id="regio"></td></tr>						  
<tr><td id="population"></td></tr>								
<tr><td id="currencies"></td></tr>
<tr><td id="languages"></td></tr>						
<tr><td id="lat"></td></tr>									
<tr><td id="name1"></td></tr>									  
<tr><td id="country"></td></tr>								
<tr><td id="main"></td></tr>	
<tr><td id="temprature"></td></tr>								  
<tr><td id="min"></td></tr>								
<tr><td id="max"></td></tr>							  
<tr><td id="humidity"></td>	</tr>							 
<tr><td id="wind"></td>	</tr>							
<tr><td id="weather"></td></tr>								  
<tr><td id="pressure"></td></tr>		
<tr><td id="border"></td></tr>						
								
</table>				
</div>
</div>
</div>
 </div>
  </div> 	

 
   


<script src="lib/js/app.js"></script>


<script src="lib/js/script2.js"></script>

<script src="lib/js/fore1.js"></script>
<script src="lib/js/change1.js"></script>
<script src="lib/js/user1.js"></script>
<script src="lib/js/map.js"></script>
</body>
</html>

 
  


