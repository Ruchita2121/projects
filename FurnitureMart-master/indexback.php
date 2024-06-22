<?php 
require_once('Connections/db52417.php'); ?>
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

mysql_select_db($database_db52417, $db52417);
$query_rsCategories = "SELECT * FROM category ORDER BY CatID ASC";
$rsCategories = mysql_query($query_rsCategories, $db52417) or die(mysql_error());
$row_rsCategories = mysql_fetch_assoc($rsCategories);
$totalRows_rsCategories = mysql_num_rows($rsCategories);
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
  $MM_fldUserAuthorization = "login_level";
  $MM_redirectLoginSuccess = "backend/home.php";
  $MM_redirectLoginFailed = "indexback.php";
  $MM_redirecttoReferrer = true;
  mysql_select_db($database_db52417, $db52417);
  	
  $LoginRS__query=sprintf("SELECT Cust_Email, CustPassword, login_level FROM customers WHERE Cust_Email=%s AND CustPassword=%s",
  GetSQLValueString($loginUsername, "text"), GetSQLValueString($password, "text")); 
   
  $LoginRS = mysql_query($LoginRS__query, $db52417) or die(mysql_error());
  $loginFoundUser = mysql_num_rows($LoginRS);
  if ($loginFoundUser) {
    
    $loginStrGroup  = mysql_result($LoginRS,0,'login_level');
    
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
<title>Login to Backend</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link href="style.css" rel="stylesheet" type="text/css" />
<!-- CuFon: Enables smooth pretty custom font rendering. 100% SEO friendly. To disable, remove this section -->
<script type="text/javascript" src="js/cufon-yui.js"></script>
<script type="text/javascript" src="js/droid_sans_400-droid_sans_700.font.js"></script>
<script type="text/javascript" src="js/cuf_run.js"></script>
<script type="text/javascript" src="js/jquery-1.3.2.min.js"></script>
<script type="text/javascript" src="js/radius.js"></script>
<!-- CuFon ends -->
</head>
<body>
<div class="main">
<!---bof header-->

<div class="header">
    <div class="header_resize">
      <div class="logo">
        <h1><a href="../index.php"><span>Furniture Mart </span><small></small></a></h1>
      </div>
      <div class="menu_nav">
        <ul>
          <li><a href="backend/home.php">Home</a></li>
          <li><a href="backend/products.php">Products</a></li>
          <li><a href="backend/customers.php">Customers</a></li>
          <li><a href="backend/categories.php">Categories</a></li>
          <li><a href="backend/ordersList.php">Orders</a></li>
          <li><a href="index.php">Go to Front End</a></li>
        </ul>
      </div>
      <div class="clr"></div>
      <!--<img src="images/hbg_img.jpg" width="970" height="321" alt="image" class="hbg_img" /> -->
      <div class="clr"></div>
    </div>
  </div>
<!--eof header-->
  <div class="content">
    <div class="content_resize">
    <!--bof main content-->
      <div class="mainbar">
        <div class="article">
          <h2><span>Login to access to Back End</span></h2>
          <p>*Only users with a certain access level can login here successfully.</p>

         
          <p>&nbsp;</p>
          <p>Go back to <a href="index.php">Home Page</a></p>
        </div>
 </div>
      <!--eof main content-->
       <!--bof side bar-->
<div class="sidebar">
        <div class="searchform">
          <form id="formsearch" name="formsearch" method="post" action="searchResults.php">
            <span>
            <input name="editbox_search" class="editbox_search" id="editbox_search" maxlength="80" value="Search our site:" type="text" />
            </span>
            <input name="button_search" src="Images/search_btn.gif" class="button_search" type="image" />
          </form>
  </div>
        <div class="gadget">
          <h2 class="star"><span>Categories</span></h2>
          <div class="clr"></div>
          <ul class="sb_menu">
            <?php do { ?>
            <li><a href="backend/productList.php?Cat_Id=<?php echo $row_rsCategories['CatID']; ?>"><?php echo $row_rsCategories['CatName']; ?></a></li>
              <?php } while ($row_rsCategories = mysql_fetch_assoc($rsCategories)); ?></ul>
  </div>
     <div class="gadget">
          <h2 class="star"><span>Login :</span></h2><div class="clr"></div>
          <ul class="ex_menu">
            <li> 
			<?php if(!isset($_SESSION['MM_Username']))
		  {
			  ?>
              <form id="formlogin" name="formlogin" method="post" action="<?php echo $loginFormAction; ?>">
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
                      <?php
			}
			else
			{
			?>
                    </p>
                      <p>Welcome You are signed in as...<strong><?php echo $_SESSION['MM_Username'];?></strong> </p>
                      <div id="message" align="center"> <a href="backend/logout.php">Logout</a>
                        <hr />                        
                      <a href="#">Account information </a>                      </div>
                      <?php
				}
				?></td>
                  </tr>
                </table>
                <p>&nbsp;</p>
              </form>
            </li>
            <li></li>
            <li></li>
          </ul>
     </div>   
</div>
    
      <!--eof side bar-->
      <div class="clr"></div>
    </div>
  </div>
<!--bof image on top-->
<?php require('backend/beforefooter.php');
  ?>  
  <!--eof imageon top-->
  <!--bof footer-->
<?php require('backend/footer.php');
  ?>
  <!--eof footer-->
</div>
</body>
</html>
<?php
mysql_free_result($rsCategories);
?>
