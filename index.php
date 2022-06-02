<?php
    include 'inc/header.php';
    include 'inc/slider.php';
?>
<head>
    <title></title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
</head>

<div class="main">
    
    <div class="content">
        <div class="content_top">
            <div class="heading" >
                <h3 >Feature Products</h3>
            </div>
            <div class="clear"></div>
        </div>
        <div  style="margin-left: 60px" class="section group">
            <?php
                $product_feathered = $product->getproduct_feathered();
                if ($product_feathered) {
                    while ($result = $product_feathered->fetch_assoc()) {
            ?>
            <div style="height:510px; margin-left: 5px; margin-right: 40px" class="grid_1_of_4 images_1_of_4">
                <a href="index.php"><img src="admin/uploads/<?php echo $result['image'] ?>"  style="  display: block;
                                                                                                      height: 200px;
                                                                                                      width: 200px;
                                                                                                      margin-left: auto;
                                                                                                      margin-right: auto;" alt="" /></a>
                <h2 style = "width: 200px;
                            overflow: hidden;
                            white-space: nowrap;
                            text-overflow: ellipsis;"><?php echo $result['productName'] ?></h2>
                <p><?php echo $fm->textShorten ($result['product_desc'], 150) ?></p>
                <p><span class="price"><?php echo $fm->format_currency($result['price']) ." "."VNĐ" ?></span></p>
                <div class="button"><span><a href="details.php?proid=<?php echo $result['productID']?>" class="details">Details</a></span></div>
            </div>
            <?php
                    }
                }
            ?>
           
        </div>
        <div class="content_bottom">
            <div class="heading">
                <h3>New Products</h3>
            </div>
            <div class="clear"></div>
        </div>
        <div  style="margin-left: 60px" class="section group">
        <?php
                $product_new = $product->getproduct_new();
                if ($product_new) {
                    while ($result_new = $product_new->fetch_assoc()) {
            ?>
                <div style="height:510px;margin-left: 5px; margin-right: 40px" class="grid_1_of_4 images_1_of_4">
                <a href="details.php"><img src="admin/uploads/<?php echo $result_new['image'] ?>" style=" display: block;
                                                                                                          height: 200px;
                                                                                                          width: 200px;
                                                                                                          margin-left: auto;
                                                                                                          margin-right: auto;" alt="" /></a>
                <h2 style = "width: 200px;
                            overflow: hidden;
                            white-space: nowrap;
                            text-overflow: ellipsis;">
                    <?php echo $result_new['productName'] ?></h2>
                <p><?php echo $fm->textShorten ($result_new['product_desc'], 150) ?></p>
                <p><span class="price"><?php echo $fm->format_currency($result_new['price'])." "."VNĐ" ?></span></p>
                <div style="margin-top: 5px" class="button"><span><a href="details.php?proid=<?php echo $result_new['productID']?>">Details</a></span></div>
            </div>
            <?php
                    }
                }
            ?>
           
        </div>
    </div>
</div>

    <div class="content_botom">
        <div class="heading">
            <h3>Feedback</h3>
        </div>
        <div class="clear"></div>
    </div>

<?php
$conn = new mysqli("localhost", "root","","shop_las");
//$get_feedback = $sj->show_subject();
//$result_subject = $get_feedback->fetch_assoc();
$result_feedback = $conn->query("SELECT * FROM tbl_feedback");

?>
    <div id="demo" class="carousel slide" data-ride="carousel">
        <ul class="carousel-indicators">
            <?php
            $i = 0;
            foreach ($result_feedback as $row){
                $actives ='';
                if($i == 0 ){
                    $actives = 'active';
            }
            ?>
            <li data-target="#demo" data-slide-to="<?= $i;  ?>"  class="<?= $actives; ?>"></li>
            <?php $i++; } ?>
        </ul>
        <div class="carousel-inner">
            <?php
                $i = 0;
                foreach ($result_feedback as $row){
                    $actives ='';
                if($i == 0 ){
                    $actives = 'active';

            }
            ?>
            <div class="carousel-item <?= $actives; ?>">
                <img src="images/slidefeedback.png" alt="" width="1000" height="200">
                <div style="color: black; text-align: center" class="carousel-caption">
                    <h3>@<?= $row['feedbackName']; ?></h3>
                    <p><?= $row['feedbackContent']; ?></p>
                </div>
            </div>
            <?php $i++; } ?>

            <a class="carousel-control-prev" href="#demo" data-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </a>
            <a class="carousel-control-next" href="#demo" data-slide="next">
                <span class="carousel-control-next-icon"></span>
            </a>
    </div>
<?php
    include 'inc/footer.php';
    
?>

