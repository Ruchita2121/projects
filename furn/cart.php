
<!DOCTYPE html>
<html lang="en">
<?php 
session_start();
require_once 'admin/config/db.php';
$cart = $_SESSION['cart'];
include 'layout/head.php';
?>
    <div id="all">

        <div id="content">
            <div class="container">

                <div class="col-md-12">
                    <ul class="breadcrumb">
                        <li><a href="#">Home</a>
                        </li>
                        <li>Shopping cart</li>
                    </ul>
                </div>

                <div class="col-md-9" id="basket">

                    <div class="box">
                        <h1 align="center"></h1>
                            <h1>Shopping cart</h1>
                            <div class="table-responsive">
                                <table class="table">
 
                                    <thead>
                                        <tr>
                                            <th>&nbsp;</th>
                                            <th>&nbsp;</th>
                                            <th >Product</th>
                                            <th>Unit price</th>
                                            <th>Quantity</th>
                                            <th >Total</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                        <?php
                    //print_r($cart);
                $total = 0;
                    foreach ($cart as $key => $value) {
                        //echo $key . " : " . $value['quantity'] ."<br>";
                        $cartsql = "SELECT * FROM products WHERE product_id=$key";
                        $cartres = mysqli_query($con, $cartsql);
                        $cartr = mysqli_fetch_assoc($cartres);

                    
                 ?>
                                    <tr>
                        <td>
                            <a class="remove" href="delcart.php?id=<?php echo $key; ?>"><i class="fa fa-times"></i></a>
                        </td>
                        <td>
                            <a href="#"><img src="admin/product_images/<?php echo $cartr['product_image']; ?>" alt="" width="90"></a>                  
                        </td>
                        <td>
                            <a href="single.php?pro_id=<?php echo $cartr['product_id']; ?>"><?php echo substr($cartr['product_title'], 0 , 30); ?></a>                   
                        </td>
                        <td>
                            <span class="amount">Kshs:<?php echo $cartr['product_price']; ?>.00/-</span>                  
                        </td>
                        <td>
                            <div class="quantity"><?php echo $value['quantity']; ?></div>
                        </td>
                        <td>
                            <span class="amount">KSHS: <?php echo ($cartr['product_price']*$value['quantity']); ?>.00/-</span>                 
                        </td>
                    </tr>
                        <?php 
                    $total = $total + ($cartr['product_price']*$value['quantity']);
                } ?>
                   
                                     </tbody>
                                    <tfoot>
       
                                        <tr>
                                            <th colspan="3">Total</th>
                                            <th colspan="2">Kshs:<?php echo number_format($total, 2) ;?></th>
                                        </tr>
                                        
                                    </tfoot>
                                </table>

                            </div>
                            <!-- /.table-responsive -->

                            <div class="box-footer">
                                <div class="pull-left">
                                    <a href="index.php" class="btn btn-default"><i class="fa fa-chevron-left"></i> Continue shopping</a>
                                    
                                </div>
                                <div class="pull-right">
                                    
                                    <a href="checkout.php" class="btn btn-primary">Proceed to checkout <i class="fa fa-chevron-right"></i>
                                    </a>
                                </div>
                            </div>


                    </div>
                    <!-- /.box -->

                </div>
                <!-- /.col-md-9 -->

                <div class="col-md-3">
                    <div class="box" id="order-summary">
                        <div class="box-header">
                            <h3>Order summary</h3>
                        </div>
                        <p class="text-muted">Shipping and additional costs are calculated based on the values you have entered.</p>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <td>Order subtotal</td>
                                        <th>Kshs:<?php echo $total;?></th>
                                    </tr>
                                    <tr>
                                        <td>Shipping and handling</td>
                                        <th>Free Shipping</th>
                                    </tr>
                                    
                                    <tr class="total">
                                        <td>Total</td>
                                        <td>Kshs: <?php echo $total;?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>


                <!--    <div class="box">
                        <div class="box-header">
                            <h4>Coupon code</h4>
                        </div>
                        <p class="text-muted">If you have a coupon code, please enter it in the box below.</p>
                        <form>
                            <div class="input-group">

                                <input type="text" class="form-control">

                                <span class="input-group-btn">

					<button class="btn btn-primary" type="button"><i class="fa fa-gift"></i></button>

				    </span>
                            </div>
                             /input-group 
                        </form>
                    </div>-->

                </div>
                <!-- /.col-md-3 -->

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