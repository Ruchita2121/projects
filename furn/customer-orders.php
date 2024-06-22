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
                        <li><a href="#">Home</a>
                        </li>
                        <li>My orders</li>
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

                <div class="col-md-9" id="customer-orders">
                    <div class="box">
                        <h1>My orders</h1>

                        <p class="lead">Your orders on one place.</p>
                        <p class="text-muted">If you have any questions, please feel free to <a href="contact.php">contact us</a>, our customer service center is working for you 24/7.</p>

                        <hr>

                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Order</th>
                                        <th>Date</th>
                                        <th>Status</th>
                                        <th>Payment Mode</th>
                                        <th>Total</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                    $ordsql = "SELECT * FROM orders WHERE uid='$uid'";
                    $ordres = mysqli_query($con, $ordsql);
                    while($ordr = mysqli_fetch_assoc($ordres)){
                ?>
                                    <tr>
                                        <td>
                            <?php echo $ordr['id']; ?>
                        </td>
                        <td>
                            <?php echo $ordr['timestamp']; ?>
                        </td>
                        <td>
                            <?php echo $ordr['orderstatus']; ?>         
                        </td>
                        <td>
                            <?php echo $ordr['paymentmode']; ?>
                        </td>
                        <td>
                            KSHS: <?php echo $ordr['totalprice']; ?>/-
                        </td>
                                        <td><a href="customer-order.php?id=<?php echo $ordr['id']; ?>" class="btn btn-primary btn-sm">View</a>
                                            <?php if($ordr['orderstatus'] != 'Cancelled'){?>
                            | <a href="cancel-order.php?id=<?php echo $ordr['id']; ?>">Cancel</a>
                            <?php } ?>
                                        </td>
                                    </tr>
                                   <?php } ?>
                                </tbody>
                            </table>
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
