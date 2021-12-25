<?php 

include "auth_proses.php";

if ($sub == "index") {
	
	$query = array();
	
	$sql = "SELECT * FROM tbl_user ";
	
	
	if ($result = mysqli_query($connect, $sql)) {
		$count = mysqli_num_rows($result);

		$i = 0;
		while ($row = mysqli_fetch_assoc($result)) {
			$query[$i]['id_user'] = $row['id_user'];
			$query[$i]['nama_user'] = $row['nama_user'];
			$query[$i]['username'] = $row['username'];
			$query[$i]['password'] = $row['password'];

			$i++;
		}
	}
	$json = json_encode($query);
	echo $json;
	exit;


}



else if ($sub == "del") {
	
	$postdata = file_get_contents("php://input");
	if (isset($postdata) && !empty($postdata)) {
		$request = json_decode($postdata);

		 
		$sql = "DELETE FROM tbl_user WHERE id_user = '$id'";
		mysqli_query($connect, $sql);
	}
}


?>	