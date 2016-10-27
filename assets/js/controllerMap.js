

/*var volamiApp = angular.module('volamiApp',['LocalStorageModule']);


volamiApp.config(function(localStorageServiceProvider){
	localStorageServiceProvider
	.setPrefix('volami');
  // .setStorageType('sessionStorage');
});

volamiApp.service('dataService', function($http) {
// delete $http.defaults.headers.common['X-Requested-With'];

this.getElements = function(values, callbackFunc) {
	$http({
		method: 'GET',
		url: values.url,
		params: values.elements
        /// headers: {'Authorization': 'Token token=xxxxYYYYZzzz'}
    }).success(function(response){
    	console.log(response);
    	callbackFunc(response.elements);
    }).error(function(){
    	console.log("error");
    });
};

});

volamiApp.controller('mapController', ['$scope', 'dataService', 'localStorageService', '$window', function($scope, dataService, localStorageService, $window) {
	$scope.data = {};
	console.log('map-controller');
}]);

*/
function initMap() {

	var labels = '0';

	$.get('./assets/files/position.json', { userId : 1234 }, function(resp) {
		console.log(resp);
		var contentString = resp[0]["contentString"];
		var locations = resp[1]["locations"];

		var initial = {lat: 4.7060822, lng: -74.0825503};
		var map = new google.maps.Map(document.getElementById('map'), {
			zoom: 4,
			center: initial
		});
		var markers = locations.map(function(location, i) {
			return new google.maps.Marker({
				position: location,
				// label: "<i class='glyphicon glyphicon-info-sign'></i>"
				//label: labels[i % labels.length]
			});
		});

		var markerCluster = new MarkerClusterer(map, markers,
			{imagePath: './assets/vendor/gmaps/images/m'});

		for (var key in markers){
			markers[key].setTitle(contentString[key].title);
			google.maps.event.addListener(markers[key], 'click', function(innerKey) {
				return function() {
					$('#myModal').on('show.bs.modal', function (event) {
						var $modal = $(this);
						$('#modal-title', $modal).text(contentString[innerKey].title);
						$('#modal-image', $modal).attr("src", contentString[innerKey].image);
						$('#modal-info', $modal).html(contentString[innerKey].info);
						$('#modal-contact', $modal).html(contentString[innerKey].contact);
						$('#modal-voluntaries', $modal).html(contentString[innerKey].voluntaries);
					});
					$('#myModal').modal('show');
				}
			}(key));
		};

	});

};



