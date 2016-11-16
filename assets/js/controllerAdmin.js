
var AdminApp = angular.module('AdminApp',[]);

/*LoginApp.config(function(localStorageServiceProvider){
	localStorageServiceProvider
	.setPrefix('volami');
  // .setStorageType('sessionStorage');
});*/

AdminApp.service('dataService', function($http) {
// delete $http.defaults.headers.common['X-Requested-With'];

this.get = function(params, url, callbackFunc) {
	$http({
		method: 'GET',
		url: url,
		params: params,
        /// headers: {'Authorization': 'Token token=xxxxYYYYZzzz'}
    }).success(function(response){
    	callbackFunc(response);
    }).error(function(){
    	console.log("error");
    });
};

this.set = function(params, url, callbackFunc) {
	$.ajax({
		data:  params,
		url:   url,
		type:  'post',
		error: function () {
			console.log("error");
		},
		success:  function (response) {
			callbackFunc(response);
		}
	});
};

});

AdminApp.controller('LoginController', ['$scope', 'dataService', '$window', function($scope, dataService, $window) {
	$scope.Formulario = {};
	

	$scope.Login = function(){
		console.log($scope.Formulario);
		var url = './validatelogin';
		dataService.get($scope.Formulario, url, function(dataResponse){
			console.log(dataResponse);
			var homeUrl = 'admin';
			$window.open(homeUrl, "_self");
		});
	};
}]);

AdminApp.controller('AdminController', ['$scope', 'dataService', '$window', function($scope, dataService, $window) {
	$scope.ministerios = {};
	$scope.Formulario = {};
	$scope.listministeries = true;
	$scope.newministeries = false;

	CKEDITOR.replace('info', {
		language: 'es'
	});

	CKEDITOR.replace('contact', {
		language: 'es'
	});
	

	CKEDITOR.replace('voluntaries', {
		language: 'es'
	});

	var url = './getadminvoluntaries';
	dataService.get($scope.Formulario, url, function(dataResponse){
		console.log(dataResponse);
		$scope.ministerios = dataResponse;
	});

	$scope.edit = function(index){
		$scope.listministeries = false;
		$scope.newministeries = true;
		if(index > -1){
			$scope.Formulario.id_voluntaries = $scope.ministerios[index].id_voluntaries;
			$scope.Formulario.title = $scope.ministerios[index].title;
			$scope.Formulario.image = $scope.ministerios[index].image;
			$scope.Formulario.info = $scope.ministerios[index].info;
			CKEDITOR.instances.info.setData($scope.Formulario.info);
			$scope.Formulario.contact = $scope.ministerios[index].contact;
			CKEDITOR.instances.contact.setData($scope.Formulario.contact);
			$scope.Formulario.voluntaries = $scope.ministerios[index].voluntaries;
			CKEDITOR.instances.voluntaries.setData($scope.Formulario.voluntaries);
			$scope.Formulario.lat = $scope.ministerios[index].lat;
			$scope.Formulario.lng = $scope.ministerios[index].lng;
			imagePreview = $scope.Formulario.image;
		}else{
			$scope.Formulario.id_voluntaries = '';
			$scope.Formulario.title = '';
			$scope.Formulario.image = '';
			$scope.Formulario.info = '';
			CKEDITOR.instances.info.setData('');
			$scope.Formulario.contact = '';
			CKEDITOR.instances.contact.setData('');
			$scope.Formulario.voluntaries = '';
			CKEDITOR.instances.voluntaries.setData('');
			$scope.Formulario.lat = '';
			$scope.Formulario.lng = '';
			imagePreview = $scope.Formulario.image;
		};

	};

	$scope.Cancel = function(){
		$scope.listministeries = true;
		$scope.newministeries = false;
	};


	$scope.Save = function(){
		$scope.Formulario.info = CKEDITOR.instances.info.getData();
		$scope.Formulario.contact = CKEDITOR.instances.contact.getData();
		$scope.Formulario.voluntaries = CKEDITOR.instances.voluntaries.getData();


		var image = $('img.file-preview-image').attr('src');
		var nameImage = $('img.file-preview-image').attr('title');

		if(typeof image != 'undefined'){
			$scope.Formulario.imagebase64 = image;
			// $scope.Formulario.image = nameImage;
		};
		
		
		var urlsave = './savevoluntaries';
		dataService.set($scope.Formulario, urlsave, function(dataResponse){
			console.log(dataResponse);
			$scope.ministerios = dataResponse;
			if(dataResponse.result != 'NULL'){
				var homeUrl = 'admin';
				$window.open(homeUrl, "_self");
			}
		});
	};

}]);

$('input#file1').fileinput({
	showUpload: false
});

