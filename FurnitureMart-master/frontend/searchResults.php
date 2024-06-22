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

mysql_select_db($database_db52417, $db52417);
$query_categories = "SELECT * FROM category";
$categories = mysql_query($query_categories, $db52417) or die(mysql_error());
$row_categories = mysql_fetch_assoc($categories);
$totalRows_categories = mysql_num_rows($categories);

mysql_select_db($database_db52417, $db52417);
$query_products = "SELECT * FROM product";
$products = mysql_query($query_products, $db52417) or die(mysql_error());
$row_products = mysql_fetch_assoc($products);
$totalRows_products = mysql_num_rows($products);

$maxRows_results = 10;
$pageNum_results = 0;
if (isset($_GET['pageNum_results'])) {
  $pageNum_results = $_GET['pageNum_results'];
}
$startRow_results = $pageNum_results * $maxRows_results;

$colname_results = "-1";
if (isset($GET['item'])) {
  $colname_results = $GET['item'];
}
mysql_select_db($database_db52417, $db52417);
$query_results = sprintf("SELECT * FROM product WHERE Prod_Name LIKE %s OR Prod_dscrp LIKE %s ", GetSQLValueString("%" . $colname_results . "%", "text"),GetSQLValueString("%" . $colname_results . "%", "text"));
$query_limit_results = sprintf("%s LIMIT %d, %d", $query_results, $startRow_results, $maxRows_results);
$results = mysql_query($query_limit_results, $db52417) or die(mysql_error());
$row_results = mysql_fetch_assoc($results);

if (isset($_GET['totalRows_results'])) {
  $totalRows_results = $_GET['totalRows_results'];
} else {
  $all_results = mysql_query($query_results);
  $totalRows_results = mysql_num_rows($all_results);
}
$totalPages_results = ceil($totalRows_results/$maxRows_results)-1;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Search Results</title>
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
          <h2><span>Search Results</span></h2>
          <p>*Search results</p>
          <?php do { ?>
            <table>
              <tr>
                <td rowspan="2"><img src="../Images/<?php echo $row_results['Prod_thumb']; ?>" width="136" height="136" alt="Click to enlarge" /></td>
                <td>Name:<?php echo $row_results['Prod_Name']; ?></td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td>Quantity:<?php echo $row_results['Prod_Qty']; ?></td>
                <td>Price:<?php echo $row_results['Prod_Price']; ?></td>
              </tr>
            </table>
            <?php } while ($row_results = mysql_fetch_assoc($results)); ?>
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
mysql_free_result($categories);

mysql_free_result($products);

mysql_free_result($results);
?>
