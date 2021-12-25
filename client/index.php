<?php
// mengambil direktori web ini dalam server
define ("dir",__DIR__);

//fungsi untuk mengatur database
include "config.php";



//variable untuk mengaktifkan fungsi cek device
$param = "off";



// menentukan path template
define("temp", dir."/template");

// menentukan path head dan script
define("html", dir."/html");

//menangkap page web
if (!isset($_GET['page'])) { $page = ""; } else { $page = $_GET['page']; }

//menangkap sub-page web
if (!isset($_GET['sub'])) { $sub = "index"; } else { $sub = $_GET['sub']; }

//menangkap id data yang akan ditampilkan
if (!isset($_GET['id'])) { $id = 0; } else { $id = $_GET['id']; }

//menangkap hak akses web
if (!isset($level)) { $level = 0; }

//menangkap operasi lainnya
if (!isset($_GET['op'])) { $op = 0; } else { $op = $_GET['op']; }

 
$length = strlen($_SERVER['PHP_SELF']);
$path	= substr($_SERVER['PHP_SELF'],0,$length-10);
define ("link","http://".$_SERVER['HTTP_HOST'].$path);


//fungsi untuk memasukkan modul halaman web
include "modul.php";

	
?>