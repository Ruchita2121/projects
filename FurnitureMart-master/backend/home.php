<?php require_once('../Connections/db52417.php'); ?>
<?php require_once('../Connections/db52417.php'); ?>
<?php session_start();

require_once('../Connections/db52417.php');?>
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

$maxRows_rsCustomers = 10;
$pageNum_rsCustomers = 0;
if (isset($_GET['pageNum_rsCustomers'])) {
  $pageNum_rsCustomers = $_GET['pageNum_rsCustomers'];
}
$startRow_rsCustomers = $pageNum_rsCustomers * $maxRows_rsCustomers;

mysql_select_db($database_db52417, $db52417);
$query_rsCustomers = "SELECT * FROM customers";
$query_limit_rsCustomers = sprintf("%s LIMIT %d, %d", $query_rsCustomers, $startRow_rsCustomers, $maxRows_rsCustomers);
$rsCustomers = mysql_query($query_limit_rsCustomers, $db52417) or die(mysql_error());
$row_rsCustomers = mysql_fetch_assoc($rsCustomers);

if (isset($_GET['totalRows_rsCustomers'])) {
  $totalRows_rsCustomers = $_GET['totalRows_rsCustomers'];
} else {
  $all_rsCustomers = mysql_query($query_rsCustomers);
  $totalRows_rsCustomers = mysql_num_rows($all_rsCustomers);
}
$totalPages_rsCustomers = ceil($totalRows_rsCustomers/$maxRows_rsCustomers)-1;

$maxRows_rsProducts = 10;
$pageNum_rsProducts = 0;
if (isset($_GET['pageNum_rsProducts'])) {
  $pageNum_rsProducts = $_GET['pageNum_rsProducts'];
}
$startRow_rsProducts = $pageNum_rsProducts * $maxRows_rsProducts;

mysql_select_db($database_db52417, $db52417);
$query_rsProducts = "SELECT * FROM product ORDER BY Prod_Qty ASC";
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

$queryString_rsCustomers = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_rsCustomers") == false && 
        stristr($param, "totalRows_rsCustomers") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_rsCustomers = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_rsCustomers = sprintf("&totalRows_rsCustomers=%d%s", $totalRows_rsCustomers, $queryString_rsCustomers);

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
<?php

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Home</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link href="../style.css" rel="stylesheet" type="text/css" />
<!-- CuFon: Enables smooth pretty custom font rendering. 100% SEO friendly. To disable, remove this section -->
<script type="text/javascript" src="js/cufon-yui.js"></script>
<script type="text/javascript" src="js/droid_sans_400-droid_sans_700.font.js"></script>
<script type="text/javascript" src="js/cuf_run.js"></script>
<script type="text/javascript" src="js/jquery-1.3.2.min.js"></script>
<script type="text/javascript" src="js/radius.js"></script>
<script src="../SpryAssets/SpryAccordion.js" type="text/javascript"></script>
<!-- CuFon ends -->
<style type="text/css">
<!--
.style1 {color: #000000}
-->
</style>
<link href="../SpryAssets/SpryAccordion.css" rel="stylesheet" type="text/css" />
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
          <h2><span>Welcome to Back End</span></h2>
          <hr />
          <div id="Accordion1" class="Accordion" tabindex="0">
            <div class="AccordionPanel">
              <div class="AccordionPanelTab">Products</div>
              <div class="AccordionPanelContent">
                <table width="650" border="0" cellpadding="5" cellspacing="5">
                  <tr>
                    <th>Thumbnail</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Description</th>
                    <th>Quantity</th>
                  </tr>
                  <?php do { ?>
                  <tr>
                    <td><a href="productView.php?Prod_ID=<?php echo $row_rsProducts['Prod_ID']; ?>"><img src="../Images/<?php echo $row_rsProducts['Prod_thumb']; ?>" alt="Click to enlarge" width="100" height="100" /></a></td>
                    <td><div align="center"><a href="productView.php?Prod_ID=<?php echo $row_rsProducts['Prod_ID']; ?>"><?php echo $row_rsProducts['Prod_Name']; ?></a></div></td>
                    <td><div align="center"><?php echo $row_rsProducts['Prod_Price']; ?></div></td>
                    <td><div align="center"><?php echo $row_rsProducts['Prod_dscrp']; ?></div></td>
                    <td><div align="center"><?php echo $row_rsProducts['Prod_Qty']; ?></div></td>
                  </tr>
                  <?php } while ($row_rsProducts = mysql_fetch_assoc($rsProducts)); ?>
                  <tr>
                    <td colspan="5">&nbsp;
                      <table border="0">
                        <tr>
                          <td><?php if ($pageNum_rsProducts > 0) { // Show if not first page ?>
                            <a href="<?php printf("%s?pageNum_rsProducts=%d%s", $currentPage, 0, $queryString_rsProducts); ?>">First</a>
                          <?php } // Show if not first page ?></td>
                          <td><?php if ($pageNum_rsProducts > 0) { // Show if not first page ?>
                            <a href="<?php printf("%s?pageNum_rsProducts=%d%s", $currentPage, max(0, $pageNum_rsProducts - 1), $queryString_rsProducts); ?>">Previous</a>
                          <?php } // Show if not first page ?></td>
                          <td><?php if ($pageNum_rsProducts < $totalPages_rsProducts) { // Show if not last page ?>
                            <a href="<?php printf("%s?pageNum_rsProducts=%d%s", $currentPage, min($totalPages_rsProducts, $pageNum_rsProducts + 1), $queryString_rsProducts); ?>">Next</a>
                          <?php } // Show if not last page ?></td>
                          <td><?php if ($pageNum_rsProducts < $totalPages_rsProducts) { // Show if not last page ?>
                            <a href="<?php printf("%s?pageNum_rsProducts=%d%s", $currentPage, $totalPages_rsProducts, $queryString_rsProducts); ?>">Last</a>
                          <?php } // Show if not last page ?></td>
                        </tr>
                      </table></td>
                  </tr>
                </table>
              </div>
            </div>
            <div class="AccordionPanel">
              <div class="AccordionPanelTab">Categories</div>
              <div class="AccordionPanelContent">
                <table width="650" border="0">
                  <tr>
                    <th>Category No.</th>
                    <th>Name</th>
                    <th>Description</th>
                  </tr>
                  <?php do { ?>
                  <tr>
                    <td><div align="center"><span class="style1"><?php echo $row_rsCategories['CatID']; ?></span></div></td>
                    <td><div align="center"><span class="style1"><a href="categoryView.php?CatID=<?php echo $row_rsCategories['CatID']; ?>"><?php echo $row_rsCategories['CatName']; ?></a></span></div></td>
                    <td><div align="center"><span class="style1"><?php echo $row_rsCategories['CatDescription']; ?></span></div></td>
                  </tr>
                  <?php } while ($row_rsCategories = mysql_fetch_assoc($rsCategories)); ?>
                </table>
              </div>
            </div>
<div class="AccordionPanel">
              <div class="AccordionPanelTab">Customers </div>
              <div class="AccordionPanelContent">
                <table width="650" border="0" cellpadding="5" cellspacing="5">
                  <tr>
                    <th>Names</th>
                    <th>Gender</th>
                    <th>Address, Town</th>
                    <th>E-mail Address</th>
                    <th>Login Level</th>
                  </tr>
                  <?php do { ?>
                  <tr>
                    <td><div align="center"><a href="viewCustomers.php?CustID=<?php echo $row_rsCustomers['CustID']; ?>"><?php echo $row_rsCustomers['Cust_Surname']; ?> <?php echo $row_rsCustomers['Cust_Othername']; ?></a></div></td>
                    <td><div align="center"><?php echo $row_rsCustomers['cust_Gender']; ?></div></td>
                    <td><div align="center"><?php echo $row_rsCustomers['Cust_Address']; ?>, <?php echo $row_rsCustomers['Cust_Town']; ?></div></td>
                    <td><div align="center"><?php echo $row_rsCustomers['Cust_Email']; ?></div></td>
                    <td><div align="center"><?php echo $row_rsCustomers['login_level']; ?></div></td>
                  </tr>
                  <?php } while ($row_rsCustomers = mysql_fetch_assoc($rsCustomers)); ?>
                  <tr>
                    <td colspan="5">&nbsp;
                      <table border="0">
                        <tr>
                          <td><?php if ($pageNum_rsCustomers > 0) { // Show if not first page ?>
                            <a href="<?php printf("%s?pageNum_rsCustomers=%d%s", $currentPage, 0, $queryString_rsCustomers); ?>">First</a>
                          <?php } // Show if not first page ?></td>
                          <td><?php if ($pageNum_rsCustomers > 0) { // Show if not first page ?>
                            <a href="<?php printf("%s?pageNum_rsCustomers=%d%s", $currentPage, max(0, $pageNum_rsCustomers - 1), $queryString_rsCustomers); ?>">Previous</a>
                          <?php } // Show if not first page ?></td>
                          <td><?php if ($pageNum_rsCustomers < $totalPages_rsCustomers) { // Show if not last page ?>
                            <a href="<?php printf("%s?pageNum_rsCustomers=%d%s", $currentPage, min($totalPages_rsCustomers, $pageNum_rsCustomers + 1), $queryString_rsCustomers); ?>">Next</a>
                          <?php } // Show if not last page ?></td>
                          <td><?php if ($pageNum_rsCustomers < $totalPages_rsCustomers) { // Show if not last page ?>
                            <a href="<?php printf("%s?pageNum_rsCustomers=%d%s", $currentPage, $totalPages_rsCustomers, $queryString_rsCustomers); ?>">Last</a>
                          <?php } // Show if not last page ?></td>
                        </tr>
                      </table></td>
                  </tr>
                </table>
                

              </div>
            </div>
          </div>
          <p>&nbsp;</p>
          <p>&nbsp;</p>
          <p>&nbsp;            
          </p>
          <p>&nbsp;</p>
          <p>&nbsp;</p>
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
<script type="text/javascript">
<!--
var Accordion1 = new Spry.Widget.Accordion("Accordion1");
//-->
</script>
</body>
</html>
<?php
mysql_free_result($rsCustomers);

mysql_free_result($rsProducts);

mysql_free_result($rsCategories);
?>
