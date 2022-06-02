<?php
    include 'inc/header.php';

?>
<div class="main">
    <div class="row category-page-row">
        <div class="col larger-3 hide-for-medium">
            <div class="heading">
                <h3>Product</h3>
            </div>
            <div class="clear"></div>
        </div>
        <div style="margin-left: 60px" class="section group">
            <?php
            $product_all = $product->getproduct_all();
            if($product_all){
                while ($result_all = $product_all->fetch_assoc()){
                    ?>
                    <div style="height:510px;  margin-left: 5px; margin-right: 40px "  class="grid_1_of_4 images_1_of_4">
                        <a href="details.php"><img src="admin/uploads/<?php echo $result_all['image'] ?>" style=" display: block;
                                                                                                                  height: 200px;
                                                                                                                  width: 200px;
                                                                                                                  margin-left: auto;
                                                                                                                  margin-right: auto;" alt="" /></a>
                                <h2 style = "width: 200px;
                                             overflow: hidden;
                                             white-space: nowrap;
                                             text-overflow: ellipsis;">
                                        <?php echo $result_all['productName'] ?></h2>
                        <p><?php echo $fm->textShorten ($result_all['product_desc'], 150) ?></p>
                        <p><span class="price"><?php echo $fm->format_currency($result_all['price'])." "."VNĐ" ?></span></p>
                        <div class="button"><span><a href="details.php?proid=<?php echo $result_all['productID']?>">Details</a></span></div>
                    </div>
                    <?php
                }
            }
            ?>
        </div>

    </div>
</div>


 <?php
    include 'inc/footer.php';
?>

