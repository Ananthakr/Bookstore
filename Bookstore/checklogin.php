
<!doctype html>
<html>
  <head>
	<title>check login</title>
  <head>
  <body><?php
$host="localhost"; // Host name 
$username="root"; // Mysql username 
$password="root"; // Mysql password 
$db_name="bookstore"; // Database name 
$tbl_name="user"; // Table name 

// Connect to server and select databse.
mysql_connect("$host", "$username", "$password")or die("cannot connect"); 
mysql_select_db("$db_name")or die("cannot select DB");

// username and password sent from form 
$myusername=$_POST['username']; 
$mypassword=$_POST['password']; 

// To protect MySQL injection (more detail about MySQL injection)
$myusername = stripslashes($myusername);
$mypassword = stripslashes($mypassword);
$myusername = mysql_real_escape_string($myusername);
$mypassword = mysql_real_escape_string($mypassword);
$sql="SELECT * FROM $tbl_name WHERE u_name='$myusername' and passwd='$mypassword'";
$result=mysql_query($sql);

// Mysql_num_row is counting table row
$count=mysql_num_rows($result);

// If result matched $myusername and $mypassword, table row must be 1 row
if($count==1){
 echo "success setting session variable";
 session_start();
// Register $myusername, $mypassword and redirect to file "login_success.php"
//$_POST['user']=$myusername;
$_SESSION['user']=$myusername; 
header("location:index.php");
}
else {
echo "Wrong Username or Password";
}
?>     
  </body>
 </html>