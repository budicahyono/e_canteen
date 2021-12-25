// atransaksi controller
e_kantin.controller("transaksiController", function ($scope, $http, $timeout) {
	$scope.s_transaksi ="active";
	$scope.dir_foto ="assets/gbr/user.png";
	

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

	$scope.awal = true;
	$scope.buka = false;
	$scope.cetak = false;
	$scope.op = "";
	
	
	$scope.detail = function(id, x, rp) {
		$scope.buka = true;
		 $scope.awal = false;
		 $scope.op = "DETAIL";
		 $scope.nama_lengkap = x;
		 $scope.id_transaksi = id;
		 $scope.total_transaksi = rp;
          $http({
              method: 'POST',
              url: 'transaksi/detail',
			  data: { id_transaksi : id }
          }).then(function (response) {
              // success
              $scope.detail_transaksi = response.data;
          }, function (response) {
              // error
              console.log(response.data,response.status);
          });
		  
		$scope.refresh = function() {
			$scope.detail(id, x, rp) 
		};	
		
		
		$scope.ubah = function() {
			$scope.nominal = $scope.dibayar;
			if ($scope.total_transaksi != 0 ) {
				var dibayar1 = parseInt($scope.dibayar);
				if (dibayar1 >= $scope.total_transaksi ) {
					
					$scope.cetak = true;	
					$scope.positif = true;	
				} else if (dibayar1 < $scope.total_transaksi ) { 
					$scope.cetak = false;
					$scope.positif = false;
				}		
			}
			
			
			
			
		};
    };
	
	
	$scope.tutup = function() {
        $scope.awal = true;
		$scope.buka = false;
		$scope.op = "";
		$scope.dibayar = "";
		$scope.nominal = "";
		$scope.cetak = false;
		$scope.positif = false;
    }
	
	
	
	$scope.close = function() {
        $scope.success = false;
        $scope.error = false;
    }
	
	$scope.del = function(id) {
		if(confirm("Apakah Anda yakin ingin menghapusnya? Detail transaksi didalamnya akan ikut terhapus")){
			  $http({
				  method: 'POST',
				  url: 'transaksi/del',
				   data: { id_transaksi : id }
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
    }
	
	
	
	$scope.index = function() {
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
		  
		  $timeout(function(){
			$scope.index();
		}, 3000)	
    };
	
	$scope.index();
	
	 
});

e_kantin.filter('formatDate', function(dateFilter) {
		var formattedDate = '';
		return function(dt) {
			 console.log(new Date(dt.split('-').join('/'))); 
			 formattedDate = dateFilter(new Date(dt.split('-').join('/')), 'dd MMMM yyyy, HH.mm.ss');   
			 return formattedDate;
		}
     
	}); 
	
	
	