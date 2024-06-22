<?php require_once('../Connections/conn.php'); ?>
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
  $insertSQL = sprintf("INSERT INTO facility (Name, Location, Capacity, Image) VALUES (%s, %s, %s, %s)",
                       GetSQLValueString($_POST['txtname'], "text"),
                       GetSQLValueString($_POST['txtlocation'], "text"),
                       GetSQLValueString($_POST['txtlocation'], "int"),
                        GetSQLValueString($_FILES['image']['name'], "text"));
	
	$target="photos/";
	$target=$target.basename($_FILES['image']['name']);
	
	if(move_uploaded_file($_FILES['image']['tmp_name'], $target))
	{
		//echo "The file". basename($_FILES[['image']['name'])." were uploaded".
	}
	
	else
	{
		//echo "Error in uploading files";
		}
		
		
  mysql_select_db($database_conn, $conn);
  $Result1 = mysql_query($insertSQL, $conn) or die(mysql_error());
 $insertGoTo = "index.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Facility</title>
<link href="../css/style.css" rel="stylesheet" type="text/css" />
<script src="js/jquery-1.4.3.js" language="javascript"></script>
<script>
var timeout    = 500;
var closetimer = 0;
var ddmenuitem = 0;

function jsddm_open()
{  jsddm_canceltimer();
   jsddm_close();
   ddmenuitem = $(this).find('ul').css('visibility', 'visible');}

function jsddm_close()
{  if(ddmenuitem) ddmenuitem.css('visibility', 'hidden');}

function jsddm_timer()
{  closetimer = window.setTimeout(jsddm_close, timeout);}

function jsddm_canceltimer()
{  if(closetimer)
   {  window.clearTimeout(closetimer);
      closetimer = null;}}

$(document).ready(function()
{  $('#jsddm > li').bind('mouseover', jsddm_open)
   $('#jsddm > li').bind('mouseout',  jsddm_timer)});

document.onclick = jsddm_close;

</script>
</head>

<body>
<div id="wrapper">

	<div id="header">
	  <div id="menu">
		<ul id="jsddm">
     <li><a href="index.php">Home</a>
    </li>
    
    <li><a href="groups.php">Groups</a>
    </li>
    <li><a href="class_reg.php">Classes</a>
    </li>
    <li><a href="cell_reg.php">Cells</a></li>
    <li><a href="projects.php">Projects</a>
    </li>
    <li><a href="facility.php">Facilities</a></li>
    <li><a href="#">Devotions</a>
    <ul>
    <li><a href="#">Sermons</a></li>
    <li><a href="#">Daily Devotions</a></li>
    </ul>
    </li>
    <li><a href="contacts.php">Contacts</a></li>
></ul>

	  </div>
		<!-- end #menu -->
		<div id="search">
			<form method="get" action="">
				<fieldset>
				<input type="text" name="s" id="search-text" size="15" />
				<input type="submit" id="search-submit" value="Search" />
				</fieldset>
			</form>
		</div>
		<!-- end #search -->
	</div>
	<!-- end #header -->
	<div id="logo">
		<h1><a href="#">Pcea buru </a></h1>
		<p>Where sight sees a dead end vision sees a new begininning....</p>
	</div>
	<hr />
	<!-- end #logo -->
<!-- end #header-wrapper -->

<div id="page">
	<div id="content">
		<div class="post">
		  <h2 class="title">Facility</h2>
			<div class="entry">
			  <form action="<?php echo $editFormAction; ?>" method="POST" enctype="multipart/form-data" name="form1" id="form1">
			    <div align="center">
			      <table width="200" border="0">
			        <tr>
			          <td><strong>Name:</strong></td>
			          <td><input type="text" name="txtname" id="txtname" /></td>
		            </tr>
			        <tr>
			          <td><strong>Location:</strong></td>
			          <td><input type="text" name="txtlocation" id="txtlocation" /></td>
		            </tr>
			        <tr>
			          <td><strong>Capacity:</strong></td>
			          <td><input type="text" name="txtcapacity" id="txtcapacity" /></td>
		            </tr>
			        <tr>
			          <td><strong>Image:</strong></td>
			          <td><input type="file" name="image" id="image" /></td>
		            </tr>
			        <tr>
			          <td><input type="submit" name="btnsubmit" id="btnsubmit" value="Submit" /></td>
			          <td>&nbsp;</td>
		            </tr>
		          </table>
		        </div>
			    <input type="hidden" name="MM_insert" value="form1" />
              </form>
			  <p>&nbsp;</p>
</div>
		</div>
	</div>
	<!-- end #content --><!-- end #sidebar -->
	<div style="clear: both;">&nbsp;</div>
</div>
<!-- end #page -->

<div id="footer">
	<p>Copyright (c) 2010 SuzzieQ.com. All rights reserved.</p>
</div>
<!-- end #footer -->
</div>
</body>
</html>