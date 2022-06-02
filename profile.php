<style>
    body{background: rgb(99, 39, 120)}.form-control:focus{box-shadow: none;border-color: #BA68C8}.profile-button{background: rgb(99, 39, 120);box-shadow: none;border: none}.profile-button:hover{background: #682773}.profile-button:focus{background: #682773;box-shadow: none}.profile-button:active{background: #682773;box-shadow: none}.back:hover{color: #682773;cursor: pointer}.labels{font-size: 11px}.add-experience:hover{background: #BA68C8;color: #fff;cursor: pointer;border: solid 1px #BA68C8}
</style>
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
    // if($_SERVER['REQUEST_METHOD'] == 'POST'  && isset($_POST['submit'])){
    //     $quantity = $_POST['quantity'];
    //     $Addtocart = $ct->add_to_cart($quantity,$id);
    // }

    ?>

<html>
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">

</head>
<body>
<?php

$id = Session::get('customer_id');
if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['save'])){

    $UpdateCustomers = $cs->update_customers($_POST,$id);
}

?>

  <form method="post" action="" enctype="multipart/form-data">

            <?php
                $id = Session::get('customer_id');
                $get_customers =$cs->show_customers($id);
                if($get_customers) {
                    while ($result = $get_customers->fetch_assoc())
            {
            ?>

            <div class="container rounded bg-white mt-5 mb-5">
                <div class="row">
                    <div class="col-md-3 border-right">
                        <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                            <img class="rounded-circle mt-5" src="<?php echo $result['image']; ?>">
                            <span class="font-weight-bold"></span>
                            <span class="text-black-50"></span>
                            <span> </span>
                        </div>
                    </div>
                    <div class="col-md-5 border-right">
                        <div class="p-3 py-5">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h4 class="text-right">Profile Settings</h4>
                            </div>

                            <div class="row mt-2">
                                <div class="col-md-6">
                                    <label class="labels">Fistname</label>
                                    <input type="text" class="form-control" name="firstname"  placeholder="first name" value="<?php echo $result['firstname'] ?>">
                                </div>
                                <div class="col-md-6">
                                    <label class="labels">Surname</label>
                                    <input type="text" class="form-control" name="surname" value="<?php echo $result['surname'] ?>" placeholder="surname">
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-12">
                                    <label class="labels">PhoneNumber</label>
                                    <input type="text" class="form-control"name="phone" placeholder="enter phone number" value="<?php echo $result['phone'] ?>">
                                </div>
                                <div class="col-md-12">
                                    <label class="labels">Address</label>
                                    <input type="text" class="form-control" name="address" placeholder="enter address" value="<?php echo $result['address'] ?>">
                                </div>
                                <div class="col-md-12">
                                    <label class="labels">Email ID</label>
                                    <input type="text" class="form-control" name="email" placeholder="enter email id" value="<?php echo $result['email'] ?>" disabled>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-6">
                                    <label class="labels">City</label>
                                    <input type="text" class="form-control" name="city" placeholder="country" value="<?php echo $result['city'] ?>">
                                </div>
                                <div class="col-md-6">
                                    <label class="labels">Zipcode</label>
                                    <input type="text" class="form-control" name="zipcode" value="<?php echo $result['zipcode'] ?>" placeholder="state">
                                </div>
                            </div>
                            <div id="pass" class="row-mt-3">
                                <div class="col-md-12">
                                    <label class="labels">Password</label>
                                    <input type="password" class="form-control" name="text" placeholder="enter email id" value="<?php echo $result['password'] ?>">
                                </div>
                            </div>
                            <div class="mt-5 text-center">
                                <td colspan="3"><input type="submit" name="save" value="Save" class="grey"></input></td>
                                <td colspan="3"><input onclick= "myFunction()" type="submit" name="changepass" value="Change Password" class="grey"></input></td>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
           <?php
            }
                }
            ?>
        </form>

</body>
</html>

<script>
    function myFunction() {
        var x = document.getElementById("pass");
        if (x.style.display === "none" ) {
            x.style.display = "block";
        } else {
            x.style.display = "none";
        }
    }
    var x = document.getElementById("pass");
    setTimeout(function(){
        x.style.display = "none";
    })
</script>

<?php
    include 'inc/footer.php';
?>
