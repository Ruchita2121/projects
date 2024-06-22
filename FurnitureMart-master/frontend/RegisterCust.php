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

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
  $insertSQL = sprintf("INSERT INTO customers (CustID, Cust_Surname, Cust_Othername, Title_Id, Cust_Address, Cust_Town, Cust_Email, CustPassword, cust_Gender) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['hiddenCustID'], "int"),
                       GetSQLValueString($_POST['txtName'], "text"),
                       GetSQLValueString($_POST['txtName2'], "text"),
                       GetSQLValueString($_POST['Title'], "int"),
                       GetSQLValueString($_POST['txtAddress'], "text"),
                       GetSQLValueString($_POST['txtTown'], "text"),
                       GetSQLValueString($_POST['txtEmail'], "text"),
                       GetSQLValueString($_POST['txtPass'], "text"),
                       GetSQLValueString($_POST['Gender'], "text"));

  mysql_select_db($database_db52417, $db52417);
  $Result1 = mysql_query($insertSQL, $db52417) or die(mysql_error());

 	$email=urlencode($_POST['Cust_Email']);
    $insertGoTo = "activation.php?email=$email&mailAct=$c";
	  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}

mysql_select_db($database_db52417, $db52417);
$query_rsTitle = "SELECT * FROM titles ORDER BY Title_Id ASC";
$rsTitle = mysql_query($query_rsTitle, $db52417) or die(mysql_error());
$row_rsTitle = mysql_fetch_assoc($rsTitle);
$totalRows_rsTitle = mysql_num_rows($rsTitle);
 session_start();
require_once('../Connections/db52417.php'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Registration</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link href="../style.css" rel="stylesheet" type="text/css" />
<!-- CuFon: Enables smooth pretty custom font rendering. 100% SEO friendly. To disable, remove this section -->
<script type="text/javascript" src="js/cufon-yui.js"></script>
<script type="text/javascript" src="js/droid_sans_400-droid_sans_700.font.js"></script>
<script type="text/javascript" src="js/cuf_run.js"></script>
<script type="text/javascript" src="js/jquery-1.3.2.min.js"></script>
<script type="text/javascript" src="js/radius.js"></script>
<script src="../SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<script src="../SpryAssets/SpryValidationTextarea.js" type="text/javascript"></script>
<script src="../SpryAssets/SpryValidationPassword.js" type="text/javascript"></script>
<script src="../SpryAssets/SpryValidationConfirm.js" type="text/javascript"></script>

<!-- CuFon ends -->
<link href="../SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
<link href="../SpryAssets/SpryValidationTextarea.css" rel="stylesheet" type="text/css" />
<link href="../SpryAssets/SpryValidationPassword.css" rel="stylesheet" type="text/css" />
<link href="../SpryAssets/SpryValidationConfirm.css" rel="stylesheet" type="text/css" />
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
          <h2>Register here:</h2>
          <hr />
          <form id="formRegister" name="form1" method="POST" action="<?php echo $editFormAction; ?>">
            <table>
              <tr>
                <td>Name:</td>
                <td><label for="txtName"></label>
                  <span id="sprytextName">
                  <input type="text" name="txtName" id="txtName" />
                <span class="textfieldRequiredMsg">Name is required.</span></span></td>
              </tr>
              <tr>
                <td>Surname:</td>
                <td><span id="sprytextName2">
                  <input type="text" name="txtName2" id="txtName2" />
                <span class="textfieldRequiredMsg">Other name is required.</span></span></td>
              </tr>
              <tr>
                <td>Title:</td>
                <td><label for="Title"></label>
                  <select name="Title" id="Title">
                    <?php
do {  
?>
                    <option value="<?php echo $row_rsTitle['Title_Id']?>"<?php if (!(strcmp($row_rsTitle['Title_Id'], $row_rsTitle['Title']))) {echo "selected=\"selected\"";} ?>><?php echo $row_rsTitle['Title']?></option>
                    <?php
} while ($row_rsTitle = mysql_fetch_assoc($rsTitle));
  $rows = mysql_num_rows($rsTitle);
  if($rows > 0) {
      mysql_data_seek($rsTitle, 0);
	  $row_rsTitle = mysql_fetch_assoc($rsTitle);
  }
?>
                </select></td>
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
                <td>Address:</td>
                <td><label for="txtAddress"></label>
                  <span id="sprytextAddress">
                  <textarea name="txtAddress" id="txtAddress" cols="45" rows="5"></textarea>
                <span class="textareaRequiredMsg">Address is required.</span></span></td>
              </tr>
              <tr>
                <td>Town:</td>
                <td><span id="sprytextTown">
                  <input type="text" name="txtTown" id="txtTown" />
                <span class="textfieldRequiredMsg">Town is required.</span></span></td>
              </tr>
              <tr>
                <td>Email Address:</td>
                <td><span id="sprytextEmail">
                <input type="text" name="txtEmail" id="txtEmail" />
                <span class="textfieldRequiredMsg">Email is required.</span><span class="textfieldInvalidFormatMsg">Invalid format.</span></span></td>
              </tr>
              <tr>
                <td>Password:</td>
                <td><span id="sprypassword1">
                <input type="password" name="txtPass" id="txtPass" />
                <span class="passwordRequiredMsg">Password is required.</span><span class="passwordMinCharsMsg">Minimum number of characters not met.</span><span class="passwordMaxCharsMsg">Exceeded maximum number of characters.</span></span></td>
              </tr>
              <tr>
                <td>Confirm Password:</td>
                <td><span id="spryconfirm1">
                  <input type="password" name="txtPass2" id="txtPass2" />
                <span class="confirmRequiredMsg">Password is required.</span><span class="confirmInvalidMsg">The passwords don't match.</span></span></td>
              </tr>
              <tr>
                <td>Captcha:</td>
                <td><?php
          require_once('recaptchalib.php');
          $publickey = "6LeKnsESAAAAAOZqzIjKtJjiRGoxu82Wqng5tEen "; // you got this from the signup page
          echo recaptcha_get_html($publickey);
        ?></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td><input type="submit" name="btnregister" id="btnregister" value="Register" />
                  |
                  <input type="reset" name="btnReset" id="btnReset" value="Reset" /></td>
              </tr>
            </table>
            <input type="hidden" name="MM_insert" value="form1" />
            <input type="hidden" name="hiddenCustID" id="hiddenCustID" />
          </form>
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
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextName", "none", {validateOn:["blur"]});
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextName2", "none", {validateOn:["blur"]});
var sprytextarea1 = new Spry.Widget.ValidationTextarea("sprytextAddress", {validateOn:["blur"]});
var sprytextfield3 = new Spry.Widget.ValidationTextField("sprytextTown", "none", {validateOn:["blur"]});
var sprytextfield4 = new Spry.Widget.ValidationTextField("sprytextEmail", "email", {validateOn:["blur"]});
var sprypassword1 = new Spry.Widget.ValidationPassword("sprypassword1", {validateOn:["blur"], minChars:5, maxChars:10});
var spryconfirm1 = new Spry.Widget.ValidationConfirm("spryconfirm1", "txtPass", {validateOn:["blur"]});
</script>
</body>
</html>
<?php
mysql_free_result($rsTitle);
?>
