var e_kantin = angular.module("e_kantin", ['ngRoute']);

// routing
e_kantin.config(function($routeProvider) {
	$routeProvider
	//home
	.when('/', {
		templateUrl : 'pages/home.php',	
		controller : 'homeController'
	})
	//admin
	.when('/admin', {
		templateUrl : 'pages/admin.php',	
		controller : 'adminController'
	})
	//kantin
	.when('/kantin', {
		templateUrl : 'pages/kantin.php',	
		controller : 'kantinController'
	})
	//user
	.when('/user', {
		templateUrl : 'pages/user.php',	
		controller : 'userController'
	})
	//menu
	.when('/menu', {
		templateUrl : 'pages/menu.php',	
		controller : 'menuController'
	})
	//contact
	.when('/kategori', {
		templateUrl : 'pages/kategori.php',	
		controller : 'kategoriController'
	})
	//transaksi
	.when('/transaksi', {
		templateUrl : 'pages/transaksi.php',	
		controller : 'transaksiController'
	})
	
	//profil
	.when('/profil', {
		templateUrl : 'pages/auth/profil.php',	
		controller : 'profilController'
	})
	.otherwise({
		redirectTo: '/'
	});
	
});


	
	













