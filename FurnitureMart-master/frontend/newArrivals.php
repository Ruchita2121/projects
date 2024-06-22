<?php session_start();
require_once('../Connections/db52417.php'); ?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;

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
}

$maxRows_rsNewArrivals = 4;
$pageNum_rsNewArrivals = 0;
if (isset($_GET['pageNum_rsNewArrivals'])) {
  $pageNum_rsNewArrivals = $_GET['pageNum_rsNewArrivals'];
}
$startRow_rsNewArrivals = $pageNum_rsNewArrivals * $maxRows_rsNewArrivals;

mysql_select_db($database_db52417, $db52417);
$query_rsNewArrivals = "SELECT * FROM product ORDER BY Prod_ID DESC";
$query_limit_rsNewArrivals = sprintf("%s LIMIT %d, %d", $query_rsNewArrivals, $startRow_rsNewArrivals, $maxRows_rsNewArrivals);
$rsNewArrivals = mysql_query($query_limit_rsNewArrivals, $db52417) or die(mysql_error());
$row_rsNewArrivals = mysql_fetch_assoc($rsNewArrivals);

if (isset($_GET['totalRows_rsNewArrivals'])) {
  $totalRows_rsNewArrivals = $_GET['totalRows_rsNewArrivals'];
} else {
  $all_rsNewArrivals = mysql_query($query_rsNewArrivals);
  $totalRows_rsNewArrivals = mysql_num_rows($all_rsNewArrivals);
}
$totalPages_rsNewArrivals = ceil($totalRows_rsNewArrivals/$maxRows_rsNewArrivals)-1;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>New Arrivals</title>
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
          <h2 align="center"><span>New Arrivals</span></h2>
          <hr />
          <?php do { ?>
            <table width="600" border="0" align="center">
              <tr bgcolor="#FFFFCC">
                <td colspan="2"><div align="center"><strong><?php echo $row_rsNewArrivals['Prod_Name']; ?></strong>
                    <hr />
          </div></td>
              </tr>
              <tr>
                <td rowspan="3"><div align="center"><img src="../Images/<?php echo $row_rsNewArrivals['Prod_thumb']; ?>" alt="Click to enlarge" width="126" height="130" /></div></td>
        <td>Quantity Remaining: <strong><?php echo $row_rsNewArrivals['Prod_Qty']; ?></strong></td>
      </tr>
              <tr>
                <td>Price: Kshs. <strong><?php echo $row_rsNewArrivals['Prod_Price']; ?></strong></td>
      </tr>
              <tr>
                <td><a href="productView.php?Prod_ID=<?php echo $row_rsNewArrivals['Prod_ID']; ?>">View Details </a>| </td>
      </tr>
              <tr>
                <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
                </table>
            <?php } while ($row_rsNewArrivals = mysql_fetch_assoc($rsNewArrivals)); ?></div>
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
mysql_free_result($rsNewArrivals);
?>

