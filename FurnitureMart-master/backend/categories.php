<?php require_once('../Connections/db52417.php'); 

?>
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

mysql_select_db($database_db52417, $db52417);
$query_rsCategories = "SELECT * FROM category";
$rsCategories = mysql_query($query_rsCategories, $db52417) or die(mysql_error());
$row_rsCategories = mysql_fetch_assoc($rsCategories);
$totalRows_rsCategories = mysql_num_rows($rsCategories);

mysql_select_db($database_db52417, $db52417);
$query_rsViewCat = "SELECT * FROM category";
$rsViewCat = mysql_query($query_rsViewCat, $db52417) or die(mysql_error());
$row_rsViewCat = mysql_fetch_assoc($rsViewCat);
$totalRows_rsViewCat = mysql_num_rows($rsViewCat);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Categories</title>
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
.style1 {color: #000000}
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
          <h2 align="center"><span>Categories</span></h2>
          <hr />
          <p>Add a <a href="categoryAdd.php">new Category</a></p>
          

<table border="0" cellpadding="5" cellspacing="5">
  <tr>
    <th><strong>Category No.</strong></th>
    <th bgcolor="#FFFFCC"><strong>Name</strong></th>
    <th><strong>Description</strong></th>
    <th>&nbsp;</th>
    <th>&nbsp;</th>
  </tr>
  <?php do { ?>
    <tr>
      <td><span class="style1"><?php echo $row_rsViewCat['CatID']; ?></span></td>
      <td bgcolor="#FFFFCC"><span class="style1"><?php echo $row_rsViewCat['CatName']; ?></span></td>
      <td><span class="style1"><?php echo $row_rsViewCat['CatDescription']; ?></span></td>
      <td><a href="categoryEdit.php?CatID=<?php echo $row_rsViewCat['CatID']; ?>">Edit</a></td>
      <td><a href="categoryDelete.php?CatID=<?php echo $row_rsViewCat['CatID']; ?>">Delete</a></td>
    </tr>
    <tr>
      <td colspan="5"><hr /></td>
      </tr>
    <?php } while ($row_rsViewCat = mysql_fetch_assoc($rsViewCat)); ?>
</table>
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
mysql_free_result($rsCategories);

mysql_free_result($rsViewCat);
?>