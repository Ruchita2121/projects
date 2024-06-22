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
session_start();
?>
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
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Customers</title>
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
          <h2><span>Customers of Furniture Mart</span></h2>
          
          <hr />
          <table width="650" border="0" cellpadding="5" cellspacing="5">
            <tr bgcolor="#FFFFFF">
              <th>Names</th>
              <th>Gender</th>
              <th>Address, Town</th>
              <th>E-mail Address</th>
            </tr>
            <?php do { ?>
              <tr>
                <td nowrap="nowrap" bgcolor="#FFFFCC"><div align="center"><a href="viewCustomers.php?CustID=<?php echo $row_rsCustomers['CustID']; ?>"><?php echo $row_rsCustomers['Cust_Surname']; ?> <?php echo $row_rsCustomers['Cust_Othername']; ?></a></div></td>
                <td nowrap="nowrap"><div align="center"><?php echo $row_rsCustomers['cust_Gender']; ?></div></td>
                <td nowrap="nowrap"><div align="center"><?php echo $row_rsCustomers['Cust_Address']; ?>, <?php echo $row_rsCustomers['Cust_Town']; ?></div></td>
                <td nowrap="nowrap"><div align="center"><?php echo $row_rsCustomers['Cust_Email']; ?></div></td>
              </tr>
              <?php } while ($row_rsCustomers = mysql_fetch_assoc($rsCustomers)); ?>
<tr bgcolor="#FFFFFF">
              <td colspan="4" nowrap="nowrap">&nbsp;
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
mysql_free_result($rsCustomers);
?>
