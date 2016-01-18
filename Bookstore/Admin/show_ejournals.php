<?php

   $servername = "localhost";
           $username = "root";
          $password = "root";
            $dbname = "bookstore";
         // Create connection
          $conn = new mysqli($servername, $username, $password,$dbname);

 $sql = "SELECT ej_id,ej_name,ej_pdate FROM `ejourn`";
          $result = $conn->query($sql);
           $q=0;
        while($row = $result->fetch_assoc()) {
          $array[$q]=$row['ej_name'];
          $bkid[$q]=$row['ej_id'];
          $bpri[$q]=$row['ej_pdate'];
          $q++;
           }
?>
<html>
<head>
</head>
<body>
<center>
<h4>All Journals</h4>
<br>
<table>
	<thead>
		<tr>
			<td>Journal id</td>
			<td>Journal name</td>
			<td>Date</td>
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
<table>
</body>
</html>