// user controller
e_kantin.controller("userController", function ($scope, $http, $timeout) {
	$scope.s_user ="active";
	$scope.dir_foto ="assets/gbr/user.png";
	 $scope.table = true;
	 $scope.btn = true;
	 $scope.op = "";
	 $scope.validuser = "";
	
	
		
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
	$scope.reset = function(){
            $scope.adduser = "";
            $scope.keterangan = "";
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
	
	
	$scope.index0 = function() {
          $http({
              method: 'GET',
              url: 'admin/kantin'
          }).then(function (response) {
              // success
              $scope.kantin = response.data;
          }, function (response) {
              // error
              console.log(response.data,response.status);
          });
    };
	
	$scope.index0();
	
	
	$scope.index = function() {
          $http({
              method: 'GET',
              url: 'user'
          }).then(function (response) {
              // success
              $scope.user = response.data;
          }, function (response) {
              // error
              console.log(response.data,response.status);
          });
		
		$timeout(function(){
			$scope.index();
		}, 3000)	
    };
	
	
	
	
	
	$scope.index();
	
	$scope.close = function() {
        $scope.success = false;
        $scope.error = false;
    }
	
	
	
	
	$scope.del = function(id) {
		if(confirm("Jika Anda menghapusnya maka data menu tersebut akan ikut terhapus juga, anda yakin?")){
			  $http({
				  method: 'POST',
				  url: 'user/del',
				   data: { id_user : id }
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
		if (!$scope.adduser) {
			$scope.validuser = "Nama user harus diisi";
		} else {
			$scope.validuser = "";
          $http({
               method: 'POST',
               url:  'user/add',
               data: {adduser: $scope.adduser }
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
		} 

		$timeout(function(){
			$scope.close();
		}, 3000)		
    };
	
	$scope.edit = function(id) {
          $http.get('process/edit_user.php?id='+id)
		  .success(function (data) {
				$scope.adduser = data.nama_user;
				$scope.keterangan = data.keterangan;
			    $scope.tambah();
          });
    };
	
	
});