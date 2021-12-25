
	<style>
	li a {
		cursor : pointer;
	}
	
	</style>
		<?php if ($page == "kantin") { ?>
		<a href="<?php echo link ?>/login/logout"  class="cart-box">&nbsp;&nbsp;<i class="fa fa-sign-out"></i>&nbsp;&nbsp;</a>
		<?php } else if ($page == "front") { ?>
		<a href="<?php echo link ?>/transaksi/order/<?php echo $_SESSION['session_user'] ?>" ng-if="transaksi.length!=0" class="cart-box"><i class="fa fa-fw fa-shopping-cart"></i>{{transaksi.length}}</a>	
		<?php } ?>
		
		<nav class="fh5co-nav" role="navigation">
				<!-- <div class="top-menu"> -->
					<div class="container">
						<div class="row">
							
							<div class="col-xs-12 text-center logo-wrap">
								<div id="fh5co-logo"><a href="<?php echo link ?>">{{judul}} </a></div>
							</div>
							
							<div class="col-xs-12 text-center menu-1 menu-wrap">
								<ul>
									<li class="has-dropdown" >
										<a  ng-show="transaksi.length==0" href="<?php echo link ?>/kantin">Pilih Kantin</a>
										
									</li>
									<li class="has-dropdown" >
										<a >Menu</a>
										<ul class="dropdown" >
											<li ng-repeat="data in kategori"><a class="text-capitalize" href="<?php echo link ?>/kategori/get/{{data.id_kategori}}">{{data.nama_kategori}}</a></li>
											<li ><a href="<?php echo link ?>/front">Semua</a></li>
										</ul>
									</li>
									
								</ul>
							</div>
							
						</div>
						
					</div>
				<!-- </div> -->
			</nav>