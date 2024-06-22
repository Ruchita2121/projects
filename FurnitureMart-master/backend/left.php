<?php session_start();
require_once('../Connections/db52417.php'); ?>
<?php require_once('../Connections/db52417.php'); ?>
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

mysql_select_db($database_db52417, $db52417);
$query_rsCategories = "SELECT * FROM category ORDER BY CatID ASC";
$rsCategories = mysql_query($query_rsCategories, $db52417) or die(mysql_error());
$row_rsCategories = mysql_fetch_assoc($rsCategories);
$totalRows_rsCategories = mysql_num_rows($rsCategories);
?>
<?php
// *** Validate request to login to this site.
if (!isset($_SESSION)) {
  session_start();
}

$loginFormAction = $_SERVER['PHP_SELF'];
if (isset($_GET['accesscheck'])) {
  $_SESSION['PrevUrl'] = $_GET['accesscheck'];
}

if (isset($_POST['txtUsername'])) {
  $loginUsername=$_POST['txtUsername'];
  $password=$_POST['txtpassword'];
  $MM_fldUserAuthorization = "login_level";
  $MM_redirectLoginSuccess = "home.php";
  $MM_redirectLoginFailed = "../indexback.php";
  $MM_redirecttoReferrer = true;
  mysql_select_db($database_db52417, $db52417);
  	
  $LoginRS__query=sprintf("SELECT Cust_Email, CustPassword, login_level FROM customers WHERE Cust_Email=%s AND CustPassword=%s",
  GetSQLValueString($loginUsername, "text"), GetSQLValueString($password, "text")); 
   
  $LoginRS = mysql_query($LoginRS__query, $db52417) or die(mysql_error());
  $loginFoundUser = mysql_num_rows($LoginRS);
  if ($loginFoundUser) {
    
    $loginStrGroup  = mysql_result($LoginRS,0,'login_level');
    
	if (PHP_VERSION >= 5.1) {session_regenerate_id(true);} else {session_regenerate_id();}
    //declare two session variables and assign them
    $_SESSION['MM_Username'] = $loginUsername;
    $_SESSION['MM_UserGroup'] = $loginStrGroup;	      

    if (isset($_SESSION['PrevUrl']) && true) {
      $MM_redirectLoginSuccess = $_SESSION['PrevUrl'];	
    }
    header("Location: " . $MM_redirectLoginSuccess );
  }
  else {
    header("Location: ". $MM_redirectLoginFailed );
  }
}
?>
<div class="sidebar">
        <div class="searchform">
          <form id="formsearch" name="formsearch" method="post" action="searchResults.php">
            <span>
            <input name="editbox_search" class="editbox_search" id="editbox_search" maxlength="80" value="Search our site:" type="text" />
            </span>
            <input name="button_search" src="../Images/search_btn.gif" class="button_search" type="image" />
          </form>
  </div>
        <div class="gadget">
          <h2 class="star"><span>Categories</span></h2>
          <div class="clr"></div>
          <ul class="sb_menu">
            <?php do { ?>
              <li><a href="productList.php?Cat_Id=<?php echo $row_rsCategories['CatID']; ?>"><?php echo $row_rsCategories['CatName']; ?></a></li>
              <?php } while ($row_rsCategories = mysql_fetch_assoc($rsCategories)); ?>
          </ul>
  </div>
  <div class="gadget">
          <blockquote>
            <h2 class="star">Login</h2>
          </blockquote>
    <div class="clr"></div>
          <ul class="ex_menu">
            <li>
            <?php if(!isset($_SESSION['MM_Username']))
		  {
			  ?>
              <form id="formlogin" name="formlogin" method="POST" action="<?php echo $loginFormAction; ?>">
                <label></label>
                <hr />
                <table border="0">
                  <tr>
                    <td width="261"><label>
                      
                        <p><br />
                          Username:</p>
                      
                    </label>
                      <input type="text" name="txtUsername" id="txtUsername" />
                      <hr /></td>
                  </tr>
                  <tr>
                    <td><label>
                     <p>Password:
                          <input name="txtpassword" type="password" id="txtpassword" maxlength="16" />
                        </p>
                      
                    </label>
                      <hr /></td>
                  </tr>
                  <tr>
                    <td><p>
                      <label>
                        <input type="submit" name="btnlogin" id="btnlogin" value="Login" />
                        |
                        <input type="reset" name="btnreset" id="btnreset" value="Reset" />
                      </label>
                      <?php
			}
			else
			{
			?>
                    </p>
                      <blockquote>
                        <p>You are signed in as...<strong><?php echo $_SESSION['MM_Username'];?></strong></p>
                        <hr />
                      </blockquote> 
                      <div id="message" align="center"> 
                        <p><a href="logout.php">Logout</a></p>
                        <hr />
<p>                        <a href="#">Account information </a></p>
                      </div>
                      <?php
				}
				?></td>
                  </tr>
                </table>
                <p>&nbsp;</p>
              </form>

            </li>
                      </ul>
  </div>   
</div>
<?php
mysql_free_result($rsCategories);
?>
