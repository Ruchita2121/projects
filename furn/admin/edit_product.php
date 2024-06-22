  
<?php 

include("config/db.php");

if(isset($_GET['edit_pro'])){

  $get_id = $_GET['edit_pro']; 
  
  $get_pro = "select * from products where product_id='$get_id'";
  
  $run_pro = mysqli_query($con, $get_pro); 
  
  $i = 0;
  
  $row_pro=mysqli_fetch_array($run_pro);
    
    $pro_id = $row_pro['product_id'];
    $pro_title = $row_pro['product_title'];
    $pro_image = $row_pro['product_image'];
    $pro_price = $row_pro['product_price'];
    $pro_desc = $row_pro['product_desc']; 
    $pro_keywords = $row_pro['product_keywords']; 
    $pro_cat = $row_pro['product_cat'];
    //$pro_brand = $row_pro['product_brand'];
    
    $get_cat = "select * from categories where cat_id='$pro_cat'";
    
    $run_cat=mysqli_query($con, $get_cat); 
    
    $row_cat=mysqli_fetch_array($run_cat); 
    
    $category_title = $row_cat['cat_title'];
    
   
}
?>

  <div id="content">
          <header>
            <h2 class="page_title">Add new product</h2>
          </header>
          <div class="content-inner">
            <div class="form-wrapper">
              <form action="edit_product.php" method="post" enctype="multipart/form-data">
                <div class="form-group">
                  <label class="sr-only">Product Title</label>
                  <input type="hidden" class="form-control" name="pro_id" value="<?php echo $pro_id;?>">
                  <input type="text" class="form-control" name="title" value="<?php echo $pro_title;?>">
                </div>
                <div class="form-group">
                  <label class="sr-only">Product Category</label>
                  <select  class="form-control"  name="category">
                    <option><?php echo $category_title;?></option>
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
                  <input type="file" name="image" class="form-control"><img src="product_images/<?php echo $pro_image; ?>" width="60" height="60"/>
                </div>
                <div class="form-group">
                  <label class="sr-only">Product Price</label>
                  <input type="text" name="price" class="form-control" value="<?php echo $pro_price;?>">
                </div>
                <div class="form-group">
                  <label class="sr-only">Product Description</label>
                  <textarea name="description" class="form-control summernote" placeholder="Description"><?php echo $pro_desc;?></textarea>
                </div>
                <div class="form-group">
                  <label class="sr-only">Product Keywords</label>
                 <input type="text" name="keywords" class="form-control" value="<?php echo $pro_keywords;?>" >
                <!-- <select name="keywords" class="form-control" data-placeholder="Choose a keyword..." multiple class="chosen-select">
                    <option></option>
                    <option>new</option>
                    <option>sale</option>
                    <option>Gift</option>
                  </select>-->
                </div>
                
                <div class="clearfix">
                  <input type="submit" name="update_product" value="Update" class="btn btn-lg btn-primary pull-right" />  </div>
              </form>
            </div>
          </div>
        </div>


        <?php 

  if(isset($_POST['update_product'])){
  
    //getting the text data from the fields
    
    $update_id = $_POST['pro_id'];
    
    $product_title = $_POST['title'];
    $product_cat= $_POST['category'];
   // $product_brand = $_POST['product_brand'];
    $product_price = $_POST['price'];
    $product_desc = $_POST['description'];
    $product_keywords = $_POST['keywords'];
  
    //getting the image from the field
    $product_image = $_FILES['image']['name'];
    $product_image_tmp = $_FILES['image']['tmp_name'];
    
    move_uploaded_file($product_image_tmp,"product_images/$product_image");
  
     $update_product = "update products set product_cat='$product_cat',product_title='$product_title',product_price='$product_price',product_desc='$product_desc',product_image='$product_image', product_keywords='$product_keywords' where product_id='$update_id'";
     
     $run_product = mysqli_query($con, $update_product);
     
     if($run_product){
     
     echo "<script>alert('Product has been updated!')</script>";
     
     echo "<script>window.open('products.php','_self')</script>";
     
     }
  }








?>

