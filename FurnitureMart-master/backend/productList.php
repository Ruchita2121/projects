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
<title>Products by Category</title><?php require_once('../Connections/db52417.php'); ?>
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
<style type="text/css">
<!--
.style1 {
	color: #000000;
	font-weight: bold;
	font-size: small;
}
.style2 {font-size: small}
.style3 {color: #000000}
.style4 {
	font-size: large;
	font-weight: bold;
}
-->
</style>
<head>
<title></title>
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
          <h2 align="center"><span>Products by Category</span></h2>
          
          <hr align="center" />
          <?php if ($totalRows_rsProducts == 0) { // Show if recordset empty ?>
            <p class="style4">There are no records in this category today. Check in later for updates</p>
            <?php } // Show if recordset empty ?>
          <?php do { ?>
            <?php if ($totalRows_rsProducts > 0) { // Show if recordset not empty ?>
              <table width="650" border="0" align="center">
                <tr bgcolor="#FFFF99">
                  <td colspan="2"><div align="center"><span class="style1"><?php echo $row_rsProducts['Prod_Name']; ?></span>
                          <hr />
                  </div></td>
                </tr>
                <tr>
                  <td rowspan="2"><img src="../Images/<?php echo $row_rsProducts['Prod_thumb']; ?>" alt="Click to enlarge" width="130" height="130" /></td>
                  <td><span class="style2">Quantity remaining :<span class="style3"><?php echo $row_rsProducts['Prod_Qty']; ?></span></span></td>
                </tr>
                <tr>
                  <td><span class="style2">Price KShs.<span class="style3"><?php echo $row_rsProducts['Prod_Price']; ?></span></span></td>
                </tr>
                <tr>
                  <td>&nbsp;</td>
                  <td><span class="style2">Description: <?php echo $row_rsProducts['Prod_dscrp']; ?></span></td>
                </tr>
                <tr>
                  <td>&nbsp;</td>
                  <td><span class="style2"><a href="productEdit.php?Prod_ID=<?php echo $row_rsProducts['Prod_ID']; ?>">Edit</a> | Delete</span></td>
                </tr>
                <tr>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
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
</html><?php
mysql_free_result($rsProducts);
?>