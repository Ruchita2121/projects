<?php 

ob_start();
    session_start();
require_once "admin/config/db.php";
    if(!isset($_SESSION['customer']) & empty($_SESSION['customer'])){
        header('location: login.php');
    }


$uid = $_SESSION['customerid'];
//$cart = $_SESSION['cart'];

?>


<!DOCTYPE html>
<html lang="en">
<?php
//include 'function/functions.php';

include 'layout/head.php';

 
?>




    <div id="all">

        <div id="content">
            <div class="container">

                <div class="col-md-12">
                    <ul class="breadcrumb">
                        <li><a href="#">Home</a>
                        </li>
                        <li>Wish List</li>
                    </ul>
                </div>

                <div class="col-md-9" id="basket">

                    <div class="box">
                        <h1 align="center"></h1>
                        <form method="post" action="checkout.php">

                            <h1>Recent Wish List</h1>
                            <div class="table-responsive">
                                <table class="table">
 
                                    <thead>
                                        <tr>
                                            <th>Product Name</th>
                                            <th>Price</th>
                                            <th>Added On</th>
                                            <th>Operations</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                     <?php
                    $wishsql = "SELECT p.product_title, p.product_price, p.product_id AS pid, w.id AS id, w.`timestamp` FROM wishlist w JOIN products p WHERE w.pid=p.product_id AND w.uid='$uid'";
                    $wishres = mysqli_query($con, $wishsql);
                    while($wishr = mysqli_fetch_assoc($wishres)){
                ?>              <tr>
                        <td>
                            <a href="single.php?id=<?php echo $wishr['pid']; ?>"><?php echo $wishr['product_title']; ?></a>
                        </td>
                        <td>
                          
                            Kshs: <?php echo number_format( $wishr['product_price'],2); ?> /-
                        </td>
                        <td>
                            <?php echo $wishr['timestamp']; ?>          
                        </td>
                        <td>
                            <a href="delwishlist.php?id=<?php echo $wishr['id']; ?>">Delete</a>
                        </td>
                    </tr>
                <?php } ?>
                   
                                     </tbody>
                                    
                                </table>

                            </div>
                            <!-- /.table-responsive -->

                            <div class="box-footer">
                                
                            </div>

                        </form>

                    </div>
                    <!-- /.box -->

                </div>
                <!-- /.col-md-9 -->

               

            </div>
            <!-- /.container -->
        </div>
        <!-- /#content -->

  <?php  include 'layout/footer.php';?>




    

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