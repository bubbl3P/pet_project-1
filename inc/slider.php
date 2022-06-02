<?php


?>
<div class="header_bottom">
		<div class="header_bottom_left">
            <div class="section group">
                <?php
                $getslide_left = $product->slide_left();
                if($getslide_left){
                    while ($resultslide_right = $getslide_left->fetch_assoc()){
                        ?>
                <div style="margin-left: 5px" class="listview_1_of_2 images_1_of_2">
                    <div class="listimg listimg_2_of_1">
                        <a href="details.php?proid=<?php echo $resultslide_right['productID']?>"><img src="admin/uploads/<?php echo $resultslide_right['image']?>" width="50px" alt=""/></a>
                    </div>
                    <div class="text list_2_of_1">
                        <p style="width: 100px;
                             overflow: hidden;
                             white-space: nowrap;
                             text-overflow: ellipsis;
                             color: purple;"><?php echo $resultslide_right['productName'] ?></p>
                        <p style="margin-top: 30px; color: red"><?php echo $fm->format_currency($resultslide_right['price']) ." "."VNĐ" ?></p>
                        <div type= "submit" class="button"><span><a href="details.php?proid=<?php echo $resultslide_right['productID']?>">Add to cart</a></span></div>
                    </div>
                </div>
                <?php
                    }
                }
                ?>
            </div>
        </div>
<!-- FlexSlider -->
</div>
<div class="header_bottom">
    <div class="header_bottom_left">
        <div class="section group">
            <?php
            $getslide_left = $product->slide_right();
            if($getslide_left){
                while ($resultslide_right = $getslide_left->fetch_assoc()){
                    ?>
                    <div style="margin-left: 5px" class="listview_1_of_2 images_1_of_2">
                        <div class="listimg listimg_2_of_1">
                            <a href="preview.php"><img src="admin/uploads/<?php echo $resultslide_right['image']?>" width="50px" alt=""/></a>
                        </div>
                        <div class="text list_2_of_1">
                            <p style="width: 100px;
                             overflow: hidden;
                             white-space: nowrap;
                             text-overflow: ellipsis;
                             color: purple;"><?php echo $resultslide_right['productName'] ?></p>
                            <p style="margin-top: 30px; color: red"><?php echo $fm->format_currency($resultslide_right['price']) ." "."VNĐ" ?></p>
                            <div class="button"><span><a href="details.php?proid=<?php echo $resultslide_right['productID']?>">Add to cart</a></span></div>
                        </div>
                    </div>
                    <?php
                }
            }
            ?>
        </div>
    </div>
    <!-- FlexSlider -->
</div>
<div class="clear"></div>
