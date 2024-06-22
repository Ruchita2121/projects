<?php require_once('../Connections/db52417.php'); ?>
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

$maxRows_rsProducts = 4;
$pageNum_rsProducts = 0;
if (isset($_GET['pageNum_rsProducts'])) {
  $pageNum_rsProducts = $_GET['pageNum_rsProducts'];
}
$startRow_rsProducts = $pageNum_rsProducts * $maxRows_rsProducts;

$colname_rsProducts = "-1";
if (isset($_GET['Cat_Id'])) {
  $colname_rsProducts = $_GET['Cat_Id'];
}
mysql_select_db($database_db52417, $db52417);
$query_rsProducts = sprintf("SELECT * FROM product WHERE Cat_Id = %s", GetSQLValueString($colname_rsProducts, "int"));
$query_limit_rsProducts = sprintf("%s LIMIT %d, %d", $query_rsProducts, $startRow_rsProducts, $maxRows_rsProducts);
$rsProducts = mysql_query($query_limit_rsProducts, $db52417) or die(mysql_error());
$row_rsProducts = mysql_fetch_assoc($rsProducts);

if (isset($_GET['totalRows_rsProducts'])) {
  $totalRows_rsProducts = $_GET['totalRows_rsProducts'];
} else {
  $all_rsProducts = mysql_query($query_rsProducts);
  $totalRows_rsProducts = mysql_num_rows($all_rsProducts);
}
$totalPages_rsProducts = ceil($totalRows_rsProducts/$maxRows_rsProducts)-1;

mysql_select_db($database_db52417, $db52417);
$query_rsCategories = "SELECT * FROM category ORDER BY CatID ASC";
$rsCategories = mysql_query($query_rsCategories, $db52417) or die(mysql_error());
$row_rsCategories = mysql_fetch_assoc($rsCategories);
$totalRows_rsCategories = mysql_num_rows($rsCategories);

$colname_rsCat = "-1";
if (isset($_GET['CatID'])) {
  $colname_rsCat = $_GET['CatID'];
}
mysql_select_db($database_db52417, $db52417);
$query_rsCat = sprintf("SELECT * FROM category WHERE CatID = %s", GetSQLValueString($colname_rsCat, "int"));
$rsCat = mysql_query($query_rsCat, $db52417) or die(mysql_error());
$row_rsCat = mysql_fetch_assoc($rsCat);
$totalRows_rsCat = mysql_num_rows($rsCat);

$queryString_rsProducts = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_rsProducts") == false && 
        stristr($param, "totalRows_rsProducts") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_rsProducts = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_rsProducts = sprintf("&totalRows_rsProducts=%d%s", $totalRows_rsProducts, $queryString_rsProducts);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Product List</title>
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
<!--
.style1 {font-size: large}
-->
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
          <h2><span>Products in Category:</span></h2>
          
          <hr />          
          <?php if ($totalRows_rsProducts == 0) { // Show if recordset empty ?>
            <p class="style1">There are no records to display from this category. Check in later for any updates.</p>
            <?php } // Show if recordset empty ?>
          <?php do { ?>
            <?php if ($totalRows_rsProducts > 0) { // Show if recordset not empty ?>
              <table width="600" border="0" align="center">
                <tr bgcolor="#FFFFCC">
                  <td colspan="2"><div align="center"><strong><?php echo $row_rsProducts['Prod_Name']; ?></strong>
                          <hr />
                  </div></td>
                </tr>
                <tr>
                  <td rowspan="3"><div align="center"><img src="../Images/<?php echo $row_rsProducts['Prod_thumb']; ?>" alt="Click to Enlarge" width="126" height="130" /></div></td>
                  <td>Quanity Remaining: <strong><?php echo $row_rsProducts['Prod_Qty']; ?></strong></td>
                </tr>
                <tr>
                  <td>Price KShs.<strong><?php echo $row_rsProducts['Prod_Price']; ?></strong></td>
                </tr>
                <tr>
                  <td><a href="productView.php?Prod_ID=<?php echo $row_rsProducts['Prod_ID']; ?>">View Details</a> |</td>
                </tr>
                <tr>
                  <td colspan="2">&nbsp;</td>
                </tr>
              </table>
              <?php } // Show if recordset not empty ?>
              <?php } while ($row_rsProducts = mysql_fetch_assoc($rsProducts)); ?>
          <p>&nbsp;
          <table border="0" align="center">
            <tr>
              <td><?php if ($pageNum_rsProducts > 0) { // Show if not first page ?>
                  <a href="<?php printf("%s?pageNum_rsProducts=%d%s", $currentPage, 0, $queryString_rsProducts); ?>">First</a>
                  <?php } // Show if not first page ?>              </td>
              <td><?php if ($pageNum_rsProducts > 0) { // Show if not first page ?>
                  <a href="<?php printf("%s?pageNum_rsProducts=%d%s", $currentPage, max(0, $pageNum_rsProducts - 1), $queryString_rsProducts); ?>">Previous</a>
                  <?php } // Show if not first page ?>              </td>
              <td><?php if ($pageNum_rsProducts < $totalPages_rsProducts) { // Show if not last page ?>
                  <a href="<?php printf("%s?pageNum_rsProducts=%d%s", $currentPage, min($totalPages_rsProducts, $pageNum_rsProducts + 1), $queryString_rsProducts); ?>">Next</a>
                  <?php } // Show if not last page ?>              </td>
              <td><?php if ($pageNum_rsProducts < $totalPages_rsProducts) { // Show if not last page ?>
                  <a href="<?php printf("%s?pageNum_rsProducts=%d%s", $currentPage, $totalPages_rsProducts, $queryString_rsProducts); ?>">Last</a>
                  <?php } // Show if not last page ?>              </td>
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
mysql_free_result($rsProducts);

mysql_free_result($rsCategories);

mysql_free_result($rsCat);
?>
