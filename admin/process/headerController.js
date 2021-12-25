// karyawan controller
e_kantin.controller("headerController", function ($scope, $http) {
	 $scope.showMe = "none";
	 $scope.bg = "";
	 
	 
	$scope.myFunc = function() {
		if  ($scope.showMe == "none") {
			$scope.showMe = "block";	
			 $scope.bg = "#313f8f";
		} else {
			$scope.showMe = "none";
			 $scope.bg = "";
		}
    }    
	
	 
	
	
	$scope.myFunc_a = function() {
        $scope.showMe = "none";
		$scope.bg = "";
		 $scope.showMenu = "none";
		$scope.bg1 = "";
    }
	
	
});	