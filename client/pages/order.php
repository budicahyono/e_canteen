
	<body  ng-controller="indexController">
	<div id="page" >
<?php include temp."/header.php"?>


<div style="margin-top:100px" ></div>

<div   id="fh5co-featured-menu" class="fh5co-section"  >
	<div class="container">
		<div class="row">
			<div class="col-md-12 fh5co-heading ">
				<h2>Menu yang Dipesan </h2>
				<span  class="fh5co-price">ID USER : <?php echo $_SESSION['session_user'] ?></span><br>
				<span  class="fh5co-price">NAMA USER : <?php echo $_SESSION['nama_user'] ?></span>
					
			</div>
			
			<div  class="col-md-3 col-sm-6 col-xs-6 col-xxs-12 fh5co-item-wrap " >
			<?php
			$total = 0;
			while ($row = mysqli_fetch_array($result)) {
				$id_transaksi = $row['id_transaksi'];
				$id_user = $row['id_user'];
				$tgl_transaksi = $row['tgl_transaksi'];
				$total_transaksi = $row['total_transaksi'];
				$id_detail_transaksi  = $row['id_detail_transaksi'];
				$id_menu  = $row['id_menu'];
				$nama_menu  = $row['nama_menu'];
				$gambar  = $row['gambar'];
				$harga  = $row['harga'];
				$jumlah = $row['jumlah'];
					
				
			?>
				<div  class="fh5co-item">
					
					<a href="#">
					<a href="<?php echo link ?>/transaksi/del/<?php echo $id_detail_transaksi  ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus menu ini?')" class="box-hapus " ><i class="fa fa-remove"></i></a>
					<img src="<?php echo link ?>/../admin/file/menu/<?php echo $gambar ?>" class="img-responsive" alt="<?php echo $nama_menu ?>">
					<h3><?php echo $nama_menu ?></h3>
					<span class="fh5co-price">Rp<?php echo number_format($harga)  ?>,- </span>
					<span class="fh5co-price">Dipesan : <?php echo $jumlah ?></span>
					<span class="fh5co-price">Jumlah : Rp<?php echo number_format($harga*$jumlah) ?></span>
					<?php $total = $total+$harga*$jumlah; ?>
					</a>
				</div>
				
					<form  name="input" action="" method="POST" enctype="multipart/form-data" >
					<div class="form-group row">
						
						<div class="col-xs-12">
							
							<input onkeypress="return isNumberKey(event)" ng-model="jumlah_<?php echo $id_menu ?>" required type="number"  value="0" class="form-control"   placeholder="Pesan berapa?">
							<input  name="id_detail_transaksi" value="<?php echo $id_detail_transaksi ?>" required type="hidden"   >
							<input  name="jumlah" value="{{ jumlah_<?php echo $id_menu ?> }}" required type="hidden"  >
							<input  name="harga" value="<?php echo $harga ?>" required type="hidden"   >
							<p style="visibility:hidden" ng-init="harga_<?php echo $id_menu ?>=<?php echo $harga ?>"></p>
							
						</div>
					
					<div  class="col-xs-12 " ng-if="jumlah_<?php echo $id_menu ?>" >
						<span  class="price">{{qty = harga_<?php echo $id_menu ?> *  jumlah_<?php echo $id_menu ?>  | currency  }},-</span>
						<input  required type="submit"  value="Simpan" class="btn btn-primary btn-block" name="save">
					</div>
					</div>
					</form>
					
			<?php } if ($count == 0) { ?>
				<div class="fh5co-item">
					<a >	
					<h3>Tidak Ada Data / Gagal di Load</h3>
					<span class="fh5co-price">Coba Lagi!<span>
					</a>
				</div>
			<?php }	?>	
			<div class="fh5co-price" style="text-align:center;background:#ddd;font-weight:bold">TOTAL : Rp<?php echo number_format($total) ?></div>
			<br>
			<div  class="form-group" >
						<a onclick="return confirm('Apakah Anda yakin sudah tidak memesan lagi?')" href="<?php echo link ?>/transaksi/selesai/<?php echo $_SESSION['session_user'] ?>" class="col-xs-12 btn btn-success" >Selesai Pesan</a>
			</div>
			
			</div>
			
			
		</div>
	</div>
</div>






	<?php include temp."/footer.php"?>

</div>


	