<?php 

include("config/db.php");

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Admin</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="vendor/chosen_v1.8.7/chosen.min.css">
    <link rel="stylesheet" type="text/css" href="vendor/summernote-master/dist/summernote.css">
    <link href="css/custom.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/new_product.css">
    
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <div class="container-fluid display-table">
      <div class="row display-table-row">
        <!--side bar-->
        <div class="col-md-2 col-sm-1 hidden-xs display-table-cell valign-top" id="side-menu">
          <h1 class="hidden-sm hidden-xs">Navigation</h1>
         <ul>
            <li class="link ">
              <a href="">
                <span class="glyphicon glyphicon-th" aria-hidden="true"></span>
                <span class="hidden-sm hidden-xs">Dashboard</span>
              </a>
            </li>
           
            <li class="link">
              <a href="products.php">
                <span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span>
                <span class="hidden-sm hidden-xs">Products</span>
              </a>
            </li>
            <li class="link">
              <a href="new-product.php">
                <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                <span class="hidden-sm hidden-xs">Add Product</span>
              </a>
            </li>
           <li class="link">
              <a href="category.php">
                <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                <span class="hidden-sm hidden-xs">Category</span>
              </a>
            </li>
            <li class="link">
              <a href="customers.php">
                <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                <span class="hidden-sm hidden-xs">Customers</span>
              </a>
            </li>
            <li class="link">
              <a href="orders.php">
                <span class="glyphicon glyphicon-tags" aria-hidden="true"></span>
                <span class="hidden-sm hidden-xs">Orders</span>
              </a>
            </li>
             <li class="link">
              <a href="payments.php">
                <span class="glyphicon glyphicon-piggy-bank" aria-hidden="true"></span>
                <span class="hidden-sm hidden-xs">Payments</span>
              </a>
            </li>
            <li class="link setting-btn">
              <a href="">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
                <span class="hidden-sm hidden-xs">Settings</span>
              </a>
            </li>
          </ul>
        </div>
        <!-- main content area -->
        <div class="col-md-10 col-md-11 display-table-cell valign-top box ">
          <div class="row">
          <header id="nav-header" class="clearfix">
            <div class="col-md-5">
              <nav class="navbar-default pull-left">
                <button type="button" class="navbar-toggle collapsed" data-toggle="offcanvas" data-target="#side-menu" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
              </nav>
              <input type="text" id="header-search-field" name="" class="hidden-sm hidden-xs" placeholder="Search for something ---">
            </div>
            <div class="col-md-7">
              <ul class="pull-right">
                <li id="welcome" class=" hidden-xs">Welcome admin</li>
                <li class="fixed-width">
                  <a href=""><span class="glyphicon glyphicon-bell" aria-hidden="true"></span>
                    <span class="label label-warning">  3</span></a>
                </li>
                <li class="fixed-width">
                  <a href="">
                    <span class="glyphicon glyphicon-envelope" aria-hidden="true"></span>
                    <span class="label label-message">  3</span></a>
                </li>
                <li>
                  <a href="" class="logout"><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span>   Log out</a>
                </li>
              </ul>
            </div>
          </header>

        </div>
        <div id="content">
          <header>
            <h2 class="page_title">Add new product</h2>
          </header>
          <div class="content-inner">
            <div class="form-wrapper">
              <form action="new-product.php" method="post" enctype="multipart/form-data">
                <div class="form-group">
                  <label class="sr-only">Product Title</label>
                  <input type="text" class="form-control" name="title" placeholder="Product Title">
                </div>
                <div class="form-group">
                  <label class="sr-only">Product Category</label>
                  <select  class="form-control"  name="category">
                    <option>Select a Category</option>
          <?php 
    $get_cats = "select * from categories";
  
    $run_cats = mysqli_query($con, $get_cats);
  
    while ($row_cats=mysqli_fetch_array($run_cats)){
  
    $cat_id = $row_cats['cat_id']; 
    $cat_title = $row_cats['cat_title'];
  
    echo "<option value='$cat_id'>$cat_title</option>";
  
  
  }
          
          ?>
                  </select>
                </div>
                <div class="form-group">
                  <label class="sr-only">Product Image</label>
                  <input type="file" name="image" class="form-control">
                </div>
                <div class="form-group">
                  <label class="sr-only">Product Price</label>
                  <input type="text" name="price" class="form-control" placeholder="Price">
                </div>
                <div class="form-group">
                  <label class="sr-only">Product Description</label>
                  <textarea name="description" class="form-control summernote" placeholder="Description"></textarea>
                </div>
                <div class="form-group">
                  <label class="sr-only">Product Keywords</label>
                 <input type="text" name="keywords" class="form-control">
                <!-- <select name="keywords" class="form-control" data-placeholder="Choose a keyword..." multiple class="chosen-select">
                    <option></option>
                    <option>new</option>
                    <option>sale</option>
                    <option>Gift</option>
                  </select>-->
                </div>
                
                <div class="clearfix">
                  <input type="submit" name="insert_post" value="Insert Product Now" class="btn btn-lg btn-primary pull-right" />  </div>
              </form>
            </div>
          </div>
        </div>

<?php 

  if(isset($_POST['insert_post'])){
  
    //getting the text data from the fields
    $product_title = $_POST['title'];
    $product_cat= $_POST['category'];
    $product_price = $_POST['price'];
    $product_desc = $_POST['description'];
    $product_keywords = $_POST['keywords'];
  
    //getting the image from the field
    $product_image = $_FILES['image']['name'];
    $product_image_tmp = $_FILES['image']['tmp_name'];
    
    move_uploaded_file($product_image_tmp,"product_images/$product_image");
  
     $insert_product = "insert into products (product_cat,product_title,product_price,product_desc,product_image,product_keywords) values ('$product_cat','$product_title','$product_price','$product_desc','$product_image','$product_keywords')";
     
     $insert_pro = mysqli_query($con, $insert_product);
     
     if($insert_pro){
     
     echo "<script>alert('Product Has been inserted!')</script>";
     echo "<script>window.open('new-product.php','_self')</script>";
     
     }else{
      echo("Error description: " . mysqli_error($con));
     }
  }








?>


        <div class="row">
          <footer id="admin-footer" class="cle">
            <div class="pull-left">
              <b>Copyright </b>&copy; 2018
            </div>
            <div class="pull-right">
              <b>Admin System</b>
            </div>
          </footer>
        </div>

        
        </div>
      </div>
    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <script src="js/custom.js"></script>
    <script src="vendor/chosen_v1.8.7/chosen.jquery.min.js"></script>
    <script src="vendor/summernote-master/dist/summernote.min.js"></script>
  
    <script type="text/javascript">
      $('.summernote').summernote({
        height:300
      })
    </script>
     <!-- <script type="text/javascript">
      var config={
        '.chosen-select':{},
        '.chosen-select-deselect':{allow_single_deselect:true},
        '.chosen-select-no-single':{disable_search_threshold:10},
        '.chosen-select-no-result':{no_results_text:'Oops, nothing found!'},
        '.chosen-select-width':{width:'95%'}
      }
      for (var selector in config) {
        $(selector).chosen(config[selector]);
      }
    </script>-->
  </body>
</html>
