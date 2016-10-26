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

		<!-- Modal -->
		<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="myModalLabel">Título</h4>
					</div>
					<div class="modal-body">
						...
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
						<button type="button" class="btn btn-primary">Guardar</button>
					</div>
				</div>
			</div>
		</div>



		<script>
			function initMap() {

				var labels = 'AB';
				var infowindow = [];



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

				var contentString = [
				'<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">Información</button>',
				'<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">Información</button>'
				];

				for (var key in markers){
					console.log(key);
					infowindow[key] = new google.maps.InfoWindow({
						content: contentString[key]
					});

					google.maps.event.addListener(markers[key], 'click', function(innerKey) {
						return function() {
							infowindow[innerKey].open(map, markers[innerKey]);
						}
					}(key));

					/*markers[key].addListener('click', function() {
						infowindow[key].open(map, markers[key]);
					});					*/
				};



				/*markers[1].addListener('click', function() {
					infowindow[1].open(map, markers[1]);
				});*/

				console.log(markers);

				/*var marker = new google.maps.Marker({
					position: initial,
					map: map,
					title: 'Necesito'
				});*/

				

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