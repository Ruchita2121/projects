<?php 
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

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "registerform")) {
  $insertSQL = sprintf("INSERT INTO customers (Cust_Surname, Cust_Othername, Title_Id, Cust_Address, Cust_Town, Cust_Email, CustPassword, cust_Gender) VALUES (%s, %s, %s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['txtSurname'], "text"),
                       GetSQLValueString($_POST['txtOthername'], "text"),
                       GetSQLValueString($_POST['listTitle'], "int"),
                       GetSQLValueString($_POST['txtAddrs'], "text"),
                       GetSQLValueString($_POST['txtTown'], "text"),
                       GetSQLValueString($_POST['txtEmail'], "text"),
                       GetSQLValueString($_POST['txtPassword'], "text"),
                       GetSQLValueString($_POST['listGender'], "text"));

  mysql_select_db($database_db52417, $db52417);
  $Result1 = mysql_query($insertSQL, $db52417) or die(mysql_error());

  $insertGoTo = "../index.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}


mysql_select_db($database_db52417, $db52417);
$query_rsCustomer = "SELECT * FROM customers";
$rsCustomer = mysql_query($query_rsCustomer, $db52417) or die(mysql_error());
$row_rsCustomer = mysql_fetch_assoc($rsCustomer);
$totalRows_rsCustomer = mysql_num_rows($rsCustomer);

mysql_select_db($database_db52417, $db52417);
$query_rsTitles = "SELECT * FROM titles";
$rsTitles = mysql_query($query_rsTitles, $db52417) or die(mysql_error());
$row_rsTitles = mysql_fetch_assoc($rsTitles);
$totalRows_rsTitles = mysql_num_rows($rsTitles);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Registrration</title>
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
<!-- CuFon ends -->
<link href="../SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
<link href="../SpryAssets/SpryValidationTextarea.css" rel="stylesheet" type="text/css" />
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
          <h2><span>Registration</span></h2>
          
          <hr />
          *Enter all details to register
          <form id="registerform" name="registerform" method="POST" action="<?php echo $editFormAction; ?>">
            <table border="0">
              <tr>
                <td width="106">Surname:</td>
                <td width="439"><span id="sprytextSurname">
                  <label>
                  <input type="text" name="txtSurname" id="txtSurname" />
                  </label>
                <span class="textfieldRequiredMsg">Surname is required.</span></span></td>
              </tr>
              <tr>
                <td>Other Names:</td>
                <td><span id="sprytextOthername">
                  <label>
                  <input type="text" name="txtOthername" id="txtOthername" />
                  </label>
                <span class="textfieldRequiredMsg">Other name is required.</span></span></td>
              </tr>
              <tr>
                <td>Title:</td>
                <td><label>
                  <select name="listTitle" id="listTitle">
                    <?php
do {  
?>
                    <option value="<?php echo $row_rsTitles['Title_Id']?>"<?php if (!(strcmp($row_rsTitles['Title_Id'], $row_rsTitles['Title_Id']))) {echo "selected=\"selected\"";} ?>><?php echo $row_rsTitles['Title']?></option>
                    <?php
} while ($row_rsTitles = mysql_fetch_assoc($rsTitles));
  $rows = mysql_num_rows($rsTitles);
  if($rows > 0) {
      mysql_data_seek($rsTitles, 0);
	  $row_rsTitles = mysql_fetch_assoc($rsTitles);
  }
?>
                  </select>
                </label></td>
              </tr>
              <tr>
                <td>Gender:</td>
                <td><label>
                  <select name="listGender" id="listGender">
                    <option value="..." selected="selected">...</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                  </select>
                </label></td>
              </tr>
              <tr>
                <td>Address:</td>
                <td><span id="sprytextAddres">
                  <label>
                  <textarea name="txtAddrs" id="txtAddrs" cols="45" rows="5"></textarea>
                  </label>
                <span class="textareaRequiredMsg">Address is required.</span></span></td>
              </tr>
              <tr>
                <td>Town:</td>
                <td><span id="sprytextTown">
                  <label>
                  <input type="text" name="txtTown" id="txtTown" />
                  </label>
                <span class="textfieldRequiredMsg">Town is required.</span></span></td>
              </tr>
              <tr>
                <td>E-Mail Address: </td>
                <td><span id="sprytextemail">
                <label>
                <input type="text" name="txtEmail" id="txtEmail" />
                </label>
                <span class="textfieldRequiredMsg">E-Mail is required.</span><span class="textfieldInvalidFormatMsg">Invalid format.</span></span></td>
              </tr>
              <tr>
                <td>Password:</td>
                <td><span id="sprytextPassword">
                <label>
                <input type="password" name="txtPassword" id="txtPassword" />
                </label>
                <span class="textfieldRequiredMsg">Password is required.</span><span class="textfieldMinCharsMsg">Minimum number charachters 5.</span><span class="textfieldMaxCharsMsg">Exceeded 15  characters.</span></span></td>
              </tr>
              <tr>
                <td>Confirm Password:</td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td>Captcha:</td>
                <td> <!-- the body tag is required or the CAPTCHA may not show on some browsers -->
      <!-- your HTML content -->

      <form method="post" action="verify.php">
   
  
   <?php
          require_once('recaptchalib.php');
          $publickey = "6LeKnsESAAAAAOZqzIjKtJjiRGoxu82Wqng5tEen "; // you got this from the signup page
          echo recaptcha_get_html($publickey);
        ?>
        <input type="submit" />
      </form>

      </td>
              </tr>
              <tr>
                <td><td></td></td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td><label>
                  <input type="submit" name="registerbtn" id="registerbtn" value="Register" />
                </label></td>
              </tr>
            </table>
            <input type="hidden" name="MM_insert" value="registerform" />
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
<!--
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextSurname", "none", {validateOn:["blur"]});
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextOthername", "none", {validateOn:["blur"]});
var sprytextarea1 = new Spry.Widget.ValidationTextarea("sprytextAddres", {validateOn:["blur"]});
var sprytextfield3 = new Spry.Widget.ValidationTextField("sprytextTown", "none", {validateOn:["blur"]});
var sprytextfield4 = new Spry.Widget.ValidationTextField("sprytextemail", "email", {validateOn:["blur"]});
var sprytextfield5 = new Spry.Widget.ValidationTextField("sprytextPassword", "none", {minChars:5, maxChars:15, validateOn:["blur"]});
//-->
</script>
</body>
</html>
<?php
mysql_free_result($rsCustomer);

mysql_free_result($rsTitles);
?>
