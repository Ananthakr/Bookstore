<?php

   $servername = "localhost";
           $username = "root";
          $password = "root";
            $dbname = "bookstore";
         // Create connection
          $conn = new mysqli($servername, $username, $password,$dbname);

 $sql = "SELECT or_id,ship_ad,price FROM `order`";
          $result = $conn->query($sql);
           $q=0;
        while($row = $result->fetch_assoc()) {
          $array[$q]=$row['ship_ad'];
          $bkid[$q]=$row['or_id'];
          $bpri[$q]=$row['price'];
          $q++;
           }
?>
<html>
<head>
</head>
<body>
<center>
<h4>All sales</h4>
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
    	for(;$x<$q;$x++){?>
    	<tr>
    		<td><?php echo $bkid[$x];?></td>
    		<td><?php echo $array[$x];?></td>
    		<td><?php echo $bpri[$x];?></td>
    	<tr>
    	<?php ;}
    	?>
    </tbody>
</table>
</body>
</html>