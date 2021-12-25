// atransaksi controller
e_kantin.controller("profilController", function ($scope, $http) {
	$scope.dir_foto ="assets/gbr/user.png";
	$scope.auth = function() {
          $http({
              method: 'GET',
              url: 'login/auth'
          }).then(function (response) {
              // success
              $scope.admin = response.data;
          }, function (response) {
              // error
              console.log(response.data,response.status);
          });
    };
	
	$scope.auth();
	 
});