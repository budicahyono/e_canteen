
 <header   class="main-header" ng-controller="headerController">

    <!-- Logo -->
    <a  class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
     <span class="logo-mini"><img class="img img-responsive" style="width:50px;padding:10px" src=""></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b style="color:#aeb6e6">E</b> <b>CANTEEN</b></span>
    </a>

    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <div ng-mouseleave="myFunc_a()" class="navbar-custom-menu">
        <ul class="nav navbar-nav">

         
          
         
          <!-- User Account: style can be found in dropdown.less -->
          <li  class="dropdown user user-menu">
            <a  ng-click="myFunc()"  style="cursor:pointer;background-color:{{bg}}" >
              <img src="<?php echo link ?>/<?php echo $dir_foto ?>" class="user-image foto" alt="<?php echo $username ?>">
              <span ><?php echo $username ?></span>
            </a>
            <ul   class="dropdown-menu" style="display:{{showMe}}">
              <!-- User image -->
              <li class="user-header ">
                
                <p class="text-capitalize" style="color:#313f8f">
				 <?php echo $nama_lengkap ?> <br><?php echo $nama_kantin ?> 
					
                </p>
              </li>
             
              <!-- Menu Footer-->
              <li class="user-footer">
               
                <div class="pull-right">
                  <a href="<?php echo link ?>/home/logout" class="btn btn-primary btn-flat">Log Out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          
        </ul>
      </div>
     

    </nav>
  </header>