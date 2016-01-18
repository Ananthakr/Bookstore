<?php
session_start();
$dep=$_SESSION['content'];
$na=$_POST['product'];
$servername = "localhost";
           $username = "root";
          $password = "root";
            $dbname = "bookstore";
         // Create connection
          $conn = new mysqli($servername, $username, $password,$dbname);
if($dep!='ebooks'&&$dep!='ejournals'){
     $sql = "SELECT bk_id FROM books where bk_name like '%$na%'";
          $result = $conn->query($sql);
          if($result==NULL)
          	echo "try correctly.. your search word isn't right";
          else{
        while($row = $result->fetch_assoc()) {
        $pro=$row['bk_id'];}
             $sql = "SET @p0='$pro'";
          $result = $conn->query($sql);
                       $sql="CALL `searchup_books`(@p0)";
                       $result=$conn->query($sql);
	header("location:singlebook.php?id=$pro");
	exit;}
}
else if($dep=='ebooks'){
 $sql = "SELECT eb_id FROM ebooks where ed_name like '%$na%'";
          $result = $conn->query($sql);
          if($result==NULL)
          	echo "try correctly.. your search word isn't right";
          else{
        while($row = $result->fetch_assoc()) {
        $pro=$row['eb_id'];}
             $sql = "SET @p0='$pro'";
          $result = $conn->query($sql);
          $sql="CALL `searchup_ebooks`(@p0)";
          $result=$conn->query($sql);
	header("location:singleebook.php?id=$pro");
	exit;}
}
else if($dep=='ejournals'){
     $sql = "SELECT ej_id FROM ejourn where ej_name like '%$na%'";
          $result = $conn->query($sql);
          if($result==NULL)
          	echo "try correctly.. your search word isn't right";
          else{
        while($row = $result->fetch_assoc()) {
        $pro=$row['ej_id'];}
          $sql = "SET @p0='$pro'"; 
          $result = $conn->query($sql); 
          $sql="CALL `searchup_ejourn`(@p0)";
          $result=$conn->query($sql);  
	header("location:singleejournal.php?id=$pro");
	exit;}
}
?>