<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php  require '../classes/brand.php'?>
<?php  require '../classes/category.php'?>
<?php  require '../classes/product.php'?>

<?php
    $pd = new product();
    if($_SERVER['REQUEST_METHOD'] == 'POST'  && isset($_POST['submit'])){
        
        $insertProduct = $pd->insert_product($_POST, $_FILES);
}
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Thêm Sản Phẩm</h2>
        <div class="block"> 
        <?php
                if(isset($insertProduct)){
                    echo $insertProduct;
                }
                ?>                 
         <form action="productadd.php" method="post" enctype="multipart/form-data">
            <table class="form">
               
                <tr>
                    <td>
                        <label>Tên</label>
                    </td>
                    <td>
                        <input type="text" name="productName" placeholder="Enter Product Name..." class="medium" />
                    </td>
                </tr>
				<tr>
                    <td>
                        <label>Danh mục</label>
                    </td>
                    <td>
                        <select id="select" name="category">
                            <option>---Chọn Danh Mục---</option>
                            <?php
                            $cat = new category();
                            $catlist = $cat->show_category();
                            if ($catlist) {

                                while ($result = $catlist->fetch_assoc()) {
                                    ?>

                            <option value="<?php echo $result['catID'] ?>"><?php echo $result['catName'] ?></option>

                            <?php
                                }
                            }
                            ?>
                        </select>
                    </td>
                </tr>
				<tr>
                    <td>
                        <label>Thương hiệu</label>
                    </td>
                    <td>
                        <select id="select" name="brand">
                            <option>Chọn thương hiệu</option>
                            <?php
                            $brand = new brand();
                            $brandlist = $brand->show_brand();
                            if ($brandlist) {

                                while ($result = $brandlist->fetch_assoc()) {
                                    ?>

                            <option value="<?php echo $result['brandID'] ?>"><?php echo $result['brandName'] ?></option>

                            <?php
                                }
                            }
                            ?>
                        </select>
                    </td>
                </tr>
				
				 <tr>
                    <td style="vertical-align: top; padding-top: 9px;">
                        <label>Chú thích</label>
                    </td>
                    <td>
                        <textarea name ="product_desc" class="tinymce"></textarea>
                    </td>
                </tr>
				<tr>
                    <td>
                        <label>Giá</label>
                    </td>
                    <td>
                        <input type="text" name="price" placeholder="Enter Price..." class="medium" />
                    </td>
                </tr>
            
                <tr>
                    <td>
                        <label>Tải ảnh</label>
                    </td>
                    <td>
                        <input type="file" name="image"/>
                    </td>
                </tr>
				
				<tr>
                    <td>
                        <label>Dòng sản phẩm</label>
                    </td>
                    <td>
                        <select id="select" name="type">
                            <option>Lựa chọn:</option>
                            <option value="0">Nổi bật</option>
                            <option value="1">Không nổi bật</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Status Slide</label>
                    </td>
                    <td>
                        <select id="selectSlide" name="statusSlide">
                                <option>Lựa chọn:</option>
                                <option value="0">Show Left</option>
                                <option value="1">Hide</option>
                                <option value="2">Show Right</option>
                        </select>
                    </td>
				</tr>
                    <td></td>
                    <td>
                        <input type="submit" name="submit" Value="Lưu" />
                    </td>
                </tr>
            </table>
            </form>
        </div>
    </div>
</div>
<!-- Load TinyMCE -->
<script src="js/tiny-mce/jquery.tinymce.js" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function () {
        setupTinyMCE();
        setDatePicker('date-picker');
        $('input[type="checkbox"]').fancybutton();
        $('input[type="radio"]').fancybutton();
    });
</script>
<!-- Load TinyMCE -->
<?php include 'inc/footer.php';?>


