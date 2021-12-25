

<body class="hold-transition login-page" >
 <?php if (isset($_POST['login'])) {echo $pesan;} else { ?>
 
  <div class="login-box white" style="margin-top:100px">
	<div class="login-title">E - Canteen Merchant</div>
  <div class="login-header">
	
  <!-- /.login-logo -->
  <div class="login-box-body">
  
 <h3 class="text-center">Login Merchant</h3>
	<br>
    <form action="" method="post">
      <div class="form-group has-feedback">
        <input required name="username" type="text" placeholder="Username"  class="form-control" autofocus>
        <span  class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input required name="password" type="password" placeholder="Password" class="form-control" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
     
          <button name="login" type="submit" class="btn btn-primary btn-block btn-flat">Log In</button>
		  <br>
		  <p class="text-center">Jika belum terdaftar silahkan daftar <a href="daftar">disini</a ></p>
    </form>
	
  </div>
  
  <!-- /.login-box-body -->

</div>
<div class="login-footer">
			<h6> Copyright &copy; <?php echo date('Y') ?> <a >E-Canteen</a> - Manokwari, Papua Barat. </h6>
  </div>
  </div>
 <?php }?> 
    
      

    
    
    
 
