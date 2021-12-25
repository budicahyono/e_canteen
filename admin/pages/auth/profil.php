		 <div ng-include="'template/sidebar.php'"></div>
  <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper" style="background:#fff"  >
<!-- Main content -->
        <section class="content clearfix">

      <section class="col-xs-12 ">
						
			   <x ng-repeat="data in admin">
			<!-- quick email widget -->
              <div class="box box-info">
                <div class="box-header with-border">
                  <i class="fa fa-th-list"></i>
				 
                  <h3 class="box-title text-capitalize">Edit Password {{data.nama_lengkap}}</h3>
                </div>
				
                <div class="box-body panjang">
				<?php if (isset($_POST['save'])) {echo $pesan;} else { ?>		
				<div class="form-group">
				<a class="btn btn-warning" href="#/"><i class="fa fa-arrow-left"></i>&nbsp;&nbsp;Back</a>
				</div>	
					<form name="input" action="" method="POST" enctype="multipart/form-data">
					
					<div class="form-group row">
						<label style="padding:7px 0 0 15px" class="control-label col-xs-3">Ganti Username</label>
						<div class="col-xs-9">
							<input required type="text"  class="form-control" name="username"  value=" {{data.username}}" placeholder="Ganti Usrname">
						</div>
					</div>
					
					<div class="form-group row">
						<label style="padding:7px 0 0 15px" class="control-label col-xs-3">Input Password Lama</label>
						<div class="col-xs-9">
							<input required type="text"  class="form-control" name="old_pass"  value="" placeholder="Input Password Lama">
						</div>
					</div>
                     <div class="form-group row">
						<label style="padding:7px 0 0 15px" class="control-label col-xs-3">Input Password Baru</label>
						<div class="col-xs-9">
							<input required type="text"  class="form-control" name="new_pass"  value="" placeholder="Input Password Lama">
						</div>
					</div>
					
                   <div class="form-group row">
						<label style="padding:7px 0 0 15px" class="control-label col-xs-3">Konfirmasi Password Baru</label>
						<div class="col-xs-9">
							<input required type="text"  class="form-control" name="new_passco" value="" placeholder="Konfirmasi Password Baru">
						</div>
						
                    </div>
					
					

					 <div class="form-group pull-right">
						<button type="submit" class="btn btn-primary" name="save"><i class="fa fa-check"></i>&nbsp;&nbsp;<b>SIMPAN</b></button>
						<button type="reset" class="btn btn-warning" name="reset"><i class="fa fa-remove"></i>&nbsp;&nbsp;<b>RESET</b></button>
					</div>
					
					
					</form>
				
				
				</div>
				
              </div>
			  </x>
	</section>

		
		
		 <?php }?> 
		 
            </section><!-- /.Left col -->
        