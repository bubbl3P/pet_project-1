<?php
    include 'inc/header.php';
    // include 'inc/slider.php';
?>
<?php
    $login_check = Session::get('customer_login');
        if ($login_check) {
            header('Location:index.php');
        }
?>
<?php
    if($_SERVER['REQUEST_METHOD'] == 'POST'  && isset($_POST['submit'])){
        $insertCustomers = $cs->insert_customers($_POST);
    }
?>
<?php
    
    if($_SERVER['REQUEST_METHOD'] == 'POST'  && isset($_POST['login'])){
        $login_customers = $cs->login_customers($_POST);
    }
?>

<html>
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">

</head>
<body>
<div class="container rounded bg-white mt-5 mb-5">
    <div class="row">
        <div class="col-md-3 border-right">
<!--            <div class="d-flex flex-column align-items-center text-center p-3 py-5">-->
<!--                <img class="rounded-circle mt-5" src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcQF2psCzfbB611rnUhxgMi-lc2oB78ykqDGYb4v83xQ1pAbhPiB&usqp=CAU">-->
<!--                <span class="font-weight-bold"></span>-->
<!--                <span class="text-black-50"></span>-->
<!--                <span> </span>-->
<!--            </div>-->
        </div>
        <div id = "signin" class="col-md-4 border-right">
            <div class="p-2 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right">Sign In</h4>
                </div>
                <?php
                	if(isset($insertCustomers)){
                		echo $insertCustomers;
                	}
                ?>
                <form method="post" action="">
                    <div class="row mt-2">
                        <div class="col-md-6">
                            <label class="labels">Name</label>
                            <input type="text" class="form-control" placeholder="first name" name="firstname">
                        </div>
                        <div class="col-md-6">
                            <label class="labels">Surname</label>
                            <input type="text" class="form-control"  placeholder="surname" name="surname">
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-12"><label class="labels">Email ID</label>
                            <input type="text" class="form-control" placeholder="enter email id" name="email">
                        </div>
                        <div class="col-md-12">
                            <label class="labels">PhoneNumber</label>
                            <input type="text" class="form-control" placeholder="enter phone number" name="phone">
                        </div>
                        <div class="col-md-12">
                            <label class="labels">Address</label>
                            <input type="text" class="form-control" placeholder="enter address" name="address">
                        </div>
                        <div class="col-md-12">
                            <label class="labels">Password</label>
                            <input type="password" class="form-control" placeholder="enter password" name="password">
                        </div>
                        <div class="col-md-12">
                            <label class="labels">Avatar</label>
                            <input type="file" class="form-control" name="image">
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-6">
                            <label class="labels">City</label>
                            <input type="text" class="form-control" placeholder="enter city" name="city">
                        </div>
                        <div class="col-md-6">
                            <label class="labels">Zipcode</label>
                            <input type="text" class="form-control"  placeholder=" enter zipcode" name="zipcode">
                        </div>
                    </div>
                    <div class="mt-5 text-center">
                        <button class="btn btn-primary profile-button" type="submit" name="submit">Sign In</button>
                    </div>
            </div>
                </form>
            </div>
        <div id="login" class="col-md-4">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center experience">
                    <h4>Login</h4>
                </div>
                <?php
                	if(isset($login_customers)){
                		echo $login_customers;
                	}
                ?>
                <br>
                <form action="" method="post">
                    <div class="col-md-12">
                        <label class="labels">Email</label>
                        <input type="text" class="form-control" placeholder="" name="email">
                    </div>
                    <br>
                    <div class="col-md-12">
                        <label class="labels">Password</label>
                        <input type="password" class="form-control" placeholder="" name="password">
                    </div>
                    <div class="mt-5 text-center" >
                        <button class="btn btn-primary profile-button" type="submit" name="login" >Login </button>
                        <button onclick="myFunction()" id="btnsignin" class="btn btn-primary profile-button" type="button">Sign In </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>
<script>
    function myFunction() {
        var x = document.getElementById("signin");
        if (x.style.display === "none" ) {
            x.style.display = "block";
        } else {
            x.style.display = "none";
        }
    }
    var x = document.getElementById("signin");
    setTimeout(function(){
        x.style.display = "none";
    })



</script>
<?php
    include 'inc/footer.php';
    
?>

