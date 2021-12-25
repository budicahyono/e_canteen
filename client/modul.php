<?php
//tentukan route mana yang pertama kali dibuka ============================================
if (empty($_GET['page'])) { 
	$page = "login";
	
} 

//route login =================================================================================
if ($page == "login" and $sub == "index")  {
 
	include html."/head.php";	
	include "pages/login.php";
	include html."/script.php";	

} 

else if ($page == "login" and $sub == "submit")  {
 
	include "process/login_proses.php";

} 

else if ($page == "login" and $sub == "logout")  {
 
	include "process/login_proses.php";

} 

else if ($page == "daftar" and $sub == "index")  {
 
	include "process/daftar_proses.php";
	include html."/head.php";	
	include "pages/daftar.php";
	include html."/script.php";	

} 


//route kantin =================================================================================
else if ($page == "kantin" and $sub == "index")  {
 
	include "process/kantin_proses.php";
	include html."/head.php";	
	include "pages/kantin.php";
	include html."/script.php";	

} 

else if ($page == "kantin" and $sub == "pilih")  {
 
	include "process/kantin_proses.php";

} 


//route depan =================================================================================
else if ($page == "front" and $sub == "index")  {
 
	include "process/front_proses.php";
	include html."/head.php";	
	include "pages/index.php";
	include html."/script.php";	

} 

//route depan =================================================================================
else if ($page == "kategori" and $sub == "get")  {
 
	if ($_SESSION['session_user']  != 0) {
		include html."/head.php";	
		include "pages/kategori.php";
		include html."/script.php";	
		
	} else {
		header("location:".link."/.");
	}
	
} 

else if ($page == "kategori" and $sub == "menu")  {
 
	include "process/front_proses.php";
	
} 

else if ($page == "kategori" and $sub == "katalog")  {
 
	include "process/front_proses.php";
	
} 

else if ($page == "kategori" and $sub == "one")  {
 
	include "process/front_proses.php";
	
} 



//route transaksi =================================================================================

else if ($page == "pilih" and $sub == "menu")  {
 
	include "process/transaksi_proses.php";
	
} 


else if ($page == "transaksi" and $sub == "index")  {
 
	include "process/transaksi_proses.php";
	
} 

else if ($page == "transaksi" and $sub == "del")  {
 
	include "process/transaksi_proses.php";
	
	
} 

else if ($page == "transaksi" and $sub == "order")  {
 
	include "process/transaksi_proses.php";
	include html."/head.php";	
	include "pages/order.php";
	include html."/script.php";	
	
} 

else if ($page == "transaksi" and $sub == "selesai")  {
 
	include "process/transaksi_proses.php";
	include html."/head.php";	
	include "pages/selesai.php";
	include html."/script.php";	
	
} 



else if ($page == "transaksi" and $sub == "keluar")  {
	
	include "process/transaksi_proses.php";
} 


else { 

	die("<b>error!!</b> :  page <b>$page</b> dan subpage <b>$sub</b> tidak ada!!");
	
}