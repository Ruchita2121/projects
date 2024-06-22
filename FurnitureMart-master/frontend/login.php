<?php
session_start();
error_reporting(E_ALL);
ini_set("display_errors",0);

$ema = $_REQUEST["email"];
$pwd = $_REQUEST["password"];

$host="localhost"; // Host name 
$username="root"; // Mysql username 
$password=""; // Mysql password 
$db_name="db52417"; // Database name 
$tbl_name="customers"; // Table name 

// Connect to server and select databse.
mysql_connect($host, $username, $password)or die("cannot connect"); 
mysql_select_db($db_name)or die("cannot select DB");
$ema = stripslashes($ema);
$pwd = stripslashes($pwd);
$ema = mysql_real_escape_string($ema);
$pwd = mysql_real_escape_string($pwd);

$sql="SELECT * FROM $tbl_name WHERE Cust_Email='$ema' and CustPassword='$pwd'";
$result=mysql_query($sql);
$row=mysql_fetch_assoc($result);
$count=mysql_num_rows($result);

// If result matched $myusername and $mypassword, table row must be 1 row

if($count==1)
{
	$status=$row['Cust_Active'];
	if($status==1){
// Register $myusername, $mypassword and redirect to file "login_success.php"
//session_register("email1");
//session_register("password1"); 
$_SESSION['name']=$row['Cust_Othername']. ' '. $row['Cust_Surname'];
$_SESSION['email']=$row['Cust_Email'];
$_SESSION['active']=$row['Cust_Active'];
$_SESSION['activeCode']=$row['ActivationCode'];
//if(isset($_SESSION['email']){}
echo '<h2 align="center">Signed In</h2>
				<div id="message" align="center">
				  <p>Login Successful!!<br>
				  <h2>Welcome '.$_SESSION['name'].'</p></h2>
				  <p><a href="#">Logout</a></p>
				  <p><a href="#">Account information </a></p>
				</div>';
//echo "True";
//while($rows=mysql_fetch_array($count)){
//echo "Welcome: ";
}
else echo 'Account not active..Please activate..<a href="activate.php">Click here</a>';
}
else {
echo "Wrong username or Password.";
//header("location:index.php");
}
?>