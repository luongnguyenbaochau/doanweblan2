<?php
include "config/config.php";
include ROOT."/include/function.php";
if (!isset($_SESSION)) session_start();
spl_autoload_register("loadClass");
$db= new Db();

//unset($_SESSION["cart"]);//exit;
$cart=new Cart();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<!--head-->	
 <?php
  include ROOT."/include/head.php";
  ?>
</head>
<body>
  <div class="wrap">
	<div class="header">
		<div class="headertop_desc">
        <?php
  			include ROOT."/include/headertop.php";
  		?>
			<!--headertop-->	
		</div>
		<div class="header_top">
			<!--header-->
          <?php
  			include ROOT."/include/header.php";
			
			
  		?>  	
  		</div>
	<div class="header_bottom">
		<!--menu-->	
        <?php
  			include ROOT."/include/menu.php";
  		?>
	     </div>	     
	<div class="header_slide">
			<div class="header_bottom_left">					<!--menutrai-->				
				<?php
  					include ROOT."/include/menutrai.php";
  				?>		
	  	     </div><!--menutrai-->	
					 <div class="header_bottom_right">					 
					 	 <div class="slider">					    						 <!--slide-->	
							 <?php
  					include ROOT."/include/slide.php";
  							?>
					 		<div class="clear"></div>					       
		         		</div>
		      		</div>
		   <div class="clear"></div>
		</div>
   </div>
 <div class="main">
 	<div class="content">
    	<!--content-->
        <?php
  
	include ROOT."/module/cart/index.php";
  ?>	
    </div>
 </div>
</div>
   <div class="footer">
   	  <!--footer-->
      <?php
  			include ROOT."/include/footer.php";
  		?>	
        <div class="copy_right">
				<p>&copy; 2017 computershop.Design by <a href="#">4 sinh viên</a></p>
		   </div>
    </div>
    <script type="text/javascript">
		$(document).ready(function() {			
			$().UItoTop({ easingType: 'easeOutQuart' });
			
		});
	</script>
    <a href="#" id="toTop"><span id="toTopHover"> </span></a>
</body>
</html>

