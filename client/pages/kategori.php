
	<body  ng-controller="indexController">
	<div id="page" >
<?php include temp."/header.php"?>


<div style="margin-top:100px" ></div>

<div style="margin-bottom:-100px"  id="fh5co-featured-menu" class="fh5co-section"  >

	<div class="container">
		<div class="row">
			<div class="col-md-12 fh5co-heading">
				<h2 class="text-capitalize" ng-repeat="data1 in kategori | filter : {'id_kategori' : '<?php echo $id ?>' }">{{data1.nama_kategori}}</h2>
					
			</div>
			<div  class="col-md-3 col-sm-6 col-xs-6 col-xxs-12 fh5co-item-wrap " ng-repeat="data2 in katalog_one ">
			
				<div class="fh5co-item">
					<span ng-show="data2.status == 'habis' "  class="box-bg img-responsive" onclick="return alert('Menu ini sudah habis!!')"></span>
					
					<a href="<?php echo link ?>/pilih/menu/{{data2.id_menu}}" style="display:block" >
					<span ng-show="data2.status == 'habis' " class="box-label " >{{data2.status}}</span>
					
					<img  style="height:200px;width:100%"  src="<?php echo link ?>/../admin/file/menu/{{data2.gambar}}" class="img-responsive" alt="{{data2.nama_menu}}">
					<h3>{{data2.nama_menu}}</h3>
					<span class="fh5co-price">{{data2.harga | currency }},-</span>
					</a>
					
					
				</div>
				<div style="margin-bottom:10px">&nbsp;</div>
			</div>
			<div   class="col-md-3 col-sm-6 col-xs-6 col-xxs-12 fh5co-item-wrap animate-box" ng-show="katalog_one.length==0">
				<div class="fh5co-item">
					<a >	
					<h3>Tidak Ada Data / Anda sudah memilihnya</h3>
					<span class="fh5co-price">Coba Lagi!<span>
					</a>
				</div>
			</div>
			
		</div>
	</div>
</div>



	<?php include temp."/footer.php"?>

</div>
	
	