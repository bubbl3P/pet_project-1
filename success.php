
<?php
    include 'inc/header.php';
    // 	include 'inc/slider.php';
?>
<?php
    if(isset($_GET['orderid']) && $_GET['orderid']=='order') {
       $customer_id = Session::get('customer_id');
       $insertOrder = $ct->insertOrder($customer_id);
       $del_cart = $ct->del_all_data_cart();
       header('Location:success.php');
    }
//  if($_SERVER['REQUEST_METHOD'] == 'POST'  && isset($_POST['submit'])){
//     $quantity = $_POST['quantity'];
// 	$Addtocart = $ct->add_to_cart($quantity,$id);
// }
?>
<style type="text/css">
     h2.success_order {
        text-align: center;
        color: red;
    }
    p.success_note{
        text-align: center;
        padding:8px;
        font-size:17px;
    }
    
</style>
<form action="" method="POST">
 <div class="main">
    <div class="content">
    	<div class="section group">
            <h2 class="success_order">Success Order</h2>
            <?php
            $customer_id = Session::get('customer_id');
            $get_amount = $ct->getAmountPrice($customer_id);
            if($get_amount){
                $amount = 0;
                while($result = $get_amount->fetch_assoc()){
                    $price = $result['price'];
                    $amount += $price;
                } 
            }
             ?>
            <p class="success_note">Total Price Your Have Bought From MyWebsite:  <?php $vat = $amount * 0.1;
              $total = $vat + $amount;
              echo $total.'VNĐ';
             ?>
            </p>
            <p class="success_note">We'll contact or as soon as possible. Please see your order detail here <a href="orderdetails.php">Click here!</a></p>
        
 	    </div>
 	</div>
</div>
 </form>
 
<?php
    include 'inc/footer.php';
    
?>




