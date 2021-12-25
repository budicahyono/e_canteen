
	<body  ng-controller="indexController">
	<div id="page" >
<?php include temp."/header.php"?>


<div style="margin-top:100px" ></div>

<div style="margin-bottom:-50px"  id="fh5co-featured-menu" class="fh5co-section"  >
<div class='alert alert-success text-center'>Halo <?=$_SESSION['nama_user']?>, silahkan pilih kantin di bawah ini</div>
<p></p>
	<div class="container">
		<div class="row">
			<div class="col-md-12 fh5co-heading">
				<h2 class="text-capitalize" >DAFTAR KANTIN</h2>
					
			</div>
			<?php 
while ($row = mysqli_fetch_assoc($result)) {
			$id_kantin = $row['id_kantin'];
			$id_admin = $row['id_admin'];
			$nama_kantin = $row['nama_kantin'];
			$nama_lengkap = $row['nama_lengkap'];

			
		
?>
			<div  class="col-md-3 col-sm-6 col-xs-6 col-xxs-12 fh5co-item-wrap " >
			
				<div class="fh5co-item">
					
					<i style="font-size:100px;text-align:center;display:block"  class="fa fa-users"></i>
					<a href="<?php echo link ?>/kantin/pilih/<?=$id_admin?>" style="display:block" >
					
					<h3><?=$nama_kantin?></h3>
					<span class="fh5co-price"><?=$nama_lengkap?></span>
					</a>
					
					
				</div>
				<div style="margin-bottom:10px">&nbsp;</div>
			</div>
<?php }  if ($count == 0) {?>
			<div   class="col-md-3 col-sm-6 col-xs-6 col-xxs-12 fh5co-item-wrap animate-box" >
				<div class="fh5co-item">
					<a >	
					<h3>Tidak Ada Data / Anda sudah memilihnya</h3>
					<span class="fh5co-price">Coba Lagi!<span>
					</a>
				</div>
			</div>
<?php } ?>	
			
		</div>
	</div>
</div>



	<?php include temp."/footer.php"?>

</div>
	
	