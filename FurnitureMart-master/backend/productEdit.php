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

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form1")) {
  $updateSQL = sprintf("UPDATE product SET Prod_Name=%s, Cat_Id=%s, Prod_Price=%s, Prod_dscrp=%s, Prod_Qty=%s, Prod_Available=%s WHERE Prod_ID=%s",
                       GetSQLValueString($_POST['txtPdName'], "text"),
                       GetSQLValueString($_POST['listCats'], "int"),
                       GetSQLValueString($_POST['txtPrice'], "double"),
                       GetSQLValueString($_POST['txtDescr'], "text"),
                       GetSQLValueString($_POST['txtQnty'], "int"),
                       GetSQLValueString(isset($_POST['chkAvailable']) ? "true" : "", "defined","1","0"),
                       GetSQLValueString($_POST['hiddenProdId'], "int"));

  mysql_select_db($database_db52417, $db52417);
  $Result1 = mysql_query($updateSQL, $db52417) or die(mysql_error());

  $updateGoTo = "products.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));
}

$colname_rsEditProduct = "-1";
if (isset($_GET['Prod_ID'])) {
  $colname_rsEditProduct = $_GET['Prod_ID'];
}
mysql_select_db($database_db52417, $db52417);
$query_rsEditProduct = sprintf("SELECT * FROM product WHERE Prod_ID = %s", GetSQLValueString($colname_rsEditProduct, "int"));
$rsEditProduct = mysql_query($query_rsEditProduct, $db52417) or die(mysql_error());
$row_rsEditProduct = mysql_fetch_assoc($rsEditProduct);
$totalRows_rsEditProduct = mysql_num_rows($rsEditProduct);

mysql_select_db($database_db52417, $db52417);
$query_rsCategory = "SELECT * FROM category ORDER BY CatID ASC";
$rsCategory = mysql_query($query_rsCategory, $db52417) or die(mysql_error());
$row_rsCategory = mysql_fetch_assoc($rsCategory);
$totalRows_rsCategory = mysql_num_rows($rsCategory);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Edit Product</title>
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
          <h2><span>Edit Product</span></h2>
          
          <hr />
          <form id="form1" name="form1" method="POST" action="<?php echo $editFormAction; ?>">
            <table border="0">
              <tr>
                <td>Name:</td>
                <td><label>
                  <input name="txtPdName" type="text" id="txtPdName" value="<?php echo $row_rsEditProduct['Prod_Name']; ?>" />
                </label></td>
              </tr>
              <tr>
                <td>Category:</td>
                <td><label>
                  <select name="listCats" id="listCats">
                    <?php
do {  
?>
                    <option value="<?php echo $row_rsCategory['CatID']?>"<?php if (!(strcmp($row_rsCategory['CatID'], $row_rsEditProduct['Cat_Id']))) {echo "selected=\"selected\"";} ?>><?php echo $row_rsCategory['CatName']?></option>
                    <?php
} while ($row_rsCategory = mysql_fetch_assoc($rsCategory));
  $rows = mysql_num_rows($rsCategory);
  if($rows > 0) {
      mysql_data_seek($rsCategory, 0);
	  $row_rsCategory = mysql_fetch_assoc($rsCategory);
  }
?>
                  </select>
                </label></td>
              </tr>
              <tr>
                <td>Price:</td>
                <td><label>
                  <input name="txtPrice" type="text" id="txtPrice" value="<?php echo $row_rsEditProduct['Prod_Price']; ?>" />
                </label></td>
              </tr>
              <tr>
                <td>Description:</td>
                <td><label>
                  <textarea name="txtDescr" id="txtDescr" cols="45" rows="5"><?php echo $row_rsEditProduct['Prod_dscrp']; ?></textarea>
                </label></td>
              </tr>
              <tr>
                <td>Quantity:</td>
                <td><label>
                  <input name="txtQnty" type="text" id="txtQnty" value="<?php echo $row_rsEditProduct['Prod_Qty']; ?>" />
                </label></td>
              </tr>
              <tr>
                <td>Available:</td>
                <td><label>
                  <input <?php if (!(strcmp($row_rsEditProduct['Prod_Available'],1))) {echo "checked=\"checked\"";} ?> type="checkbox" name="chkAvailable" id="chkAvailable" />
                (check if Available or leave unchecked if unavailable)</label></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td><label>
                  <input type="submit" name="Updatebtn" id="Updatebtn" value="Update this record" />
                  <input type="reset" name="resetbtn" id="resetbtn" value="Reset" />
                </label></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
            </table>
                    <p>
                      <input name="hiddenProdId" type="hidden" id="hiddenProdId" value="<?php echo $row_rsEditProduct['Prod_ID']; ?>" />
                    </p>
                              <input type="hidden" name="MM_update" value="form1" />
          </form>
          <p>Back to <a href="products.php">Product Listing</a></p>
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
mysql_free_result($rsEditProduct);

mysql_free_result($rsCategory);
?>
