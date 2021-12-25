
<body class="print" onLoad="window.print()">  
<div style="width:100%;" class="preview">
	<div class="title">
	<b><?=$nama_kantin?></b><br>
	<small>Aplikasi E-Canteen Manokwari</small>	
	<div class="border"></div>
	</div>
	<p style="font-size:11px;text-align:center">Silahkan screen shoot tampilan ini sebagai bukti</p>
		<table class="table1">
					<thead>
						<tr class="daftar">
							<th  style="width:50%;"></th>
							<th  style="width:15%;"></th>	
							<th class="text-center" style="width:35%;"></th>	
							<th class="text-center" ></th>
						</tr>
					</thead>
					<tbody>	
					<?php
					while ($row = mysqli_fetch_array($result)) {
						$id_transaksi = $row['id_transaksi'];
						$id_menu = $row['id_menu'];
						$nama_menu = $row['nama_menu'];
						$harga = $row['harga'];
						$jumlah = $row['jumlah'];
						$total_harga = $row['total_harga'];
						$dibayar = $row['dibayar'];
						$kembali = $row['kembali'];
						$ada = "ada";
					
						
					?>		
						<tr class="soft daftar text-capitalize  text-left">
							
							<td class="text-left"><?php echo $nama_menu; ?></td>
							<td class="text-center" style="vertical-align:top"><?php echo $jumlah; ?> X</td>
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
						<tr ><td colspan="8" style="border-top:1px solid black;"></td></tr>
						<tr class="soft daftar text-capitalize  ">
							<td style="text-align:right" colspan="3">Subtotal =</td>
							<td>Rp<?php echo number_format($total_transaksi); ?> </td>
						</tr>		
						<tr class="soft daftar text-capitalize  ">
							<td style="text-align:right" colspan="3">Dibayar =</td>
							<td>Rp<?php echo number_format($dibayar); ?> </td>
						</tr>	
						<tr class="soft daftar text-capitalize  ">
							<td style="text-align:right" colspan="3">Kembali =</td>
							<td>Rp<?php echo number_format($kembali); ?> </td>
						</tr>	
					 </tbody>
					 
			</table>
	<br>			
	<div class="footer">TERIMA KASIH ATAS KUNJUNGAN ANDA </div>		
	<a href="<?=link?>/home#/transaksi"><< Kembali</a>		
	
</div>			