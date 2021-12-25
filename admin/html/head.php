<!DOCTYPE html>
<html lang="en" ng-app="e_kantin">
<head>	
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="<?php echo link ?>/assets/gbr/unipa.ico">
	


	<title>E - CANTEEN MERCHANT</title>	
	
	<!-- Bootstrap core CSS -->
    <link href="<?php echo link ?>/assets/css/bootstrap.css" rel="stylesheet">
    <link href="<?php echo link ?>/assets/css/AdminLTE.css" rel="stylesheet">
    <link href="<?php echo link ?>/assets/css/style.css" rel="stylesheet">
    <link href="<?php echo link ?>/assets/css/skins/_all-skins.css" rel="stylesheet">
	
	

    <!-- <?php echo link ?>/lib styles for this template -->
	<link href="<?php echo link ?>/lib/tooltip/tooltip-viewport.css" rel="stylesheet">
	<link href="<?php echo link ?>/lib/jquery-ui/jquery-ui.css" rel="stylesheet">
	<link href="<?php echo link ?>/lib/flexslider/flexslider.css" rel="stylesheet">
	<link href="<?php echo link ?>/lib/datepicker/css/datepicker.css" rel="stylesheet">
	<link href="<?php echo link ?>/lib/font-awesome/font-awesome.css" rel="stylesheet">
	  <!-- JQuery DataTable Css -->
    <link href="<?php echo link ?>/lib/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">

	<!-- Angular Core -->
		<script type="text/javascript" src="<?php echo link ?>/assets/js/angular.min.js"></script>
	<script type="text/javascript" src="<?php echo link ?>/assets/js/angular-route.min.js"></script>
	
	<!-- Angular JavaScript Apps -->
	<script type="text/javascript" src="<?php echo link ?>/process/routes.js"></script>
	<script type="text/javascript" src="<?php echo link ?>/process/headerController.js"></script>
	<script type="text/javascript" src="<?php echo link ?>/process/adminController.js"></script>
	<script type="text/javascript" src="<?php echo link ?>/process/userController.js"></script>
	<script type="text/javascript" src="<?php echo link ?>/process/kantinController.js"></script>
	<script type="text/javascript" src="<?php echo link ?>/process/homeController.js"></script>
	<script type="text/javascript" src="<?php echo link ?>/process/kategoriController.js"></script>
	<script type="text/javascript" src="<?php echo link ?>/process/menuController.js"></script>
	<script type="text/javascript" src="<?php echo link ?>/process/transaksiController.js"></script>
	<script type="text/javascript" src="<?php echo link ?>/process/laporan_transaksiController.js"></script>	
	<script type="text/javascript" src="<?php echo link ?>/process/profilController.js"></script>	
	
	
	<!-- Placed at the end of the document so the pages load faster -->
	<script type="text/javascript" src="<?php echo link ?>/assets/js/jquery-1.11.3.min.js"></script>	
	

	
<script>
$(document).ready(function(){
    $("#uploadBtn").change(function(){
		var isi = $("#uploadBtn").val()
        $("#uploadFile").val(isi);
    });
    
});
</script>
  		

	
	
  </head>