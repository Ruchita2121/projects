<?php session_start();
require_once('../Connections/db52417.php'); ?>
<?php 
require_once('../Connections/db52417.php'); ?>
<?php
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  $theValue = (!get_magic_quotes_gpc()) ? addslashes($theValue) : $theValue;

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? "'" . doubleval($theValue) . "'" : "NULL";
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

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
  $insertSQL = sprintf("INSERT INTO shopcart (productid, shopcart_usercookie) VALUES (%s, %s)",
                       GetSQLValueString($_POST['hiddenprodID'], "int"),
                       GetSQLValueString($_POST['hiddenemail'], "text"));

  mysql_select_db($database_db52417, $db52417);
  $Result1 = mysql_query($insertSQL, $db52417) or die(mysql_error());

  $insertGoTo = "Cart.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}

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

$colname_Prod = "-1";
if (isset($_GET['Prod_ID'])) {
  $colname_Prod = $_GET['Prod_ID'];
}

mysql_select_db($database_db52417, $db52417);
$query_Categories = "SELECT * FROM category";
$Categories = mysql_query($query_Categories, $db52417) or die(mysql_error());
$row_Categories = mysql_fetch_assoc($Categories);
$totalRows_Categories = mysql_num_rows($Categories);

$colname_Product = "-1";
if (isset($_GET['Prod_ID'])) {
  $colname_Product = $_GET['Prod_ID'];
}
mysql_select_db($database_db52417, $db52417);
$query_Product = sprintf("SELECT * FROM product WHERE Prod_ID = %s", GetSQLValueString($colname_Product, "int"));
$Product = mysql_query($query_Product, $db52417) or die(mysql_error());
$row_Product = mysql_fetch_assoc($Product);
$totalRows_Product = mysql_num_rows($Product);

mysql_select_db($database_db52417, $db52417);
$query_rsProd = "SELECT * FROM shopcart";
$rsProd = mysql_query($query_rsProd, $db52417) or die(mysql_error());
$row_rsProd = mysql_fetch_assoc($rsProd);
$totalRows_rsProd = mysql_num_rows($rsProd);


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>View Product</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link href="../style.css" rel="stylesheet" type="text/css" />
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
<?php require('header.php');
  ?>
<!--eof header-->
  <div class="content">
    <div class="content_resize">
    <!--bof main content-->
      <div class="mainbar">
        <div class="article">
          <h2><span>View Product</span></h2>
          
          <hr />
          <form action="<?php echo $editFormAction; ?>" id="form1" name="form1" method="POST">
            <table border="0">
              <tr>
                <td colspan="2"><div align="center"><strong><?php echo $row_Product['Prod_Name']; ?></strong>
                  <hr />
                </div></td>
              </tr>
              <tr>
                <td rowspan="3"><img src="../Images/<?php echo $row_Product['Prod_Photo']; ?>" alt="Click to enlarge" width="200" height="200" /></td>
                <td><strong>Quantity remaining:<strong> <?php echo $row_Product['Prod_Qty']; ?></strong></strong></td>
              </tr>
              <tr>
                <td>Price: KShs. <strong><?php echo $row_Product['Prod_Price']; ?></strong></td>
              </tr>
              <tr>
                <td>Description: <strong><?php echo $row_Product['Prod_dscrp']; ?></strong></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td><input type="submit" name="btnAddCart" id="btnAddCart" value="Add to cart" />
                <input name="hiddenprodID" type="hidden" id="hiddenprodID" value="<?php echo $row_rsProd['productid']; ?>" />
                <input name="hiddenemail" type="hidden" id="hiddenemail" value="<?php echo $row_rsProd['shopcart_usercookie']; ?>" /></td>
              </tr>
            </table>
            <input type="hidden" name="MM_insert" value="form1">
          </form>
          <p>&nbsp;</p>
        Go back to <a href="Products.php">Products</a></div>
 </div>
      <!--eof main content-->
       <!--bof side bar-->
     <?php require('left.php');
  ?> 
     <!--eof side bar-->
      <div class="clr"></div>
    </div>
  </div>
<!--bof image on top-->
<?php require('beforefooter.php');
  ?>  
  <!--eof imageon top-->
  <!--bof footer-->
<?php require('footer.php');
  ?>
  <!--eof footer-->
</div>
</body>
</html>
<?php
mysql_free_result($Categories);

mysql_free_result($Product);

mysql_free_result($rsProd);

mysql_free_result($rsCategories);

mysql_free_result($rsProduct);
?>
