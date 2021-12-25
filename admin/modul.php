<?php
//tentukan route mana yang pertama kali dibuka ============================================
if (empty($_GET['page'])) { 
	$page = "login";
	
} 




//route login ======================================================================
if ($page == "login" and $sub == "index")  {

	include "process/login_proses.php";
	include html."/head.php";	
	include "pages/auth/login.php";
	include html."/script.php";
} 


//route daftar ========================================================================
else if ($page == "daftar" and $sub == "index")  {

	include "process/daftar_proses.php";
	include html."/head.php";	
	include "pages/auth/daftar.php";
	include html."/script.php";		

} 



//route logout ========================================================================
else if ($page == "home" and $sub == "logout")  {

	include "process/login_proses.php";
	include html."/head.php";	
	include "pages/auth/logout.php";
	include html."/script.php";		

} 


//route auth =================================================================================
else if ($page == "login" and $sub == "auth")  {

	include "process/login_proses.php";	
	
} 


//route home =================================================================================
else if ($page == "home" and $sub == "index")  {

	include "process/home_proses.php";
	include html."/head.php";		
	include "layout.php";
	
} 

//route admin =================================================================================
else if ($page == "admin" and $sub == "index")  {

	include "process/admin_proses.php";
	include html."/head.php";		
	include "layout.php";
	
} 

else if ($page == "admin" and $sub == "kantin")  {

	include "process/admin_proses.php";	
	
} 

//route kategori =================================================================================
else if ($page == "kategori" and $sub == "edit")  {

	include "process/kategori_proses.php";
	include html."/head.php";	
	include "pages/editkategori.php";
	include html."/script.php";		
	
} 

else if ($page == "kategori" and $sub == "index")  {

	include "process/kategori_proses.php";
} 

else if ($page == "kategori" and $sub == "del")  {

	include "process/kategori_proses.php";
} 

else if ($page == "kategori" and $sub == "add")  {

	include "process/kategori_proses.php";
} 


//route user =================================================================================
else if ($page == "user" and $sub == "edit")  {

	include "process/user_proses.php";
	include html."/head.php";	
	include "pages/edituser.php";
	include html."/script.php";		
	
} 

else if ($page == "user" and $sub == "index")  {

	include "process/user_proses.php";
} 

else if ($page == "user" and $sub == "del")  {

	include "process/user_proses.php";
} 

else if ($page == "user" and $sub == "add")  {

	include "process/user_proses.php";
} 


//route kantin =================================================================================
else if ($page == "kantin" and $sub == "edit")  {

	include "process/kantin_proses.php";
	include html."/head.php";	
	include "pages/editkantin.php";
	include html."/script.php";		
	
} 

else if ($page == "kantin" and $sub == "index")  {

	include "process/kantin_proses.php";
} 

else if ($page == "kantin" and $sub == "del")  {

	include "process/kantin_proses.php";
} 

else if ($page == "kantin" and $sub == "add")  {

	include "process/kantin_proses.php";
} 



//route menu =================================================================================
else if ($page == "menu" and $sub == "tambah")  {

	include "process/menu_proses.php";
	include html."/head.php";	
	include "pages/tambahmenu.php";
	include html."/script.php";		
	
} 

else if ($page == "menu" and $sub == "edit")  {

	include "process/menu_proses.php";
	include html."/head.php";	
	include "pages/editmenu.php";
	include html."/script.php";		
	
} 

else if ($page == "menu" and $sub == "del")  {

	include "process/menu_proses.php";	
	
} 

else if ($page == "menu" and $sub == "index")  {

	include "process/menu_proses.php";	
	
} 



//route transaksi =================================================================================
else if ($page == "transaksi" and $sub == "index")  {

	include "process/transaksi_proses.php";	
	
} 

else if ($page == "transaksi" and $sub == "detail")  {

	include "process/transaksi_proses.php";	
	
} 

else if ($page == "transaksi" and $sub == "del")  {

	include "process/transaksi_proses.php";	
	
} 

//route cetak =================================================================================
else if ($page == "cetak" and $sub == "nota")  {

	include "process/transaksi_proses.php";	
	include html."/print.php";	
	include "pages/cetaknota.php";
	include html."/script.php";		
} 

 

else { 

	die("<b>error!!</b> :  page <b>$page</b> dan subpage <b>$sub</b> tidak ada!!");
	
}