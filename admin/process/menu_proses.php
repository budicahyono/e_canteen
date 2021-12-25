<?php 

include "auth_proses.php";

if ($sub == "index") {
	
	
	$query = array();
	
	if ($level == "kantin") {
	$sql = "SELECT * FROM tbl_kategori Kat, tbl_menu M, tbl_admin A, tbl_kantin K  where Kat.id_kategori = M.id_kategori and M.id_admin = A.id_admin and K.id_admin = A.id_admin and M.id_admin= '$id_admin' order by Kat.id_kategori";
	
	
	} else {
	$sql = "SELECT * FROM tbl_kategori Kat, tbl_menu M, tbl_admin A, tbl_kantin K  where Kat.id_kategori = M.id_kategori and M.id_admin = A.id_admin and K.id_admin = A.id_admin  order by Kat.id_kategori";
		
	}
	if ($result = mysqli_query($connect, $sql)) {
		$count = mysqli_num_rows($result);

		$i = 0;
		while ($row = mysqli_fetch_assoc($result)) {
			$query[$i]['id_menu'] = $row['id_menu'];
			$query[$i]['id_kategori'] = $row['id_kategori'];
			$query[$i]['nama_kategori'] = $row['nama_kategori'];
			$query[$i]['status'] = $row['status'];
			$query[$i]['nama_menu'] = $row['nama_menu'];
			$query[$i]['gambar'] = $row['gambar'];
			$query[$i]['harga'] = $row['harga'];
			$query[$i]['nama_lengkap'] = $row['nama_lengkap'];
				$query[$i]['nama_kantin'] = $row['nama_kantin'];

			$i++;
		}
	}

	$json = json_encode($query);
	echo $json;
	exit;
}



else if ($sub == "tambah") {
	
	$s_menu = "active";

		$sql = "SELECT * FROM tbl_kategori where id_admin ='$id_admin' ";
		$query = mysqli_query($connect,$sql);
		
		
		$dir_foto_menu = "../file/menu/blank.png";
		
		
	if (isset($_POST['save'])) 
	{ 	
		//ambil data yang diinput
		$nama_menu 	     		= $_POST['nama_menu'];
		$harga = str_replace(",","",$_POST['harga']);
		$id_kategori 	     	= $_POST['id_kategori'];
		
		$dir_upload = "file/menu/";
		$gambar = $_FILES['gambar']['name'];
		
		if (is_uploaded_file($_FILES['gambar']['tmp_name'])) {
			$cek = move_uploaded_file ($_FILES['gambar']['tmp_name'],
			$dir_upload.$gambar);
		}
		
		//update tbl_kategori
		$query 	= "INSERT tbl_menu SET
						nama_menu 	           	= '$nama_menu',
						gambar 					= '$gambar',
						harga 					= '$harga',
						status 					= 'tersedia',
						id_admin 				= '$id_admin',
						id_kategori 			= '$id_kategori'";
		$sql = mysqli_query ($connect, $query); 
		
		
		if ($sql) 
		{
			$_SESSION['pesan'] = "<div  class='hilang alert alert-info'>Data telah berhasil di simpan</div>";
			header("location:".link."/home#/menu");
		} 
		else
		{
			$_SESSION['pesan'] = "<div  class='hilang alert alert-danger'>Data telah gagal di simpan</div>";
			header("location:".link."/home#/menu");
		}	
	}
}


else if ($sub == "edit") {
	
	$s_menu = "active";

		$sql = "SELECT * FROM tbl_kategori ";
		$query = mysqli_query($connect,$sql);
		
		
		
		
		$sql1 = "SELECT * FROM tbl_menu where id_menu = $id";
		$query1 = mysqli_query($connect,$sql1);
		
	while ($row = mysqli_fetch_array($query1)) {
        $nama_menu = $row['nama_menu'];
        $gambar = $row['gambar'];
		if ($gambar == "") {
			$dir_foto_menu	= "../../file/menu/blank.png";
		} else {
			$dir_foto_menu	= "../../file/menu/$gambar";
		}
        $harga = $row['harga'];
        $id_kategori = $row['id_kategori'];
        $id_menu = $row['id_menu'];
        $status = $row['status'];

		
    }
		
		
	if (isset($_POST['save'])) 
	{ 	
		//ambil data yang diinput
		$nama_menu 	     		= $_POST['nama_menu'];
		$harga = str_replace(",","",$_POST['harga']);
		$id_kategori 	     	= $_POST['id_kategori'];
		$foto_hid 	     		= $_POST['foto_hid'];
		$status 	     		= $_POST['status'];
		
		$dir_upload = "file/menu/";
		$gambar = $_FILES['gambar']['name'];
		
		if ($_FILES['gambar']['name'] != "") {
			$gambar = $_FILES['gambar']['name'];
			if ($foto_hid != "") {
				$dir_del ="file/menu/$foto_hid";
				unlink ($dir_del);
			}
		} else {
			$gambar = $foto_hid;
		}
		if (is_uploaded_file($_FILES['gambar']['tmp_name'])) {
			$cek = move_uploaded_file ($_FILES['gambar']['tmp_name'],
			$dir_upload.$gambar);
		}
		
		//update tbl_kategori
		$query 	= "UPDATE tbl_menu SET
						nama_menu 	           	= '$nama_menu',
						gambar 					= '$gambar',
						harga 					= '$harga',
						id_kategori 			= '$id_kategori',
						status 					= '$status'
						WHERE id_menu 			= '$id_menu'";
		$sql = mysqli_query ($connect, $query); 
		
		
		if ($sql) 
		{
			$_SESSION['pesan'] = "<div  class='hilang alert alert-info'>Data telah berhasil di simpan</div>";
			header("location:".link."/home#/menu");
		} 
		else
		{
			$_SESSION['pesan'] = "<div  class='hilang alert alert-danger'>Data telah gagal di simpan</div>";
			header("location:".link."/home#/menu");
		}	
	}
}

else if ($sub == "del") {
	
	$postdata = file_get_contents("php://input");
	if (isset($postdata) && !empty($postdata)) {
		$request = json_decode($postdata);

		$id = (int) $request->id_menu;
		
		$sql = "SELECT * FROM tbl_menu WHERE id_menu = '$id'";
		$result = mysqli_query($connect, $sql);
		 while ($row = mysqli_fetch_array($result)) {
			$gambar = $row['gambar'];
			$dir_del ="file/menu/$gambar";
			unlink ($dir_del);
		 }	
		 
		$sql1 = "DELETE FROM tbl_menu WHERE id_menu = '$id'";
		mysqli_query($connect, $sql1);
	}

	
}
?>	