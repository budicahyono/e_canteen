<?php
$term = $_GET['term'];
$conn = mysql_connect("localhost","root","");
mysql_select_db("zabdul");

$sql = "SELECT * FROM kategori WHERE nm_kategori LIKE '%$term%'";
$hs = mysql_query($sql);
$json = array();
while($rs = mysql_fetch_array($hs)){
	$json[] = array(
		'label' => $rs['nm_kategori'],
		'value' => $rs['nm_kategori'],
		'id_kategori' => $rs['id_kategori'],
		'email' => $rs['email'],
	);
}
header("Content-Type: application/json");
echo json_encode($json);
?>