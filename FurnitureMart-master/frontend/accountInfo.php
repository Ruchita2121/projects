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

$colname_rsCust = "-1";
if (isset($_GET['CustID'])) {
  $colname_rsCust = $_GET['CustID'];
}
mysql_select_db($database_db52417, $db52417);
$query_rsCust = sprintf("SELECT * FROM customers WHERE CustID = %s", GetSQLValueString($colname_rsCust, "int"));
$rsCust = mysql_query($query_rsCust, $db52417) or die(mysql_error());
$row_rsCust = mysql_fetch_assoc($rsCust);
$totalRows_rsCust = mysql_num_rows($rsCust);$colname_rsCust = "-1";
if (isset($_GET['CustID'])) {
  $colname_rsCust = $_GET['CustID'];
}
mysql_select_db($database_db52417, $db52417);
$query_rsCust = sprintf("SELECT * FROM customers WHERE CustID = %s", GetSQLValueString($colname_rsCust, "int"));
$rsCust = mysql_query($query_rsCust, $db52417) or die(mysql_error());
$row_rsCust = mysql_fetch_assoc($rsCust);
$totalRows_rsCust = mysql_num_rows($rsCust);
 $colname_rsCust = "-1";
if (isset($_GET['Cust_Email'])) {
  $colname_rsCust = $_GET['Cust_Email'];
}
mysql_select_db($database_db52417, $db52417);
$query_rsCust = sprintf("SELECT * FROM customers WHERE Cust_Email = %s", GetSQLValueString($colname_rsCust, "text"));
$rsCust = mysql_query($query_rsCust, $db52417) or die(mysql_error());
$row_rsCust = mysql_fetch_assoc($rsCust);

$colname_rsCustomers = "-1";
if (isset($_GET['CustID'])) {
  $colname_rsCustomers = $_GET['CustID'];
}
mysql_select_db($database_db52417, $db52417);
$query_rsCustomers = sprintf("SELECT * FROM customers WHERE CustID = %s", GetSQLValueString($colname_rsCustomers, "int"));
$rsCustomers = mysql_query($query_rsCustomers, $db52417) or die(mysql_error());
$row_rsCustomers = mysql_fetch_assoc($rsCustomers);

session_start();
require_once('../Connections/db52417.php'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Account Information</title>
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
.main .content .content_resize .mainbar .article table tr td {
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
          <h2>Personal Details</h2>
          <hr />
          <table>
            <tr>
              <td>Name:</td>
              <td><?php echo $row_rsCust['Cust_Surname']; ?></td>
            </tr>
            <tr>
              <td>Other Names:</td>
              <td><?php echo $row_rsCust['Cust_Othername']; ?></td>
            </tr>
            <tr>
              <td>Address:</td>
              <td><?php echo $row_rsCust['Cust_Address']; ?></td>
            </tr>
            <tr>
              <td>Town:</td>
              <td><?php echo $row_rsCust['Cust_Town']; ?></td>
            </tr>
            <tr>
              <td>E-Mail:</td>
              <td><?php echo $row_rsCust['Cust_Email']; ?></td>
            </tr>
          </table>
          <p><a href="editAccountInfo.php?CustID=<?php echo $row_rsCustomers['CustID']; ?>">Edit my Information</a></p>
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
mysql_free_result($rsCust);
?>
