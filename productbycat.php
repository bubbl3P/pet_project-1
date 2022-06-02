<?php
    include 'inc/header.php';
    // include 'inc/slider.php';
?>

<?php
 
 if(!isset($_GET['catid']) || $_GET['catid']==NULL) {
	 echo "<script>window.location ='404.php'</script>";
  }else{
	 $id = $_GET['catid'];
  }
 
 if($_SERVER['REQUEST_METHOD'] == 'POST'){
	 $catName = $_POST['catName'];
	 $updateCat = $cat->update_category($catName, $id);
}
?>
 <div class="main">
    <div class="content">
	
    	<div class="content_top">
		<?php
			  $name_cat = $cat->get_name_by_cat($id);
              if ($name_cat) {
                  while ($result_name = $name_cat->fetch_assoc()) {
                      
                   ?>
    		<div class="heading">
    		<h3>Category: <?php echo $result_name['catName'] ?></h3>
			</div>
			<?php
              }
			}
				?>
    		
    		<div class="clear"></div>	
    	</div>

		</div>
			
	      <div class="section group">
			  <?php
			  $productbycat = $cat->get_product_by_cat($id);
              if ($productbycat) {
                  while ($result = $productbycat->fetch_assoc()) {
                      
                   ?>
				<div class="grid_1_of_4 images_1_of_4">
					 <a href="preview-3.php"><img src="admin/uploads/<?php echo $result['image'] ?>" width="200px"alt="" /></a>
					 <h2><?php echo $result['productName']?> </h2>
					 <p><?php echo $fm->textShorten ($result['product_desc'], 150) ?></p>
					 <p><span class="price"><?php echo $fm->format_currency($result['price'])." "."VNĐ"?></span></p>
				     <div class="button"><span><a href="details.php?proid=<?php echo $result['productID']?>" class="details">Details</a></span></div>
				</div>
				<?php
              }
			}else{
				echo '<h3 style="color:red" >Category not available!</h3>';
			}
				?>
			</div>
    </div>
 </div>
 <?php
    include 'inc/footer.php';
    
?>

