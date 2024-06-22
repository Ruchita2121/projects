<?php require_once('../Connections/db52417.php'); ?>
<?php session_start();
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

$currentPage = $_SERVER["PHP_SELF"];

$maxRows_rsOrders = 10;
$pageNum_rsOrders = 0;
if (isset($_GET['pageNum_rsOrders'])) {
  $pageNum_rsOrders = $_GET['pageNum_rsOrders'];
}
$startRow_rsOrders = $pageNum_rsOrders * $maxRows_rsOrders;

mysql_select_db($database_db52417, $db52417);
$query_rsOrders = "SELECT * FROM orders ORDER BY OrderID ASC";
$query_limit_rsOrders = sprintf("%s LIMIT %d, %d", $query_rsOrders, $startRow_rsOrders, $maxRows_rsOrders);
$rsOrders = mysql_query($query_limit_rsOrders, $db52417) or die(mysql_error());
$row_rsOrders = mysql_fetch_assoc($rsOrders);

if (isset($_GET['totalRows_rsOrders'])) {
  $totalRows_rsOrders = $_GET['totalRows_rsOrders'];
} else {
  $all_rsOrders = mysql_query($query_rsOrders);
  $totalRows_rsOrders = mysql_num_rows($all_rsOrders);
}
$totalPages_rsOrders = ceil($totalRows_rsOrders/$maxRows_rsOrders)-1;

mysql_select_db($database_db52417, $db52417);
$query_orderItems = "SELECT * FROM order_items";
$orderItems = mysql_query($query_orderItems, $db52417) or die(mysql_error());
$row_orderItems = mysql_fetch_assoc($orderItems);
$totalRows_orderItems = mysql_num_rows($orderItems);

$queryString_rsOrders = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_rsOrders") == false && 
        stristr($param, "totalRows_rsOrders") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_rsOrders = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_rsOrders = sprintf("&totalRows_rsOrders=%d%s", $totalRows_rsOrders, $queryString_rsOrders);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Orders list</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link href="../style.css" rel="stylesheet" type="text/css" />
<!-- CuFon: Enables smooth pretty custom font rendering. 100% SEO friendly. To disable, remove this section -->
<script type="text/javascript" src="js/cufon-yui.js"></script>
<script type="text/javascript" src="js/droid_sans_400-droid_sans_700.font.js"></script>
<script type="text/javascript" src="js/cuf_run.js"></script>
<script type="text/javascript" src="js/jquery-1.3.2.min.js"></script>
<script type="text/javascript" src="js/radius.js"></script>
<!-- CuFon ends -->
<style type="text/css">
.main .content .content_resize .mainbar .article table tr th {
	color: #000;
}
.main .content .content_resize .mainbar .article table {
	color: #000;
}
</style>
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
          <h2><span>Orders List</span></h2>
          <hr />
          <p>&nbsp;</p>
          <table width="500" border="1">
            <tr>
              <th>CustomerID</th>
              <th>Date of Order </th>
              <th>Total Price</th>
              <th>&nbsp;</th>
            </tr>
            <?php do { ?>
              <tr>
                <td><a href="viewCustomers.php?CustID=<?php echo $row_rsOrders['CustomerID']; ?>"><?php echo $row_rsOrders['CustomerID']; ?></a></td>
                <td><?php echo $row_rsOrders['C_order_date']; ?></td>
                <td><?php echo $row_rsOrders['OrderTotal']; ?></td>
                <td><a href="viewOrders.php?OrderID=<?php echo $row_orderItems['OrderID']; ?>">View Details</a></td>
              </tr>
              <?php } while ($row_rsOrders = mysql_fetch_assoc($rsOrders)); ?>
          </table>
          <p>&nbsp;          
          <table border="0">
            <tr>
              <td><?php if ($pageNum_rsOrders > 0) { // Show if not first page ?>
                  <a href="<?php printf("%s?pageNum_rsOrders=%d%s", $currentPage, 0, $queryString_rsOrders); ?>">First</a>
              <?php } // Show if not first page ?></td>
              <td><?php if ($pageNum_rsOrders > 0) { // Show if not first page ?>
                  <a href="<?php printf("%s?pageNum_rsOrders=%d%s", $currentPage, max(0, $pageNum_rsOrders - 1), $queryString_rsOrders); ?>">Previous</a>
              <?php } // Show if not first page ?></td>
              <td><?php if ($pageNum_rsOrders < $totalPages_rsOrders) { // Show if not last page ?>
                  <a href="<?php printf("%s?pageNum_rsOrders=%d%s", $currentPage, min($totalPages_rsOrders, $pageNum_rsOrders + 1), $queryString_rsOrders); ?>">Next</a>
              <?php } // Show if not last page ?></td>
              <td><?php if ($pageNum_rsOrders < $totalPages_rsOrders) { // Show if not last page ?>
                  <a href="<?php printf("%s?pageNum_rsOrders=%d%s", $currentPage, $totalPages_rsOrders, $queryString_rsOrders); ?>">Last</a>
              <?php } // Show if not last page ?></td>
            </tr>
          </table>
          </p>
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
mysql_free_result($rsOrders);

mysql_free_result($orderItems);
?>
