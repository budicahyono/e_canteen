// kantin controller
e_kantin.controller("kantinController", function ($scope, $http, $timeout) {
	$scope.s_kantin ="active";
	$scope.dir_foto ="assets/gbr/user.png";
	 $scope.table = true;
	 $scope.btn = true;
	 $scope.op = "";
	 $scope.validkantin = "";
	
	
		
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
            $scope.addkantin = "";
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
	
	
	
	
	
	$scope.index = function() {
          $http({
              method: 'GET',
              url: 'kantin'
          }).then(function (response) {
              // success
              $scope.kantin = response.data;
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
				  url: 'kantin/del',
				   data: { id_kantin : id }
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
		if (!$scope.addkantin) {
			$scope.validkantin = "Nama kantin harus diisi";
		} else {
			$scope.validkantin = "";
          $http({
               method: 'POST',
               url:  'kantin/add',
               data: {addkantin: $scope.addkantin }
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
          $http.get('process/edit_kantin.php?id='+id)
		  .success(function (data) {
				$scope.addkantin = data.nama_kantin;
				$scope.keterangan = data.keterangan;
			    $scope.tambah();
          });
    };
	
	
});
