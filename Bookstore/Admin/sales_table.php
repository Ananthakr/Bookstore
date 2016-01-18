<?php

   $servername = "localhost";
           $username = "root";
          $password = "root";
            $dbname = "bookstore";
         // Create connection
          $conn = new mysqli($servername, $username, $password,$dbname);

 $sql = "SELECT day,month,year,total FROM `sales`";
          $result = $conn->query($sql);
           $q=0;
        while($row = $result->fetch_assoc()) {
          $day[$q]=$row['day'];
          $month[$q]=$row['month'];
          $year[$q]=$row['year'];
          $bpri[$q]=$row['total'];
          $q++;
           }
?>
<html>
<head>
</head>
<body>
<center>
<h4>Sales table</h4>
<br>
<table>
	<thead>
		<tr>
			<td>Day</td>
			<td>Month</td>
			<td>Year</td>
      <td>Total sales</td>
		</tr>
	</thead>
    <tbody>
    	<?php $x=0;
    	for(;$x<$q;$x++){?>
    	<tr>
    		<td><?php echo $day[$x];?></td>
    		<td><?php echo $month[$x];?></td>
    		<td><?php echo $year[$x];?></td>
        <td><?php echo $bpri[$x];?></td>
    	<tr>
    	<?php ;}
    	?>
    </tbody>
</table>
</body>
</html>