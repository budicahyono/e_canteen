<?php 



if ($sub == "index") {
	
	
	
	$sql = "SELECT * FROM tbl_kantin K, tbl_admin A where K.id_admin = A.id_admin";
	if ($result = mysqli_query($connect, $sql)) {
		$count = mysqli_num_rows($result);

		$i = 0;
		
	}

	
	
}



else if ($sub == "pilih") {
	
	
	
	$sql = "SELECT * FROM tbl_kantin K where id_admin ='$id'";
	if ($result = mysqli_query($connect, $sql)) {
			$row = mysqli_fetch_assoc($result);
			$_SESSION['id_admin']=$row['id_admin'];
			header("location:".link."/front");
		} 

	
	
}



?>	