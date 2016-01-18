<?php
$autid=$_POST['autid'];
$autname=$_POST['autname'];
$dob=$_POST['dob'];
$dept=$_POST['dept'];
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "bookstore";
// Create connection
$conn = new mysqli($servername, $username, $password,$dbname);
$sql="INSERT INTO `author`(`aut_id`, `name`, `dob`, `age`, `dept`) VALUES ($autid,'$autname','$dob',0,'$dept')";
$result=$conn->query($sql);
?>
<html>
<head>
</head>
<body>
<center>
<h4>Succesfully added </h4>
<br>
<h5><a href="admin_authors.php">Click here to add more</a></h5>
<h5><a href="index.php"><--Back to home</a></h5>
<center>
</body>
</html>