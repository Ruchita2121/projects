<?php session_start();
require_once('../Connections/db52417.php'); ?>
<?php require_once('../Connections/db52417.php'); ?>
<?php 
require_once('../Connections/db52417.php'); ?>
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

if ((isset($_GET['shop_id'])) && ($_GET['shop_id'] != "")) {
  $deleteSQL = sprintf("DELETE FROM shopcart WHERE shop_id=%s",
                       GetSQLValueString($_GET['shop_id'], "int"));

  mysql_select_db($database_db52417, $db52417);
  $Result1 = mysql_query($deleteSQL, $db52417) or die(mysql_error());

  $deleteGoTo = "Cart.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $deleteGoTo .= (strpos($deleteGoTo, '?')) ? "&" : "?";
    $deleteGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $deleteGoTo));
}

mysql_select_db($database_db52417, $db52417);
$query_rsCart = "SELECT * FROM shopcart";
$rsCart = mysql_query($query_rsCart, $db52417) or die(mysql_error());
$row_rsCart = mysql_fetch_assoc($rsCart);
$totalRows_rsCart = mysql_num_rows($rsCart);

mysql_select_db($database_db52417, $db52417);
$query_rsProd = "SELECT Prod_Name, Prod_thumb FROM product";
$rsProd = mysql_query($query_rsProd, $db52417) or die(mysql_error());
$row_rsProd = mysql_fetch_assoc($rsProd);
$totalRows_rsProd = mysql_num_rows($rsProd);
 session_start();
require_once('../Connections/db52417.php'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Cart</title>
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
          <h2><span>My Cart</span></h2>
          <hr />
          <p><!-- Added Code -->
          </p>
 <p><a href="Products.php">Back to Products</a>
 
 </p>
 </p>
          <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
            <?php
if($_REQUEST['Update'])
{
$u = mysql_query("update shopcart set shopcart_qty = '".$_POST['Quantity']."' where shop_id = '".$_POST['ShopCartID']."'");
}
/*if($_REQUEST['Order'])
{

}*/
$g = mysql_query("select * from shopcart where shopcart_usercookie = '".$_SESSION['email']."'");
$r = mysql_num_rows($g);

for($i=0;$i<$r;$i++)
{
$sc = mysql_fetch_array($g);
$p = mysql_fetch_array(mysql_query("select * from product where Prod_ID = '".$sc['productid']."'"));
$t += $sc['shopcart_qty'] * $p['Prod_Price'];
?>
            <form  id="cart" action="" method="post" >
              <tr>
                <td width="12%" rowspan="5" align="center" valign="top"><img src="../Images/<?php echo $p['Prod_thumb']; ?>" alt="" width="100" height="100" /></td>
                <td width="1%" rowspan="5">&nbsp;</td>
                <td width="87%"><span class="style3">Name:</span> <?php echo $p['Prod_Name']; ?></td>
              </tr>
              <tr>
                <td><span class="style3">Quantity Added:</span>
                  <input type="text" name="Quantity" value="<?php echo $sc['shopcart_qty']; ?>" size="4" />
                  <input type="hidden" name="ShopCartID" value="<?php echo $sc['shop_id']; ?>" />
                  <input type="submit" name="Update" value="Update" /></td>
              </tr>
              <tr>
                <td height="25"><span class="style3">Price per item: </span>KSh. <?php echo $p['Prod_Price']; ?></td>
              </tr>
              <tr>
                <td height="26"><span class="style3">Total item price:</span> <?php echo $sc['shopcart_qty'] * $p['Prod_Price']; ?></td>
              </tr>
              <tr>
                <td height="51"><label>
                  <input type="submit" name="delete" value="Delete Item" />
                </label>
                  <input name="hiddenField" type="hidden" id="hiddenField" value="<?php echo $row_rsCart['productid']; ?>" /></td>
              </tr>
              <tr>
                <td colspan="3">&nbsp;</td>
              </tr>
            </form>
            <?php } ?>
            <tr>
              <td align="middle" colspan="3">Total Shop Cart Price: KSh. <?php echo $t; ?></td>
            </tr>
            <tr>
              <td colspan="3" align="left"><form action="" id="cart1" method="post">
                <table width="768" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <th width="406" scope="col"><a href="Products.php" class="style2">Continue Shopping</a></th>
                    <th width="362" scope="col"><input name="Order" type="submit" id="Order" value="Order" onclick="window.alert('products added to Order');"/></th>
                  </tr>
                </table>
              </form></td>
            </tr>
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
mysql_free_result($rsCart);

mysql_free_result($rsProd);
?>
 