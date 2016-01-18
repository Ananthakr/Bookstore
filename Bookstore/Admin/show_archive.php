<?php
$day=$_POST['day'];
$month=$_POST['month'];
$year=$_POST['year'];
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "bookstore";
// Create connection
$table= "sales_of_".$year."-".$month."-".$day;
$conn = new mysqli($servername, $username, $password,$dbname);
 $sql = "SELECT or_id,ship_ad,price FROM `$table`";
          $result = $conn->query($sql);
           $q=0;
           if($result==NULL){
             
           }
           else{
        while($row = $result->fetch_assoc()) {
          $array[$q]=$row['ship_ad'];
          $bkid[$q]=$row['or_id'];
          $bpri[$q]=$row['price'];
          $q++;
           }
         }
?>
<html>
<head>
</head>
<body>
  <center>
<h4><?php echo $table; ?></h4>
<br>
<table>
  <thead>
    <tr>
      <td>order id</td>
      <td>shipping address</td>
      <td>price</td>
    </tr>
  </thead>
    <tbody>
      <?php $x=0;
      if($q!=0){
      for(;$x<$q;$x++){?>
      <tr>
        <td><?php echo $bkid[$x];?></td>
        <td><?php echo $array[$x];?></td>
        <td><?php echo $bpri[$x];?></td>
      <tr>
      <?php ;}}
      else
      {
        echo "No data exists";
      }
      ?>
    </tbody>
<table>
<h5><a href="index.php"><--Back to home</a></h5>
<center>
</body>
</html>