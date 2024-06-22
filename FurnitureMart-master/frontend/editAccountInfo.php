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

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "formUpdate")) {
  $updateSQL = sprintf("UPDATE customers SET Cust_Surname=%s, Cust_Othername=%s, Cust_Address=%s, Cust_Town=%s, Cust_Email=%s, cust_Gender=%s WHERE CustID=%s",
                       GetSQLValueString($_POST['txtName'], "text"),
                       GetSQLValueString($_POST['txtOtherName'], "text"),
                       GetSQLValueString($_POST['txtAddress'], "text"),
                       GetSQLValueString($_POST['txtTown'], "text"),
                       GetSQLValueString($_POST['txtEmail'], "text"),
                       GetSQLValueString($_POST['Gender'], "text"),
                       GetSQLValueString($_POST['hiddenCustID'], "int"));

  mysql_select_db($database_db52417, $db52417);
  $Result1 = mysql_query($updateSQL, $db52417) or die(mysql_error());

  $updateGoTo = "accountInfo.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));
}

$colname_rsCustomer = "-1";
if (isset($_GET['CustID'])) {
  $colname_rsCustomer = $_GET['CustID'];
}
mysql_select_db($database_db52417, $db52417);
$query_rsCustomer = sprintf("SELECT * FROM customers WHERE CustID = %s", GetSQLValueString($colname_rsCustomer, "int"));
$rsCustomer = mysql_query($query_rsCustomer, $db52417) or die(mysql_error());
$row_rsCustomer = mysql_fetch_assoc($rsCustomer);
$totalRows_rsCustomer = mysql_num_rows($rsCustomer);
 session_start();
require_once('../Connections/db52417.php'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Edit Profile</title>
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
          <h2>Edit Profile</h2>
          <hr />
          <form id="formUpdate" name="formUpdate" method="POST" action="<?php echo $editFormAction; ?>">
            <table>
              <tr>
                <td>Name:</td>
                <td><label for="txtName4"></label>
                  <input name="txtName" type="text" id="txtName4" value="<?php echo $row_rsCustomer['Cust_Surname']; ?>" /></td>
              </tr>
              <tr>
                <td>Other Names:</td>
                <td><input name="txtOtherName" type="text" id="txtOtherName" value="<?php echo $row_rsCustomer['Cust_Othername']; ?>" /></td>
              </tr>
              <tr>
                <td>Address:</td>
                <td><label for="txtAddress"></label>
                  <textarea name="txtAddress" id="txtAddress" cols="45" rows="5"><?php echo $row_rsCustomer['Cust_Address']; ?></textarea></td>
              </tr>
              <tr>
                <td>Town:</td>
                <td><input name="txtTown" type="text" id="txtTown" value="<?php echo $row_rsCustomer['Cust_Town']; ?>" /></td>
              </tr>
              <tr>
                <td>Gender:</td>
                <td><label for="Gender"></label>
                  <select name="Gender" id="Gender">
                    <option value="Male" selected="selected">Male</option>
                    <option value="Female">Female</option>
                  </select></td>
              </tr>
              <tr>
                <td>Email:</td>
                <td><input name="txtEmail" type="text" id="txtEmail" value="<?php echo $row_rsCustomer['Cust_Email']; ?>" /></td>
              </tr>
              <tr>
                <td><input name="hiddenCustID" type="hidden" id="hiddenCustID" value="<?php echo $row_rsCustomer['CustID']; ?>" /></td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td><input type="submit" name="btnUpdate" id="btnUpdate" value="Update " /></td>
              </tr>
            </table>
            <input type="hidden" name="MM_update" value="formUpdate" />
          </form>
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
</body>
</html>
<?php
mysql_free_result($rsCustomer);
?>
