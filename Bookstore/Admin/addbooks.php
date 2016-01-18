<?php
$bkid=$_POST['bkid'];
$bkname=$_POST['bkname'];
$pubid=$_POST['pubid'];
$autid=$_POST['autid'];
$price=$_POST['price'];
$dept=$_POST['dept'];
$edit=$_POST['edit'];
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "bookstore";
// Create connection
$conn = new mysqli($servername, $username, $password,$dbname);
$sql="INSERT INTO `books`(`bk_id`, `bk_name`, `pub_id`, `aut_id`, `price`, `dept`, `edition`, `user_rating`, `search`) VALUES ($bkid,'$bkname',$pubid,$autid,$price,'$dept',$edit,5,0)";
$result=$conn->query($sql);
?>
<html>
<head>
</head>
<body>
<center>
<h4>Succesfully added </h4>
<br>
<h5><a href="admin_books.php">Click here to add more</a></h5>
<h5><a href="index.php"><--Back to home</a></h5>
<center>
</body>
</html>