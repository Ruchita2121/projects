<?php require_once('Connections/localhost.php'); ?>
<?php require_once('Connections/localhost.php'); ?>
<?php session_start();
require_once('Connections/localhost.php'); ?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

$maxRows_rspopProducts = 3;
$pageNum_rspopProducts = 0;
if (isset($_GET['pageNum_rspopProducts'])) {
  $pageNum_rspopProducts = $_GET['pageNum_rspopProducts'];
}
$startRow_rspopProducts = $pageNum_rspopProducts * $maxRows_rspopProducts;

mysql_select_db($database_localhost, $localhost);
$query_rspopProducts = "SELECT * FROM product ORDER BY Prod_Qty DESC";
$query_limit_rspopProducts = sprintf("%s LIMIT %d, %d", $query_rspopProducts, $startRow_rspopProducts, $maxRows_rspopProducts);
$rspopProducts = mysql_query($query_limit_rspopProducts, $localhost) or die(mysql_error());
$row_rspopProducts = mysql_fetch_assoc($rspopProducts);

if (isset($_GET['totalRows_rspopProducts'])) {
  $totalRows_rspopProducts = $_GET['totalRows_rspopProducts'];
} else {
  $all_rspopProducts = mysql_query($query_rspopProducts);
  $totalRows_rspopProducts = mysql_num_rows($all_rspopProducts);
}
$totalPages_rspopProducts = ceil($totalRows_rspopProducts/$maxRows_rspopProducts)-1;

mysql_select_db($database_localhost, $localhost);
$query_rsCategories = "SELECT * FROM category ORDER BY CatID ASC";
$rsCategories = mysql_query($query_rsCategories, $localhost) or die(mysql_error());
$row_rsCategories = mysql_fetch_assoc($rsCategories);
$totalRows_rsCategories = mysql_num_rows($rsCategories);

mysql_select_db($database_localhost, $localhost);
$query_rsCust = "SELECT * FROM customers ORDER BY CustID ASC";
$rsCust = mysql_query($query_rsCust, $localhost) or die(mysql_error());
$row_rsCust = mysql_fetch_assoc($rsCust);
$totalRows_rsCust = mysql_num_rows($rsCust);
?>
<?php
// *** Validate request to login to this site.
if (!isset($_SESSION)) {
  session_start();
}

$loginFormAction = $_SERVER['PHP_SELF'];
if (isset($_GET['accesscheck'])) {
  $_SESSION['PrevUrl'] = $_GET['accesscheck'];
}

if (isset($_POST['txtUsername'])) {
  $loginUsername=$_POST['txtUsername'];
  $password=$_POST['txtpassword'];
  $MM_fldUserAuthorization = "";
  $MM_redirectLoginSuccess = "index.php";
  $MM_redirectLoginFailed = "index.php";
  $MM_redirecttoReferrer = true;
  mysql_select_db($database_localhost, $localhost);
  
  $LoginRS__query=sprintf("SELECT Cust_Email, CustPassword FROM customers WHERE Cust_Email=%s AND CustPassword=%s",
    GetSQLValueString($loginUsername, "text"), GetSQLValueString($password, "text")); 
   
  $LoginRS = mysql_query($LoginRS__query, $localhost) or die(mysql_error());
  $loginFoundUser = mysql_num_rows($LoginRS);
  if ($loginFoundUser) {
     $loginStrGroup = "";
    
	if (PHP_VERSION >= 5.1) {session_regenerate_id(true);} else {session_regenerate_id();}
    //declare two session variables and assign them
    $_SESSION['MM_Username'] = $loginUsername;
    $_SESSION['MM_UserGroup'] = $loginStrGroup;	      

    if (isset($_SESSION['PrevUrl']) && true) {
      $MM_redirectLoginSuccess = $_SESSION['PrevUrl'];	
    }
    header("Location: " . $MM_redirectLoginSuccess );
  }
  else {
    header("Location: ". $MM_redirectLoginFailed );
  }
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Furniture Mart</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link href="style.css" rel="stylesheet" type="text/css" />
<!-- CuFon: Enables smooth pretty custom font rendering. 100% SEO friendly. To disable, remove this section -->
<script type="text/javascript" src="js/cufon-yui.js"></script>
<script type="text/javascript" src="js/droid_sans_400-droid_sans_700.font.js"></script>
<script type="text/javascript" src="js/cuf_run.js"></script>
<script type="text/javascript" src="js/jquery-1.3.2.min.js"></script>
<script type="text/javascript" src="js/radius.js"></script>
<!-- CuFon ends -->
<style type="text/css">
<!--
.style1 {
	color: #000000;
	font-weight: bold;
}
.style2 {color: #000000}
.style3 {
	color: #000033;
	font-size: 16px;
}
-->
</style>
</head>
<body>
<div class="main">
<!---bof header-->
<div class="header">
    <div class="header_resize">
      <div class="logo">
        <h1><a href="index.php"><span>Furniture Mart </span><small></small></a></h1>
      </div>
      <div class="menu_nav">
        <ul>
          <li class="active"><a href="index.php">Home</a></li>
          <li><a href="frontend/Products.php"> Products</a></li>
          <li><a href="frontend/newArrivals.php">New Arrivals</a></li>
          <li><a href="frontend/Cart.php?Cust_Email=<?php echo $_SESSION['email']; ?>">Shop cart</a></li>
          <li><a href="frontend/contactUs.php">Contact Us</a></li>
          <li><a href="indexback.php">Go to Back End</a></li>
        </ul>
      </div>
      <div class="clr"></div>
      <img src="Images/hbg_img.jpg" width="970" height="321" alt="image" class="hbg_img" /> 
      <div class="clr"></div>
    </div>
  </div>
<!--eof header-->
  <div class="content">
    <div class="content_resize">
    <!--bof main content-->
      <div class="mainbar">
        <div class="article">
          <h2 align="center"><span>Welcome</span></h2>
               <hr />
               <h2 align="center"> -Popular Products-</h2>
               <?php do { ?>
            <table width="650" border="0" align="center">
              <tr bgcolor="#FFFFCC">
                <td colspan="2"><div align="center"><span class="style2"><strong><?php echo $row_rspopProducts['Prod_Name']; ?></strong></span>
                    <hr />
                    </div></td>
              </tr>
              <tr>
                <td rowspan="3"><div align="center"><a href="backend/productView.php?Prod_ID=<?php echo $row_rspopProducts['Prod_ID']; ?>"><img src="Images/<?php echo $row_rspopProducts['Prod_thumb']; ?>" alt="Click to enlarge" width="126" height="130" /></a></div></td>
                <td>Price <strong>KShs</strong> . <span class="style1"><?php echo $row_rspopProducts['Prod_Price']; ?></span></td>
              </tr>
              <tr>
                <td><strong>Quantity remainaing : </strong><span class="style2"><?php echo $row_rspopProducts['Prod_Qty']; ?></span></td>
              </tr>
              <tr>
                <td><a href="frontend/productView.php?Prod_ID=<?php echo $row_rspopProducts['Prod_ID']; ?>">View Details</a> | </td>
              </tr>
              <tr>
                <td colspan="2"><hr /></td>
              </tr>
                          </table>
            <?php } while ($row_rspopProducts = mysql_fetch_assoc($rspopProducts)); ?>
        </div>
    </div>
      <!--eof main content-->
       <!--bof side bar-->
<div class="sidebar">
        <div class="searchform">
        
         <!-- <form id="formsearch"  method="get" action="frontend/searchResults.php">
            <span><input name="editbox_search" class="editbox_search" id="editbox_search" maxlength="80" value="Search our site:" type="text" />
            </span>
            <input name="button_search" src="images/search_btn.gif" class="button_search" type="image" />
          </form> -->
          <form action="../frontend/searchResults.php" method="get" name="form2" id="form2">
            <label> <span class="style3">Search: </span> <span class="style11">
            <input name="Item" type="text" id="Item" />
            </span>
            <input type="submit" name="Submit" value="Go" />
            </label>
        </form>
        </div>
        <div class="gadget">
          <h2 class="star"><span>Categories</span></h2>
          <div class="clr"></div>
          <ul class="sb_menu">
            <?php do { ?>
              <li><a href="frontend/productList.php?Cat_Id=<?php echo $row_rsCategories['CatID']; ?>"><?php echo $row_rsCategories['CatName']; ?></a></li>
			  
          <?php } while ($row_rsCategories = mysql_fetch_assoc($rsCategories)); ?></ul>
          <a href="frontend/catalogue.php">View Catalogue</a>		</div>
        <div class="gadget">
          <h2 align="center" class="star"><span>Login</span></h2>
          <hr />
          <?php if(!isset($_SESSION['MM_Username']))
		  {
			  ?><form id="formlogin" name="formlogin" method="POST" action="<?php echo $loginFormAction; ?>">
        <label></label>
            <hr />
            <table border="0">
              <tr>
                <td width="261"><label><br />
                  Username:</label>
                  <input type="text" name="txtUsername" id="txtUsername" />
                  <hr /></td>
              </tr>
              <tr>
                <td><label> Password:
                  <input name="txtpassword" type="password" id="txtpassword" maxlength="16" />
                </label>
                  <hr /></td>
              </tr>
              <tr>
                <td><p>
                  <label>
                    <input type="submit" name="btnlogin" id="btnlogin" value="Login" />
                    |
                    <input type="reset" name="btnreset" id="btnreset" value="Reset" />
                    </label>
                </p>
                  <hr />
                  <p>
                    <label>                      <a href="frontend/RegisterCust.php">Register here</a></label>
                  </p>
                  <hr />
                  <p>
                    <label>                      <a href="frontend/forgotPassword.php">Forgot Password?</a><br />
                    </label>
                    <?php
			}
			else
			{
			?>
                  </p>
                  <p>Welcome You are signed in as...<strong><?php echo $_SESSION['MM_Username'];?></strong></p>
                  <div id="message" align="center"> <a href="frontend/logout.php">Logout</a>
                    <hr />                    
                  <a href="frontend/accountInfo.php?CustID=<?php echo $row_rsCust['CustID']; ?>">Account information </a>                  </div>
                  <?php
				}
				?></td>
              </tr>
            </table>
            <p>&nbsp;</p>
          </form>
          <p>&nbsp;</p>
          <div class="clr"></div>
          
              
        </div>
      </div>    
      <!--eof side bar-->
      <div class="clr"></div>
    </div>
  </div>
<!--bof image on top-->
<div class="fbg">
    <div class="fbg_resize">
      <div class="col c1">
        <h2><span>Image Gallery</span></h2>
        <a href="#"><img src="images/pix1.jpg" width="58" height="58" alt="pix" /></a>
        <a href="#"><img src="images/pix2.jpg" width="58" height="58" alt="pix" /></a>
        <a href="#"><img src="images/pix3.jpg" width="58" height="58" alt="pix" /></a>
        <a href="#"><img src="images/pix4.jpg" width="58" height="58" alt="pix" /></a>
        <a href="#"><img src="images/pix5.jpg" width="58" height="58" alt="pix" /></a>
        <a href="#"><img src="images/pix6.jpg" width="58" height="58" alt="pix" /></a>
      </div>
      <div class="col c2">
        <h2><span>About Us</span></h2>
        <p>We deal in only the finest furniture products.<br />
        Furniture Mart has been in business since July 2007.</p>
        <!-- AddThis Button BEGIN -->
<div class="addthis_toolbox addthis_default_style ">
<a class="addthis_button_facebook_like" fb:like:layout="button_count"></a>
<a class="addthis_button_tweet"></a>
<a class="addthis_counter addthis_pill_style"></a>
</div>
<script type="text/javascript">var addthis_config = {"data_track_clickback":true};</script>
<script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js#username=yasmin98"></script>
<!-- AddThis Button END -->

        <p>&nbsp;</p>
      </div>
      <div class="col c3">
        <h2><span>Contact</span></h2>
        <p>Don't hesitate to contact us if you have any inquiry about our website or products</p>
        <p><a href="mailto:support@yoursite.com">support@furnituremart.com</a></p>
        <p>+254 (02) 6073-47<br />
          +254 (02) 6073-48</p>
        <p>Address: 30059-00100 Fairview Gardens 1st Ngong Avenue</p>
        </div>
      <div class="clr"></div>
    </div>
  </div> 
  <!--eof imageon top-->
  <!--bof footer-->
 
 <div class="footer">
    <div class="footer_resize">
      <p class="lf">&copy; Copyright <a href="#">Furniture Mart</a>. <span> Design by  <a href="http://www.hotwebsitetemplates.net/" title="Website Templates">Web Technologies</a></span> 
      <a href="frontend/FAQ.php"> FAQ </a>  
      <a href="frontend/ContactUs.php"> Contact Us</a><a href="frontend/aboutUs.php"> About Us</a>
      <div class="clr"></div>
  </div>
  </div>
     
  <!--eof footer-->
</div>
</body>
</html>
<?php
mysql_free_result($rspopProducts);

mysql_free_result($rsCategories);

mysql_free_result($rsCust);
?>
