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
			
			
			  
		 <div class="box box-info">
                <div class="box-header with-border">
                  <i class="fa fa-desktop"></i>
                  <h3 class="box-title">{{op}} DATA USER / PELANGGAN </h3>
                  
                </div>

                <div class="box-body panjang">
				
				<?php if (isset($_SESSION['pesan'])) { echo $_SESSION['pesan']; } unset($_SESSION['pesan']);?>
				<div ng-if="success"  class="alert alert-info">{{success}} </div>
				<div ng-if="error" class="alert alert-danger">{{error}}</div>
				
				
				
				
				
				
				<table ng-show="table" class="table-hover table table-responsive table-bordered data">
					<thead>
						<tr class="daftar">
							<th class="text-center" >Nama User</th>
							<th class="text-center" >Username</th>
							<th class="text-center" >Password</th>
							<th class="text-center" >Action</th>
						</tr>
					</thead>
					<tbody id="hasil">	
						
						<tr class="soft daftar   text-left" ng-repeat="data in user">
						
							<td>{{data.nama_user}}</td>
							<td>{{data.username}} </td>
							<td>{{data.password}} </td>
							<td class="text-center">
								
								<span class="kotak-kecil">
								<a class="soft badge btn tulisan" ng-click="del(data.id_user)"  >
								<span class="fa fa-trash "></span><span class="tulisantext">Delete</span>
								</a></span>
							</td>	
							
													
						</tr>
						<tr ng-show="user.length==0"> 
							<td class="soft daftar text-capitalize  text-center" colspan="3">TIDAK ADA DATA</td> 
						</tr>	
					 </tbody>
					
			</table>
			
			
			
				
				</div>
              </div>	  
			</section>
			</div>
		
		 
        </section><!-- /.Left col 
		  <!-- right col (We are only adding the ID to make the widgets sortable)-->

          </div><!-- /.row (main row) -->
	  