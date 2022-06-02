<?php
    include 'inc/header.php';


?>
<?php
$cont = new feedback();
if($_SERVER['REQUEST_METHOD'] == 'POST'  && isset($_POST['submit'])){

    $insert_feedback = $cont->insert_feedback($_POST);
}
?>

 <div class="main">
    <div class="content">
        <?php
        if(isset($insert_feedback)){
            echo $insert_feedback;
        }
        ?>

        <div class="section group">
				<div class="col span_2_of_3">
				  <div class="contact-form">
				  	<h2>Contact Us</h2>
					    <form method="post">
					    	<div>
						    	<span><label>NAME</label></span>
						    	<span><input type="text" value="" name="feedbackName" ></span>
						    </div>
						    <div>
						    	<span><label>E-MAIL</label></span>
						    	<span><input type="text" value="" name="feedbackEmail" ></span>
						    </div>
						    <div>
						     	<span><label>MOBILE.NO</label></span>
						    	<span><input type="text" value="" name="feedbackPhone"></span>
						    </div>
						    <div>
						    	<span><label>SUBJECT</label></span>
						    	<span><textarea name="feedbackContent"> </textarea></span>
						    </div>
						   <div>
						   		<span><input type="submit" name="submit" value="SUBMIT"></span>
						  </div>
					    </form>
				  </div>
  				</div>

			  </div>    	
    </div>
 </div>
 <?php
    include 'inc/footer.php';
    
?>

