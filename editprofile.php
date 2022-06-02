
<?php
    include 'inc/header.php';
    // include 'inc/slider.php';
?>
<?php
	  $login_check = Session::get('customer_login');
		if($login_check==false){
			header('Location:login.php');
		}
?>
<?php
    // if(!isset($_GET['proid']) || $_GET['proid']==NULL) {
    //     echo "<script>window.location ='404.php'</script>";
    // }else{
    //     $id = $_GET['proid'];
    // }
    $id = Session::get('customer_id');
    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['save'])){
        
        $UpdateCustomers = $cs->update_customers($_POST,$id);
        header('Location:offlinepayment.php');
    }

 ?>
 <div class="main">
    <div class="content">
    	<div class="section group">
        <div class="content_top">
            <div class="heading">
                <h3>Update Profile Customers</h3>
            </div>
            <div class="clear"></div>
        </div>
        <form action="" method="post">
            
        <table class="tblone">
            
            
            <?php
                if(isset($UpdateCustomers)){
                    echo '<td colspan="3">'.$UpdateCustomers.'</td>';
                }
            ?>
               
        
            <?php 
                $id = Session::get('customer_id');
                $get_customers =$cs->show_customers($id);
                if($get_customers){
                    while($result = $get_customers->fetch_assoc()){

            ?>
        <tr>
            <td>Firstname</td>
            <td>:</td>
            <td><input type="text" name="firstname" value="<?php echo $result['firstname'] ?>"></td>
            
        </tr>
                        <tr>
                            <td>Surname</td>
                            <td>:</td>
                            <td><input type="text" name="surname" value="<?php echo $result['surname'] ?>"></td>

                        </tr>
        
        <tr>
            <td>Phone</td>
            <td>:</td>
            <td><input type="text" name="phone" value="<?php echo $result['phone']?>"></td>
            </td>
        </tr>
        
        <tr>
            <td>Zipcode</td>
            <td>:</td>
            <td><input type="text" name="zipcode" value="<?php echo $result['zipcode']?>"></td>
            </td>
        </tr>
        <tr>
            <td>Email</td>
            <td>:</td>
            <td><input type="text" name="email" value="<?php echo $result['email']?>"></td>
            </td>
        </tr>
        <tr>
            <td>Address</td>
            <td>:</td>
            <td><input type="text" name="address" value="<?php echo $result['address']?>"></td>
            </td>
        </tr>
        <tr>
            <td colspan="3"><input type="submit" name="save" value="Save" class="grey"></input></td>
            
        </tr>
        <?php
            }
        }
        ?>
        </table>
        </form>
 		    </div>
 		</div>
 	</div>
<?php
    include 'inc/footer.php';
    
?>




