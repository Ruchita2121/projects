<?php 
// After uploading to online server, change this connection accordingly
$con = mysqli_connect("localhost","root","","onlinestore");

if (mysqli_connect_errno())
  {
  echo "The Connection was not established: " . mysqli_connect_error();
  }
 

//getting the categories

function getCats(){
	
	global $con; 
	
	$get_cats = "select * from categories";
	
	$run_cats = mysqli_query($con, $get_cats);
	
	while ($row_cats=mysqli_fetch_array($run_cats)){
	
		$cat_id = $row_cats['cat_id']; 
		$cat_title = $row_cats['cat_title'];
	
	echo "<li><a href='index.php?cat=$cat_id'>$cat_title</a></li>";
	
	
	}


}



function getPro(){

	if(!isset($_GET['cat'])){
		if(!isset($_GET['brand'])){

	global $con; 
	
	$get_pro = "select * from products order by RAND() LIMIT 0,3 ";

	$run_pro = mysqli_query($con, $get_pro); 
	
	while($row_pro=mysqli_fetch_array($run_pro)){
	
		$pro_id = $row_pro['product_id'];
		$pro_cat = $row_pro['product_cat'];
		//$pro_brand = $row_pro['product_brand'];
		$pro_title = $row_pro['product_title'];
		$pro_price = $row_pro['product_price'];
		$pro_image = $row_pro['product_image'];
	
		echo "
				<div class='col-lg-4 col-sm-6 col-md-6 featured-item'>
<div class='labels'>
		
</div>
<ul class='list-inline featured-item-header text-center'>
                  <li><strong>
                     $pro_title </strong>
                  </li>
                  
                                </ul>
		<figure>
<a href='single.php?pro_id=$pro_id' ><img class='img-responsive img-preload' src='admin/product_images/$pro_image' alt='' ></a>
<figcaption>
                     <h3>
                       $pro_title
                     </h3>
                     
<p>KShs: $pro_price</p>

<a href='single.php?pro_id=$pro_id' class='button high_device_link'><span>✔</span>View Detail</a>
<a href='single.php?pro_id=$pro_id' class='small_device_link'>View Detail</a>  
</figcaption>
</figure>
		</div>
		
		
		";

	
	}
	}
}

}

function getCatPro(){

	if(isset($_GET['cat'])){
		
		$cat_id = $_GET['cat'];

	global $con; 
	
	$get_cat_pro = "select * from products where product_cat='$cat_id'";

	$run_cat_pro = mysqli_query($con, $get_cat_pro); 
	
	$count_cats = mysqli_num_rows($run_cat_pro);
	
	if($count_cats==0){
	
	echo "<h2 style='padding:20px;'>No products where found in this category!</h2>";
	
	}
	
	while($row_cat_pro=mysqli_fetch_array($run_cat_pro)){
	
		$pro_id = $row_cat_pro['product_id'];
		$pro_cat = $row_cat_pro['product_cat'];
		$pro_brand = $row_cat_pro['product_brand'];
		$pro_title = $row_cat_pro['product_title'];
		$pro_price = $row_cat_pro['product_price'];
		$pro_image = $row_cat_pro['product_image'];
	
		echo "
				<div class='col-lg-4 col-sm-6 col-md-6 featured-item'>
<div class='labels'>
		
</div>
<ul class='list-inline featured-item-header text-center'>
                  <li><strong>
                     $pro_title </strong>
                  </li>
                  
                                </ul>
		<figure>
<a href='single.php?pro_id=$pro_id' ><img class='img-responsive img-preload' src='admin/product_images/$pro_image' alt='' ></a>
<figcaption>
                     <h3>
                       $pro_title
                     </h3>
                     
<p>KShs: $pro_price</p>

<a href='single.php?pro_id=$pro_id' class='button high_device_link'><span>✔</span>View Detail</a>
<a href='single.php?pro_id=$pro_id' class='small_device_link'>View Detail</a>  
</figcaption>
</figure>
		</div>
		
		";
		
	
	}
	
}

}


 function getchair()
{
	global $con; 

	$chair=mysqli_query($con,"SELECT p.product_id, p.product_title, p.product_price, p.product_image, c.cat_title FROM products p ,categories c WHERE p.product_cat = c.cat_id AND c.cat_title like '%Chair%' order by rand()")or die("Query 2 is inncorrect..........");
while(list($pro_id,$pro_title,$price,$image)=mysqli_fetch_array($chair))
{
    
echo"<div class='col-lg-4 col-sm-6 col-md-6 featured-item'>
<div class='labels'>
        
</div>
<ul class='list-inline featured-item-header text-center'>
                  <li><strong>
                     $pro_title </strong>
                  </li>
                  
                                </ul>
        <figure>
<a href='single.php?pro_id=$pro_id' ><img class='img-responsive img-preload' src='admin/product_images/$image' alt='' ></a>
<figcaption>
                     <h3>
                       $pro_title
                     </h3>
                     
<p>KShs: $price</p>

<a href='single.php?pro_id=$pro_id' class='button high_device_link'><span>✔</span>View Detail</a>
<a href='single.php?pro_id=$pro_id' class='small_device_link'>View Detail</a>  
</figcaption>
</figure>
        </div>";
}
}

function getsofa(){
	global $con;
	$sofa=mysqli_query($con,"SELECT p.product_id, p.product_title, p.product_price, p.product_image, c.cat_title FROM products p ,categories c WHERE p.product_cat = c.cat_id AND c.cat_title like '%Sofa%' order by rand() ")or die("Query 2 is inncorrect..........");
while(list($pro_id,$pro_title,$price,$image)=mysqli_fetch_array($sofa))
{
    
echo"<div class='col-lg-4 col-sm-6 col-md-6 featured-item'>
<div class='labels'>
        
</div>
<ul class='list-inline featured-item-header text-center'>
                  <li><strong>
                     $pro_title </strong>
                  </li>
                  
                                </ul>
        <figure>
<a href='single.php?pro_id=$pro_id' ><img class='img-responsive img-preload' src='admin/product_images/$image' alt='' ></a>
<figcaption>
                     <h3>
                       $pro_title
                     </h3>
                     
<p>KShs: $price</p>

<a href='single.php?pro_id=$pro_id' class='button high_device_link'><span>✔</span>View Detail</a>
<a href='single.php?pro_id=$pro_id' class='small_device_link'>View Detail</a>  
</figcaption>
</figure>
        </div>";
}
}

function gettable()
{
	global $con;
	$table=mysqli_query($con,"SELECT p.product_id, p.product_title, p.product_price, p.product_image, c.cat_title FROM products p ,categories c WHERE p.product_cat = c.cat_id AND c.cat_title like '%able%' order by rand() ")or die("Query 2 is inncorrect..........");
while(list($pro_id,$pro_title,$price,$image)=mysqli_fetch_array($table))
{
    
echo"<div class='col-lg-4 col-sm-6 col-md-6 featured-item'>
<div class='labels'>
        
</div>
<ul class='list-inline featured-item-header text-center'>
                  <li><strong>
                     $pro_title </strong>
                  </li>
                  
                                </ul>
        <figure>
<a href='single.php?pro_id=$pro_id' ><img class='img-responsive img-preload' src='admin/product_images/$image' alt='' ></a>
<figcaption>
                     <h3>
                       $pro_title
                     </h3>
                     
<p>KShs: $price</p>

<a href='single.php?pro_id=$pro_id' class='button high_device_link'><span>✔</span>View Detail</a>
<a href='single.php?pro_id=$pro_id' class='small_device_link'>View Detail</a>  
</figcaption>
</figure>
        </div>";
} 
}

function getdinning(){
	global $con;
	$dinning=mysqli_query($con,"SELECT p.product_id, p.product_title, p.product_price, p.product_image, c.cat_title FROM products p ,categories c WHERE p.product_cat = c.cat_id AND c.cat_title like '%Dinning%' order by rand() ")or die("Query 2 is inncorrect..........");
while(list($pro_id,$pro_title,$price,$image)=mysqli_fetch_array($dinning))
{
    
echo"<div class='col-lg-4 col-sm-6 col-md-6 featured-item'>
<div class='labels'>
        
</div>
<ul class='list-inline featured-item-header text-center'>
                  <li><strong>
                     $pro_title </strong>
                  </li>
                  
                                </ul>
        <figure>
<a href='single.php?pro_id=$pro_id' ><img class='img-responsive img-preload' src='admin/product_images/$image' alt='' ></a>
<figcaption>
                     <h3>
                       $pro_title
                     </h3>
                     
<p>KShs: $price</p>

<a href='single.php?pro_id=$pro_id' class='button high_device_link'><span>✔</span>View Detail</a>
<a href='single.php?pro_id=$pro_id' class='small_device_link'>View Detail</a>  
</figcaption>
</figure>
        </div>";
}
}

function getbedroom(){
	global $con;
	$bedroom=mysqli_query($con,"SELECT p.product_id, p.product_title, p.product_price, p.product_image, c.cat_title FROM products p ,categories c WHERE p.product_cat = c.cat_id AND c.cat_title like '%bedroom%' order by rand() ")or die("Query 2 is inncorrect..........");
while(list($pro_id,$pro_title,$price,$image)=mysqli_fetch_array($bedroom))
{
    
echo"<div class='col-lg-4 col-sm-6 col-md-6 featured-item'>
<div class='labels'>
        
</div>
<ul class='list-inline featured-item-header text-center'>
                  <li><strong>
                     $pro_title </strong>
                  </li>
                  
                                </ul>
        <figure>
<a href='single.php?pro_id=$pro_id' ><img class='img-responsive img-preload' src='admin/product_images/$image' alt='' ></a>
<figcaption>
                     <h3>
                       $pro_title
                     </h3>
                     
<p>KShs: $price</p>

<a href='single.php?pro_id=$pro_id' class='button high_device_link'><span>✔</span>View Detail</a>
<a href='single.php?pro_id=$pro_id' class='small_device_link'>View Detail</a>  
</figcaption>
</figure>
        </div>";
}

}

function getocc(){
	global $con;
	$occasional=mysqli_query($con,"SELECT p.product_id, p.product_title, p.product_price, p.product_image, c.cat_title FROM products p ,categories c WHERE p.product_cat = c.cat_id AND c.cat_title like '%occasional%' order by rand() ")or die("Query 2 is inncorrect..........");
while(list($pro_id,$pro_title,$price,$image)=mysqli_fetch_array($occasional))
{
    
echo"<div class='col-lg-4 col-sm-6 col-md-6 featured-item'>
<div class='labels'>
        
</div>
<ul class='list-inline featured-item-header text-center'>
                  <li><strong>
                     $pro_title </strong>
                  </li>
                  
                                </ul>
        <figure>
<a href='single.php?pro_id=$pro_id' ><img class='img-responsive img-preload' src='admin/product_images/$image' alt='' ></a>
<figcaption>
                     <h3>
                       $pro_title
                     </h3>
                     
<p>KShs: $price</p>

<a href='single.php?pro_id=$pro_id' class='button high_device_link'><span>✔</span>View Detail</a>
<a href='single.php?pro_id=$pro_id' class='small_device_link'>View Detail</a>  
</figcaption>
</figure>
        </div>";
}

}

?>