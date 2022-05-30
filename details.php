
<?php
    include 'inc/header.php';
    // 	include 'inc/slider.php';
?>
<?php
if(!isset($_GET['proid']) || $_GET['proid']==NULL) {
	// echo "<script>window.location ='404.php'</script>";
 }else{
	$id = $_GET['proid'];
 }
$customer_id = Session::get('customer_id');
if($_SERVER['REQUEST_METHOD'] == 'POST'  && isset($_POST['compare'])){
    $productid = $_POST['productid'];
	$insertCompare = $product->insertCompare($productid,$customer_id);
}
if($_SERVER['REQUEST_METHOD'] == 'POST'  && isset($_POST['wishlist'])){
    $productid = $_POST['productid'];
	$insertWishlist = $product->insertWishlist($productid,$customer_id);
}
if($_SERVER['REQUEST_METHOD'] == 'POST'  && isset($_POST['submit'])){
    $quantity = $_POST['quantity'];
	$insertCart = $ct->add_to_cart($quantity,$id);
}

?>

 <div class="main">
    <div class="content">
    	<div class="section group">
<?php
$get_product_details = $product->get_details($id);
if ($get_product_details) {
    while ($result_details = $get_product_details->fetch_assoc()) {
        ?>
		<div class="cont-desc span_1_of_2">				
					<div class="grid images_3_of_2">
						<img src="admin/uploads/<?php echo $result_details ['image'] ?>" alt="" />
					</div>
				<div class="desc span_3_of_2">
					<h2><?php echo $result_details ['productName'] ?></h2>
					<p><?php echo $fm->textShorten($result_details ['product_desc'] ,150)?></p>					
					<div class="price">
						<p>Price: <span><?php echo $result_details ['price'] ." "."VNĐ"?></span></p>
						<p>Category: <span><?php echo $result_details ['catName'] ?></span></p>
						<p>Brand:<span><?php echo $result_details ['brandName'] ?></span></p>
					</div>
				<div class="add-cart">
					<form action="" method="post">
						<input type="number" class="buyfield" name="quantity" value="1" min="1"/>
						<input type="submit" class="buysubmit" name="submit" value="Buy Now"/>
						
					</form>		
					<?php
						if(isset($Addtocart)){
							echo '<span style="color:red;font-size:18px">Product Already added!!</span>';
						}
						?>		
				</div>
				<div class="add-cart">
					<div class="button_details">
					<!-- Add to Compare -->
					<form action="" method="POST">
					<!-- <a href="?wlist=<?php echo $result_details['productID']?>"  class="buysubmit">Save to Wishlist</a> -->
					<!-- <a href="?compare=<?php echo $result_details['productID']?>"  class="buysubmit">Compare Product</a> -->
					<input type="hidden"  name="productid" value="<?php echo $result_details['productID']?>"/>
					
					
					<?php
					$login_check = Session::get('customer_login');
						if($login_check){
							echo '<input type="submit" class="buysubmit" name="compare" value="Compare Product"/>'.'   ';
						}else{
							echo '';
						}
					?>
					
					</form>
					<!-- Save to WishList -->
					<form action="" method="POST">
					<!-- <a href="?wlist=<?php echo $result_details['productID']?>"  class="buysubmit">Save to Wishlist</a> -->
					<!-- <a href="?compare=<?php echo $result_details['productID']?>"  class="buysubmit">Compare Product</a> -->
					<input type="hidden"  name="productid" value="<?php echo $result_details['productID']?>"/>
					
					
					<?php
					$login_check = Session::get('customer_login');
						if($login_check){
							echo '<input type="submit" class="buysubmit" name="wishlist" value="Save To Wishlist"/>';
						}else{
							echo '';
						}
					?>
					
					</form>
					</div>
					<div class="clear"></div>
					<p>
					<?php
					if(isset($insertCompare)){
						echo $insertCompare;
					}
					?>
					<?php
					if(isset($insertWishlist)){
						echo $insertWishlist;
					}
					?>
					</p>
					
					
				</div>
				
			</div>
			<div class="product-desc">
			<h2>Product Details</h2>
			<p><?php echo $fm->textShorten($result_details ['product_desc'] ,500)?></p>		
	    </div>
				
	</div>
	<?php
    }
}
	?>
				<div class="rightsidebar span_3_of_1">
					<h2>CATEGORIES</h2>
					<ul>
						<?php
						$getall_category = $cat->show_category_fontend();
                        if ($getall_category) {
                            while ($result_allcat = $getall_category->fetch_assoc()) {
                                ?>
				      <li><a href="productbycat.php?catid=<?php echo $result_allcat['catID']?>"><?php echo $result_allcat['catName']?></a></li>
				      <?php
                            }
                        }
					  ?>
    				</ul>
    	
 				</div>
 		</div>
 	</div>
<?php
    include 'inc/footer.php';
    
?>




