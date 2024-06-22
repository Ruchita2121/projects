<?php require_once('../Connections/db52417.php'); ?>
<?php
if (!isset($_SESSION)) {
  session_start();
}
$MM_authorizedUsers = "Administrator";
$MM_donotCheckaccess = "false";

// *** Restrict Access To Page: Grant or deny access to this page
function isAuthorized($strUsers, $strGroups, $UserName, $UserGroup) { 
  // For security, start by assuming the visitor is NOT authorized. 
  $isValid = False; 

  // When a visitor has logged into this site, the Session variable MM_Username set equal to their username. 
  // Therefore, we know that a user is NOT logged in if that Session variable is blank. 
  if (!empty($UserName)) { 
    // Besides being logged in, you may restrict access to only certain users based on an ID established when they login. 
    // Parse the strings into arrays. 
    $arrUsers = Explode(",", $strUsers); 
    $arrGroups = Explode(",", $strGroups); 
    if (in_array($UserName, $arrUsers)) { 
      $isValid = true; 
    } 
    // Or, you may restrict access to only certain users based on their username. 
    if (in_array($UserGroup, $arrGroups)) { 
      $isValid = true; 
    } 
    if (($strUsers == "") && false) { 
      $isValid = true; 
    } 
  } 
  return $isValid; 
}

$MM_restrictGoTo = "../indexback.php";
if (!((isset($_SESSION['MM_Username'])) && (isAuthorized("",$MM_authorizedUsers, $_SESSION['MM_Username'], $_SESSION['MM_UserGroup'])))) {   
  $MM_qsChar = "?";
  $MM_referrer = $_SERVER['PHP_SELF'];
  if (strpos($MM_restrictGoTo, "?")) $MM_qsChar = "&";
  if (isset($_SERVER['QUERY_STRING']) && strlen($_SERVER['QUERY_STRING']) > 0) 
  $MM_referrer .= "?" . $_SERVER['QUERY_STRING'];
  $MM_restrictGoTo = $MM_restrictGoTo. $MM_qsChar . "accesscheck=" . urlencode($MM_referrer);
  header("Location: ". $MM_restrictGoTo); 
  exit;
}
?>
<?php require_once('../Connections/db52417.php'); 

?>
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

$colname_rsCustomer = "-1";
if (isset($_GET['CustID'])) {
  $colname_rsCustomer = $_GET['CustID'];
}
mysql_select_db($database_db52417, $db52417);
$query_rsCustomer = sprintf("SELECT * FROM customers WHERE CustID = %s", GetSQLValueString($colname_rsCustomer, "int"));
$rsCustomer = mysql_query($query_rsCustomer, $db52417) or die(mysql_error());
$row_rsCustomer = mysql_fetch_assoc($rsCustomer);
$totalRows_rsCustomer = mysql_num_rows($rsCustomer);$colname_rsCustomer = "-1";
if (isset($_GET['CustID'])) {
  $colname_rsCustomer = $_GET['CustID'];
}
mysql_select_db($database_db52417, $db52417);
$query_rsCustomer = sprintf("SELECT * FROM customers WHERE CustID = %s", GetSQLValueString($colname_rsCustomer, "int"));
$rsCustomer = mysql_query($query_rsCustomer, $db52417) or die(mysql_error());
$row_rsCustomer = mysql_fetch_assoc($rsCustomer);
$totalRows_rsCustomer = mysql_num_rows($rsCustomer);

$colname_rsTitles = "-1";
if (isset($_GET['Title_Id'])) {
  $colname_rsTitles = $_GET['Title_Id'];
}
mysql_select_db($database_db52417, $db52417);
$query_rsTitles = sprintf("SELECT * FROM titles WHERE Title_Id = %s", GetSQLValueString($colname_rsTitles, "int"));
$rsTitles = mysql_query($query_rsTitles, $db52417) or die(mysql_error());
$row_rsTitles = mysql_fetch_assoc($rsTitles);
$totalRows_rsTitles = mysql_num_rows($rsTitles);

mysql_select_db($database_db52417, $db52417);
$query_rsCustomers = "SELECT * FROM customers ORDER BY CustID ASC";
$rsCustomers = mysql_query($query_rsCustomers, $db52417) or die(mysql_error());
$row_rsCustomers = mysql_fetch_assoc($rsCustomers);
$totalRows_rsCustomers = mysql_num_rows($rsCustomers);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Customer's Details</title>
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
.style1 {
	color: #000000;
	font-weight: bold;
}
.style2 {color: #000000}
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
          <h2 align="center"><span>Customer's Details</span></h2>
          
          <hr />
          <table width="650" border="0">
            <tr>
              <td><div align="right"><span class="style2"><strong>Names:</strong></span></div></td>
              <td>&nbsp;</td>
              <td><div align="left"><span class="style2"><?php echo $row_rsCustomer['Cust_Surname']; ?>, <?php echo $row_rsCustomer['Cust_Othername']; ?></span></div></td>
            </tr>
            <tr>
              <td><div align="right"><span class="style2"><strong>Gender</strong>:</span></div></td>
              <td>&nbsp;</td>
              <td><div align="left"><span class="style2"><?php echo $row_rsCustomer['cust_Gender']; ?></span></div></td>
            </tr>
            <tr>
              <td><div align="right"><span class="style2"><strong>Address</strong>:</span></div></td>
              <td>&nbsp;</td>
              <td><div align="left"><span class="style2"><?php echo $row_rsCustomer['Cust_Address']; ?></span></div></td>
            </tr>
            <tr>
              <td><div align="right"><span class="style2"><strong>Town:</strong></span></div></td>
              <td>&nbsp;</td>
              <td><div align="left"><span class="style2"><?php echo $row_rsCustomer['Cust_Town']; ?></span></div></td>
            </tr>
            <tr>
              <td><div align="right"><span class="style2"><strong>E-mail Address:</strong></span></div></td>
              <td>&nbsp;</td>
              <td><div align="left"><span class="style2"><?php echo $row_rsCustomer['Cust_Email']; ?></span></div></td>
            </tr>
            <tr>
              <td><div align="right"><span class="style2"><strong>Activated</strong>:</span></div></td>
              <td>&nbsp;</td>
              <td><div align="left"><span class="style2">
                <input <?php if (!(strcmp($row_rsCustomer['Cust_Active'],1))) {echo "checked=\"checked\"";} ?> type="checkbox" name="chckAct" id="chckAct" disabled="disabled" />
              </span></div></td>
            </tr>
            <tr>
              <td><div align="right"><span class="style2"><strong>News</strong>:</span></div></td>
              <td>&nbsp;</td>
              <td><div align="left"><span class="style2">
                <input <?php if (!(strcmp($row_rsCustomer['Cust_news'],1))) {echo "checked=\"checked\"";} ?> type="checkbox" name="chkNews" id="chkNews"  disabled="disabled"/>
              </span></div></td>
            </tr>
            <tr>
              <td height="23"><div align="right"><span class="style2"><strong>User type:</strong></span></div></td>
              <td>&nbsp;</td>
              <td><div align="left"><span class="style2"><?php echo $row_rsCustomer['login_level']; ?></span></div></td>
            </tr>
            <tr>
              <td height="23" colspan="3">&nbsp;</td>
            </tr>
          </table>
          <p>
            <label></label>
          </p>
          <p class="style2">
            <label></label><label></label>
            Go to <a href="customers.php">Customer list</a><br />
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
mysql_free_result($rsCustomer);

mysql_free_result($rsTitles);

mysql_free_result($rsCustomers);
?>
