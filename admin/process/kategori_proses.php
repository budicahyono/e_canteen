<?php 

include "auth_proses.php";

if ($sub == "index") {
	
	$query = array();
	if ($level == "kantin") {
	$sql = "SELECT * FROM tbl_kategori Kat, tbl_admin A, tbl_kantin K WHERE K.id_admin=A.id_admin and Kat.id_admin=A.id_admin and  A.id_admin= '$id_admin' ";
	} else {
	$sql = "SELECT * FROM tbl_kategori Kat, tbl_admin A, tbl_kantin K WHERE K.id_admin=A.id_admin and Kat.id_admin=A.id_admin";
	}
	
	if ($result = mysqli_query($connect, $sql)) {
		$count = mysqli_num_rows($result);

		$i = 0;
		while ($row = mysqli_fetch_assoc($result)) {
			$query[$i]['id_kategori'] = $row['id_kategori'];
			$query[$i]['nama_kategori'] = $row['nama_kategori'];
			$query[$i]['nama_lengkap'] = $row['nama_lengkap'];
			$query[$i]['nama_kantin'] = $row['nama_kantin'];

			$i++;
		}
	}
	$json = json_encode($query);
	echo $json;
	exit;


}

else if ($sub == "edit") {
	
	$s_kategori = "active";

	$sql = "SELECT * FROM tbl_kategori where id_kategori = '$id'";
		$query = mysqli_query($connect,$sql);
		$hasil = mysqli_fetch_array($query);
		
		if($hasil == TRUE) {
			$id_kategori		= $hasil['id_kategori'];	
			$nama_kategori		= $hasil['nama_kategori'];
			
			
		}
		
		$ada = "";
		
	if (isset($_POST['save'])) 
	{ 	
		//ambil data yang diinput
		$nama_kategori 	     	= $_POST['nama_kategori']; 
		
		
		
		//update tbl_kategori
		$query 	= "UPDATE tbl_kategori SET
						nama_kategori 	           	= '$nama_kategori'
						WHERE id_kategori			= '$id'";
		$sql = mysqli_query ($connect, $query); 
		
		
		if ($sql) 
		{
			$_SESSION['pesan'] = "<div  class='hilang alert alert-info'>Data telah berhasil di edit</div><br>";
			header("location:".link."/home#/kategori");
		} 
		else
		{
			$_SESSION['pesan'] = "<div  class='hilang alert alert-info'>Data telah gagal di edit</div><br>";
			header("location:".link."/home#/kategori");
		}	
	}
}

else if ($sub == "del") {
	
	$postdata = file_get_contents("php://input");
	if (isset($postdata) && !empty($postdata)) {
		$request = json_decode($postdata);

		$id = (int) $request->id_kategori;
		$sql1 = "DELETE FROM tbl_menu WHERE id_kategori = '$id'";
		mysqli_query($connect, $sql1);
		 
		 
		$sql = "DELETE FROM tbl_kategori WHERE id_kategori = '$id'";
		mysqli_query($connect, $sql);
	}
}

else if ($sub == "add") {
	
	$postdata = file_get_contents("php://input");
	if (isset($postdata) && !empty($postdata)) {
		$request = json_decode($postdata);

		$addkategori = $request->addkategori;

		if ($addkategori == ''  )
			return;

		$sql 	= "INSERT tbl_kategori SET
							nama_kategori 		        = '$addkategori',
							id_admin					= '$id_admin'";
		mysqli_query($connect, $sql);
	}
	exit;
}
?>	