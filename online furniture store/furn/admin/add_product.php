<?php 
session_start();
    require_once '../config/connect.php';
    if(!isset($_SESSION['email']) & empty($_SESSION['email'])){
        header('location: login.php');
    }


  if(isset($_POST['insert_post'])& !empty($_POST['insert_post'])){
  
    //getting the text data from the fields
    $product_title =mysqli_real_escape_string($con,$_POST['title']) ;
    $product_cat=mysqli_real_escape_string($con, $_POST['category']);
    $product_price = mysqli_real_escape_string($con,$_POST['price']);
    $product_desc = mysqli_real_escape_string($con,$_POST['description']);
    $product_keywords =mysqli_real_escape_string($con, $_POST['keywords']);
  
    if (isset($_FILES) & !empty($_FILES)) {
      //getting the image from the field
         $product_image = $_FILES['image']['name'];
         $size=$_FILES['image']['size'];
         $type=$_FILES['image']['type'];
         $product_image_tmp = $_FILES['image']['tmp_name'];

         $max_size= 10000000;
         $extension=substr($product_image, strpos($product_image, '.') + 1);
         if (isset($product_image) && !empty($product_image)) {
           if (($extension=='jpg' || $extension =='jpeg') && $type=='image/jpeg' && $size<=$max_size) {
            $location="product_images/";
            if (move_uploaded_file($product_image_tmp,$location.$product_image)) {
              
     $insert_product = "insert into products (product_cat,product_title,product_price,product_desc,product_image,product_keywords) values ('$product_cat','$product_title','$product_price','$product_desc','$product_image','$product_keywords')";
     
     $insert_pro = mysqli_query($con, $insert_product);
     if($insert_pro){
     header('location: products.php');
     
     }else{
      $fmsg="Failed to Create Product";
     }
            }else{
              $fmsg='Failled to Upload File';
            }
             # code...
            }else{
              $fmsg="Only JPG files are allowed and should be less than 1MB";
            }
           }else{
            $fmsg="Please Select a File";
           }
         }else{
            $insert_product = "insert into products (product_cat,product_title,product_price,product_desc,product_image,product_keywords) values ('$product_cat','$product_title','$product_price','$product_desc','$product_image','$product_keywords')";
     
            $insert_pro = mysqli_query($con, $insert_product);
            if($insert_pro){
     header('location: products.php');
     
     }else{
      $fmsg="Failed to Create Product";
     }
         }
    }

?>