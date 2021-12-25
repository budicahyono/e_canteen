
	<body  ng-controller="indexController">
	<div id="page" >
<?php include temp."/header.php"?>


<div style="margin-top:100px" ></div>

<div  style="margin-bottom:100px" id="fh5co-featured-menu" class="fh5co-section"  >
	<div class="container">
		<div class="row">
			<div class="col-md-12 fh5co-heading ">
				<h2>Terima Kasih</h2>
				
					
			</div>
			
			<div  class="col-md-3 col-sm-6 col-xs-6 col-xxs-12 fh5co-item-wrap " >
			
			
				<div  class="fh5co-item">
					<a >	
					<h3>Pesan Telah diproses</h3>
					<span class="fh5co-price">Harap Tunggu!  <span>
					</a>
					<h3>Daftar Transaksi Anda</h3>
					
				</div>
				<table class="table table1">
					<thead>
						
						<tr class="daftar">
							<th  style="width:50%;"></th>
							<th  style="width:13%;"></th>	
							<th class="text-center" style="width:27%;"></th>	
							<th class="text-center" ></th>
						</tr>
					</thead>
					<tbody>	
					<?php
					while ($row = mysqli_fetch_array($result1)) {
						$id_transaksi = $row['id_transaksi'];
						$id_menu = $row['id_menu'];
						$nama_menu = $row['nama_menu'];
						$harga = $row['harga'];
						$jumlah = $row['jumlah'];
						$total_harga = $row['total_harga'];
						$total_transaksi = $row['total_transaksi'];
						$ada = "ada";
					
						
					?>		
						
						<tr class="soft daftar text-capitalize  text-left">
							
							<td class="text-left"><?php echo $nama_menu; ?></td>
							<td class="text-center" style="vertical-align:top"><?php echo $jumlah; ?> x</td>
							<td style="text-align:right;vertical-align:top">Rp<?php echo number_format($harga); ?> = </td>
							<td style="vertical-align:top">Rp<?php echo number_format($total_harga); ?> </td>
						
						</tr>	
						
						
					<?php 
					} if ($count <= 0) {
					?>			
						<tr class="soft daftar text-capitalize text-center">
							<td colspan="8">TIDAK ADA DATA</td>
						</tr>	
					<?php } ?>	
						<tr class="soft daftar text-capitalize  ">
							<td style="text-align:right" colspan="3">Subtotal =</td>
							<td>Rp<?php echo number_format($total_transaksi); ?> </td>
						</tr>		
					 </tbody>
					 
			</table>
				
				
			
			</div>
			
			
		</div>
	</div>
</div>






	<?php include temp."/footer.php"?>

</div>


	