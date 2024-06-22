<?php session_start();
require_once('../Connections/db52417.php'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Contact Us</title>
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
          <h2><span>How to Contact Us</span></h2>
          <p>&nbsp;</p>
          <div class="style1">
            <p>Address:
              FurnitureMart (K) Ltd
              Mombasa Road, Opp. General Motors</p>
            <p>P.O. Box 12345 - 00200 
              Nairobi, Kenya.              </p>
            <p>Mobile: 07231345145</p>
            <p> Telephone:
              0733 924344 or 0724 656 355 </p>
          </div>
		  
          <div><table width="516" height="166" bordercolor="#FFFFFF">
  <tr>
    <td width="40"><span class="style1">Names</span>: </td>
    <td width="144"><label>
      <input type="text" name="textfield" />
    </label></td>
  </tr>
  <tr>
    <td><span class="style1">E-mail Address : </span></td>
    <td><form id="form1" name="form1" method="post" action="">
      <label>
        <input type="text" name="textfield2" />
        </label>
    </form>
    </td>
  </tr>
  <tr>
    <td><span class="style1">Inquiry:</span></td>
    <td><form id="form2" name="form2" method="post" action="">
      <label>
        <textarea name="textarea"></textarea>
        </label>
    </form>
    </td>
  </tr>
  <tr>
    <td><span class="style1">  </span></td>
    <td><form id="form3" name="form3" method="post" action="">
      <label>
        <input type="submit" name="Submit" value="Submit" />
        </label>
    </form>
    </td>
  </tr>
</table>
</div>
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
