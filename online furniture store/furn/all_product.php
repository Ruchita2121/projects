
<!DOCTYPE html>
<html lang="en">
<?php
include 'function/functions.php';
include 'layout/head.php';
?>




    <div id="all">

        <div id="content">

          
            <!-- *** HOT PRODUCT SLIDESHOW ***
 _________________________________________________________ -->
           <div id="advantages">
             <div class="box">
                    <div class="container">
                        <div class="col-md-12">
                            <h2>All Products by Category</h2>
                        </div>
                    </div>
                </div>

            <div class="container">
                <div class="agile_top_brands_grids">
                         <div class="category-tab"><!--category-tab-->
            <div class="col-sm-12">
    <ul class="nav nav-tabs">
    <li  class="active">
    <a href="#chair" data-toggle="tab">
    Chairs</a></li>
    <li><a href="#sofa" data-toggle="tab">
    Sofa</a></li>
    <li><a href="#table" data-toggle="tab">
    Tables</a></li>
    <li><a href="#dinning" data-toggle="tab">
    Dinning Set</a></li>
    <li><a href="#bedroom" data-toggle="tab">
    Bedroom</a></li>
     <li><a href="#occasional" data-toggle="tab">
    Occasional</a></li>
    
    </ul></div>
            <div class="tab-content">
          <div class="tab-pane fade active in" id="chair">
            <div class=" caption-slide-up">
<?php 
getchair();

?>
           </div> 
            </div>
            <div class="tab-pane fade  in" id="sofa">
              <div class=" caption-slide-up">
<?php 

getsofa();
?>
         </div>   
            </div>
            <div class="tab-pane fade" id="table"><div class=" caption-slide-up">
            
           <?php 

gettable();
?>
</div>
            </div>
            <div class="tab-pane fade" id="dinning"><div class=" caption-slide-up">
            <?php 

getdinning();
?>
</div>
        </div>
        <div class="tab-pane fade" id="bedroom"><div class=" caption-slide-up">
           <?php 
getbedroom();

?>
</div>
        </div>
        <div class="tab-pane fade" id="occasional"><div class=" caption-slide-up">
           <?php 

getocc();
?>
</div>
        </div>
       
        </div>
        </div>
                
        </div>
    </div>
    </div>
        <!--/category-tab-->
<div class="clearfix"></div>
<br><br>
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