<?php
    include 'lib/session.php';
    // check session, ko cho qua thang trang admin(check login dung => index, sai thi ve login, biet duong dan van k chay vao index dc)
    Session::init();
?>
<?php
 	include_once 'lib/database.php';
 	include_once 'helpers/format.php';

	spl_autoload_register(function ($className) {
        include_once "classes/" . $className.".php";
    });

	$db = new Database();
	$fm = new Format();
	$ct = new cart();
	$us = new user();
	$cat = new category();
	$cs = new customer();
	$product = new product();
    $contact = new feedback();
 ?>



<?php
  header("Cache-Control: no-cache, must-revalidate");
  header("Pragma: no-cache"); 
  header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); 
  header("Cache-Control: max-age=2592000");
?>

<!DOCTYPE HTML>
<head>
<title>Shop LAS</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link href="css/style.css" rel="stylesheet" type="text/css" media="all"/>
<link href="css/menu.css" rel="stylesheet" type="text/css" media="all"/>
<link href="css/zoomImage.css" rel="stylesheet" type="text/css" media="all"/>
<script src="js/jquerymain.js"></script>
<script src="js/script.js" type="text/javascript"></script>
<script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script type="text/javascript" src="js/nav.js"></script>
<script type="text/javascript" src="js/zoom-image.js"></script>
<script type="text/javascript" src="js/main.js"></script>
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script> 
<script type="text/javascript" src="js/nav-hover.js"></script>
    <script src="jquery.js"></script>
    <script src="jquery.rateyo.js"></script>
    <script src="/path/to/cdn/jquery.min.js"></script>
    <script src="js/Nzoom.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<link href='http://fonts.googleapis.com/css?family=Monda' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Doppio+One' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="css/zoom.css" type="text/css">

<script type="text/javascript">
  $(document).ready(function($){
    $('#dc_mega-menu-orange').dcMegaMenu({rowItems:'4',speed:'fast',effect:'fade'});
  });
</script>
</head>
<body>
  <div class="wrap">
		<div class="header_top">
			<div class="logo">
<!--				<a href="index.php"><img src="images/logoLAS.png" width="100" alt="" /></a>-->
			</div>
			  <div style="float: right" class="header_top_right">
			    <div class="search_box">
				    <form>
				    	<input type="text" value="Search for Products" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search for Products';}"><input type="submit" value="SEARCH">
				    </form>
			    </div>
			    <div class="shopping_cart">
					<div class="cart" style="width:195px">
						<a href="cart.php" title="View my shopping cart" rel="nofollow">
								<span class="cart_title">Cart:</span>
								<span class="no_product">
									<?php
									$check_cart = $ct->check_cart();
										if ($check_cart) {
						 					$sum = Session::get("sum");
											$qty = Session::get("qty");
											echo $fm->format_currency($sum).""." VNĐ ".' - '.'SL:'.$qty;
											}else{
											echo 'Empty';
									}
									?>
								</span>
							</a>
						</div>
			      </div>


				  <?php 
				  if(isset($_GET['customer_id'])){
					  $customer_id = $_GET['customer_id'];
					  $del_cart = $ct->del_all_data_cart();
					  $delCompare = $ct->del_compare($customer_id);
					  Session::destroy();
				  }
				  ?>

			   
		  
		 
		 
		 
		   
		 <div class="clear"></div>
	 </div>



	 <div class="clear"></div>
 </div>
<div class="menu">
	<ul id="dc_mega-menu-orange" class="dc_mm-orange">
        <li><a href="index.php">Home</a></li>
        <li><a href="products.php">Products</a> </li>
        <li><a href="topbrands.php">Top Brands</a></li>

	  <?php
	  $check_cart = $ct->check_cart();
	  if($check_cart==true){
		echo '<li><a href="cart.php">Cart</a></li>';
		  
	  }else{
		  echo'';
	  }
	  ?>
	  <?php
	  $customer_id = Session::get('customer_id');
	  $check_order = $ct->check_order($customer_id );
	  if($check_order==true){
		echo '<li><a href="orderdetails.php">Ordered</a></li>';
		  
	  }else{
		  echo'';
	  }
	  ?>
	  
	  <?php
	  $login_check = Session::get('customer_login');
		if($login_check==false){
			echo '';
		}else {
			echo '<li><a href="profile.php">Profile</a> </li>';
		}
	  ?>
	  
	  <?php
	  $login_check = Session::get('customer_login');
		if($login_check==true){
			echo ' <li><a href="compare.php">Compare</a> </li>';
		}
	 	?>
	  <?php
	  $login_check = Session::get('customer_login');
		if($login_check==true){
			echo ' <li><a href="wishlist.php">Wishlist</a> </li>';
		}
	 	?>
        <?php
        $login_check = Session::get('customer_login');
        if($login_check==false){
            echo '';
        }else {
            echo '<li><a href="contact.php">Contact</a> </li>';
        }
        ?>

        <?php
        $login_check = Session::get('customer_login');
        if($login_check ==false){
            echo '<li><a href = "login.php">Login</a></li>';
        }else{
            echo '<li><a href="?customer_id='.Session::get('customer_id').'">Logout</a></li>';
        }
        ?>

	  <div class="clear"></div>
	</ul>
</div>