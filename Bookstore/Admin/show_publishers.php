<?php

   $servername = "localhost";
           $username = "root";
          $password = "root";
            $dbname = "bookstore";
         // Create connection
          $conn = new mysqli($servername, $username, $password,$dbname);

 $sql = "SELECT pub_id,pub_name,dept FROM `publisher`";
          $result = $conn->query($sql);
           $q=0;
        while($row = $result->fetch_assoc()) {
          $array[$q]=$row['pub_name'];
          $bkid[$q]=$row['pub_id'];
          $bpri[$q]=$row['dept'];
          $q++;
           }
?>
<html>
<head>
</head>
<body>
<center>
<h4>All Authors</h4>
<br>
<table>
	<thead>
		<tr>
			<td>Publisher id</td>
			<td>Publisher name</td>
			<td>Dept</td>
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