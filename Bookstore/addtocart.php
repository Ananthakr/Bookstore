<?php
session_start();
$u=$_SESSION['user'];
$qty=$_POST['qty'];
$bid=$_SESSION['bid'];
$dep=$_SESSION['content'];
if($u=='guest'){
  header("location:login.php");
  exit;
}
else{
            $servername = "localhost";
           $username = "root";
          $password = "root";
            $dbname = "bookstore";
         // Create connection
          $conn = new mysqli($servername, $username, $password,$dbname);
          echo $bid;
            $sql = "SELECT price FROM books where bk_id=$bid";
          $result = $conn->query($sql);
          while($row = $result->fetch_assoc()) {
        $pri=$row['price'];}
        $sql = "SELECT cart_id,tot_price FROM cart_user where u_name='$u'";
          $result = $conn->query($sql);
          while($row = $result->fetch_assoc()) {
        $cid=$row['cart_id'];
          $tot=$row['tot_price'];}
        $sql = "SELECT * FROM cart where cart_id=$cid";
          $result = $conn->query($sql);
          $ct=mysqli_num_rows($result);
        $sql = "INSERT INTO `cart`(`cart_id`, `bk_id`, `qty`, `price`) values($cid,$bid,$qty,$pri)";
          $result = $conn->query($sql);
         // while($row = $result->fetch_assoc()) {;}
          $sql = "UPDATE cart set price=(select price from books  where bk_id=$bid)*$qty where cart_id=$cid and bk_id=$bid";
          $result = $conn->query($sql);
                //   while($row = $result->fetch_assoc()) {;}
          $sql = "UPDATE `cart_user` set `tot_price`=(select sum(price) from cart where cart_id=$cid) WHERE cart_id=$cid";
          $result = $conn->query($sql);
          


          $sql = "SELECT tot_price FROM cart_user where cart_id=$cid";
          $result = $conn->query($sql);
          while($row = $result->fetch_assoc()) {
          $totl=$row['tot_price'];}
         echo $totl; 


          if($totl>=50){
             $dis=($ct*$totl*5)/100;
             echo $dis;
            $sql = "UPDATE `cart_user` SET `discounts`=$dis WHERE cart_id=$cid";
          $result = $conn->query($sql);

          $sql = "UPDATE `cart_user` set `tot_price`=$totl-$dis WHERE cart_id=$cid";
          $result = $conn->query($sql);
          }
        header("location:singlebook.php?id=$bid");
        exit;
}
?>