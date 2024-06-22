<?php
	ob_start();
	session_start();
	require_once 'config/db.php';
	/*if(!isset($_SESSION['email']) & empty($_SESSION['email'])){
		header('location: login.php');
	}*/
?>
<?php
if(isset($_POST) & !empty($_POST)){
		$status = filter_var($_POST['status'], FILTER_SANITIZE_STRING);
		$message = filter_var($_POST['message'], FILTER_SANITIZE_STRING);
		$id = filter_var($_POST['orderid'], FILTER_SANITIZE_NUMBER_INT);

			echo $ordprcsql = "INSERT INTO ordertracking (orderid, status, message) VALUES ('$id', '$status', '$message')";
			$ordprcres = mysqli_query($con, $ordprcsql) or die(mysqli_error($con));
			if($ordprcres){
				$ordupd = "UPDATE orders SET orderstatus='$status' WHERE id=$id";
				if(mysqli_query($con, $ordupd)){
					header('location: orders.php');
				}
			}
}
?>
<!DOCTYPE html>
<html lang="">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Products</title>

		<!-- Bootstrap CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="http://netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
		<link href="css/custom.css" rel="stylesheet">
		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
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
          <header class="clearfix">
            <h2 class="page_title">Customer List</h2>
            
          </header>
          <div class="content-inner">
            <div class="row search-row">
            	<div class="col-md-12">
            		<div class="input-group">
            			<input type="text" class="form-control search-field" id="search" placeholder="Search">
            			<span class="input-group-btn">
            				<button type="button" class="btn btn-primary">Go!</button>
            			</span>
            		</div>
            		
            	</div>
            </div>
            <div class="row">
	
	<!-- SHOP CONTENT -->
	<section id="content">
		<div class="content-blog">
					<div class="page_header text-center">
						<h2>Admin - Order Processing</h2>
						<!-- <p>Do you want to cancel Order?</p> -->
					</div>
<form method="post">
<div class="container">
			<div class="row">
				<div class="col-md-6 col-md-offset-3">
					<div class="billing-details">
						<h3 class="uppercase">Order Processing</h3>

				<table class="cart-table account-table table table-bordered">
				<thead>
					<tr>
						<th>Order</th>
						<th>Date</th>
						<th>Status</th>
						<th>Payment Mode</th>
						<th>Total</th>
					</tr>
				</thead>
				<tbody>

				<?php
					if(isset($_GET['id']) & !empty($_GET['id'])){
						$oid = $_GET['id'];
					}else{
						header('location: orders.php');
					}
					$ordsql = "SELECT * FROM orders WHERE id='$oid'";
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
							KSHS: <?php echo number_format($ordr['totalprice'],2); ?>/-
						</td>
					</tr>
				<?php } ?>
				</tbody>
			</table>	

						<div class="space30"></div>
							<label class="">Order Status </label>
							<select name="status" class="form-control">
								<option value="">Select Status</option>
								<option value="In Progress">In Progress</option>
								<option value="Dispatched">Dispatched</option>
								<option value="Delivered">Delivered</option>
							</select>

							<div class="clearfix space20"></div>
							<label>Message :</label>
							<textarea class="form-control" name="message" cols="10"> </textarea>

					<input type="hidden" name="orderid" value="<?php echo $_GET['id']; ?>">		 
						<div class="space30"></div>
					<input type="submit" class="button btn-lg" value="Update Order Status">
					</div>
				</div>
				
			</div>
		
		</div>		
</form>		
		</div>
	</section>
  </div>
            <hr>
            <div class="row">
            	<div class="col-md-12">
            		<nav>
            			<ul class="pagination">
            				<li><a href="#">&laquo;</a></li>
            				<li><a href="#">1</a></li>
            				<li><a href="#">2</a></li>
            				<li><a href="#">3</a></li>
            				<li><a href="#">4</a></li>
            				<li><a href="#">5</a></li>
            				<li><a href="#">&raquo;</a></li>
            			</ul>
            		</nav>
            		
            	</div>
            </div>
          </div>
        </div>

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

		<!-- jQuery -->
		<script src="http://code.jquery.com/jquery.js"></script>
		<!-- Bootstrap JavaScript -->
    <script src="js/bootstrap.min.js"></script>
		<script src="http://netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
	</body>
</html>
