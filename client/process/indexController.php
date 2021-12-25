<script>
var e_canteen = angular.module("e_canteen", []);


e_canteen.controller("indexController", function ($scope, $http, $timeout) {
	$scope.judul = "E-Canteen";
	$scope.no = 1;
	$scope.awal = 1;
	$scope.akhir = 4;
	
	
	$scope.range = function() {
				var angka = parseInt($scope.id_user);
				if (angka > 100 ) {
					$scope.p = "No.Meja tidak boleh lebih dari 100";	
				} 
		};
	
	$scope.transaksi = function() {
          $http({
              method: 'GET',
              url: '<?php echo link ?>/transaksi'
          }).then(function (response) {
              // success
              $scope.transaksi = response.data;
          }, function (response) {
              // error
              console.log(response.data,response.status);
          });
    };
	
	$scope.transaksi();
	
	
	


	$scope.index = function() {
          $http({
              method: 'GET',
              url: '<?php echo link ?>/kategori/katalog'
          }).then(function (response) {
              // success
              $scope.katalog = response.data;
          }, function (response) {
              // error
              console.log(response.data,response.status);
          });
    };
	
	$scope.index();
	
	$scope.one = function() {
          $http({
              method: 'GET',
              url: '<?php echo link ?>/kategori/one/<?php echo $id ?>'
          }).then(function (response) {
              // success
              $scope.katalog_one = response.data;
          }, function (response) {
              // error
              console.log(response.data,response.status);
          });
    };
	
	$scope.one();
	
	$scope.kategoris = function() {
          $http({
              method: 'GET',
              url: '<?php echo link ?>/kategori/menu'
          }).then(function (response) {
              // success
              $scope.kategori = response.data;
          }, function (response) {
              // error
              console.log(response.data,response.status);
          });
    };
	
	$scope.kategoris();
});	
</script>
