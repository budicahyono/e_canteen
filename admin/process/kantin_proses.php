<?php 

include "auth_proses.php";

if ($sub == "index") {
	
	$query = array();
	$sql = "SELECT * FROM tbl_kantin K, tbl_admin A WHERE K.id_admin=A.id_admin";
	if ($result = mysqli_query($connect, $sql)) {
		$count = mysqli_num_rows($result);

		$i = 0;
		while ($row = mysqli_fetch_assoc($result)) {
			$query[$i]['id_kantin'] = $row['id_kantin'];
			$query[$i]['nama_kantin'] = $row['nama_kantin'];
			$query[$i]['nama_lengkap'] = $row['nama_lengkap'];

			$i++;
		}
	}

	$json = json_encode($query);
	echo $json;
	exit;


}

else if ($sub == "edit") {
	
	$s_kantin = "active";

	$sql = "SELECT * FROM tbl_kantin where id_kantin = '$id'";
		$query = mysqli_query($connect,$sql);
		$hasil = mysqli_fetch_array($query);
		
		if($hasil == TRUE) {
			$id_kantin		= $hasil['id_kantin'];	
			$nama_kantin		= $hasil['nama_kantin'];
			
			
		}
		
		$ada = "";
		
	if (isset($_POST['save'])) 
	{ 	
		//ambil data yang diinput
		$nama_kantin 	     	= $_POST['nama_kantin']; 
		
		
		
		//update tbl_kantin
		$query 	= "UPDATE tbl_kantin SET
						nama_kantin 	           	= '$nama_kantin'
						WHERE id_kantin			= '$id'";
		$sql = mysqli_query ($connect, $query); 
		
		
		if ($sql) 
		{
			$pesan = "<div  class=' alert alert-success'>Data telah berhasil di edit</div><br>";
			echo"<meta http-equiv='refresh' content='2;  url=".link."/home#/kantin'>";
		} 
		else
		{
			$pesan = "<div  class=' alert alert-success'>Data telah gagal di edit</div><br>";
			echo"<meta http-equiv='refresh' content='2;  url=".link."/home#/kantin'>";
		}	
	}
}

else if ($sub == "del") {
	
	$postdata = file_get_contents("php://input");
	if (isset($postdata) && !empty($postdata)) {
		$request = json_decode($postdata);

		$id = (int) $request->id_kantin;
		$sql1 = "DELETE FROM tbl_menu WHERE id_kantin = '$id'";
		mysqli_query($connect, $sql1);
		 
		 
		$sql = "DELETE FROM tbl_kantin WHERE id_kantin = '$id'";
		mysqli_query($connect, $sql);
	}
}

else if ($sub == "add") {
	
	$postdata = file_get_contents("php://input");
	if (isset($postdata) && !empty($postdata)) {
		$request = json_decode($postdata);

		$addkantin = $request->addkantin;
		$keterangan = $request->keterangan;

		if ($addkantin == ''  )
			return;

		$sql 	= "INSERT tbl_kantin SET
							nama_kantin 		        = '$addkantin'";
		mysqli_query($connect, $sql);
	}
	exit;
}
?>	