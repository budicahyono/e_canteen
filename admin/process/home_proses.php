<?php

include "auth_proses.php";


	
if ($sub == "home") {
	
	$menu		= mysql_num_rows(mysql_query("SELECT * FROM tbl_menu"));
	$kategori		= mysql_num_rows(mysql_query("SELECT * FROM tbl_kategori"));
	$transaksi	= mysql_num_rows(mysql_query("SELECT * FROM transaksi"));
	
} 


?>












