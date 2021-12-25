// karyawan controller
e_kantin.controller("homeController", function ($scope, $http) {
	$scope.pesan ="Selamat Datang di E - Canteen";
	$scope.dir_foto ="assets/gbr/user.png";
	$scope.s_home ="active";
	
	
	$scope.showMenu = "none";
	 $scope.bg1 = "";
	 $scope.myFunc1 = function() {
		if  ($scope.showMenu == "none") {
			$scope.showMenu = "block";	
			 $scope.bg1 = "#313f8f";
		} else {
			$scope.showMenu = "none";
			 $scope.bg1 = "";
		}
    }   
	$scope.myFunc_b = function() {
		 $scope.showMenu = "none";
		$scope.bg1 = "";
    }
	 
	
	
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

	 $scope.index = function() {
          $http({
              method: 'GET',
              url: 'menu'
          }).then(function (response) {
              // success
              $scope.menu = response.data;
          }, function (response) {
              // error
              console.log(response.data,response.status);
          });
    };
	
	$scope.index();
	
	$scope.index2 = function() {
          $http({
              method: 'GET',
              url: 'kategori'
          }).then(function (response) {
              // success
              $scope.kategori = response.data;
          }, function (response) {
              // error
              console.log(response.data,response.status);
          });
    };
	
	$scope.index2();
	
	$scope.index3 = function() {
          $http({
              method: 'GET',
              url: 'transaksi'
          }).then(function (response) {
              // success
              $scope.transaksi = response.data;
          }, function (response) {
              // error
              console.log(response.data,response.status);
          });
    };
	
	$scope.index3();
});	