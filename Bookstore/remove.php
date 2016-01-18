<?php
$cid=$_GET['cid'];
$bkid=$_GET['bkid'];
          $servername = "localhost";
          $username = "root";
          $password = "root";
          $dbname = "bookstore";
         // Create connection
          $conn = new mysqli($servername, $username, $password,$dbname);
          echo $bid;
          $sql = "SELECT tot_price FROM cart_user where cart_id=$cid";
          $result = $conn->query($sql);
          while($row = $result->fetch_assoc()) {
          $tot=$row['tot_price'];}
          $sql = "SELECT * FROM cart where cart_id=$cid";
          $result = $conn->query($sql);
          $ct=mysqli_num_rows($result);
          $sql = "DELETE FROM `cart` WHERE cart_id=$cid and bk_id=$bkid";
          $result = $conn->query($sql);
          $sql = "UPDATE `cart_user` set `tot_price`=(select sum(price) from cart where cart_id=$cid) WHERE cart_id=$cid";
          $result = $conn->query($sql);


          $sql = "SELECT tot_price FROM cart_user where cart_id=$cid";
          $result = $conn->query($sql);
          while($row = $result->fetch_assoc()) {
          $totl=$row['tot_price'];}
          

          if($totl>=50.00){
             $dis=($ct*$totl*5)/100;

            $sql = "UPDATE `cart_user` set `discounts`=$dis WHERE cart_id=$cid";
          $result = $conn->query($sql);
          $sql = "UPDATE `cart_user` set `tot_price`=$totl-$dis WHERE cart_id=$cid";
          $result = $conn->query($sql);
          }
          header("location:cart.php");
          exit;
?>