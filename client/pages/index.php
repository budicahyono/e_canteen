
	<body  ng-controller="indexController">
	<div id="page" >
<?php include temp."/header.php";
	?>


<div style="margin-top:100px" ></div>
<br>
<div class='alert alert-success text-center'><?=$nama_kantin?></div>
<?php 
while ($row = mysqli_fetch_assoc($result)) {
			$id_kategori = $row['id_kategori'];
			$nama_kategori = $row['nama_kategori'];

			
		
?>
<div  style="margin-bottom:-50px" id="fh5co-featured-menu" class="fh5co-section "  >

	<div class="container">
		<div class="row">
			<div class="col-md-12 fh5co-heading ">
				<h2 class="text-capitalize"><?php echo $nama_kategori ?></h2>
				
					
			</div>
			
				
			<div  class="col-md-3 col-sm-6 col-xs-6 col-xxs-12 fh5co-item-wrap " ng-repeat="data in katalog | filter : {'id_kategori' : '<?php echo $id_kategori ?>' }">
					
				<div  class="fh5co-item">
					<span ng-show="data.status == 'habis' "  class="box-bg img-responsive" onclick="return alert('Menu ini sudah habis!!')"></span>
					
					<a href="pilih/menu/{{data.id_menu}}" style="display:block" >					
					<span ng-show="data.status == 'habis' " class="box-label " >{{data.status}}</span>
					
					<img style="height:200px;width:100%" src="<?php echo link ?>/../admin/file/menu/{{data.gambar}}" class="img-responsive" alt="{{data.nama_menu}}">
					<h3>{{data.nama_menu}}</h3>
					<span class="fh5co-price">{{data.harga  | currency }},-<span>
					</a>
					
				</div>
				<div style="margin-bottom:10px">&nbsp;</div>
			</div>
			
			<div   class="col-md-3 col-sm-6 col-xs-6 col-xxs-12 fh5co-item-wrap animate-box" ng-show="katalog.length==0">
				<div class="fh5co-item">
					<a >	
					<h3>Tidak Ada Data / Gagal di Load</h3>
					<span class="fh5co-price">Coba Lagi!<span>
					</a>
				</div>
			</div>
			
		</div>
	</div>
</div>
<?php 
	} 


?>





	<?php include temp."/footer.php"?>

</div>


	