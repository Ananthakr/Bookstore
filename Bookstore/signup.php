<?php
$host="localhost"; // Host name 
$username="root"; // Mysql username 
$password="root"; // Mysql password 
$db_name="bookstore"; // Database name 
$tbl_name="user"; // Table name 

// Connect to server and select databse.
mysql_connect("$host", "$username", "$password")or die("cannot connect"); 
mysql_select_db("$db_name")or die("cannot select DB");

// username and password sent from form 
$newusername=$_POST['username']; 
$newpassword=$_POST['password']; 
$newcpassword=$_POST['cpassword'];
$newemail=$_POST['email'];
$newstreet=$_POST['street'];
$newcity=$_POST['city'];
$newdob=$_POST['dob'];
$newpin=$_POST['pin'];
$newphone=$_POST['phone'];
if($newpassword==$newcpassword){
$sql="INSERT INTO user(`u_name`, `email`, `passwd`, `street`, `city`, `pincode`, `dob`, `p_no`) VALUES ('$newusername','$newemail','$newpassword','$newstreet','$newcity','$newpin','$newdob','$newphone')";
$result=mysql_query($sql);}

$x=rand(100,1000);
$sql="INSERT INTO `cart_user`(`cart_id`, `u_name`, `tot_price`, `discounts`) VALUES ($x,'$newusername',0,0)";
$result=mysql_query($sql);


	header('location:login.php');
	exit;
?>
