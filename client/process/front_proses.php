	<?php 

//ambil session yg aktif
if (isset($_SESSION['session_user'])) {
	$session  = $_SESSION['session_user'];
} else {
	$session = 0;
}


if (isset($_SESSION['id_admin'])) {
	$id_admin  = $_SESSION['id_admin'];
} else {
	$id_admin = 0;
}
 	
$dipilih = "SELECT id_menu FROM transaksi T, detail_transaksi D where T.id_transaksi = D.id_transaksi and T.id_user = '$session' and total_transaksi = '0'";

if ($sub == "index") {
	
	$sql_kantin = "SELECT * FROM tbl_kantin K where id_admin ='$id_admin'";
	if ($result = mysqli_query($connect, $sql_kantin)) {
			$row = mysqli_fetch_assoc($result);
			$nama_kantin=$row['nama_kantin'];
		}
	
	
	$sql = "SELECT * FROM tbl_kategori K where K.id_admin= '$id_admin' order by K.id_kategori";
	if ($result = mysqli_query($connect, $sql)) {
		$count = mysqli_num_rows($result);

		$i = 0;
		
	}


	
	
	
	
	
	
	
}

else if ($sub == "menu") {
	
	$query = array();
	$sql = "SELECT * FROM tbl_kategori where id_admin = '$id_admin'";
	if ($result = mysqli_query($connect, $sql)) {
		$count = mysqli_num_rows($result);

		$i = 0;
		while ($row = mysqli_fetch_assoc($result)) {
			$query[$i]['id_kategori'] = $row['id_kategori'];
			$query[$i]['nama_kategori'] = $row['nama_kategori'];

			$i++;
		}
	}

	$json = json_encode($query);
	echo $json;
	exit;
	
	
	
	
	
	
}

else if ($sub == "katalog") {
	
	
	
	
	$query = array();
	$sql = "SELECT * FROM tbl_kategori K, tbl_menu M where  M.id_admin= '$id_admin' and K.id_kategori = M.id_kategori and M.id_menu not in ($dipilih) order by K.id_kategori";
	if ($result = mysqli_query($connect, $sql)) {
		$count = mysqli_num_rows($result);

		$i = 0;
		while ($row = mysqli_fetch_assoc($result)) {
			$query[$i]['id_kategori'] = $row['id_kategori'];
			$query[$i]['nama_kategori'] = $row['nama_kategori'];
			$query[$i]['nama_menu'] = $row['nama_menu'];
			$query[$i]['gambar'] = $row['gambar'];
			$query[$i]['harga'] = $row['harga'];
			$query[$i]['status'] = $row['status'];
			$query[$i]['id_menu'] = $row['id_menu'];

			$i++;
		}
	}

	$json = json_encode($query);
	echo $json;
	exit;
	
}

else if ($sub == "one") {
	
	$query = array();
	
	$sql = "SELECT * FROM tbl_kategori K, tbl_menu M where K.id_admin= '$id_admin' and M.id_admin= '$id_admin' and K.id_kategori = M.id_kategori and K.id_kategori = '$id' and M.id_menu not in ($dipilih) order by K.id_kategori";
	if ($result = mysqli_query($connect, $sql)) {
		$count = mysqli_num_rows($result);

		$i = 0;
		while ($row = mysqli_fetch_assoc($result)) {
			$query[$i]['id_kategori'] = $row['id_kategori'];
			$query[$i]['nama_kategori'] = $row['nama_kategori'];
			$query[$i]['nama_menu'] = $row['nama_menu'];
			$query[$i]['gambar'] = $row['gambar'];
			$query[$i]['harga'] = $row['harga'];
			$query[$i]['status'] = $row['status'];
			$query[$i]['id_menu'] = $row['id_menu'];

			$i++;
		}
	}

	$json = json_encode($query);
	echo $json;
	exit;
	
}


?>	