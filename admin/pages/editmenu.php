<body class="hold-transition skin-red sidebar-mini " >
	<div class="wrapper">
		 <?php include temp."/header.php" ?>
<script>
$(document).ready(function(){
    $("#myFunc_b").mouseleave(function(){
        $("#showMenu").css("display", "none"); 
		$("#myFunc1").css("background-color", ""); 
    });
	 $("#myFunc1").click(function(){
        $("#showMenu").css("display", "block"); 
        $("#myFunc1").css("background-color", "#313f8f"); 
    });
});
</script>
		<div id="myFunc_b">	
		  <div   class="navbar-custom-menu" style="float:left;position:absolute;">
        <ul class="nav navbar-nav">

          <!-- User Account: style can be found in dropdown.less -->
          <li  class="dropdown user user-menu">
            <a  class="tombol" id="myFunc1"  style=":{{bg1}};top:-50px" >
             <i class="fa fa-th-list"></i> 
             
            </a>
           
          </li>
          <!-- Control Sidebar Toggle Button -->
          
        </ul>
      </div>
		 <?php include temp."/sidebar.php" ?>
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
                  <h3 class="box-title">EDIT DATA MENU </h3>
                  
                </div>

                <div class="box-body panjang">
					
				
				<form  name="input" action="" method="POST" enctype="multipart/form-data" >
					<div class="form-group row">
						<div class="col-xs-12">
						<label  class="control-label ">Nama Menu </label>
							<input required type="text"  class="form-control" name="nama_menu" value="<?php echo $nama_menu ?>" placeholder="Input nama menu">
						</div>
					</div>
					<div class="form-group row">
						<div class="col-xs-12" style="margin-bottom:5px">
							<label  class="control-label ">Upload Gambar</label>
							<input class="form-control" id="uploadFile" placeholder="Upload Gambar Menu" disabled />
						</div>
						<div class="col-xs-12" >
						
						   <div class="file-upload btn btn-block btn-success">		
								<span><i class="fa fa-image"></i>&nbsp;&nbsp;<b>Pilih Gambar</b></span>
								<input accept="image/*" onchange="loadFile(event)" id="uploadBtn" name="gambar" type="file" class="upload" />
								<input name="foto_hid" type="hidden" value="<?php echo $gambar ?>" >
							</div>
						</div>
					</div>	
					<script>
  var loadFile = function(event) {
    var output = document.getElementById('output');
    output.src = URL.createObjectURL(event.target.files[0]);
  };
</script>
					 <div class="form-group row">
						<div class="col-xs-12">
						
							<a target="blank" href="<?php echo $dir_foto_menu ?>"><img id="output"  style="width:100%" src="<?php echo $dir_foto_menu ?>"></img></a>
					
						</div>
					</div>
					<div class="form-group row">
						<div class="col-xs-12">
						<label  class="control-label ">Harga</label>
							<input required type="text" id="harga" class="form-control" name="harga" value="<?php echo number_format($harga) ?>" placeholder="Input harga">
<script>
function formatRupiah(angka, prefix)
	{
		var number_string = angka.replace(/[^.\d]/g, '').toString(),
			split	= number_string.split('.'),
			sisa 	= split[0].length % 3,
			rupiah 	= split[0].substr(0, sisa),
			ribuan 	= split[0].substr(sisa).match(/\d{1,3}/g);
			
		if (ribuan) {
			separator = sisa ? ',' : '';
			rupiah += separator + ribuan.join(',');
		}
		
		rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
		return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : ',');
	}
	
	var harga = document.getElementById('harga');
	if (harga != null) { 
		harga.addEventListener('keyup', function(e)
		{
			harga.value = formatRupiah(this.value);
		});
	}
</script>
						</div>
					</div>
					
					<div class="form-group row">
						<div class="col-xs-12">
						<label  class="control-label ">Pilih Kategori</label>
							<select name="id_kategori" class="form-control">
							<?php while ($hasil = mysqli_fetch_array($query)) { 
							
							$selected = ($hasil['id_kategori']== $id_kategori) ? "selected" : "";
							
							?>
							
							<option value="<?php echo $hasil['id_kategori']; ?>" <?php echo $selected; ?> >
								<?php echo $hasil['nama_kategori'] ?>
								</option>
							
							<?php } ?>
							</select>
							
						</div>
					</div>
					<div class="form-group row">
						<div class="col-xs-12">
						<label class="control-label ">Status</label>
						
							<div class="radio" >
							  <label><input type="radio" name="status" <?php if ($status == "tersedia" ) echo "checked" ?> value="tersedia">Tersedia</label>
							&nbsp;&nbsp;&nbsp;	
							  <label><input type="radio" name="status" <?php if ( $status == "habis" ) echo "checked" ?> value="habis" >Habis</label>
							</div>
						</div>
					</div>
                   
					 <div class="form-group pull-right">
						<input required type="submit"  value="Simpan" class="btn btn-primary" name="save">
						<a href="<?php echo link ?>/home#/menu"   class="btn btn-danger"  >Tutup</a>
					</div>
					
				</form>
				
				
				
				
				
					
				</div>
              </div>	  
			</section>
 </div>
		
		 
        </section><!-- /.Left col 
		  <!-- right col (We are only adding the ID to make the widgets sortable)-->

          </div><!-- /.row (main row) -->
          <?php include temp."/footer.php" ?>
		  </div><!-- /.row (main row) -->

		 
</body>
</html>		  