<?php 



if ($sub == "index") {
	
	
	if (isset($_POST['save'])) { 
	
		$nama_lengkap=$_POST['nama_lengkap'];
		$username=$_POST['username'];
		$password=$_POST['password'];
		$sql = "SELECT * FROM tbl_user WHERE username='$username' && password='$password'";
		$query = mysqli_query($connect,$sql);
		$check = mysqli_fetch_array($query);
		if($check == false) {
		
			$sql 	= "INSERT tbl_user SET
								nama_user 		        	= '$nama_lengkap',
								username 		        	= '$username',
								password					= '$password'";
			$query = mysqli_query($connect,$sql);
			
				
				$pesan = "<div class='alert-box alert-success text-center'>REGISTRASI SUKSES! BERALIH KE HALAMAN LOGIN!</div>";	
				echo "<meta http-equiv='refresh' content='1; url=./'>";
			
			
				
		} else {   
		
		$pesan = "<div class='alert-box alert-danger text-center'>USERNAME DAN PASSWORD SALAH! GAGAL REGISTRASI!</div>";	
		header("location:".link."/.");
	
		}	
	}


	
	
	
	
	
	
	
}



?>	