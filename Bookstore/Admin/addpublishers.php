<?php
$pubid=$_POST['pubid'];
$pubname=$_POST['pubname'];
$dept=$_POST['dept'];
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "bookstore";
// Create connection
$conn = new mysqli($servername, $username, $password,$dbname);
$sql="INSERT INTO `publisher`(`pub_id`, `pub_name`, `dept`) VALUES ($pubid,'$pubname','$dept')";
$result=$conn->query($sql);
?>
<html>
<head>
</head>
<body>
<center>
<h4>Succesfully added </h4>
<br>
<h5><a href="admin_publishers.php">Click here to add more</a></h5>
<h5><a href="index.php"><--Back to home</a></h5>
<center>
</body>
</html>