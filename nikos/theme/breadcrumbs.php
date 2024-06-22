 <?php
include "connection.php";
if(!isset($_SESSION['acct_id'])){
echo '<ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="#"> <center><strong>Dashboard</strong></center></a>
            </li>
            <li class="breadcrumb-item active">Overview</li>
          </ol> 


          <div id="team-section">
  <div class="container"> 
    <div class="section-title">
       <marquee behavior="alternate"><h3>W...E...L...C...O...M...E</h3></marquee>
      <hr>
   
    </div>
    <div class="row">
         
 <div class="col-lg-12">
         <div class="row">
            <div class="col-md-4 col-sm-6">    
                <div class="panel panel-default text-center">
                    <div class="panel-heading">
                        <span class="fa-stack fa-5x">
                            <img src="theme/carousel/Cabinet.jpg" alt="..." style="width:100%"> 
                        </span>
                    </div>
                 
                    <div class="panel-body">
                        <h4>Cabinet</h4>
                        <p>price: 200</p>
                        <p>SHOP NOW</p>
                   
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="panel panel-default text-center">
                    <div class="panel-heading">
                        <span class="fa-stack fa-5x">
                            
                         <img src="theme/carousel/wooden chair.jpg" alt="..." style="width:100%">
                        </span>
                        </span>
                    </div>
                    <div class="panel-body">
                        <h4>Wooden Chair</h4>
                        <p>price: 100</p>
                        <p>SHOP NOW</p>
                       
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="panel panel-default text-center">
                    <div class="panel-heading">
                        <span class="fa-stack fa-5x">
                             <img src="theme/carousel/steel chair.jpeg" alt="..." style="width:100%">
                                  </span>
                                    </div>
                    <div class="panel-body">
                        <h4>Steel Chair</h4>
                        <p>price:250</p>
                        <p>SHOP NOW</p>

                         </div>
                    </div>
                    </div>

                           <div class="col-md-4 col-sm-6">
                <div class="panel panel-default text-center">
                    <div class="panel-heading">
                        <span class="fa-stack fa-5x">
                            <img src="theme/carousel/sofa.jpg" alt="..." style="width:100%">
                        </span>
                    </div>
                    <div class="panel-body">
                        <h4>Sofa</h4>
                        <p>price:300</p>
                        <p>SHOP NOW</p>
                        
                    </div>

                </div>
                </div>
                <div class="col-md-4 col-sm-6">
                <div class="panel panel-default text-center">
                    <div class="panel-heading">
                        <span class="fa-stack fa-5x">
                            <img src="theme/carousel/wooden table.jpg" alt="..." style="width:100%">
                        </span>
                    </div>
                    <div class="panel-body">
                        <h4>Wooden Table</h4>
                        <p>price: 80</p>
                        <p>SHOP NOW</p>
                        
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="panel panel-default text-center">
                    <div class="panel-heading">
                        <span class="fa-stack fa-5x">
                            <img src="theme/carousel/steel table.jpg" alt="..." style="width:100%">
                        </span>

                    </div>
                    <div class="panel-body">
                        <h4>Glass Table</h4>
                        <p>price: 100</p>
                        <p>SHOP NOW</p>
                       

          </div>
      </div>
    </div>
</div>
</div>
</div>';
}else{
   
echo'
 <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="#"> <center><strong>Dashboard</strong></center></a>
            </li>
            <li class="breadcrumb-item active">Overview</li>
          </ol> 


          <div id="team-section">
  <div class="container"> 
    <div class="section-title">
       <marquee behavior="alternate"><h3>ADD TO CART</h3></marquee>
      <hr>
   
    </div>
    <div class="row">
         
 <div class="col-lg-12">
         <div class="row">
            <div class="col-md-4 col-sm-6">    
                <div class="panel panel-default text-center">
                    <div class="panel-heading">
                        <span class="fa-stack fa-5x">
                            <img src="theme/carousel/Cabinet.jpg" alt="..." style="width:100%"> 
                        </span>
                    </div>
                 
                    <div class="panel-body">
                        <h4>Cabinet</h4>
                        <p>price: 200</p>
                        <p>max member:1</p>
                        <a href="newres.php" class="btn btn-primary">ADD TO CART!</a>
                   
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="panel panel-default text-center">
                    <div class="panel-heading">
                        <span class="fa-stack fa-5x">
                            
                         <img src="theme/carousel/wooden chair.jpg" alt="..." style="width:100%">
                        </span>
                    </div>
                    <div class="panel-body">
                        <h4>Wooden Chair</h4>
                        <p>price: 100</p>
                        <p>max member:2</p>
                        <a href="newres.php" class="btn btn-primary">ADD TO CART!</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="panel panel-default text-center">
                    <div class="panel-heading">
                        <span class="fa-stack fa-5x">
                             <img src="theme/carousel/steel Chair.jpeg" alt="..." style="width:100%">
                                  </span>
                                    </div>
                    <div class="panel-body">
                        <h4>Steel Chair</h4>
                        <p>price:250</p>
                        <p>max member:4</p>
                        <a href="newres.php" class="btn btn-primary">ADD TO CART!</a>
                         </div>
                    </div>
                    </div>

                           <div class="col-md-4 col-sm-6">
                <div class="panel panel-default text-center">
                    <div class="panel-heading">
                        <span class="fa-stack fa-5x">
                            <img src="theme/carousel/sofa.jpg" alt="..." style="width:100%">
                        </span>
                    </div>
                    <div class="panel-body">
                        <h4>Sofa</h4>
                        <p>price:300</p>
                        <p>max member:5</p>
                        <a href="newres.php" class="btn btn-primary">ADD TO CART!</a>
                    </div>

                </div>
                </div>
                <div class="col-md-4 col-sm-6">
                <div class="panel panel-default text-center">
                    <div class="panel-heading">
                        <span class="fa-stack fa-5x">
                            <img src="theme/carousel/wooden table.jpg" alt="..." style="width:100%">
                        </span>
                    </div>
                    <div class="panel-body">
                        <h4>Wooden Table</h4>
                        <p>price: 80</p>
                        <p>max member:3</p>
                        <a href="newres.php" class="btn btn-primary">ADD TO CART!</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="panel panel-default text-center">
                    <div class="panel-heading">
                        <span class="fa-stack fa-5x">
                            <img src="theme/carousel/steel table.jpg" alt="..." style="width:100%">
                        </span>

                    </div>
                    <div class="panel-body">
                        <h4>Glass Table</h4>
                        <p>price: 100</p>
                        <p>max member:6</p>
                        <a href="newres.php" class="btn btn-primary">ADD TO CART!</a>

          </div>
      </div>
    </div>
</div>
</div>
</div>';
}
?>

  
  <!-- carousel image slider -->

<!--  <div class="container--head">
  <div id="carousel-example-generic" class="carousel slide" data-ride="carousel"> -->
    
    <!-- Indicators -->
<!--     <ol class="carousel-indicators">
      <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
      <li data-target="#carousel-example-generic" data-slide-to="1"></li>
      <li data-target="#carousel-example-generic" data-slide-to="2"></li>
      <li data-target="#carousel-example-generic" data-slide-to="3"></li>
      <li data-target="#carousel-example-generic" data-slide-to="4"></li>
    </ol> -->

    <!-- Wrapper for slides -->
<!-- <br>
    <img src="/fixnmix/images/bg2.jpg" height="150px" style="-webkit-border-radius:5px; -moz-border-radius:5px;" alt="Image">
   <div class="carousel-inner">
      <div class="item active">
        <br/>
        <img src="theme/carousel/ab.jpg" alt="..." style="width:100%">
        <div class="carousel-caption">
        </div>
      </div>
      <div class="item">
        <img src="theme/carousel/client.jpg" alt="..." style="width:100%">
        <div class="carousel-caption">
        </div>
      </div>
      <div class="item">
        <img src="theme/carousel/front2.jpg" alt="..." style="width:100%">
        <div class="carousel-caption">
        </div>
      </div>
      <div class="item">
        <img src="theme/carousel/oders.jpg" alt="..." style="width:100%">
        <div class="carousel-caption">
        </div>
      </div>
      <div class="item">
        <img src="theme/carousel/odetails.jpg" alt="..." style="width:100%" >
        <div class="carousel-caption">
        </div>
      </div>
      <div class="item">
        <img src="theme/carousel/ship1.jpg" alt="..." style="width:100%">
        <div class="carousel-caption">
        </div>
      </div>
      <div class="item">
        <img src="theme/carousel/suply.jpg" alt="..." style="width:100%">
        <div class="carousel-caption">
        </div>
      </div>
    </div>
 -->
    <!-- Controls -->
   <!--  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
      <span class="fas fa-fw fa-chevron-left" style="padding: 250px 10px 10px 10px"></span>
    </a>
    <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
      <span class="fas fa-fw fa-chevron-right" style="padding: 260px 10px 10px 10px"></span>
    </a>
  </div>
</div> -->

<!-- Fontawesome -->
<!-- <link href=css/font-awesome.min.css" rel="stylesheet"> -->

<!-- Bootstrap -->
<!-- <link href="css/bootstrap.min.css" rel="stylesheet">
<script src="js/indexes.js"></script> -->
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<!-- <script src="js/1jquery.min.js"></script> -->
<!-- Include all compiled plugins (below), or include individual files as needed -->
<!-- <script src="js/bootstrap.min.js"></script>
<br>
<br> -->





