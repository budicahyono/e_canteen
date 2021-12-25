<?php


if ($sub == "index") {
	
	if (isset($_POST['submit'])) {
			
	
		$nama_lengkap=$_POST['nama_lengkap'];
		$nama_kantin=$_POST['nama_kantin'];
		$username=$_POST['username'];
		$password=$_POST['password'];
		$level = "kantin";
		$sql_cek = "SELECT * FROM tbl_admin WHERE username='$username' ";
		$query_cek = mysqli_query($connect,$sql_cek);
		$check = mysqli_fetch_array($query_cek);
		if($check == FALSE) {
		
			$sql 	= "INSERT tbl_admin SET
								nama_lengkap 		        = '$nama_lengkap',
								username 		        	= '$username',
								password					= '$password',
								level						= '$level'";
			$query = mysqli_query($connect,$sql);
			
			$sql1 = "SELECT * FROM tbl_admin where username = '$username' and password = '$password'";
			$query1 = mysqli_query($connect,$sql1);
			$hasil = mysqli_fetch_array($query1);
			
			if($hasil == TRUE) {
				$id_admin		= $hasil['id_admin'];	
				
				$sql2 	= "INSERT tbl_kantin SET
								nama_kantin 		        = '$nama_kantin',
								id_admin					= '$id_admin'";
				$query2 = mysqli_query($connect,$sql2);
				
				
			
			
				$_SESSION['username']=$username;
				$_SESSION['id_admin']=$id_admin;
				$_SESSION['level']=$level;

				
				$pesan = "<div class='alert-box alert-success text-center'>REGISTRASI SUKSES! BERALIH KE HALAMAN DASHBOARD ADMIN!</div>";	
				echo "<meta http-equiv='refresh' content='1; url=home'>";
			}
			
				
		} else {   
		
		$pesan = "<div class='alert-box alert-danger text-center'>USERNAME SUDAH TERDAFTAR! SILAHKAN GUNAKAN USERNAME LAIN!</div>";	
		echo"<meta http-equiv='refresh' content='1; url=daftar'>";	
	
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

			$i++;
		}
	}

	$json = json_encode($query);
	echo $json;

	
		

	
}

?>