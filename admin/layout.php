

<style>
.tulisan {
    position: relative;
    display: inline-block;
    border-bottom: 1px dotted #232323;
}

.tulisan .tulisantext {
	font-size:12px;
    visibility: hidden;
    width: 100px;
    background-color: #232323;
    color: #fff;
    text-align: center;
    border-radius: 6px;
    padding: 5px 0;
    position: absolute;
    z-index: 1;
    bottom: 120%;
    left: 60%;
    margin-left: -55px;
	
}

.tulisan .tulisantext::after {
    content: "";
    position: absolute;
    top: 100%;
    left: 50%;
    margin-left: -5px;
    border-width: 5px;
    border-style: solid;
    border-color: #232323 transparent transparent transparent;
   
}

.tulisan:hover .tulisantext {
    visibility: visible;
	opacity: 1;
}
</style>
  
  
 <body class="hold-transition skin-red sidebar-mini " >
	<div class="wrapper">

	<?php include temp."/header.php" ?>
	
	<p ng-init="link:<?php echo link ?>"></p>
	
     <x ng-view>
	
          
	</x>
        </section><!-- /.content -->
		
		
		
		 <div ng-include="'template/footer.php'"></div>

</div><!-- /.content-wrapper -->

   

</body>
</html>