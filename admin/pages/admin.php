<?php
session_start();
$level = $_SESSION['level'];
?>
		  <!-- Navbar left Menu -->
      <div ng-mouseleave="myFunc_b()">
	  <div   class="navbar-custom-menu" style="float:left;position:absolute;">
        <ul class="nav navbar-nav">

          <!-- User Account: style can be found in dropdown.less -->
          <li  class="dropdown user user-menu">
            <a  class="tombol" ng-click="myFunc1()"  style="background-color:{{bg1}}" >
             <i class="fa fa-th-list"></i> 
             
            </a>
           
          </li>
          <!-- Control Sidebar Toggle Button -->
          
        </ul>
      </div>
		 <div  ng-include="'template/sidebar.php'"></div>
		 </div>
  <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper" style="background:#fff"  >
<!-- Main content -->
        <section class="content clearfix">
		 
		
            <!-- Left col -->
				<div class="row">
			<section class="container-fluid ">
			
			<!-- quick email widget -->
              <div class="box box-info">
                <div class="box-header with-border">
                  <i class="fa fa-desktop"></i>
                  <h3 class="box-title">DASHBOARD </h3>
                  
                </div>

                <div class="box-body panjang">
					<h4 class="text-center">{{pesan}}</h4>
					
					
					<div class="row">
		 <div class="col-lg-12 col-xs-12">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3>{{user.length}}</h3>

              <p style="font-weight:bold">pelanggan</p>
            </div>
            <div class="icon">
              <i class="fa fa-users"></i>
            </div>
            <a href="#user" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
		 <!-- ./col -->			
		  </div>
		  <div class="row">
		 <div class="col-lg-4 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3>{{kantin.length}}</h3>

              <p style="font-weight:bold">kantin</p>
            </div>
            <div class="icon">
              <i class="fa fa-users"></i>
            </div>
            <a href="#kantin" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
		 <!-- ./col -->
        <div class="col-lg-4 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3>{{menu.length}}</h3>

              <p style="font-weight:bold">menu</p>
            </div>
            <div class="icon">
              <i class="fa fa-users"></i>
            </div>
            <a href="#menu" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-4 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3>{{kategori.length}}</h3>

              <p style="font-weight:bold">kategori</p>
            </div>
            <div class="icon">
              <i class="fa fa-th-list"></i>
            </div>
            <a href="#kategori" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-4 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3>{{transaksi.length}}</h3>

              <p style="font-weight:bold">transaksi</p>
            </div>
            <div class="icon">
              <i class="fa fa-tasks"></i>
            </div>
            <a href="#transaksi" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
       
      </div>
				</div>
				
				
				
              </div>
			  

		
			</section>
			</div>

		
		 
        </section><!-- /.Left col 
		  <!-- right col (We are only adding the ID to make the widgets sortable)-->

          </div><!-- /.row (main row) -->