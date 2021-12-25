<?php

include "auth_proses.php";

if ($sub == "admin") {
	
	$menu		= mysql_num_rows(mysql_query("SELECT * FROM tbl_menu"));
	$kategori		= mysql_num_rows(mysql_query("SELECT * FROM tbl_kategori"));
	$transaksi	= mysql_num_rows(mysql_query("SELECT * FROM transaksi"));
	
} 
	
if ($sub == "kantin") {
	
	$query = array();
	$sql = "SELECT * FROM tbl_admin A, tbl_kantin K WHERE K.id_admin=A.id_admin ";
	if ($result = mysqli_query($connect, $sql)) {
		$count = mysqli_num_rows($result);

		$i = 0;
		while ($row = mysqli_fetch_assoc($result)) {
			$query[$i]['id_admin'] = $row['id_admin'];
			$query[$i]['nama_lengkap'] = $row['nama_lengkap'];
			$query[$i]['username'] = $row['username'];
			$query[$i]['password'] = $row['password'];
			$query[$i]['level'] = $row['level'];

			$i++;
		}
	}

	$json = json_encode($query);
	echo $json;
	exit;
} 


?>












