<?php 
 
if ($sub == "index") {
	
	if ($_SESSION['session_user'] != 0) {
		$session  = $_SESSION['session_user'];
	} else {
		$session = 0;
	}	
		
		
		
		
		$query = array();
		$sql = "SELECT * FROM transaksi T, detail_transaksi D, tbl_menu M where T.id_transaksi = D.id_transaksi and D.id_menu = M.id_menu and id_user = '$session' and total_transaksi = '0'";
		if ($result = mysqli_query($connect, $sql)) {
			$count = mysqli_num_rows($result);

			$i = 0;
			while ($row = mysqli_fetch_assoc($result)) {
				$query[$i]['id_transaksi'] = $row['id_transaksi'];
				$query[$i]['id_user'] = $row['id_user'];
				$query[$i]['tgl_transaksi'] = $row['tgl_transaksi'];
				$query[$i]['total_transaksi'] = $row['total_transaksi'];
				$query[$i]['id_detail_transaksi'] = $row['id_detail_transaksi'];
				$query[$i]['id_menu'] = $row['id_menu'];
				$query[$i]['nama_menu'] = $row['nama_menu'];
				$query[$i]['gambar'] = $row['gambar'];
				$query[$i]['harga'] = $row['harga'];
				$query[$i]['jumlah'] = $row['jumlah'];

				$i++;
			}
			
			$json = json_encode($query);
			echo $json; 
			exit;
		} 

	
}

else if ($sub == "menu") {
	
	
	
	
	// pilih menu berdasarkan id
	$sql = "SELECT * FROM tbl_menu where id_menu = '$id' ";
	$result = mysqli_query($connect, $sql);
	$row = mysqli_fetch_array($result);
	$id_menu = $row['id_menu'];
	$harga = $row['harga'];
	$id_admin = $row['id_admin'];
		
	//ambil user
	$session  = $_SESSION['session_user'];
	
	//cek transaksi by user
	$sql3 = "SELECT * FROM transaksi where id_user = '$session' and total_transaksi ='0'";
	$result3 = mysqli_query($connect, $sql3);
	$row3 = mysqli_fetch_assoc($result3);
	$cek = mysqli_num_rows($result3);
	
	//kalo ada
	if($cek != 0)
	{
		$id_transaksi = $row3['id_transaksi'];
		$jumlah	= 1;
		$total_harga = $jumlah * $harga;
	} else {
		//kalo tdk ada buat transaksi
		$sql1 	= "INSERT transaksi SET
					id_user 	= '$session',
					tgl_transaksi	= now(),
					id_admin	= '$id_admin',
					total_transaksi	= '0'";
		$result1 = mysqli_query ($connect, $sql1);
		
		
		//lalu cek lagi
		$sql4 = "SELECT * FROM transaksi where id_user = '$session' and total_transaksi ='0'";
		$result4 = mysqli_query($connect, $sql4);
		$row4 = mysqli_fetch_assoc($result4);
		$cek4 = mysqli_num_rows($result4);
		$id_transaksi = $row4['id_transaksi'];
		$jumlah	= 1;
		$total_harga = $jumlah * $harga;
	}	
	
	
	
	//insert ke detail pembelian
	$sql2 	= "INSERT detail_transaksi SET
					id_transaksi 		= '$id_transaksi',
					id_menu				= '$id_menu',
					jumlah				= '$jumlah',
					total_harga			= '$total_harga'";
	$result2 = mysqli_query ($connect, $sql2);
	
	if ($result2) {
	 header("location:".link."/front");
	}
}



else if ($sub == "order") {
	
	if ($_SESSION['session_user'] != 0) {
		$session  = $_SESSION['session_user'];
	} else {
		$session = 0;
		header("location:".link."/.");
	}	
	
		
		
		$sql = "SELECT * FROM transaksi T, detail_transaksi D, tbl_menu M where T.id_transaksi = D.id_transaksi and D.id_menu = M.id_menu and id_user = '$session' and total_transaksi = '0'";
		if ($result = mysqli_query($connect, $sql)) {
			$count = mysqli_num_rows($result);

		} 
		
		
	if (isset($_POST['save'])) 
	{ 	
		//ambil data yang diinput
		$id_detail_transaksi 	= $_POST['id_detail_transaksi'];
		$jumlah 	     		= $_POST['jumlah'];
		$harga	 	     		= $_POST['harga'];
		$total_harga 			= $jumlah * $harga;
		
		
		
		//update jumlah pesanan
		if ($jumlah > 0) {
			$query 	= "UPDATE detail_transaksi SET
							jumlah 	           			= '$jumlah',
							total_harga 	           	= '$total_harga'
							WHERE id_detail_transaksi 	= '$id_detail_transaksi'";
			$sql = mysqli_query ($connect, $query); 
			
			
			if ($sql) 
			{
				header("location:".link."/transaksi/order/$session");
			} 
			else
			{
				header("location:".link."/transaksi/order/$session");
			}	
		
		} else {
			header("location:".link."/transaksi/order/$session");
		}
	}	

}

else if ($sub == "keluar") {
	
		session_destroy(); 	
		header("location:".link."/.");

}


else if ($sub == "selesai") {
	
	if ($_SESSION['session_user'] != 0) {
		$session  = $_SESSION['session_user'];
	} else {
		$session = 0;
		header("location:".link."/.");
	}	
		
		$sql = "SELECT SUM(D.total_harga) as total_harga FROM transaksi T, detail_transaksi D, tbl_menu M where T.id_transaksi = D.id_transaksi and D.id_menu = M.id_menu and id_user = '$session' and total_transaksi = '0'";
		if ($result = mysqli_query($connect, $sql)) {
			$row = mysqli_fetch_assoc($result);
			$total_harga = $row['total_harga'];
		} 
		
		
		$query 	= "UPDATE transaksi SET
						total_transaksi 	= '$total_harga'
						WHERE id_user 			= '$session' and 
							  total_transaksi 	= '0'";
		$sql_fix = mysqli_query ($connect, $query); 
		
		
		$sql1 = "SELECT * FROM detail_transaksi D, tbl_menu M, transaksi T WHERE D.id_menu = M.id_menu and T.id_transaksi = D.id_transaksi and id_user = '$session' and dibayar = '0'";
		$result1 = mysqli_query($connect, $sql1);
		$count = mysqli_num_rows($result1);
			
		
		
	
}


else if ($sub == "del") {
	
	if ($_SESSION['session_user'] != 0) {
		$session  = $_SESSION['session_user'];
	 
		
		$sql = "DELETE FROM detail_transaksi WHERE id_detail_transaksi = '$id'";
		$result = mysqli_query($connect, $sql);
		
		$sql1 = "SELECT * FROM transaksi T, detail_transaksi D where T.id_transaksi = D.id_transaksi and id_user = '$session' and total_transaksi = '0'";
		$result1 = mysqli_query($connect, $sql1);
		$count = mysqli_num_rows($result1);
		if ($count <= 0) {
			
			$sql2 = "DELETE FROM transaksi WHERE id_user = '$session' and total_transaksi = '0'";
			$result2 = mysqli_query($connect, $sql2);
			header("location:".link."/kantin");
		} else {			
			header("location:".link."/transaksi/order/$session");
		}
	
	
		
	} else {
		$session = 0;
		header("location:".link."/front");
	}	

}





?>	