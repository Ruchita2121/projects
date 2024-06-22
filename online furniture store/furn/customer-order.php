<!DOCTYPE html>
<html lang="en">
<?php 
    ob_start();
    session_start();
    require_once 'admin/config/db.php';
    if(!isset($_SESSION['customer']) & empty($_SESSION['customer'])){
        header('location: login.php');
    }
include 'layout/head.php';
$uid = $_SESSION['customerid'];
//$cart = $_SESSION['cart'];
?>





    <div id="all">

        <div id="content">
            <div class="container">

                <div class="col-md-12">

                    <ul class="breadcrumb">
                        <li><a href="index.php">Home</a>
                        </li>
                        <li><a href="#">My orders</a>
                        </li>
                    </ul>

                </div>

                <div class="col-md-3">
                    <!-- *** CUSTOMER MENU ***
 _________________________________________________________ -->
                    <div class="panel panel-default sidebar-menu">

                        <div class="panel-heading">
                            <h3 class="panel-title">Customer section</h3>
                        </div>

                        <div class="panel-body">

                            <ul class="nav nav-pills nav-stacked">
                                <li class="active">
                                    <a href="customer-orders.php"><i class="fa fa-list"></i> My orders</a>
                                </li>
                                <li>
                                    <a href="wishlist.php"><i class="fa fa-heart"></i> My wishlist</a>
                                </li>
                                <li>
                                    <a href="customer-account.php"><i class="fa fa-user"></i> My account</a>
                                </li>
                                <li>
                                    <a href="logout.php"><i class="fa fa-sign-out"></i> Logout</a>
                                </li>
                            </ul>
                        </div>

                    </div>
                    <!-- /.col-md-3 -->

                    <!-- *** CUSTOMER MENU END *** -->
                </div>

                <div class="col-md-9" id="customer-order">
                    <div class="box">
                        <h1>Order #<?php echo $_GET['id'];?></h1>

                        <p class="text-muted">If you have any questions, please feel free to <a href="contact.php">contact us</a>, our customer service center is working for you 24/7.</p>

                        <hr>

                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Product</th>
                                        <th>Quantity</th>
                                        <th>Unit price</th>
                                        <th></th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                   <?php

                    if(isset($_GET['id']) & !empty($_GET['id'])){
                        $oid = $_GET['id'];
                    }else{
                        header('location: customer-account.php');
                    }
                    $ordsql = "SELECT * FROM orders WHERE uid='$uid' AND id='$oid'";
                    $ordres = mysqli_query($con, $ordsql);
                    $ordr = mysqli_fetch_assoc($ordres);

                    $orditmsql = "SELECT * FROM orderitems o JOIN products p WHERE o.orderid=3 AND o.pid=p.product_id";
                    $orditmres = mysqli_query($con, $orditmsql);
                    while($orditmr = mysqli_fetch_assoc($orditmres)){
                ?>
                    <tr>
                        <td>
                            <a href="single.php?pro_id=<?php echo $orditmr['pid']; ?>"><?php echo substr($orditmr['product_title'], 0, 25); ?></a>
                        </td>
                        <td>
                            <?php echo $orditmr['pquantity']; ?>
                        </td>
                        <td>
                            KSHS: <?php echo $orditmr['productprice']; ?>/-
                        </td>
                        <td>
                            
                        </td>
                        <td>
                            KSHS: <?php echo $orditmr['productprice']*$orditmr['pquantity']; ?>/-
                        </td>
                    </tr>
                <?php } ?>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>
                            Order Total
                        </td>
                        <td>
                            <?php echo $ordr['totalprice']; ?>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>
                            Order Status
                        </td>
                        <td>
                            <?php echo $ordr['orderstatus']; ?>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>
                            Order Placed On
                        </td>
                        <td>
                            <?php echo $ordr['timestamp']; ?>
                        </td>
                    </tr>
                                </tbody>
                               
                            </table>

                        </div>
                        <!-- /.table-responsive -->

                        <div class="row ">
                            <div class="col-md-6">
                                <h2>Invoice address</h2>
                                <?php
                        $csql = "SELECT u1.firstname, u1.lastname, u1.address1, u1.address2, u1.city, u1.state, u1.country, u1.company, u.email, u1.mobile, u1.zip FROM users u JOIN usersmeta u1 WHERE u.id=u1.uid AND u.id=$uid";
                        $cres = mysqli_query($con, $csql);
                        if(mysqli_num_rows($cres) == 1){
                            $cr = mysqli_fetch_assoc($cres);
                            echo "<p>".$cr['firstname'] ." ". $cr['lastname'] ."</p>";
                            echo "<p>".$cr['address1'] ."</p>";
                            echo "<p>".$cr['address2'] ."</p>";
                            echo "<p>".$cr['city'] ."</p>";
                            echo "<p>".$cr['state'] ."</p>";
                            echo "<p>".$cr['country'] ."</p>";
                            echo "<p>".$cr['company'] ."</p>";
                            echo "<p>".$cr['zip'] ."</p>";
                            echo "<p>".$cr['mobile'] ."</p>";
                            echo "<p>".$cr['email'] ."</p>";
                        }
                    ?>
                            </div>
                            <div class="col-md-6">
                                <h2>Shipping address</h2>
                                <?php
                        $csql = "SELECT u1.firstname, u1.lastname, u1.address1, u1.address2, u1.city, u1.state, u1.country, u1.company, u.email, u1.mobile, u1.zip FROM users u JOIN usersmeta u1 WHERE u.id=u1.uid AND u.id=$uid";
                        $cres = mysqli_query($con, $csql);
                        if(mysqli_num_rows($cres) == 1){
                            $cr = mysqli_fetch_assoc($cres);
                            echo "<p>".$cr['firstname'] ." ". $cr['lastname'] ."</p>";
                            echo "<p>".$cr['address1'] ."</p>";
                            echo "<p>".$cr['address2'] ."</p>";
                            echo "<p>".$cr['city'] ."</p>";
                            echo "<p>".$cr['state'] ."</p>";
                            echo "<p>".$cr['country'] ."</p>";
                            echo "<p>".$cr['company'] ."</p>";
                            echo "<p>".$cr['zip'] ."</p>";
                            echo "<p>".$cr['mobile'] ."</p>";
                            echo "<p>".$cr['email'] ."</p>";
                        }
                    ?>
                            </div>
                        </div>

                    </div>
                </div>

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
