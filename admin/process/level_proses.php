<?php 

	$sql = "SELECT * FROM tbl_admin A, tbl_kantin K WHERE K.id_admin=A.id_admin and username='$user_now'";
		$query = mysqli_query($connect,$sql);
		$hasil = mysqli_fetch_array($query);
		
		if($hasil == TRUE) {
			$nama_lengkap		= $hasil['nama_lengkap'];	
			$nama_kantin		= $hasil['nama_kantin'];	
			$username		= $hasil['username'];	
			$password		= $hasil['password'];
			$id_admin		= $hasil['id_admin'];
			$level			= $hasil['level'];
			
			
				
			
		} else {
			$sql = "SELECT * FROM tbl_admin WHERE  username='$user_now'";
			$query = mysqli_query($connect,$sql);
			$hasil = mysqli_fetch_array($query);	

			if($hasil == TRUE) {	
			
				$nama_lengkap		= $hasil['nama_lengkap'];	
				$nama_kantin		= "admin";	
				$username		= $hasil['username'];	
				$password		= $hasil['password'];
				$id_admin		= $hasil['id_admin'];
				$level			= $hasil['level'];
				
			} 
		}		
		
	
 
?>	