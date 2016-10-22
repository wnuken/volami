<div class="container-fluid" style="margin-top: 50px; height: 90%">
	<!-- Example row of columns -->
	<div class="row" style="height: 100%">

		<style>

			html, body {
				height: 100%;
				margin: 0;
				padding: 0;
			}

			#map {
				height: 100%;
				width: 100%;
			}
		</style>

		<div id="map"></div>



	<script>
		function initMap() {

			var labels = 'AB';
			


			var initial = {lat: 4.7060822, lng: -74.0825503};
			var map = new google.maps.Map(document.getElementById('map'), {
				zoom: 16,
				center: initial
			});
			var markers = locations.map(function(location, i) {
				return new google.maps.Marker({
					position: location,
					label: labels[i % labels.length]
				});
			});

			var markerCluster = new MarkerClusterer(map, markers,
            {imagePath: '/assets/vendor/gmaps/images/m'});

            console.log(markerCluster);

		};



		var locations = [
			{lat: 4.7060822, lng: -74.0825503},
			{lat: 4.7095467, lng: -74.0842669}
			];



	</script>
	<script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js"></script>
		<script async defer
		src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAnIUTe4wLuQKVFjQgPnEdD2haIhRDjpME&callback=initMap">
	</script>

		


</div>
    </div> <!-- /container -->