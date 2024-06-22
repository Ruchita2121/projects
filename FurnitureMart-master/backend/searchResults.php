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
 $productname = $_POST['form2']; 
    
	
 require_once('../Connections/db52417.php'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Search Results</title>
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
           <?php 
    $res = mysql_query ( 'SELECT * FROM product WHERE Prod_Name LIKE "%'.$productname.'%"');
	$num_products = mysql_num_rows($res);
	$i = 0;
	
    ?>
    
   <?
   if ($num_products==0) 
   {
	?>
	
	<?php echo($productname);?> not found!
	<?
	}else if($num_products>0)
	{
   while($i < $num_products) {
	
	$id 	 = mysql_result($res,$i,"Prod_ID");
	$title = mysql_result($res,$i,"Prod_Name");
	$price  = mysql_result($res,$i,"Prod_Price");
	$photo = mysql_result($res,$i,"Prod_thumb");
	if ($photo=="") $photo="nothumb.jpg";
	
    echo('<table border="0" width="" cellspacing="0" cellpadding="0" class="tableBox_output_table">
   <tr>
    <td  class="main"><table border="0" width="" cellspacing="0" cellpadding="0">
   <tr>
    <td align="left"  style="width:33%">
  <table cellpadding="0" cellspacing="0" border="0" class="prod2_table">
  		<tr><td class="prod2_td">
	<table cellpadding="0" cellspacing="0" border="0" class="wrapper_box">
		<tr><td class="name name2_padd"><a href="productView.php?id='.$id.'&productname='.$title.'" title="'.$title.'">'.$title.'</a></td></tr>
		<tr><td class="price2_padd"><span class="productSpecalPrice"> Ksh '.$price.'</span></td></tr>
		<tr><td class="pic2_padd">
 	<table cellpadding="0" cellspacing="0" border="0" align="center" class="wrapper_pic_table">
		<tr>
		  <td class="wrapper_pic_td"><a href="view_product.php?id='.$id.'&productname='.$title.'" title="'.$title.'"><img id="img" src="uploaded/'.$photo.'" alt="" border="0"  width="193" height="161"/></a></td></tr>
	</table> 
  </td></tr>		
		<tr><td class="button2__padd">
			<table cellpadding="0" cellspacing="0" border="0">
				 <a href="productView.php?id='.$id.'&productname='.$title.'" class="prod_details" title="View Product">Details</a>
				<a href="Cart.php?id='.$id.'" class="prod_cart" title="Add to Cart">Add to Cart</a>
			</table>
		</td></tr>
	</table>									   
	</td></tr>		
  </table></td>  

  </tr> 	
</table>
</td>
  </tr> 	
</table>');
	
	
 
		$i++;
	}
	}
    ?>	
          
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
