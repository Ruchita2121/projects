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

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}
	
	
if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
  	$file = $_FILES['filePhoto'];
    $file_name = $_FILES['filePhoto']['name'];
    $file_tmp_name = $_FILES['filePhoto']['tmp_name'];  
	
	$insertSQL = sprintf("INSERT INTO product (Prod_ID, Prod_Name, Cat_Id, Prod_Price, Prod_dscrp, Prod_thumb, Prod_Qty, Prod_Available) VALUES (%s, %s, %s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['hiddenProId'], "int"),
                       GetSQLValueString($_POST['txtProdName'], "text"),
                       GetSQLValueString($_POST['listCats'], "int"),
                       GetSQLValueString($_POST['txtPrice'], "double"),
                       GetSQLValueString($_POST['txtDescr'], "text"),
                       GetSQLValueString($_FILES['$file_name'], "text"),
                       GetSQLValueString($_POST['txtQnty'], "int"),
                       GetSQLValueString(isset($_POST['chkAvailble']) ? "true" : "", "defined","1","0"));

	//upload images to this folder (complete path)
    $path = "Images/$file_name";
   
   //use move_uploaded_file function to upload or move file to the given folder or path
   if(move_uploaded_file($file_tmp_name, $path))
   {
        echo "File Successfully uploaded";
    }
    else
    {
        echo "There is something wrong in File Upload. Post the error message on Cramerz Forum to find solution !";
    }
   

  mysql_select_db($database_db52417, $db52417);
  $Result1 = mysql_query($insertSQL, $db52417) or die(mysql_error());

  $insertGoTo = "products.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}

mysql_select_db($database_db52417, $db52417);
$query_rsAddProduct = "SELECT * FROM product";
$rsAddProduct = mysql_query($query_rsAddProduct, $db52417) or die(mysql_error());
$row_rsAddProduct = mysql_fetch_assoc($rsAddProduct);
$totalRows_rsAddProduct = mysql_num_rows($rsAddProduct);

mysql_select_db($database_db52417, $db52417);
$query_rsCategories = "SELECT * FROM category ORDER BY CatID ASC";
$rsCategories = mysql_query($query_rsCategories, $db52417) or die(mysql_error());
$row_rsCategories = mysql_fetch_assoc($rsCategories);
$totalRows_rsCategories = mysql_num_rows($rsCategories);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Add Product</title>
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
<script src="../SpryAssets/SpryValidationSelect.js" type="text/javascript"></script>
<!-- CuFon ends -->
<link href="../SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
<link href="../SpryAssets/SpryValidationTextarea.css" rel="stylesheet" type="text/css" />
<link href="../SpryAssets/SpryValidationSelect.css" rel="stylesheet" type="text/css" />
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
          <h2><span>Add a new Product</span></h2>
          <hr />
          <p>*Ensure all fields are entered </p>
          <form action="<?php echo $editFormAction; ?>" method="POST" enctype="multipart/form-data" name="form1" id="form1">
            <table border="0">
              <tr>
                <td width="66">Name:</td>
                <td width="393"><span id="sprytextName">
                  <label>
                  <input type="text" name="txtProdName" id="txtProdName" />
                  </label>
                <span class="textfieldRequiredMsg">Name is required.</span></span></td>
              </tr>
              <tr>
                <td>Category:</td>
                <td>
                  <label>
                  <select name="listCats" id="listCats">
                    <?php
do {  
?>
                    <option value="<?php echo $row_rsCategories['CatID']?>"<?php if (!(strcmp($row_rsCategories['CatID'], $row_rsAddProduct['Cat_Id']))) {echo "selected=\"selected\"";} ?>><?php echo $row_rsCategories['CatName']?></option>
                    <?php
} while ($row_rsCategories = mysql_fetch_assoc($rsCategories));
  $rows = mysql_num_rows($rsCategories);
  if($rows > 0) {
      mysql_data_seek($rsCategories, 0);
	  $row_rsCategories = mysql_fetch_assoc($rsCategories);
  }
?>
                  </select>
                                    </label>                  <span class="selectRequiredMsg">Please select an item.</span></td>
              </tr>
              <tr>
                <td>Price:</td>
                <td><span id="sprytextPrice">
                <label>
                <input type="text" name="txtPrice" id="txtPrice" />
                </label>
                <span class="textfieldRequiredMsg">A Price is required.</span><span class="textfieldInvalidFormatMsg">Invalid format.</span></span></td>
              </tr>
              <tr>
                <td>Description:</td>
                <td><span id="sprytextDescr">
                  <label>
                  <textarea name="txtDescr" id="txtDescr" cols="45" rows="5"></textarea>
                  </label>
                <span class="textareaRequiredMsg">A description is required.</span></span></td>
              </tr>
              <tr>
                <td>Quantity:</td>
                <td><span id="sprytextQnty">
                <label>
                <input type="text" name="txtQnty" id="txtQnty" />
                </label>
                <span class="textfieldRequiredMsg">Quantity is required.</span><span class="textfieldInvalidFormatMsg">Invalid format.</span></span></td>
              </tr>
              <tr>
                <td>Available:</td>
                <td><label>
                  <input type="checkbox" name="chkAvailble" id="chkAvailble" />
                (Check if product is Available)</label></td>
              </tr>
              <tr>
                <td>Upload Image:</td>
                <td><label for="filePhoto"></label>
                <input type="file" name="filePhoto" id="filePhoto" /></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td><input type="submit" name="addBtn" id="addBtn" value="Insert this record" />
                <input type="reset" name="resetbtn" id="resetbtn" value="Reset form" /></td>
              </tr>
            </table>
            <input type="hidden" name="MM_insert" value="form1" />
            <input type="hidden" name="hiddenProId" id="hiddenProId" />
          </form>
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
<script type="text/javascript">
<!--
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextName", "none", {validateOn:["blur"]});
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextPrice", "currency", {hint:"30,000", validateOn:["blur"]});
var sprytextarea1 = new Spry.Widget.ValidationTextarea("sprytextDescr", {validateOn:["blur"]});
var sprytextfield3 = new Spry.Widget.ValidationTextField("sprytextQnty", "integer", {validateOn:["blur"]});

//-->
</script>
</body>
</html>
<?php
mysql_free_result($rsAddProduct);

mysql_free_result($rsCategories);
?>
