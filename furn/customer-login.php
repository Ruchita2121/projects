<!DOCTYPE html>
<html lang="en">
<?php
include 'function/functions.php';
include 'layout/head.php';
?>



    <div id="all">

        <div id="content">
            <div class="container">

                <div class="col-md-12">
                    <ul class="breadcrumb">
                        <li><a href="#">Home</a>
                        </li>
                        <li>Checkout - Login</li>
                    </ul>
                </div>
                <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
                	<div class="panel panel-default">

                			  <div class="panel-heading">
                					<h3 class="panel-title">Login</h3>
                			  </div>
                			  
                		<div class="panel-body">
                		   <form action="checkout.php" method="post">
                          <div class="form-group">
                                <input type="text" class="form-control" id="email-modal" placeholder="email" name="email">
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" id="password-modal" placeholder="password" name="pass">
                            </div>

                            <p class="text-center">
                                <button class="btn btn-primary" name="login"><i class="fa fa-sign-in"></i> Log in</button>
                            </p>

                        </form>
                        <p class="text-center text-muted">Not registered yet?</p>
                        <p class="text-center text-muted"><a href="register.php"><strong>Register now</strong></a>! It is easy and done in 1&nbsp;minute and gives you access to special discounts and much more!</p>
                		</div>
                	</div>
                	
                </div>
                
                <!-- /.col-md-9 -->
<div class="col-md-3">
                   
                 

                </div>
                <!-- /.col-md-3 -->

            </div>
            <!-- /.container -->
        </div>
        <!-- /#content -->
      <?php include 'layout/footer.php';?>



    <!-- *** SCRIPTS TO INCLUDE ***
 _________________________________________________________ -->
    <script src="js/jquery-1.11.0.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.cookie.js"></script>
    <script src="js/waypoints.min.js"></script>
    <script src="js/modernizr.js"></script>
    <script src="js/bootstrap-hover-dropdown.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/front.js"></script>


</body>

</html>

	
	<?php 
	 include 'admin/config/db.php';
	if(isset($_POST['login'])){
	
		$c_email = $_POST['email'];
		$c_pass = $_POST['pass'];
		
		$sel_c = "select * from customers where customer_pass='$c_pass' AND customer_email='$c_email'";
		
		$run_c = mysqli_query($con, $sel_c);
		
		$check_customer = mysqli_num_rows($run_c); 
		
		if($check_customer==0){
		
		echo "<script>alert('Password or email is incorrect, plz try again!')</script>";
		exit();
		}
	
		
		if($check_customer>0 ){
		
		
		$_SESSION['customer_email']=$c_email; 
		
		echo "<script>alert('You logged in successfully, Thanks!')</script>";
		echo "<script>window.open('checkout.php','_self')</script>";
		
		
		}
	}
	
	
	?>

	
