<?php


if ($sub == "index") {
	
	if (isset($_POST['login'])) { 
	
		$username=$_POST['username'];
		$password=$_POST['password'];
		$sql = "SELECT * FROM tbl_admin WHERE username='$username' && password='$password'";
		$query = mysqli_query($connect,$sql);
		$check = mysqli_fetch_array($query);
		if($check == TRUE) {
		
			$_SESSION['username']=$username;
			$_SESSION['id_admin']=$check['id_admin'];
			$_SESSION['level']=$check['level'];
			$level = $check['level'];

			if ($level == "kantin") {
				$pesan = "<div class='alert-box alert-success text-center'>LOGIN SUKSES! BERALIH KE HALAMAN DASHBOARD MERCHANT!</div>";	
				echo "<meta http-equiv='refresh' content='1; url=home'>";
				
			} else if ($level == "admin") {
				$pesan = "<div class='alert-box alert-success text-center'>LOGIN SUKSES! BERALIH KE HALAMAN DASHBOARD ADMIN!</div>";	
				echo "<meta http-equiv='refresh' content='1; url=admin#/admin'>";
			}
				
		} else {   
		
		$pesan = "<div class='alert-box alert-danger text-center'>USERNAME DAN PASSWORD SALAH! GAGAL LOGIN!</div>";	
		echo"<meta http-equiv='refresh' content='1; url='>";	
	
		}	
	}

}  


else if ($sub == "logout") {
	
	session_destroy(); 
	 
		
} 

else if ($sub == "password") {
	
	include "auth_con.php";
	
	if (isset($_POST['save'])) 
	{ 
			
		$username	 = $_POST['username'];
	
		
		$old_pass	 = $_POST['old_pass']; 
		$new_pass	 = $_POST['new_pass']; 
		$new_passco	 = $_POST['new_passco']; 
			
		
	
		
			if ($old_pass == $password) {
				
				
				if ($new_passco == $new_pass) {
					
					$query 	= "UPDATE tbadmin SET
									username		= '$username',
									password		= '$new_passco'
									WHERE username	= '$user_now'";
								
									
					$sql = mysql_query ($query); 
					if ($sql) 
					{
						$pesan = "<div  class=' alert alert-success'>PASSWORD <b>SUDAH</b> DI EDIT. REFRESH WEBSITE...</div>";
						if ($username == $user_now) {
							echo"<meta http-equiv='refresh' content='2; url=".link."/home/admin'>";
						} else { 
							echo"<meta http-equiv='refresh' content='2; url=".link."/login/logout'>";
						}	
					} 
					else
					{
						$pesan = "<div  class=' alert alert-danger'>PASSWORD <b>GAGAL</b> DI EDIT. REFRESH WEBSITE...</div>";
						echo"<meta http-equiv='refresh' content='2; url=".link."/login/password'>";
					}
				} else { 
						$pesan = "<div  class=' alert alert-warning'>PASSWORD BARU <b>TIDAK</b>  SAMA. REFRESH WEBSITE...</div>";
						echo"<meta http-equiv='refresh' content='2; url=".link."/login/password'>";
				}
			} else {
				$pesan = "<div  class=' alert alert-warning'>PASSWORD LAMA <b>TIDAK</b>  SAMA. REFRESH WEBSITE...</div>";
				echo"<meta http-equiv='refresh' content='2; url=".link."/login/password'>";
			}
			


			
				
	}	
	
		

	
}

else if ($sub == "auth") {
	
	
	$query = array();
	$sql = "SELECT * FROM tbl_admin WHERE username='$user_now'";
	if ($result = mysqli_query($connect, $sql)) {
		$count = mysqli_num_rows($result);

		$i = 0;
		while ($row = mysqli_fetch_assoc($result)) {
			$query[$i]['nama_lengkap'] = $row['nama_lengkap'];
			$query[$i]['username'] = $row['username'];
			$query[$i]['password'] = $row['password'];
			$query[$i]['level'] = $row['level'];

			$i++;
		}
	}

	$json = json_encode($query);
	echo $json;
}



?>