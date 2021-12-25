<?php 



if ($sub == "submit") {
	
	
	if (isset($_POST['login'])) { 
		$username=$_POST['username'];
		$password=$_POST['password'];
		$sql = "SELECT * FROM tbl_user WHERE username='$username' and password='$password'";
		$query = mysqli_query($connect,$sql);
		$check = mysqli_fetch_array($query);
		if($check == TRUE) {
		
			$_SESSION['session_user']=$check['id_user'];
			$_SESSION['nama_user']=$check['nama_user'];
			$_SESSION['pesan'] = "<div class='alert alert-success text-center'>LOGIN SUKSES! BERALIH KE HALAMAN HOME!</div>";	
			header("location:".link."/kantin");
			
				
		} else {   
		
			$_SESSION['pesan'] = "<div class='alert alert-danger text-center'>USERNAME DAN PASSWORD SALAH! GAGAL LOGIN!</div>";	
			header("location:".link."/.");
	
		}	
	}


	
	
	
	
	
	
	
}


else if ($sub == "logout") {
	
	session_destroy();
	header("location:".link."/.");
}
?>	