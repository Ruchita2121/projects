<?php
$mailForgot2=$_REQUEST['mailForgot'];
if(strlen($mailForgot2)>0){
echo "Checking the database for ".$mailForgot2."<br />";
}
else echo "Please enter an email address".$mailForgot2."<br />";
$host="192.168.170.15"; // Host name 
$username="52417"; // Mysql username 
$password="52417"; // Mysql password 
$db_name="db52417"; // Database name 
$tbl_name="customers"; // Table name 

// Connect to server and select databse.
mysql_connect($host, $username, $password)or die("cannot connect"); 
mysql_select_db($db_name)or die("cannot select DB");
$mailForgot2 = stripslashes($mailForgot2);
$mailForgot2 = mysql_real_escape_string($mailForgot2);

$sql="SELECT * FROM $tbl_name WHERE Cust_Email='$mailForgot2'";
$result=mysql_query($sql);
$row=mysql_fetch_assoc($result);
$count=mysql_num_rows($result);
if($count==1)
{
$name=$row['Cust_Othername'].' '.$row['Cust_Surname'];
$password=$row['CustPassword'];
$to=$mailForgot2;

// Your subject
$subject="Your password for Furniture mart site";

// From
$header="from: Furniture Mart <support@fmart.com>";

// Your message
$messages= "Hi ".$name."..Password: ".$password." \r\n";
$messages.="If you have any problems please contact us... \r\n";
$sentmail = mail($to,$subject,$messages,$header);

echo "Hi ".$name."<br />Sending...Please check your email";

}
else echo "Account does not exist";

?>