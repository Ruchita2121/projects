<?php require_once('../Connections/db52417.php'); ?>
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

$colname_rsOrderItems = "-1";
if (isset($_GET['OrderID'])) {
  $colname_rsOrderItems = $_GET['OrderID'];
}
mysql_select_db($database_db52417, $db52417);
$query_rsOrderItems = sprintf("SELECT * FROM order_items WHERE OrderID = %s", GetSQLValueString($colname_rsOrderItems, "int"));
$rsOrderItems = mysql_query($query_rsOrderItems, $db52417) or die(mysql_error());
$row_rsOrderItems = mysql_fetch_assoc($rsOrderItems);
$totalRows_rsOrderItems = mysql_num_rows($rsOrderItems);

mysql_select_db($database_db52417, $db52417);
$query_prod = "SELECT * FROM product";
$prod = mysql_query($query_prod, $db52417) or die(mysql_error());
$row_prod = mysql_fetch_assoc($prod);
$totalRows_prod = mysql_num_rows($prod);
 session_start();
require_once('../Connections/db52417.php'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>View order details</title>
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
          <h2><span>Order details</span></h2>
          <hr />
          <table width="600" border="1">
            <tr>
              <td>Order No</td>
              <td>Product</td>
              <td>Quantity</td>
              <td>Price</td>
            </tr>
            <?php do { ?>
            <tr>
              <td><?php echo $row_rsOrderItems['OrderID']; ?></td>
              <td><a href="productView.php?Prod_ID="><?php echo $row_rsOrderItems['productid']; ?></a></td>
              <td><?php echo $row_rsOrderItems['order_item_qty']; ?></td>
              <td><?php echo $row_rsOrderItems['productprice']; ?></td>
            </tr>
            <?php } while ($row_rsOrderItems = mysql_fetch_assoc($rsOrderItems)); ?>
          </table>
          <p>&nbsp;</p>
        </div>
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
mysql_free_result($rsOrderItems);

mysql_free_result($prod);
?>
