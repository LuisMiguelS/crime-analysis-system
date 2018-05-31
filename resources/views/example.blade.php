<!DOCTYPE html>

<html>

<head>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

	<script src="http://maps.google.com/maps/api/js?key=AIzaSyCdH0OxjbEmJx1ZOLMPM5oq_bty_TZA_vk&libraries=visualization"></script>

  	<script src="https://cdnjs.cloudflare.com/ajax/libs/gmaps.js/0.4.24/gmaps.js"></script>


  	<style type="text/css">

    	#mymap {

      		border:1px solid red;

      		width: 800px;

      		height: 500px;

    	}

  	</style>
</head>
<body>
    <div id="mymap"></div>

    <script type="text/javascript">
      /* Data points defined as an array of LatLng objects */
     
      var heatmapData = [
        
        new google.maps.LatLng(37.782, -122.447),
        new google.maps.LatLng(37.782, -122.445),
        new google.maps.LatLng(37.782, -122.443),
        new google.maps.LatLng(37.782, -122.441),
        new google.maps.LatLng(37.782, -122.439),
        new google.maps.LatLng(37.782, -122.437),
        new google.maps.LatLng(37.782, -122.435),
        new google.maps.LatLng(37.785, -122.447),
        new google.maps.LatLng(37.785, -122.445),
        new google.maps.LatLng(37.785, -122.443),
        new google.maps.LatLng(37.785, -122.441),
        new google.maps.LatLng(37.785, -122.439),
        new google.maps.LatLng(37.785, -122.437),
        new google.maps.LatLng(37.785, -122.435)
      ];

      var sanFrancisco = new google.maps.LatLng(37.774546, -122.433523);

      map = new google.maps.Map(document.getElementById('mymap'), {
          center: sanFrancisco,
          zoom: 15,
          mapTypeId: 'satellite'
      });

      var heatmap = new google.maps.visualization.HeatmapLayer({
          data: heatmapData
      });
      
      heatmap.setMap(map);
    </script>
</body>
</html>