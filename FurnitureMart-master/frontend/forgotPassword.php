<?php session_start();
require_once('../Connections/db52417.php'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Forgot Password</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link href="../style.css" rel="stylesheet" type="text/css" />
<!-- CuFon: Enables smooth pretty custom font rendering. 100% SEO friendly. To disable, remove this section -->
<script type="text/javascript" src="js/cufon-yui.js"></script>
<script type="text/javascript" src="js/droid_sans_400-droid_sans_700.font.js"></script>
<script type="text/javascript" src="js/cuf_run.js"></script>
<script type="text/javascript" src="js/jquery-1.3.2.min.js"></script>
<script type="text/javascript" src="js/radius.js">
function sendIt(){
		//var g=document.forgotPass.sendMail.value
		xmlhttp=GetXmlHttpObject();
if (xmlhttp==null)
  {
  alert ("Browser does not support HTTP Request");
  return;
  }
var url="forgotPass.php";
url=url+"?mailForgot="+document.forgotPass.sendMail.value+"";
xmlhttp.onreadystatechange=stateChanged5;
xmlhttp.open("GET",url,true);
xmlhttp.send(null);
}</script>
<!-- CuFon ends -->
<style type="text/css">
.main .content .content_resize .mainbar .article table tr td {
	color: #000;
}
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
          <h2>Forgot password</h2>
          <hr />
          <table>
            <tr>
              <td>Enter your name and we will send you an email with a link to change your password</td>
            </tr>
            <tr>
              <td><label for="txtEmail">Email Address:</label>
              <input name="txtEmail" type="text" id="txtEmail" size="60" />
              <input type="submit" name="btnsend" id="btnsend" value="Submit" onClick="sendIt()"/>
              
	  </td>
            </tr>
            <tr>
              <td>&nbsp;</td>
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
