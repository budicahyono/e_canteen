<?php
//tampilkan error atau tidak
ini_set( "display_errors", 0);

session_start();
$level = $_SESSION['level'];

?>

<!-- Left side column. contains the logo and sidebar -->
<?php if (isset($page)) { if ($page != "home") { ?>
  <aside class="main-sidebar" id="showMenu" style="display:none">
<?php }} else { ?>  
  <aside class="main-sidebar" style="display:{{showMenu}}">
<?php } ?> 
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
	<x ng-repeat="data in admin">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image ">
          <img src="{{dir_foto}}" class="img-circle foto" alt="{{data.username}} ">
        </div>
        <div class="pull-left info text-capitalize" >
		
          <p class="no-long">{{data.username}}</p>
		
          
        </div>
      </div>
	  
	 </x> 
	 
	  
	 <?php if (isset($page)) { if ($page != "home") { ?>
	  <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image ">
          <img src="<?php echo link ?>/<?php echo $dir_foto ?>" class="img-circle foto" alt="<?php echo $username ?> ">
        </div>
        <div class="pull-left info text-capitalize" >
		
          <p class="no-long"><?php echo $username ?> </p>
		
          
        </div>
      </div>
	  
	    <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" >
        <li class="header text-center">MENU UTAMA</li>
       
		
		 
		<li ng-click="home()" class="line treeview">
		
		<?php if ($level == "kantin") { ?>
          <a href="<?php echo link ?>/home" >
            <i class="fa fa-desktop"></i> <span>DASHBOARD</span>
          </a>
		<?php } else { ?>
		<a href="<?php echo link ?>/admin" >
            <i class="fa fa-desktop"></i> <span>DASHBOARD</span>
          </a>		
		<?php } ?>		
        </li>
		
		<?php if ($level == "admin") { ?> 
		<li ng-click="user()" class="line  <?php if (isset($s_user)) { echo "active"; } ?> treeview">
          <a href="<?php echo link ?>/admin#user">
            <i class="fa fa-th-list"></i> <span>DATA USER</span>
          </a>
        </li>
		<li ng-click="kantin()" class="line  <?php if (isset($s_kantin)) { echo "active"; } ?> treeview">
          <a href="<?php echo link ?>/admin#kantin">
            <i class="fa fa-th-list"></i> <span>DATA KANTIN</span>
          </a>
        </li>
		<?php } ?>	
		
		<li ng-click="kategori()" class="line <?php if (isset($s_kategori)) { echo "active"; } ?> treeview">
          <a href="<?php echo link ?>/home#kategori">
            <i class="fa fa-th-list"></i> <span>DATA KATEGORI</span>
          </a>
        </li>
		<li  ng-click="menu()" class="line {{s_menu}} <?php if (isset($s_menu)) { echo "active"; } ?> treeview">
          <a href="<?php echo link ?>/home#menu" >
            <i class="fa fa-list"></i> <span>DATA MENU</span>
          </a>
        </li>
		<li  ng-click="transaksi()" class="line {{s_transaksi}} treeview">
          <a href="<?php echo link ?>/home#transaksi" >
            <i class="fa fa-list-alt"></i> <span>DATA TRANSAKSI</span>
          </a>
        </li>
		
		
		
		
		
	   
	   
      </ul>
	 <?php }} else { ?>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" >
        <li class="header text-center">MENU UTAMA</li>
       
		
		
		<li ng-click="home()" class="line {{s_home}} treeview">
		<?php if ($level == "kantin") { ?> 
          <a href="#/" >
            <i class="fa fa-desktop"></i> <span>DASHBOARD</span>
          </a>
		 <?php } else { ?>
		<a href="#/admin" >
            <i class="fa fa-desktop"></i> <span>DASHBOARD</span>
          </a>		
		<?php } ?>		 
        </li>
		
		<?php if ($level == "admin") { ?> 
		<li ng-click="user()" class="line {{s_user}} <?php if (isset($s_user)) { echo "active"; } ?> treeview">
          <a href="#user">
            <i class="fa fa-th-list"></i> <span>DATA USER</span>
          </a>
        </li>
		<li ng-click="kantin()" class="line {{s_kantin}} <?php if (isset($s_kantin)) { echo "active"; } ?> treeview">
          <a href="#kantin">
            <i class="fa fa-th-list"></i> <span>DATA KANTIN</span>
          </a>
        </li>
		<?php } ?>	
		
		<li ng-click="kategori()" class="line {{s_kategori}} <?php if (isset($s_kategori)) { echo "active"; } ?> treeview">
          <a href="#kategori">
            <i class="fa fa-th-list"></i> <span>DATA KATEGORI</span>
          </a>
        </li>
		<li  ng-click="menu()" class="line {{s_menu}} <?php if (isset($s_menu)) { echo "active"; } ?> treeview">
          <a href="#menu" >
            <i class="fa fa-list"></i> <span>DATA MENU</span>
          </a>
        </li>
		<li  ng-click="transaksi()" class="line {{s_transaksi}} treeview">
          <a href="#transaksi" >
            <i class="fa fa-list-alt"></i> <span>DATA TRANSAKSI</span>
          </a>
        </li>
		
		
		
		
		
	   
	   
      </ul>
	 <?php } ?>
    </section>
    <!-- /.sidebar -->
  </aside>