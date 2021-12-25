<?php 

include "auth_proses.php";

if ($sub == "index") {
	
	$query = array();
	if ($level == "kantin") {
	$sql = "SELECT * FROM transaksi T, tbl_user U, 	tbl_admin A, tbl_kantin K  where U.id_user=T.id_user and  K.id_admin = A.id_admin and T.id_admin = A.id_admin and A.id_admin = $id_admin";
		
	} else {
	$sql = "SELECT * FROM transaksi T, tbl_user U, 	tbl_admin A, tbl_kantin K  where U.id_user=T.id_user and  K.id_admin = A.id_admin and T.id_admin = A.id_admin";
	}
	
	if ($result = mysqli_query($connect, $sql)) {
		$count = mysqli_num_rows($result);

		$i = 0;
		while ($row = mysqli_fetch_assoc($result)) {
			$query[$i]['id_transaksi'] = $row['id_transaksi'];
			$query[$i]['nama_user'] = $row['nama_user'];
			$query[$i]['tgl_transaksi'] = $row['tgl_transaksi'];
			$query[$i]['total_transaksi'] = $row['total_transaksi'];
			$query[$i]['dibayar'] = $row['dibayar'];
			$query[$i]['kembali'] = $row['kembali'];
			$query[$i]['nama_lengkap'] = $row['nama_lengkap'];
			$query[$i]['nama_kantin'] = $row['nama_kantin'];

			$i++;
		}
	}
	$json = json_encode($query);
	echo $json;
	exit;
}

else if ($sub == "detail") {
	
	$postdata = file_get_contents("php://input");
	if (isset($postdata) && !empty($postdata)) {
		$request = json_decode($postdata);

		$id = (int) $request->id_transaksi;
	
		$query = array();
		$sql = "SELECT * FROM detail_transaksi D, transaksi T, tbl_user U, tbl_menu M WHERE D.id_transaksi=T.id_transaksi and T.id_user=U.id_user and D.id_menu = M.id_menu and D.id_transaksi = '$id'";
		if ($result = mysqli_query($connect, $sql)) {
			$count = mysqli_num_rows($result);

			$i = 0;
			while ($row = mysqli_fetch_assoc($result)) {
				$query[$i]['id_transaksi'] = $row['id_transaksi'];
				$query[$i]['nama_user'] = $row['nama_user'];
				$query[$i]['nama_menu'] = $row['nama_menu'];
				$query[$i]['harga'] = $row['harga'];
				$query[$i]['status'] = $row['status'];
				$query[$i]['gambar'] = $row['gambar'];
				$query[$i]['jumlah'] = $row['jumlah'];
				$query[$i]['total_harga'] = $row['total_harga'];

				$i++;
			}
		}

		$json = json_encode($query);
		echo $json;
		exit;
		
	}	
}


else if ($sub == "del") {
	
	$postdata = file_get_contents("php://input");
	if (isset($postdata) && !empty($postdata)) {
		$request = json_decode($postdata);

		$id = (int) $request->id_transaksi;
	
		
		$sql = "DELETE FROM detail_transaksi WHERE id_transaksi = '$id'";
		$result = mysqli_query($connect, $sql);
			
		$sql1 = "DELETE FROM transaksi WHERE id_transaksi = '$id'";
		$result1 = mysqli_query($connect, $sql1);
		
		
	}	
}


else if ($sub == "nota") {
	
	
	
	if (isset($_GET['d']) and isset($_GET['k'])) { 
	$dibayar=$_GET['d']; 
	$kembali=$_GET['k'];
	
	//update transaksi
		$query 	= "UPDATE transaksi SET
						dibayar 	           	= '$dibayar',
						kembali 				= '$kembali'
						WHERE id_transaksi 		= '$id'";
		$simpan = mysqli_query ($connect, $query); 
	}
	
	//select transaksi
	$sql = "SELECT * FROM detail_transaksi D, transaksi T, tbl_menu M WHERE D.id_transaksi = T.id_transaksi and D.id_menu = M.id_menu and T.id_transaksi = '$id'";
		if ($result = mysqli_query($connect, $sql)) {
			$count = mysqli_num_rows($result);
	
		}
		
		
	$sql1 = "SELECT total_transaksi FROM transaksi WHERE id_transaksi = '$id' ";
		if ($result1 = mysqli_query($connect, $sql1)) {
			$row1 = mysqli_fetch_assoc($result1);
			$total_transaksi = $row1['total_transaksi'];
		} 
	
	

		
}

?>	