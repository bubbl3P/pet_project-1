
	<div class="header_bottom">
		<div class="header_bottom_left">
			<div class="section group">
				<?php
				$getLastestDell = $product->getLastestDell();
				if($getLastestDell){
                    while ($resultdell = $getLastestDell->fetch_assoc()) {
                ?>

				<div class="listview_1_of_2 images_1_of_2">
					<div class="listimg listimg_2_of_1">
						 <a href="preview.php"> <img src="admin/uploads/<?php echo $resultdell['image'] ?>" width="50px" alt="" /></a>
					</div>
				    <div class="text list_2_of_1">
						<h2>Dell</h2>
						<p><?php echo $resultdell['productName'] ?></p>
						<div class="button"><span><a href="details.php?proid=<?php echo $resultdell['productID']?>">Add to cart</a></span></div>
				   </div>
			   </div>		
			   <?php
                    }
			   }
			   ?>	

			   <?php
				$getLastestSS = $product->getLastestSamsung();
				if($getLastestSS){
                    while ($resultss = $getLastestSS->fetch_assoc()) {
                ?>
				<div class="listview_1_of_2 images_1_of_2">
					<div class="listimg listimg_2_of_1">
						  <a href="preview.php"><img src="admin/uploads/<?php echo $resultss['image'] ?>" width="50px" alt="" /></a>
					</div>
					<div class="text list_2_of_1">
						  <h2>Samsung</h2>
						  <p><?php echo $resultss['productName'] ?></p>
						  <div class="button"><span><a href="details.php?proid=<?php echo $resultss['productID']?>">Add to cart</a></span></div>
					</div>
				</div>
				<?php
                    }
			   }
			   ?>	
			</div>
			<div class="section group">
			<?php
				$getLastestOppo = $product->getLastestOppo();
				if($getLastestOppo){
                    while ($resultoppo = $getLastestOppo->fetch_assoc()) {
                ?>
				<div class="listview_1_of_2 images_1_of_2">
					<div class="listimg listimg_2_of_1">
						 <a href="preview.php"> <img src="admin/uploads/<?php echo $resultoppo['image']?>"  width="50px" alt="" /></a>
					</div>
				    <div class="text list_2_of_1">
						<h2>Oppo</h2>
						<p><?php echo $resultoppo['productName'] ?></p>
						<div class="button"><span><a href="details.php?proid=<?php echo $resultoppo['productID']?>">Add to cart</a></span></div>
				   </div>
				   <?php
                    }
			   }
			   ?>	
			   </div>			

			   <?php
				$getLastesthuawei = $product->getLastestHuawei();
				if($getLastesthuawei){
                    while ($resulthuawei = $getLastesthuawei->fetch_assoc()) {
                ?>
				<div class="listview_1_of_2 images_1_of_2">
					<div class="listimg listimg_2_of_1">
						  <a href="preview.php"><img src="admin/uploads/<?php echo $resulthuawei['image']?>" width="50px"  alt="" /></a>
					</div>
					<div class="text list_2_of_1">
						  <h2>Huawei</h2>
						  <p><?php echo $resulthuawei['productName'] ?></p>
						  <div class="button"><span><a href="details.php?proid=<?php echo $resulthuawei['productID']?>">Add to cart</a></span></div>
					</div>
				</div>
				<?php
                    }
			   }
			   ?>	
			</div>
		  <div class="clear"></div>
		</div>
			 <div class="header_bottom_right_images">
		   <!-- FlexSlider -->
             
			<section class="slider">
				  <div class="flexslider">
					<ul class="slides">
						<li><img src="images/1.jpg" alt=""/></li>
						<li><img src="images/2.jpg" alt=""/></li>
						<li><img src="images/3.jpg" alt=""/></li>
						<li><img src="images/4.jpg" alt=""/></li>
				    </ul>
				  </div>
	      </section>
<!-- FlexSlider -->
	    </div>
	  <div class="clear"></div>
  </div>	