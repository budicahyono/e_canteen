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
		 
		
          	<div class="row">
			<section class="container-fluid ">
			
			
			  
		 <div class="box box-info">
                <div class="box-header with-border">
                  <i class="fa fa-desktop"></i>
                  <h3 class="box-title">EDIT KANTIN </h3>
                  
                </div>

                <div class="box-body panjang">
					
				
				<form name="input" action="" method="POST" enctype="multipart/form-data" >
					
					<div class="form-group row">
						<label style="padding:7px 0 0 15px" class="control-label col-xs-3">Kantin</label>
						<div class="col-xs-9">
							<input required type="text"  class="form-control" name="nama_kantin" value="<?php echo $nama_kantin ?>"  placeholder="Input Nama Kantin">
						</div>
					</div>
					
				
					 <div class="form-group pull-right">
						<input required type="submit"  value="Simpan" class="btn btn-primary" name="save">
						<a href="<?php echo link ?>/admin#/kantin"   class="btn btn-danger"  >Tutup</a>
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