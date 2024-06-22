<!DOCTYPE html>
<html lang="en">
<?php
ob_start();
session_start();
      require_once 'admin/config/db.php';
    if(isset($_GET['pro_id']) & !empty($_GET['pro_id'])){
    
    $id = $_GET['pro_id'];
    $prodsql = "SELECT * FROM products WHERE product_id=$id";
    $prodres = mysqli_query($con, $prodsql);
    $prodr = mysqli_fetch_assoc($prodres);
}else{
    header('location:index.php');
}
   //$uid=$_SESSION['customerid']; 
?>

<?php

include 'layout/head.php';
?>



    <div id="all">

        <div id="content">
            <div class="container">

                <div class="col-md-12">
                    <ul class="breadcrumb">
                        <li><a href="#">Home</a>
                        </li>
                        <li><a href="#">Products</a>
                        </li>
                        <li><a href="#">Furniture</a>
                        </li>
                        <li><?php echo $prodr['product_title'];?></li>
                    </ul>

                </div>

                <div class="col-md-3">
                    <!-- *** MENUS AND FILTERS ***
 _________________________________________________________ -->
                    <div class="panel panel-default sidebar-menu">

                        <div class="panel-heading">
                            <h3 class="panel-title">Categories</h3>
                        </div>

                        <div class="panel-body">
                            <ul class="nav nav-pills nav-stacked category-menu">
                                <li>
                                    <a href="index.php?category">Chair <span class="badge pull-right">42</span></a>
                                    <ul>
                                        <li><a href="index.php?category">High Back</a>
                                        </li>
                                        <li><a href="index.php?category">Low Back</a>
                                        </li>
                                        <li><a href="index.php?category">Mesh Chair</a>
                                        </li>
                                        <li><a href="index.php?category">Fabric Chair</a>
                                        </li>
                                        <li><a href="index.php?category">Visitors Chair</a>
                                        </li>

                                    </ul>
                                </li>
                                <li class="active">
                                    <a href="index.php?category">Office Desk  <span class="badge pull-right">123</span></a>
                                    <ul>
                                        <li><a href="index.php?category">Modular Desk</a>
                                        </li>
                                        <li><a href="index.php?category">Executive Desk</a>
                                        </li>
                                        <li><a href="index.php?category">Work Station</a>
                                        </li>
                                        <li><a href="index.php?category">Pedestal</a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="index.php?category">Sofa <span class="badge pull-right">11</span></a>
                                    <ul>
                                        <li><a href="index.php?category">Classical</a>
                                        </li>
                                        <li><a href="index.php?category">Recliners</a>
                                        </li>
                                        <li><a href="index.php?category">Sofa Beds</a>
                                        </li>
                                        <li><a href="index.php?category">Leather Sofa</a>
                                        </li>
                                        <li><a href="index.php?category">Fabric Sofa</a>
                                        </li>
                                        <li><a href="index.php?category">Bean Bags</a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="index.php?category">Dinning<span class="badge pull-right">11</span></a>
                                    <ul>
                                        <li><a href="index.php?category">Glass Tables</a>
                                        </li>
                                        <li><a href="index.php?category">Wood Table</a>
                                        </li>
                                        <li><a href="index.php?category">Buffet</a>
                                        </li>
                                        <li><a href="index.php?category">Bar Counter</a>
                                        </li>
                                        <li><a href="index.php?category">Bar Stool</a>
                                        </li>
                                        
                                    </ul>
                                </li>
                                <li>
                                    <a href="index.php?category">Bedroom<span class="badge pull-right">11</span></a>
                                    <ul>
                                        <li><a href="index.php?category">Bedroom Set</a>
                                        </li>
                                        <li><a href="index.php?category">King Bed</a>
                                        </li>
                                        <li><a href="index.php?category">Queen Bed</a>
                                        </li>
                                        <li><a href="index.php?category">Single Bed</a>
                                        </li>
                                        <li><a href="index.php?category">Kids Bed</a>
                                        </li>

                                    </ul>
                                </li>
                                 <li>
                                    <a href="index.php?category">Occasional<span class="badge pull-right">11</span></a>
                                    <ul>
                                        <li><a href="index.php?category">Coffee Table</a>
                                        </li>
                                        <li><a href="index.php?category">Tv Stands</a>
                                        </li>
                                        <li><a href="index.php?category">Entertainment Units</a>
                                        </li>
                                        <li><a href="index.php?category">Shoe Cabinets</a>
                                        </li>
                                      
                                                                                
                                    </ul>
                                </li>

                            </ul>

                        </div>
                    </div>

                </div>

               
         <div class="col-md-9">

                    <div class="row" id="productMain">
                        <div class="col-sm-6">
                            <div id="mainImage">
                                <img src="admin/product_images/<?php echo $prodr['product_image'];?>" alt="" class="img-responsive">
                            </div>

                            <div class="ribbon sale">
                                <div class="theribbon">SALE</div>
                                <div class="ribbon-background"></div>
                            </div>
                            <!-- /.ribbon -->

                            <div class="ribbon new">
                                <div class="theribbon">NEW</div>
                                <div class="ribbon-background"></div>
                            </div>
                            <!-- /.ribbon -->

                        </div>

                        <div class="col-sm-6">
                            <div class="box">
                                <h1 class="text-center"><?php echo $prodr['product_title'];?></h1>
                                <p class="goToDescription"><a href="#details" class="scroll-to">Scroll to product details, material & care and sizing</a>
                                </p>
                                <p class="price"> <b>Kshs: </b><?php echo $prodr['product_price'];?>.00/-</p>

                                <form method="get" action="addtocat.php">
                                <p class="qnt">
                                    <input type="text" name="quant" class="form-control" value="1">
                                </p>
                                <input type="hidden" name="id" value="<?php echo $prodr['product_id'];?>">
                                <input type="hidden" name="hidden_price" value="<?php echo $prodr['product_price'];?>">

                                <p class="text-center buttons">
                                    <button type="submit" name="add" class="btn btn-primary"><i class="fa fa-shopping-cart"></i> Add to cart</button> 
                                   </form>
                                    <a href="addtowishlist.php?id=<?php echo $prodr['product_id'];?>" class="btn btn-default"><i class="fa fa-heart"></i> Add to wishlist</a>
                                </p>
                                

                            </div>

                            <div class="row" id="thumbs">
                                <div class="col-xs-4">
                                    <a href="admin/product_images/<?php echo $prodr['product_image'];?>" class="thumb">
                                        <img src="admin/product_images/<?php echo $prodr['product_image'];?>" alt="" class="img-responsive">
                                    </a>
                                </div>
                                <div class="col-xs-4">
                                    <a href="admin/product_images/<?php echo $prodr['product_image'];?>" class="thumb">
                                        <img src="admin/product_images/<?php echo $prodr['product_image'];?>" alt="" class="img-responsive">
                                    </a>
                                </div>
                                <div class="col-xs-4">
                                    <a href="admin/product_images/<?php echo $prodr['product_image'];?>" class="thumb">
                                        <img src="admin/product_images/<?php echo $prodr['product_image'];?>" alt="" class="img-responsive">
                                    </a>
                                </div>
                            </div>
                        </div>

                    </div>


                    <div class="box" id="details">
                        <p>
                            <h4>Product details</h4>
                            <?php echo $prodr['product_desc'];?>
                           <!-- <h4>Material & care</h4>
                            <ul>
                                <li>Polyester</li>
                                <li>Machine wash</li>
                            </ul>
                            <h4>Size & Fit</h4>
                            <ul>
                                <li>Regular fit</li>
                                <li>The model (height 5" and chest 33") is wearing a size S</li>
                            </ul>-->

                            
                            <hr>
                            <div class="social">
                                <h4>Show it to your friends</h4>
                                <p>
                                    <a href="#" class="external facebook" data-animate-hover="pulse"><i class="fa fa-facebook"></i></a>
                                    <a href="#" class="external gplus" data-animate-hover="pulse"><i class="fa fa-google-plus"></i></a>
                                    <a href="#" class="external twitter" data-animate-hover="pulse"><i class="fa fa-twitter"></i></a>
                                    <a href="#" class="email" data-animate-hover="pulse"><i class="fa fa-envelope"></i></a>
                                </p>
                            </div>
                    </div>

                    <div class="row same-height-row">
                        <div class="col-md-3 col-sm-6">
                            <div class="box same-height">
                                <h3>You may also like these products</h3>
                            </div>
                        </div>
                        <?php
                                $relsql = "SELECT * FROM products WHERE product_id != $id ORDER BY rand() LIMIT 3";
                                $relres = mysqli_query($con, $relsql);
                                while($relr = mysqli_fetch_assoc($relres)){
                             ?>
                        <div class="col-md-3 col-sm-6">
                            <div class="product same-height">
                                <div class="flip-container">
                                    <div class="flipper">
                                        <div class="front">
                                            <a href="single.php?pro_id=<?php echo $relr['product_id'];?>">
                                                <img src="admin/product_images/<?php echo $relr['product_image'];?>" alt="" class="img-responsive">
                                            </a>
                                        </div>
                                        <div class="back">
                                            <a href="single.php?pro_id=<?php echo $relr['product_id'];?>">
                                                <img src="admin/product_images/<?php echo $relr['product_image'];?>" alt="" class="img-responsive">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <a href="detail.php" class="invisible">
                                    <img src="admin/product_images/<?php echo $relr['product_image'];?>" alt="" class="img-responsive">
                                </a>
                                <div class="text">
                                    <h3><?php echo $relr['product_title'];?></h3>
                                    <p class="price">Kshs: <?php echo $relr['product_price']; ?>.00/-</p>
                                </div>
                            </div>
                            <!-- /.product -->
                        </div>
<?php }?>
                       

                    </div>


                </div>
                <!-- /.col-md-9 -->
        
 
               
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