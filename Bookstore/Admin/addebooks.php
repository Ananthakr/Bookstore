<?php
$ebid=$_POST['ebid'];
$ebname=$_POST['ebname'];
$autid=$_POST['autid'];
$dlink=$_POST['dlink'];
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "bookstore";
// Create connection
$conn = new mysqli($servername, $username, $password,$dbname);
$sql="INSERT INTO `ebooks`(`eb_id`, `ed_name`, `d_link`, `aut_id`, `search`) VALUES ($ebid,'$ebname','$dlink',$autid,0)";
$result=$conn->query($sql);
?>
<html>
<head>
</head>
<body>
<center>
<h4>Succesfully added </h4>
<br>
<h5><a href="admin_ebooks.php">Click here to add more</a></h5>
<h5><a href="index.php"><--Back to home</a></h5>
<center>
</body>
</html>