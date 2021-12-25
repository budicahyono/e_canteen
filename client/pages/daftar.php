
	<body  ng-controller="indexController">
	<div id="page" >
<?php include temp."/header.php";
	?>


<div style="margin-top:100px" ></div>

<div   id="fh5co-featured-menu" class="fh5co-section"  >
	<div class="container">
		<div class="row">
			<div class="col-md-12 fh5co-heading ">
				<h2>REGISTRASI USER</h2>
				
					
			</div>
			
			<div  class="col-md-3 col-sm-6 col-xs-6 col-xxs-12 fh5co-item-wrap " >
			
				
					<form  name="input" action="<?php echo link ?>/daftar" method="POST" enctype="multipart/form-data" >
					<div class="form-group row">
						
						<div class="col-xs-12">
						<?php if (isset($_SESSION['pesan'])) { ?>
							<span class="price" style="font-size:20px"><?php echo $_SESSION['pesan'];session_destroy(); ?></span>
						<?php } ?>	
							<input name="nama_lengkap"   required type="text" class="form-control"   placeholder="Input Nama Lengkap">
							<input name="username"   required type="text" class="form-control"   placeholder="Input Username">
							<input name="password"  required type="password" class="form-control"   placeholder="Input Password">
							
						</div>
					
					
					</div>
					

					<div  class="form-group" >
								<button id="button"  type="submit" name="save" class="col-xs-12 btn btn-success" >Register</button>
					</div>
					</form>
					  <br>
					  <br>
		  <p class="text-center">Jika sudah terdaftar silahkan login <a href=".">disini</a ></p>
			</div>
			
			
		</div>
	</div>
</div>






	<?php include temp."/footer.php"?>

</div>


	