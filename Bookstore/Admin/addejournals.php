<?php
$ejid=$_POST['ejid'];
$ejname=$_POST['ejname'];
$pubid=$_POST['pubid'];
$dlink=$_POST['dlink'];
$date=$_POST['pubdate'];
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "bookstore";
// Create connection
$conn = new mysqli($servername, $username, $password,$dbname);
$sql="INSERT INTO `ejourn`(`ej_id`, `ej_name`, `ej_pdate`, `d_link`, `pub_id`, `search`) VALUES ($ejid,'$ejname','$date','$dlink',$pubid,0)";
$result=$conn->query($sql);
?>
<html>
<head>
</head>
<body>
<center>
<h4>Succesfully added </h4>
<br>
<h5><a href="admin_ejournals.php">Click here to add more</a></h5>
<h5><a href="index.php"><--Back to home</a></h5>
<center>
</body>
</html>