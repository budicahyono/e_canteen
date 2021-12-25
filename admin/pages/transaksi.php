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
			
		
		<style>	 
		.putih{
			background: #fff;
			color: #232323;
		}	
		 .nominal{
			background: #fff;
			font-size:15px;
			color: #232323;
			
			position:absolute;
			margin-top:-28px;
			margin-left:10px;
		}
		.btn:hover, .btn:focus {
			color:#fff !important;	
		}
		</style>	  
		 <div class="box box-info">
                <div class="box-header with-border">
                  <i class="fa fa-desktop"></i>
                  <h3 class="box-title">DATA {{op}} TRANSAKSI </h3>
                  
                </div>

                <div class="box-body panjang">
					
				<div ng-if="success"  class="alert alert-success">{{success}} </div>
				<div ng-if="error" class="alert alert-danger">{{error}} </div>
				
				
				
				<table ng-show="awal"  class="table-hover table table-responsive table-bordered trans">
					<thead>
						<tr class="daftar">
							<th class="text-center" style="width:10px">ID</th>
							<th class="text-center" colspan="2">Detail Transaksi</th>
							
							
							
							
						</tr>
					</thead>
					<tbody id="hasil" ng-repeat="data in transaksi">	
						<tr class="soft daftar text-capitalize text-left" >
							<td rowspan="7">{{data.id_transaksi}}</td>
							<th class="text-center" >Nama Kantin / Pemilik</th>
							<td> {{data.nama_kantin}} / {{data.nama_lengkap}}</td>
						</tr>	
						<tr class="soft daftar text-capitalize text-left" >
							<th class="text-center" >Nama User</th>
							<td> {{data.nama_user}}</td>
						</tr>	
						<tr>
							<th class="text-center" >Tanggal dan Waktu</th>
							<td>{{data.tgl_transaksi | formatDate: dt }}</td>
						</tr>	
						<tr>
							<th class="text-center" >Total</th>
							<td>{{data.total_transaksi | currency }},- <x ng-show="data.total_transaksi == 0">(Masih Memesan)</x></td>
						</tr>	
						<tr>	
							<th class="text-center" >Dibayar</th>
							<td>{{data.dibayar | currency }},- </td>
						</tr>	
						<tr>	
							<th class="text-center" >Kembali</th>
							<td>{{data.kembali | currency }},- </td>
						</tr>	
						<tr>	
							<th class="text-center" >Action</th>
							<td class="text-right">
							
								<span class="kotak-kecil">
								<a target="blank" ng-show="data.dibayar != 0" class="soft badge btn tulisan"   href="cetak/nota/{{data.id_transaksi}}">
								<span class="fa fa-print "></span><span class="tulisantext">Cetak</span>
								</a></span>

								<span class="kotak-kecil">
								<a class="soft badge btn tulisan" ng-click="detail(data.id_transaksi, data.nama_lengkap, data.total_transaksi)"  >
								<span class="fa fa-list-alt "></span><span class="tulisantext">Detail</span>
								</a></span>								
								
								<span class="kotak-kecil">
								<a class="soft badge btn tulisan" ng-click="del(data.id_transaksi)"  >
								<span class="fa fa-trash "></span><span class="tulisantext">Delete</span>
								</a></span>
								
							</td>	
										
						</tr>
						
						
						
					 </tbody>
					 <tr ng-show="transaksi.length==0"> 
							<td class="soft daftar text-capitalize  text-center" colspan="6">TIDAK ADA DATA</td> 
						</tr>	
					
			</table>
			<p></p>
			
			<table ng-show="buka"  class="table-hover table table-responsive table-bordered data">
					<thead>
						<tr class="putih">
						<td class="text-center" colspan="5">
							<div class="col-xs-12" style="padding-bottom:10px">
							<div class="row">
							
							<span class="pull-left badge" style="font-size:10px;margin-right:20px;padding:5px 7px">
							Nama User: {{nama_lengkap}}</span>	
							
							<span class="pull-right badge" style="font-size:10px;padding:5px 7px">
							ID Transaksi : {{id_transaksi}}</span>
							</div>
							</div>
							<div class="col-xs-12" style="padding-bottom:10px">
							<div class="row">
							<span class="text-center">
							
							<span ng-show="cetak" >
							
						
							<a  class="soft badge btn tulisan"  href="cetak/nota/{{id_transaksi}}&d={{dibayar}}&k={{kembali}}" >
							<span class="fa fa-print "></span><span class="tulisantext">Cetak Nota</span>
							</a>
							
							</span>
							
							
							<span style="margin-left:10px"></span>
							
							<a class="soft badge btn tulisan" ng-click="refresh()" >
							<span class="fa fa-refresh "></span><span class="tulisantext">Refresh </span>
							</a>
							
							<span style="margin-left:10px"></span>
							
							<a class="soft badge btn tulisan" ng-click="tutup()"  >
							<span class="fa fa-remove "></span><span class="tulisantext">Tutup</span>
							</a>

							
							</span>
							
							</div>
							</div>
							
							<div class="col-xs-12 text-left" style="padding-left:0px">
							<h4 style="font-weight:bold">Subtotal : {{total_transaksi | currency }},-</h4>
							</div> 	
							
							
							<div class="col-xs-12 text-left" style="padding:0px">
							<input ng-show="total_transaksi != 0" required type="text"  class="form-control " ng-change="ubah()" ng-model="dibayar"  placeholder="Dibayar">
							<small class="nominal" ng-if="nominal">{{nominal | currency}},-	</small>
							</div>
							<div class="col-xs-12 text-left" style="padding:0px">
							<p style="display:none">{{kembali = dibayar - total_transaksi}}</p>
							
							<h4 ng-show="positif" style="font-weight:bold">Kembali : {{kembali | currency }},-</h4>
							</div>
							
						
							
						
							
							
								
							</td>	
						</tr>	
					</thead>
					<tbody ng-repeat="x in detail_transaksi ">
					
						<tr class="daftar" >
							
							<th colspan="2" class="text-center" style="background:#8793da;color:#fff" >{{x.nama_menu}}</th>
						</tr>
						<tr>	
							<td colspan="2">	<a target="blank" href="file/menu/{{x.gambar}}"><img  class="img-responsive" style="width:100%" src="file/menu/{{x.gambar}}"></a></td>
						</tr>
						<tr>		
							<th class="text-center" >Harga</th>
							<td>{{x.harga | currency}},-</td>
						</tr>
						<tr>		
							<th class="text-center" >Jumlah</th>
							<td>{{x.jumlah}}</td>
						</tr>
						<tr>	
							<th class="text-center" >Total Harga</th>
							<td>{{x.total_harga | currency }},-</td>
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