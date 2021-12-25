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
                  <h3 class="box-title">DATA MENU </h3>
                  
                </div>

                <div class="box-body panjang">
					<?php if (isset($_SESSION['pesan'])) { echo $_SESSION['pesan']; unset($_SESSION['pesan']); }?>
				<div ng-if="success"  class="alert alert-info">{{success}} </div>
				<div ng-if="error" class="alert alert-danger">{{error}} </div>
				
				<?php if ($level == "kantin") { ?> 
				<div class="form-group">
					<a href="menu/tambah" class="btn btn-primary"><i class="fa fa-plus"></i>&nbsp;&nbsp;Tambah Menu</a>
				</div>
				<?php } ?>
				
				<table class="table-hover table table-responsive table-bordered "  ng-repeat="data in menu">
					<thead>
						<tr class="daftar">
							<th colspan="2" class="text-center" >{{data.nama_kantin}} / {{data.nama_lengkap}}</th>
						</tr>
						<tr class="daftar">
							<th colspan="2" class="text-center" >{{data.nama_menu}}</th>
						</tr>
					</thead>	
						<tr>	
							<td colspan="2"> 	<a target="blank" href="file/menu/{{data.gambar}}"><img ng-if="data.gambar" class="img-responsive" style="width:100%" src="file/menu/{{data.gambar}}"></a></td>
						</tr>
						<tr>	
							<th class="text-center" >Harga</th>
								<td>{{data.harga | currency}},-</td>
						</tr>
						<tr>	
							<th class="text-center" style="width:130px">Nama Kategori</th>
								<td>{{data.nama_kategori}}</td>
						</tr>
						<tr>	
							<th class="text-center" >Status</th>
								<td>{{data.status}}</td>
						</tr>
						<tr>	
							<th class="text-center" >Action</th>
								<td class="text-center">
								<span class="kotak-kecil">
								<a class="soft badge btn tulisan" href="menu/edit/{{data.id_menu}}"   >
								<span class="fa fa-pencil "></span><span class="tulisantext">Edit</span>
								</a></span>
							
								<span class="kotak-kecil">
								<a class="soft badge btn tulisan" ng-click="del(data.id_menu)"  >
								<span class="fa fa-trash "></span><span class="tulisantext">Delete</span>
								</a></span>
							</td>
						</tr>
					
					
			</table>
			<table ng-show="menu.length==0" class="table-hover table table-responsive table-bordered "  >
					<thead>
						<tr class="daftar">
							<th colspan="2" class="text-center" >TIDAK ADA DATA</th>
						</tr>
					</thead>	
						<tr>	
							<td colspan="2" class="text-center">Anda belum mengisi menu kantin Anda</td>
						</tr>
			</table>
				
			
						
					
				</div>
              </div>	  
			</section>
			</div>
		
		 
        </section><!-- /.Left col 
		  <!-- right col (We are only adding the ID to make the widgets sortable)-->

          </div><!-- /.row (main row) -->

<script>
	document.getElementById("uploadBtn").onchange = function () {
		document.getElementById("uploadFile").value = this.value;
	};

</script>	  