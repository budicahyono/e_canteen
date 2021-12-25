// menu controller
e_kantin.controller("menuController",  function ($scope, $http, $timeout) {
	$scope.s_menu ="active";
	$scope.dir_foto ="assets/gbr/user.png";
	$scope.dir_foto_menu = "../../file/menu/blank.png";
	 $scope.table = true;
	 $scope.btn = true;
	 $scope.op = "";

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
	 
	 
	$scope.tambah = function() {
        $scope.form = true;
        $scope.table = false;
        $scope.btn = false;
		$scope.op = "TAMBAH";
    }
	$scope.tutup = function() {
        $scope.form = false;
		 $scope.table = true;
		 $scope.btn = true;
		 $scope.op = "";
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
	
	
	$scope.close = function() {
        $scope.success = false;
        $scope.error = false;
    }
	
	$scope.del = function(id) {
		if(confirm("Apakah Anda yakin?")){
			  $http({
				  method: 'POST',
				  url: 'menu/del',
				   data: { id_menu : id }
			  }).then(function (response) {
				  // success
				  $scope.success = "Data telah berhasil dihapus";
				  $scope.index();
			  }, function (response) {
				  // error
				  $scope.error = "Data gagal dihapus";
				  console.log(response.data,response.status);
			  });
		}
		
		$timeout(function(){
			$scope.close();
		}, 3000)	
    };
	
	$scope.add = function() {
          $http({
               method: 'POST',
               url:  'process/add_menu.php',
               data: {addkategori: $scope.addkategori, keterangan: $scope.keterangan }
          }).then(function (response) {
               //success
			    $scope.success = "Data telah berhasil disimpan";
               $scope.index();
               $scope.tutup();
               $scope.reset();
			   
          }, function (response) {
              //error
			   $scope.error = "Data gagal disimpan";
               console.log(response.data,response.status);
          });
    };
});